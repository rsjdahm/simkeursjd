<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return User::create([
            'username' => 'WALID',
            'password' => Hash::make('admin'),
            'nama' => 'Moh. Walid',
            'nip' => '200008062022011001',
            'jabatan' => 'Staf Perbendaharaan',
            'email' => 'mohwalidas2@gmail.com',
            'level' => 'Admin'
        ]);
    }
}
