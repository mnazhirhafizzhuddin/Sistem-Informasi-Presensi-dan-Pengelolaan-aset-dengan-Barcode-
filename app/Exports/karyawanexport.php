<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
class karyawanexport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $tgl_presensi=date("m")*1;
         return DB::table('itungbulan')->where('bulan','=',$tgl_presensi)->get();
    }
    public function headings():array
    {
        return[
        'Nomor Presensi',
        'Nik',
        'Nama Lengkap',
        'Tanggal Presensi',
        'Jam Masuk',
        'Jam Keluar',
        'Foto Masuk',
        'Foto Keluar',
        'Lokasi Masuk',
        'Lokasi Keluar',
        'Jumlah Jam Kerja ',
       ];

 }
}
