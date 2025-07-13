<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
// use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
          $this->call([
        HotelRoomSeeder::class,
    ]);
        // Role::create(['name' => 'Super Admin']);
        User::create([
            'name' => 'Admin User',
            'email' => 'super@admin.com',
            'password' => Hash::make('password'),
        ])->assignRole('Super Admin');

    }
}
