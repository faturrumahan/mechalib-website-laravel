<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Item;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'username' => 'admin007',
            'email' => 'admin@gmail.com',
            'is_admin' => '1',
            'password' => bcrypt('admin123')
        ]);

        User::create([
            'username' => 'johnny',
            'email' => 'jhonny032@gmail.com',
            'password' => bcrypt('password')
        ]);

        Category::create([
            'name' => 'Keyboard',
            'slug' => 'keyboard',
            'img_link' => 'img\keyboard.jpg'
        ]);

        Category::create([
            'name' => 'Switch',
            'slug' => 'switch',
            'img_link' => 'img\switch.jpg'
        ]);

        Category::create([
            'name' => 'Keycap',
            'slug' => 'keycap',
            'img_link' => 'img\keycaps.png'
        ]);

        Category::create([
            'name' => 'PCB',
            'slug' => 'pcb',
            'img_link' => 'img\pcb.jpg'
        ]);

        Category::create([
            'name' => 'Case',
            'slug' => 'case',
            'img_link' => 'img\case.png'
        ]);

        Category::create([
            'name' => 'Plate',
            'slug' => 'plate',
            'img_link' => 'img\plate.jpg'
        ]);

        Category::create([
            'name' => 'Stabilizer',
            'slug' => 'stabilizer',
            'img_link' => 'img\stab.jpg'
        ]);

        Category::create([
            'name' => 'Other',
            'slug' => 'other',
            'img_link' => 'img\other.jpg'
        ]);
    }
}
