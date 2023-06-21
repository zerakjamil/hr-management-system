<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $userPermission = Permission::create([
            'name' => 'user'
        ]);

        $superadminPermission = Permission::create([
            'name' => 'superadmin'
        ]);

        $user1 = User::factory()->create([
            'name' => 'Zirak',
            'email' => 'zirak@gmail.com',
        ]);

        $user2 = User::factory()->create([
            'name' => 'test',
            'email' => 'test@gmail.com',
        ]);



        $user1->givePermissionTo($superadminPermission);
        $user2->givePermissionTo($userPermission);

        \App\Models\Warehouse::factory(10)->create();
        \App\Models\Branch::factory(100)->create();
        \App\Models\Device::factory(3001)->create();
        \App\Models\Device::factory(1)->create([
            'serial_number' => '1214022143'
        ]);
    }
}
