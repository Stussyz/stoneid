<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AgentController extends Controller
{
    protected $user, $profile;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user    = Auth::user();
            $this->profile = $this->user->agentProfile ?? null;

            return $next($request);
        });
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('dashboard.pages.edit-profile', [
            'user'    => $this->user,
            'profile' => $this->profile,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $old_photo = $this->profile->photo;

        $validated = $request->validate([
            'name'                => 'required|string|max:255',
            'email'               => 'required|email',
            'phone'               => 'nullable|string|max:20',
            'profile_photo'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'password'            => 'required|confirmed|min:8',
            'bio'                 => 'nullable',

            //address
            'address.street'      => 'required|string|max:255',
            'address.village'     => 'required|string|max:255',
            'address.district'    => 'required|string|max:255',
            'address.city'        => 'required|string|max:255',
            'address.province'    => 'required|string|max:255',
            'address.postal_code' => 'required|string|max:20',
        ]);

        $this->profile->address()->updateOrCreate([
            'street'      => $validated['address']['street'],
            'village'     => $validated['address']['village'],
            'district'    => $validated['address']['district'],
            'city'        => $validated['address']['city'],
            'province'    => $validated['address']['province'],
            'postal_code' => $validated['address']['postal_code'],
        ]);
        // Check if entered password matches the user's password
        if (! Hash::check($request->password, $this->user->password)) {
            return back()->withErrors(['password' => 'Password yang Anda masukkan salah.'])->withInput();
        }

        if ($request->hasFile('profile_photo')) {
            if ($old_photo && Storage::exists($old_photo)) {
                Storage::disk('public')->delete($old_photo);
            }
            $filename = uniqid('agen_') . '.' . $request->file('profile_photo')->getClientOriginalExtension();

            // $request->file('profile_photo')->store('profile_photos', 'public');

            //and remove this:
            $request->file('profile_photo')->move(storage_path('app/public/images/agents'), $filename);
            $this->profile->photo = $filename;
        }

        $this->user->name   = $request->name;
        $this->user->email  = $request->email;
        $this->user->phone  = $request->phone;
        $this->profile->bio = $request->bio;

        //save in database
        $this->user->save();
        $this->profile->save();

        return redirect('/dashboard-agent')->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
