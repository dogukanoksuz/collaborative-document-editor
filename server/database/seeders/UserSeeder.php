<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Doğukan Öksüz',
            'email' => 'me@dogukan.dev',
            'password' => Hash::make('divergent')
        ]);
    }
}
