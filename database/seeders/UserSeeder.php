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

        $usertk->name = 'admintk';
        $usersd->name = 'adminsd';
        $usersmp->name = 'adminsmp';
        $usersma->name = 'adminsma';
        $usersmk->name = 'adminsmk';

        $usertk->email = 'admintk@mail.com';
        $usersd->email = 'adminsd@mail.com';
        $usersmp->email = 'adminsmp@mail.com';
        $usersma->email = 'adminsma@mail.com';
        $usersmk->email = 'adminsmk@mail.com';

        $usertk->password = Hash::make('admintk');
        $usersd->password = Hash::make('adminsd');
        $usersmp->password = Hash::make('adminsmp');
        $usersma->password = Hash::make('adminsma');
        $usersmk->password = Hash::make('adminsmk');

        $usersd->tingkatan = 'sd';
        $usersmp->tingkatan = 'smp';
        $usersma->tingkatan = 'sma';
        $usersmk->tingkatan = 'smk';

        $usertk->save();
        $usersd->save();
        $usersmp->save();
        $usersma->save();
        $usersmk->save();
    }
}
