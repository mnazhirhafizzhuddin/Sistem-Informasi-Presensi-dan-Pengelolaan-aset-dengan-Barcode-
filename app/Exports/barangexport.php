<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class barangexport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

        //
        protected $barangs1;

    public function __construct($barangs1)
    {
        $this->barangs1 = $barangs1;
    }

    public function collection()
    {
        return collect($this->barangs1);
    }

    public function headings(): array
    {
        return [
            'Nomor Ruangan',
            'Asal Ruangan',
            'Nomor Barang',
            'Nama Barang'
            // tambahkan heading sesuai dengan jumlah kolom yang di-export
        ];
    }
    }

