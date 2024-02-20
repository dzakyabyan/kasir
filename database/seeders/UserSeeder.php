<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\QueryException;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert(
        [
            'name'      => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('123456'),
            // 'password'  => Hash::make('admin'),
            'role'      => ('admin'),
        ]);
        
        DB::table('users')->insert(
            [
                'name'      => 'kasir',
                'email'     => 'kasir@gmail.com',
                'password'  => bcrypt('123456'),
                // 'password'  => Hash::make('admin'),
                'role'      => ('kasir'),
        ]);

        foreach (DB::table('users') as $key => $val){
            User::create($val);
        }
    }
}
