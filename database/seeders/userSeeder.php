<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

// model
use App\Models\User as User;
use App\Models\Biodata as Biodata;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id_user = User::create([
            'email' => "admin@gmail.com",
            'password' => Hash::make("12345678"),
        ]);
        Biodata::create([
            'id_user' => $id_user->id,
            'nama_lengkap' => "Alfadjri Dwi Fadhilah",
            'no_handphone' => "087718611101",
        ]);
        $id_user->assignRole('admin');
    }
}
