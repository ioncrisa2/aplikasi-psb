<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usertk = new User();
        $usersd = new User();
        $usersmp = new User();
        $usersma= new User();
        $usersmk = new User();
        $usersu= new User();

        $usertk->name = 'tk';
        $usersd->name = 'sd';
        $usersmp->name = 'smp';
        $usersma->name = 'sma';
        $usersmk->name = 'smk';
        $usersu->name = 'admin';

        $usertk->email = 'admintk@mail.com';
        $usersd->email = 'adminsd@mail.com';
        $usersmp->email = 'adminsmp@mail.com';
        $usersma->email = 'adminsma@mail.com';
        $usersmk->email = 'adminsmk@mail.com';
        $usersu->email = 'admin@mail.com';

        $usertk->password = Hash::make('admintk');
        $usersd->password = Hash::make('adminsd');
        $usersmp->password = Hash::make('adminsmp');
        $usersma->password = Hash::make('adminsma');
        $usersmk->password = Hash::make('adminsmk');
        $usersu->password = Hash::make('superadmin');

        $usersd->level = 'sd';
        $usersmp->level = 'smp';
        $usersma->level = 'sma';
        $usersmk->level = 'smk';
        $usertk->level = 'tk';
        $usersu->level = 'su';

        $usertk->save();
        $usersd->save();
        $usersmp->save();
        $usersma->save();
        $usersmk->save();
        $usersu->save();
    }
}
