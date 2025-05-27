<?php

namespace Database\Factories;

use App\Models\LocalImage;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LocalImage>
 */
class LocalImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
  protected $model = LocalImage::class;

    public function definition()
    {
        $client = new Client();

        $width = rand(200, 1000);
        $height = rand(200, 1000);
        $imageUrl = "https://picsum.photos/{$width}/{$height}";

        $fileName = uniqid() . '.jpg';
        $imagePath = 'local_images/' . $fileName;

        try {
            $response = $client->get($imageUrl);
            Storage::disk('public')->put($imagePath, $response->getBody()->getContents());
        } catch (\Exception $e) {
            $localPlaceholder = public_path('profile_empty/blank-profile-picture-973460_640.png');
            Storage::disk('public')->put($imagePath, file_get_contents($localPlaceholder));
        }

        return [
            'local_id' => \App\Models\Local::factory(), // or pass manually in seeder
            'image_path' => $imagePath,
        ];
    }
}
