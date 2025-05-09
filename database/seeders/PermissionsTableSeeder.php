<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view users',
            'edit users',
            'delete users',
            'create users',
            'view roles',
            'edit roles',
            'delete roles',
            'create roles',
            'view permission',
            'edit permission',
            'delete permission',
            'create permission',
            'create booking',
            'view booking',
            'edit booking',
            'delete booking',
            'status booking',
            'create payment',
            'view hotel',
            'create hotel',
            'edit hotel',
            'delete hotel',
            'view room',
            'create room',
            'edit room',
            'delete room',
            'view room type',
            'create room type',
            'edit room type',
            'delete room type',
            'create amenity',
            'edit amenity',
            'delete amenity',
            'add payment',
            
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
    
}
