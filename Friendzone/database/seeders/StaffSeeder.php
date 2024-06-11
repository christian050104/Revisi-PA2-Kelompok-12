<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'namalengkap' => 'staff',
                'username' => 'staff',
                'nomorhp' => '085267816542',
                'email' => 'stafffriendzone@gmail.com',
                'password' => Hash::make('stafffriendzone'),
                'role' => 'staff'

            ]
        );
        foreach ($data as $d) {
            User::create([
                'namalengkap' => $d['namalengkap'],
                'username' => $d['username'],
                'nomorhp' => $d['nomorhp'],
                'email' => $d['email'],
                'password' => $d['password'],
                'role' => $d['role']
            ]);
        }
    }
}
