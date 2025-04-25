<?php
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ListingRequest>
 */
class ListingRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'          => User::inRandomOrder()->first()->id,
            'agent_profile_id' => null,
            'photo'            => 'user_listing_request_' . Str::random(12) . '.jpg',
            'property_title'   => $this->faker->words(3, true),
            'property_type'    => $this->faker->randomElement(['Rumah', 'Apartemen']),
            'description'      => $this->faker->paragraph,
            'price'            => $this->faker->randomFloat(2, 50000000, 5000000000),
            'address'          => $this->faker->address,
            'location'         => $this->faker->city,
            'transaction_type' => $this->faker->randomElement(['Dijual', 'Disewa', 'Dijual/Disewa']),
            'status'           => $this->faker->randomElement(['pending', 'accepted', 'ready']),
        ];
    }
}
