<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 生徒
        DB::table('users')->insert([
            'serial_id' => 's000001',
            'name' => '佐藤翔太',
            'email' => 'syota.sato@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // メンター
        DB::table('users')->insert([
            'serial_id' => 'm000001',
            'name' => '鈴木太郎',
            'email' => 'taro.suzuki.mentor@gmail.com',
            'is_mentor' => true,
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
