<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\barangexport;
class RuangController extends Controller
{
    //
    public function index(){
        $ruangan =  DB::table('ruangan')->paginate(10);

        return view('ruangan.halamanruangan',compact('ruangan'));
    }
    public function tampilruangan(){
        return view('ruangan.halamantambahdataruangan',);
    }
    public function tambahdata(Request $request){

        // $nomorpegawai = rand();
        $fungsiabsolute = "aktif";
        $data = [
            'noruangan'=> rand(),
            'namaruangan'=>$request->namaruangan,
            'fungsiruangan'=>$request->fungsiruangan,
            'status'=>$fungsiabsolute,
            'penanggungjawab'=>$request->penanggungjawab,
        ];
        $simpan= DB::table('ruangan')->insert($data);
        if ($simpan) {
            return  Redirect('/dataruangan')->with(['berhasil'=>'Data Berhasil Disimpan']);
        }
        else{

        }
    }
    public function tampildataruangan($id){
        $ruangan = DB::table('ruangan')
        ->where('noruangan',$id)
        ->first();

        return view('ruangan.halamaneditdataruangan', compact('ruangan',) );
    }
    public function updatedataruangan(Request $request,$id){
        $ruanganku = DB::table('ruangan')
        ->where('noruangan',$request->noruangan)
        ->first();

        if (!empty($request->status)) {
            $dataku = [
                'namaruangan'=>$request->namaruangan,
                'fungsiruangan'=>$request->fungsiruangan,
                'status'=>$request->status,
                'penanggungjawab'=>$request->penanggungjawab,
            ];

            }
            else{
                $dataku = [
                    'namaruangan'=>$request->namaruangan,
                    'fungsiruangan'=>$request->fungsiruangan,
                    // 'status'=>$request->status,
                    'penanggungjawab'=>$request->penanggungjawab,
                ];
            }
    $update = DB::table('ruangan')->where('noruangan',$ruanganku->noruangan)->update($dataku);
    if ($update) {
        return Redirect('/dataruangan')->with(['berhasil'=>'Data Berhasil Disimpan']);
    } else {
        return Redirect('/panel/dashboardadmin');
    }

}
public function deletedataruangan($id){
    $ruangan = DB::table('ruangan')
        ->where('noruangan',$id)
        ->delete();
    //  $delete = DB::table('karyawan')->delete($karyawan->nik);
     if ($ruangan) {
        return Redirect('/dataruangan')->with(['berhasil'=>'Data Berhasil Disimpan']);
    } else {
        return Redirect('/panel/dashboardadmin');
    }
}
public function detailbarang($id){

    $ruanganku = DB::table('ruangan')
    ->select('noruangan')
    ->where('noruangan',$id)
    ->first();

    $barangs = DB::table('barang')
    ->select( 'ruangan.noruangan','ruangan.namaruangan', 'barang.nomorbarang','barang.namabarang')
    ->join('ruangan', 'ruangan.noruangan', '=', 'barang.noruangan')
    ->where('ruangan.noruangan',$ruanganku->noruangan)
    ->get();

    $barangs1 = DB::table('barang')
    ->select( 'ruangan.noruangan','ruangan.namaruangan', 'barang.nomorbarang','barang.namabarang')
    ->join('ruangan', 'ruangan.noruangan', '=', 'barang.noruangan')
    ->where('ruangan.noruangan',$ruanganku->noruangan)
    ->count();

    if ($ruanganku ==  !empty($barangs) ) {

        // return view('dashboarddetailbarang', [
        //     'users' => DB::table('users')->paginate(15)
        // ]);
        return view('dashboard.dashboarddetailbarang',compact('ruanganku','barangs','barangs1'));

      }
      else{

      }

}
public function halamanbarang($id){

    $ruanganku = DB::table('ruangan')
    ->select('noruangan')
    ->where('noruangan',$id)
    ->first();
    $barangs1 = DB::table('barang')
    ->select( 'ruangan.noruangan','ruangan.namaruangan', 'barang.nomorbarang','barang.namabarang')
    ->join('ruangan', 'ruangan.noruangan', '=', 'barang.noruangan')
    ->where('ruangan.noruangan',$id)
    ->first();

    $barangs = DB::table('barang')
    ->select( 'ruangan.noruangan','ruangan.namaruangan', 'barang.nomorbarang','barang.namabarang')
    ->join('ruangan', 'ruangan.noruangan', '=', 'barang.noruangan')
    ->where('ruangan.noruangan',$id)
    ->paginate(5);
    return view('barang.databarang',compact('barangs','ruanganku','barangs1'));
}
public function halamantambahbarang($id){
    $ruanganku = DB::table('ruangan')
    ->select('noruangan')
    ->where('noruangan',$id)
    ->first();
    $barangs1 = DB::table('barang')
    ->select( 'ruangan.noruangan','ruangan.namaruangan', 'barang.nomorbarang','barang.namabarang')
    ->join('ruangan', 'ruangan.noruangan', '=', 'barang.noruangan')
    ->where('ruangan.noruangan',$id)
    ->first();
    return view('barang.tambahbarang',compact('ruanganku','barangs1'));

}
public function tambahbarang(Request $request, $id){

    $data = [

        'namabarang'=>$request->namabarang,
        'noruangan'=>$id,

    ];
    $simpan= DB::table('barang')->insert($data);
    if ($simpan) {
        return  Redirect()->back()->with(['berhasil'=>'Data Berhasil Disimpan']);
    }
    else{

    }
}
public function halamanupdatebarang(Request $request,$id){
    $ruanganku = DB::table('ruangan')
    ->select('noruangan')
    ->where('noruangan',$id)
    ->first();

    $barangs1 = DB::table('barang')
    ->select( 'ruangan.noruangan','ruangan.namaruangan', 'barang.nomorbarang','barang.namabarang')
    ->join('ruangan', 'ruangan.noruangan', '=', 'barang.noruangan')
    ->where('ruangan.noruangan',$id)
    ->first();

    $barangku=DB::table('barang')
    ->where('barang.nomorbarang',$request->nomorbarang)
    ->first();

    $namaruangan = DB::table('ruangan')
    ->get();

    return view('barang.updatedatabarang',compact('barangs1','ruanganku','namaruangan','barangku'));

}
public function updatebarang(Request $request,$id){
    $barangku = DB::table('barang')
    ->where('nomorbarang',$id)
    ->first();
    if (!empty($request->noruangan)) {
        $dataku = [
            'namabarang'=>$request->namabarang,
            'noruangan'=>$request->noruangan,
        ];

        }
        else{
            $dataku = [
                'namabarang'=>$request->namabarang,
            ];
        }
$update = DB::table('barang')->where('nomorbarang',$barangku->nomorbarang)->update($dataku);
if ($update) {
    return Redirect('/dataruangan')->with(['berhasil'=>'Data Berhasil Disimpan']);
} else {
    return Redirect('/panel/dashboardadmin');
}

}
 public function deletedatabarang ($id){
    $barang = DB::table('barang')
        ->where('nomorbarang',$id)
        ->delete();
    //  $delete = DB::table('karyawan')->delete($karyawan->nik);
     if ($barang) {
        return Redirect()->back()->with(['berhasil'=>'Data Berhasil Disimpan']);
    } else {
        return Redirect('/panel/dashboardadmin');
    }
 }
 public function donwloadexcel($id){
    $barangs1 = DB::table('barang')
    ->select( 'ruangan.noruangan','ruangan.namaruangan', 'barang.nomorbarang','barang.namabarang')
    ->join('ruangan', 'ruangan.noruangan', '=', 'barang.noruangan')
    ->where('ruangan.noruangan',$id)
    ->get();
    return Excel::download(new barangexport($barangs1), 'barang.xlsx');
 }

}
