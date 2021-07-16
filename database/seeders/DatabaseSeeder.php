<?php

namespace Database\Seeders;

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
        $admin = new User();
        $admin->name="admin";
        $admin->email="admin@gmail.com";
        $admin->password = bcrypt('password');
        $admin->visible_password = "password";
        $admin->email_verified_at = NOW();
        $admin->occupation="CEO";
        $admin->address = "Address here";
        $admin->phone="011111121342";
        $admin->is_admin = 1;
        $admin->save();
    }
}
