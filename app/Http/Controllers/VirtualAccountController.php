<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jenjang;
use App\Models\Siswa;
use App\Models\VirtualAccount;
use Illuminate\Http\Request;

class VirtualAccountController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $beginningVA = '52799';
        $year = date('Y');

        // Fetch the jenjang record based on jenjang_id
        $jenjang = Jenjang::where('jenjang_id', '=', $request->jenjang_id)->first();

        // Fetch a single siswa record based on jenjang_id and nama_siswa
        $siswa = Siswa::where('jenjang_id', '=', $jenjang->jenjang_id)
            ->where('nama_lengkap', '=', $request->nama_siswa)
            ->first();

        if (!$siswa) {
            // Handle the case where no matching siswa record was found
            return redirect()->back()->with('error', 'Siswa not found.');
        }

        $numberOfAccountsToCreate = 1;

        switch($siswa->sistemBayar->id){
            case 3:
                $numberOfAccountsToCreate = 3;
                break;
            case 2:
                $numberOfAccountsToCreate =  2;
                break;

        }

        for ($i = 0; $i < $numberOfAccountsToCreate; $i++) {
            // Calculate the VirtualAccountIncrement based on the siswa's jenjang_id
            $VirtualAccountIncrement = VirtualAccount::whereHas('siswa', function ($query) use ($siswa) {
                $query->where('jenjang_id', '=', $siswa->jenjang_id);
            })->count() + 1;

            // Format $VirtualAccountIncrement as a 3-digit string (e.g., 001, 002, ..., 999)
            $VirtualAccountIncrement = str_pad($VirtualAccountIncrement, 3, '0', STR_PAD_LEFT);
            $tingkatan = "0" . $siswa->jenjang_id;
            $generatedVA = "{$beginningVA}{$year}{$tingkatan}{$VirtualAccountIncrement}";

            $VirtualAccount = new VirtualAccount();
            $VirtualAccount->siswa_id = $siswa->id;
            $VirtualAccount->number = $generatedVA;
            $VirtualAccount->save();
        }

        return redirect()->route('siswa.detail', ['siswa' => $siswa->id]);
    }

}
