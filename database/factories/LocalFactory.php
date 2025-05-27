<?php

namespace Database\Factories;

use App\Models\Category;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Local>
 */
class LocalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $client = new Client();

        $width = rand(300, 1000);
        $height = rand(300, 1000);
        $imageUrl = "https://picsum.photos/{$width}/{$height}";

        $fileName = uniqid() . '.jpg';
        $imagePath = 'uploads/' . $fileName;

        try {
            $response = $client->get($imageUrl);
            Storage::disk('public')->put($imagePath, $response->getBody()->getContents());
        } catch (\Exception $e) {
            $localFallback = public_path('profile_empty/blank-profile-picture-973460_640.png');
            Storage::disk('public')->put($imagePath, file_get_contents($localFallback));
        }

        return [
            'category_id' => Category::factory(),
            'image_path' => $imagePath,
            'capacite' => rand(10, 100),
            'prix' => rand(100, 1000),
            'location' => $this->faker->city(),
            'is_enabled' => true,
        ];
    }
}
