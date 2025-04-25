<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\HistoryTransaction;
use App\Models\Property;
use App\Models\PropertyTransactionProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionProcessController extends Controller
{
    protected $steps = [
        'property-review'   => 'initiated',
        'negotiation'       => 'processed',
        'ppjb-document'     => 'processed',
        'ajb-document'      => 'processed',
        'transfer-document' => 'processed',
        'finalization'      => 'processed',
    ];

    protected $agent, $profile;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->agent   = Auth::user();
            $this->profile = $this->agent->agentProfile;

            return $next($request);
        });
    }

    // public function start($id_preview)
    // {
    //     $property    = Property::where('id_preview', $id_preview)->firstOrFail();
    //     $transaction = $property->transactions()->first();

    //     $step = $transaction->current_step ?? 'property-review';

    //     return redirect()->route('dashboard-agent.transaction.process', [$id_preview, $step]);
    // }

    public function show($id_preview, $step)
    {
        if (! array_key_exists($step, $this->steps)) {
            abort(404, 'Invalid step');
        }

        $property    = Property::where('id_preview', $id_preview)->firstOrFail();
        $transaction = $property->transactions()->firstOrFail();

        // Ensure only sale listings
        abort_if($property->transaction_type !== 'Dijual', 403);

        //check if the step is completed
        if (empty($step) && $transaction->status === 'completed') {
            return redirect()->route('dashboard-agent.transaction.success', $property->id_preview)
                ->with('success', 'Properti berhasil dijual dan transaksi selesai.');
        }

        $stepKeys     = array_keys($this->steps);
        $stepIndex    = array_search($step, $stepKeys);
        $currentIndex = array_search($transaction->current_step, $stepKeys);

        // Prevent skipping ahead
        if ($stepIndex > $currentIndex) {
            return redirect()->route('dashboard-agent.transaction.process', [$id_preview, $transaction->current_step]);
        }

        $data = []; // Fetch any relevant data for that step

        return view("dashboard.pages.transaction-process-parts.$step", compact('step', 'data', 'property'),
            [
                'user'    => $this->agent,
                'profile' => $this->profile,
            ]);
    }

    public function save(Request $request, $id_preview, $step)
    {

        if (! array_key_exists($step, $this->steps)) {
            abort(404, 'Invalid step');
        }

        $property    = Property::where('id_preview', $id_preview)->firstOrFail();
        $transaction = $property->transactions()->firstOrFail();

        // Ensure only sale listings
        abort_if($property->transaction_type !== 'Dijual', 403);

        //---------- Handle validation and saving per step -------------------
        switch ($step) {
            case 'negotiation':
                //update status published to draft
                if (! $property->status === 'draft') {
                    $property->status = "draft";
                    $property->save();
                }

                $this->saveInformations($request, $transaction->id, $step);
                break;
            case "ppjb-document":
                // YOU CAN ADD A DOCUMENT VERIFICATION LOGIC/PLUGIN HERE
                $this->saveInformations($request, $transaction->id, $step);
                break;
            case "ajb-document":
                // YOU CAN ADD A DOCUMENT VERIFICATION LOGIC/PLUGIN HERE
                $this->saveInformations($request, $transaction->id, $step);
                break;
            case "transfer-document":
                // YOU CAN ADD A DOCUMENT VERIFICATION LOGIC/PLUGIN HERE
                $this->saveInformations($request, $transaction->id, $step);
                break;
            case "finalization":
                $this->saveInformations($request, $transaction->id, $step);

                // ------------- Finalization step — mark as completed ---------------
                $transaction->status       = 'completed';
                $transaction->current_step = null;
                $transaction->completed_at = now();
                $transaction->save();

                // Archive the property
                $property->update(['status' => "archived"]);
                $detail = $transaction->stepDetails()
                    ->where('step_name', 'finalization') // or the relevant step
                    ->first();
                // Create history transaction snapshot
                $final_price = $detail?->additional_data['final_price'] ?? null;
                HistoryTransaction::create([
                    'property_id'      => $property->id,
                    'agent_profile_id' => $property->agent_profile_id,
                    'user_profile_id'  => $property->user_profiles_id ?? null,
                    'finalized_at'     => now(),
                    'transaction_type' => $property->transaction_type,
                    'total_value'      => $final_price,
                    'duration'         => $property->min_rent_period,
                    'notes'            => 'Properti telah berhasil dijual.',
                ]);

                return redirect()->route('dashboard-agent.transaction.success', $property->id_preview)
                    ->with('success', 'Properti berhasil dijual dan transaksi selesai.');
                break;

        }
        //--------------------------------------------------------------------

        //------------------ Updating the step -------------------------------

        $stepKeys     = array_keys($this->steps);
        $currentIndex = array_search($step, $stepKeys);
        $nextStep     = $stepKeys[$currentIndex + 1] ?? null;

        $transaction->current_step = $nextStep ?? $step;
        $transaction->status       = $this->steps[$nextStep ?? $step];
        // -------------------------------------------------------------------

        // ------------save the current transaction data ----------------------
        $transaction->save();
        //---------------------------------------------------------------------

        return redirect()->route('dashboard-agent.transaction.process', [$id_preview, $nextStep])->with('success', 'Langkah berhasil disimpan.');
    }

    public function success($id_preview)
    {
        $property    = Property::where('id_preview', $id_preview)->firstOrFail();
        $transaction = $property->transaction;

        // if ($transaction->status !== 'completed') {
        //     return redirect()->route('transaction.process', [$id_preview, $transaction->current_step]);
        // }

        return view('dashboard.pages.transaction-process-parts.success-transaction-page',
            compact('property', 'transaction'),
            [
                'user'    => $this->agent,
                'profile' => $this->profile,
            ]);
    }

    private function saveInformations(Request $request, $transactionId, $step)
    {
        $excluded       = ['_token', 'description', 'step']; // Any fields you don't want in additional_data
        $additionalData = collect($request->all())
            ->except($excluded)
            ->toArray();

        $transaction = PropertyTransactionProcess::findOrFail($transactionId);
        // Save step detail
        $transaction->stepDetails()->updateOrCreate(
            ['step_name' => $step],
            [
                'description'     => $request['description'],
                'additional_data' => $additionalData,
            ]
        );

        // Store uploaded documents
        foreach (['bank_agreement', 'agreement', 'corporate_agreement',
            'landmark_transafer', "mortgage_rights"] as $type) {
            if ($request->hasFile($type)) {

                //store not working in dev please activate this before deployment
                // $filePath = $request->file($type)->store("transactions/{$type}", 'private');

                $filename  = uniqid($type . '_') . '.' . $request->file($type)->getClientOriginalExtension();
                $directory = storage_path("app/private/transactions/{$type}");

                // Ensure the directory exists
                if (! file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }

                // Move file to the target directory
                $request->file($type)->move($directory, $filename);

                // Save relative path in DB
                $path = "transactions/{$type}/{$filename}";

                $transaction->documents()->updateOrCreate(
                    ['type' => $type],
                    ['type' => $path],
                    // ['file_path' => $filePath]
                );
            }
        }
    }
}
