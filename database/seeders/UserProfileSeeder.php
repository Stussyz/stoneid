<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'Malang',
            'Jakarta',
            'Surabaya',
            'Semarang',
            'Medan',
            'Yogyakarta',
            'Bali',
            'Lampung',
            'Banjarmasin',
        ];

        $users = User::where('role', 'user')->get();

        foreach ($users as $user) {
            UserProfile::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'photo'       => 'user-default.png',
                    'address'     => $cities[array_rand($cities)],
                    'favorites'   => json_encode([]),
                    'description' => fake()->text(120),
                ]
            );
        }
    }
}
