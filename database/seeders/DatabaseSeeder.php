<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
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
//        User::factory()->create([
//            'id' => 18,
//            'name' => 'SterDevs',
//            'gender' => 'male',
//            'email' => 'sterdevs@gmail.com',
//            'town' => 'Douala',
//            'phoneNumber' => '656656507'
//        ])->roles()->create([
//            'name' => 'sudo'
//        ]);

        \DB::beginTransaction();

        $sudo = Role::create([
            'name' => 'sudo',
        ]);

        Role::create([
            'name' => 'admin',
        ]);

        $user = User::factory()->create([
            'name' => 'MySkul',
            'gender' => 'male',
            'email' => 'MySkul2023@gmail.com',
            'town' => 'Douala',
            'password' => env('DEFAULT_SUDO_PASSWORD')
        ]);

        $user->roles()->attach($sudo);

        \DB::commit();
    }
}
