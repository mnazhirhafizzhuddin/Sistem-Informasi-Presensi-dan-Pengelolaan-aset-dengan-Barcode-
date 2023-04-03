<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Exports\karyawanexport;
use Maatwebsite\Excel\Facades\Excel;
class DashboardController extends Controller
{
    //
    public function Index(){
        $tgl_presensi=date("m")*1;
        $cek = DB::table('pengajuanizin')->count();
        $jumlah = DB::table('karyawan')->count();
        // ->where('bulan','=',$tgl_presensi)
        $kehadiran =  DB::table('itungbulan')->where('bulan','=',$tgl_presensi)->count();
        $ruangan = DB::table('ruangan')->count();
        return view('dashboard.dashboardadmin', compact('cek','jumlah','kehadiran','ruangan'));
    }
    public function Datakaryawan(Request $request){



        $karyawanku = DB::table('karyawan')->paginate(5);
        // $karyawan =DB::table('karyawan')
        // ->select('nik')
        // ->where('nik','=',$karyawanku->nik)
        // ->get('nik');

        return view('karyawan.datakaryawan',compact('karyawanku',) );
    }
    public function popup(){

        return view('karyawan.tambahkaryawan', );
    }
    public function tambahdata(Request $request){

        // $nomorpegawai = rand();
        $data = [
            'nik'=> $request->nik,
            'nama_lengkap'=>$request->nama_lengkap,
            'tanggallahir'=>$request->tanggallahir,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'jabatan'=>$request->jabatan,
            'no_hp'=>$request->no_hp,
            'password'=>Hash::make($request->password),
            'alamat'=>$request->alamat
        ];
        $simpan= DB::table('karyawan')->insert($data);
        if ($simpan) {
            return  Redirect('/panel/dashboardadmin')->with(['berhasil'=>'Data Berhasil Disimpan']);
        }
    }
    public function editdatakaryawan(Request $request){
        $karyawan = DB::table('karyawan')
        ->where('nik',$request->nik)
        ->first();

        return view('karyawan.editkaryawan', compact('karyawan') );
    }
    public function updatedatakaryawan(Request $request){
        $karyawan = DB::table('karyawan')
        ->where('nik',$request->nik)
        ->first();
        if (!empty($request->password)) {
            $dataku = [
                'nama_lengkap'=>$request->nama_lengkap,
                'tanggallahir'=>$request->tanggallahir,
                'jenis_kelamin'=>$request->jenis_kelamin,
                'jabatan'=>$request->jabatan,
                'no_hp'=>$request->no_hp,
                'password'=>Hash::make($request->password),
                'alamat'=>$request->alamat
            ];

            }
            else{
                $dataku = [
                    'nama_lengkap'=>$request->nama_lengkap,
                    'tanggallahir'=>$request->tanggallahir,
                    'jenis_kelamin'=>$request->jenis_kelamin,
                    'jabatan'=>$request->jabatan,
                    'no_hp'=>$request->no_hp,
                    // 'password'=>Hash::make($request->password),
                    'alamat'=>$request->alamat
                ];
            }
    $update = DB::table('karyawan')->where('nik',$karyawan->nik)->update($dataku);
    if ($update) {
        return Redirect('/panel/dashboardadmin')->with(['berhasil'=>'Data Berhasil Disimpan']);
    } else {
        return Redirect('/panel/dashboardadmin');
    }

}
 public function deletedatakaryawan(Request $request){
     $karyawan = DB::table('karyawan')
        ->where('nik',$request->nik)
        ->delete();
    //  $delete = DB::table('karyawan')->delete($karyawan->nik);
     if ($karyawan) {
        return Redirect('/datakaryawan')->with(['berhasil'=>'Data Berhasil Disimpan']);
    } else {
        return Redirect('/panel/dashboardadmin');
    }
 }
  public function datapresensi(){
    $tgl_presensi=date("m")*1;
    $historijamkerja=DB::table('itungbulan')
    ->where('bulan','=',$tgl_presensi)
    ->paginate(10);
    $namabulan = ["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
     $historikeseluruhan =DB::table('viewtampildata')
     ->get();
    return view('karyawan.datapresensi',compact('historijamkerja','tgl_presensi','historikeseluruhan','namabulan') );
  }
  public function lihatmap($id){
    $datamap = DB::table('viewtampildata')
    ->select('lokasi_in')
    ->where('id',$id)
    ->first();
    // dd($datamap);
    return view('karyawan.lihatmap',compact('datamap') );
  }
  public function lihatmapkeluar($id){
    $datamap = DB::table('viewtampildata')
    ->select('lokasi_out')
    ->where('id',$id)
    ->whereNotNull('lokasi_out')
    ->first();
    // dd($datamap);
    return view('karyawan.lihatmapkeluar',compact('datamap') );
  }
  public function tampildatapresensi($id){
    $historijamkerja=DB::table('itungbulan')
    ->where('id',$id)
    ->first();
// dd($tampildata);
    return view('karyawan.editpresensi', compact('historijamkerja') );
  }
  public function updatedatapresensi(Request $request,$id){
    $historijamkerja=DB::table('itungbulan')
    ->where('id',$id)
    ->first();

    if (!empty($request->jam_out)) {
        $dataku = [
            'jam_out'=>$request->jam_out,

        ];

        }
        else{
            $dataku = [
                'jam_out'=>$request->jam_out,

            ];
        }
    $update = DB::table('itungbulan')->where('id',$historijamkerja->id)->update($dataku);
    if ($update) {
    return Redirect('/datapresensi')->with(['berhasil'=>'Data Berhasil Disimpan']);
    } else {
    return Redirect('/panel/dashboardadmin');
    }
  }
  public function deletedatapresensi($id){
    $presensi = DB::table('itungbulan')
        ->where('id',$id)
        ->delete();
    //  $delete = DB::table('karyawan')->delete($karyawan->nik);
     if ($presensi) {
        return Redirect('/datapresensi')->with(['berhasil'=>'Data Berhasil Disimpan']);
    } else {
        return Redirect('/panel/dashboardadmin');
    }
  }
  public function ambildata(){
    return Excel::download(new karyawanexport, 'KehadiranKaryawan.xlsx');
  }
  public function datapengajuancuti(){
    $datapengajuancuti = DB::table('selisihcuti')->paginate(5);
    // dd($datapengajuancuti);
    return view('karyawan.datapengajuancuti',compact('datapengajuancuti'));
  }
  public function tampilpengajuancuti($id){
    $tampilcuti=DB::table('selisihcuti')
    ->where('id',$id)
    ->first();
    // dd($tampilcuti);
    return view('karyawan.editpengajuancuti',compact('tampilcuti'));
  }
  public function updatedatapengajuancuti( Request $request,$id){
    $tampilcuti=DB::table('selisihcuti')
    ->where('id',$id)
    ->first();

    if (empty($request->jam_out)) {
        $dataku = [
            'status_persetujuan'=>$request->status_persetujuan,

        ];

        }
        else{
            $dataku = [
                'status_persetujuan'=>$request->status_persetujuan,

            ];
        }
    $update = DB::table('selisihcuti')->where('id',$tampilcuti->id)->update($dataku);
    if ($update) {
    return Redirect('/datapengajuancuti')->with(['berhasil'=>'Data Berhasil Disimpan']);
    } else {
    return Redirect('/panel/dashboardadmin');
    }
  }
  public function deletedatacuti($id){
    $presensi = DB::table('selisihcuti')
        ->where('id',$id)
        ->delete();
    //  $delete = DB::table('karyawan')->delete($karyawan->nik);
     if ($presensi) {
        return Redirect('/datapengajuancuti')->with(['berhasil'=>'Data Berhasil Disimpan']);
    } else {
        return Redirect('/panel/dashboardadmin');
    }
  }


}
