<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'super-admin']);
        $userRole = Role::create(['name' => 'user']);

        $user = new User();
        $user->name = "Super Admin";
        $user->email = "superadmin@gmail.com";
        $user->password = bcrypt('12345678');
        $user->save();
        $user->assignRole($adminRole);
        
        $user = new User;
        $user->name = "User";
        $user->email = "user@gmail.com";
        $user->password = bcrypt('12345678');
        $user->save();
        $user->assignRole($userRole);

        $profile = new UserProfile();
        $profile->nik = '332211442233';
        $profile->student_number = '123321123';
        $profile->graduate_at = date("Y");
        $profile->phone = '0824726421';
        $profile->place_birth = 'wonosobo';
        $profile->date_birth = date("Y-m-d");
        $profile->gender = "1";
        $profile->job = "programmer";
        $profile->address = "kalibeber";
        $profile->income = 1000000;
        $profile->nik = '332211442233';
        $profile->user_id = $user->id;
        $profile->save();
    }
}
