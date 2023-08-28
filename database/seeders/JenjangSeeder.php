<?php

namespace Database\Seeders;

use App\Models\Jenjang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tk = new Jenjang();
        $tk->nama = 'TK';
        $tk->save();

        $sd = new Jenjang();
        $sd->nama = 'SD';
        $sd->save();

        $smp = new Jenjang();
        $smp->nama = 'SMP';
        $smp->save();

        $sma = new Jenjang();
        $sma->nama = 'SMA';
        $sma->save();

        $tkj = new Jenjang();
        $tkj->nama = 'SMK';
        $tkj->jurusan = 'Teknik Komputer Jaringa';
        $tkj->save();

        $bd = new Jenjang();
        $bd->nama = 'SMK';
        $bd->jurusan = 'Bisnis Digital';
        $bd->save();


    }
}
