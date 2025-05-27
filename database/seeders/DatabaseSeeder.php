<?php

namespace Database\Seeders;

use \App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use \App\Models\Facture;
use \App\Models\Local;
use \App\Models\Reservation;
use \App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@admin.com',
        // ]);

        User::factory(10)->create();
        Category::factory(5)->create();
        Local::factory(5)->create();
        Reservation::factory(30)->create()->each(function ($reservation) {
            Facture::factory()->create(['reservation_id' => $reservation->id]);
        });
    }
}
