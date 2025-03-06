<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'rcfin',
            'email' => 'rcfin@ricainformatica.com',
            'cnpj' => '04959577000186',
            'whatsapp' => '85996317902',
            'password' => Hash::make(12345678),
        ]);
    }
}
