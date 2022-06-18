<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::factory(10)->create();
        $this->seedPersonalDataForUser();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }

    public function seedPersonalDataForUser()
    {
        User::create([
            'name' => 'saeed',
            'email' => 'saeedmouzarmi@gmail.com',
            'password' => '11111111',
        ]);
    }
}
