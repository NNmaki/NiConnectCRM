<?php
namespace Database\Seeders;

use App\Models\User;
use App\RoleEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $users = [
        //     ['first_name' => 'Mika', 'last_name' => 'Virtanen', 'email' => 'mika.virtanen@example.fi'],
        //     ['first_name' => 'Laura', 'last_name' => 'Korhonen', 'email' => 'laura.korhonen@example.fi'],
        //     ['first_name' => 'Jani', 'last_name' => 'Nieminen', 'email' => 'jani.nieminen@example.fi'],
        //     ['first_name' => 'Sanna', 'last_name' => 'Mäkinen', 'email' => 'sanna.makinen@example.fi'],
        //     ['first_name' => 'Petri', 'last_name' => 'Lehtonen', 'email' => 'petri.lehtonen@example.fi'],
        //     ['first_name' => 'Anni', 'last_name' => 'Koskinen', 'email' => 'anni.koskinen@example.fi'],
        //     ['first_name' => 'Timo', 'last_name' => 'Järvinen', 'email' => 'timo.jarvinen@example.fi'],
        //     ['first_name' => 'Kaisa', 'last_name' => 'Laine', 'email' => 'kaisa.laine@example.fi'],
        //     ['first_name' => 'Antti', 'last_name' => 'Salo', 'email' => 'antti.salo@example.fi'],
        //     ['first_name' => 'Johanna', 'last_name' => 'Heikkinen', 'email' => 'johanna.heikkinen@example.fi'],
        // ];

        // foreach ($users as $userData) {
        //     User::create([
        //         'first_name' => $userData['first_name'],
        //         'last_name' => $userData['last_name'],
        //         'email' => $userData['email'],
        //         'password' => Hash::make('SUPERSECRET'),
        //         'email_verified_at' => now(),
        //     ])->assignRole('user');
        // }
        // User::create([
        //     'first_name' => 'Admin',
        //     'last_name' => 'Ylläpitäjä',
        //     'email' => 'admin@admin.fi',
        //     'password' => Hash::make('SUPERSECRET'),
        //     'email_verified_at' => now(),
        // ])->syncRoles([RoleEnum::ADMIN]);
    
        // User::create([
        //     'first_name' => 'Niko',
        //     'last_name' => 'Nmaki',
        //     'email' => 'niko@nmaki.com',
        //     'password' => Hash::make('SUPERSECRET'),
        //     'email_verified_at' => now(),
        // ])->syncRoles([RoleEnum::ADMIN]);


        // User::create([
        //     'first_name' => 'Admin',
        //     'last_name' => 'User',
        //     'email' => 'admin@user.com',
        //     'password' => Hash::make('SUPERSECRET'),
        //     'email_verified_at' => now(),
        // ])->syncRoles([RoleEnum::ADMIN]);


        // User::create([
        //     'first_name' => 'Test',
        //     'last_name' => 'Admin',
        //     'email' => 'testadmin@testadmin.com',
        //     'password' => Hash::make('SUPERSECRET'),
        //     'email_verified_at' => now(),
        // ])->syncRoles([RoleEnum::ADMIN]);

    }
}