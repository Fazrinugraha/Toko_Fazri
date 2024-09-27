<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Distributor;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'user2',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('123456789'),
            'point' => 10000,
        ]);

        Admin::create([
            'name' => 'admin2',
            'username' => 'Admin2',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('123456789') ,
        ]);

        Distributor::create([
            'nama_distibutor' => 'Fazri nugraha',
            'lokasi' => 'Bengkalis',
            'kontak' => '081275037018',
            'email' => 'fazri2@gmail.com',
        ]);
    }
}