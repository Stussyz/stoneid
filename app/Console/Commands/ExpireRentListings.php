<?php
namespace App\Console\Commands;

use App\Models\Property;
use Illuminate\Console\Command;

class ExpireRentListings extends Command
{
    protected $signature   = 'property:expire-rent';
    protected $description = 'Auto-expire rent property listings on expiration date.';

    public function handle()
    {
        $expired = Property::where('transaction_type', 'rent')
            ->whereDate('expires_at', '<=', now())
            ->where('status', '!=', 'archived')
            ->get();

        foreach ($expired as $property) {
            $property->update(['status' => 'archived']);
        }

        $this->info('Expired rent listings have been archived.');
    }
}
