<?php
namespace Database\Seeders;

use App\Models\RequestListing;
use Illuminate\Database\Seeder;

class ListingPreviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define possible transaction types
        $transactionTypes = ['sell', 'rent', 'both'];

        // Loop to create 10 sample listing previews
        for ($i = 1; $i <= 10; $i++) {
            RequestListing::create([
                                                   // Make sure these user IDs exist in your database:
                'user_id'          => rand(2, 10), // normal users (assuming user with id 1 is an agent)
                'agent_id'         => 1,           // assume agent with id 1 exists
                'title'            => 'Properti Contoh ' . $i,
                'description'      => 'Deskripsi untuk properti contoh ' . $i . '. Detail lengkap akan ditampilkan setelah verifikasi.',
                'expected_price'   => rand(500000000, 2500000000), // Price between ~500 juta and ~2.5 miliar
                                                                   // For demo, we store sample image file names in a JSON array
                'images'           => json_encode(['gambar1.jpg', 'gambar2.jpg']),
                // Randomly select one transaction type from the array
                'transaction_type' => $transactionTypes[array_rand($transactionTypes)],
                'status'           => 'pending', // default status
            ]);
        }
    }
}
