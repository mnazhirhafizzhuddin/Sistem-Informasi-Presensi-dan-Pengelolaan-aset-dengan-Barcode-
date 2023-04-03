<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DateTime;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
// use Storage;
use Termwind\Components\Dd;

class PresensiController extends Controller
{
    //
    public function create(){
        $hariini=date("Y-m-d");
        $nik = Auth::guard('karyawan')->user()->nik;
        $cek = DB::table('absensi')->where('tgl_presensi',$hariini)->where('nik',$nik)->count();
        $presensihariini= DB::table('absensi')->where('nik',$nik)->where('tgl_presensi',$hariini)->first();
        $presensipulangini= DB::table('absensi')->where('nik',$nik)->where('tgl_presensi',$hariini)->first();
        $cekpresensi = DB::table('absensi')->where('nik',$nik)->where('tgl_presensi', $hariini)->whereNotNull('jam_out')->first();

        return view('prosespresensi.create',compact('cek','presensihariini','cekpresensi'));
    }
    public function store(Request $request)
    {
        $nik = Auth::guard('karyawan')->user()->nik;
        $nama_lengkap = Auth::guard('karyawan')->user()->nama_lengkap;
        $tgl_presensi=date("Y-m-d");
        $jam=date("H:i:s");
        $jampulang=date("H:i:s");
        $latitudekantor= -6.342621523559595;
        $longitudekantor=106.6654469269406;
        $lokasi = $request->lokasi;
        $lokasiuser=explode(",", $lokasi);
        $latitudeuser=$lokasiuser[0];
        $longitudeuser=$lokasiuser[1];
        $jarak= $this->distance($latitudekantor,$longitudekantor,$latitudeuser,$longitudeuser);
        $radius=round($jarak["meters"]);

        $cek = DB::table('absensi')->where('tgl_presensi',$tgl_presensi)->where('nik',$nik)->count();
        $cekpresensi = DB::table('absensi')->where('jam_out',$jam)->where('nik',$nik)->first();

        if ($cek>0) {
            $ket = "out";
        }
        else {
            $ket="in";
        }
        $image = $request->image;
        $folderpath = "public/uploads/absensi/";
        $formatName = $nik."-".$tgl_presensi."-".$ket;
        $image_parts = explode(";base64",$image);
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $formatName .'.png';
        $file = $folderpath.$fileName;
        $data = [
            'nik'=> $nik,
            'nama_lengkap'=>$nama_lengkap,
            'tgl_presensi'=>$tgl_presensi,
            'jam_in'=> $jam,
            'foto_in'=>$fileName,
            'lokasi_in'=>$lokasi
        ];
    //   if ($jarak >10) {
    //         echo "maaf anda diluar radius";
    //   }
    if ($cek>0) {

        if (empty($cekpresensi)) {
            $datajamkerja = [
                'jam_out'=> $jampulang,
                'foto_out'=>$fileName,
                'lokasi_out'=>$lokasi,
                // 'jumlahjamkerja'=>$hasil
            ];
            // $datajamkerja1 = [

            //     'jumlahjamkerja'=>$hasil
            // ];
            $update = DB::table('absensi')->where('tgl_presensi',$tgl_presensi)->where('nik',$nik)->update($datajamkerja);

            // $update = DB::table('absensi')->where('jumlahjamkerja',$hasil)->where('nik',$nik)->update($datajamkerja1);

         //    dd($update);
            if ($update) {


                    echo"success|Anda Sudah Berhasil Melakukan Presensi pulang|out";

                    Storage::put($file,$image_base64);


                // dd($update);

            }else {
                echo "1";
            }
        } else {

        }

    //    $datapulang = [

    //         // 'jumlahjamkerja'=>$hasil
    //     ];
        // $track_date = $jam;
        // $total_time =  absensi::where('Jam_out', $jampulang)->sum(DB::raw("TIME_TO_SEC(jumlahjamkerja)"));
        // $presensihariini= DB::table('absensi')->where('nik',$nik)->where('jam_in',$jam)->first();
        // $presensihariini = date("H:i:s");
        // $presensihariini= DB::table('absensi')->where('nik',$nik)->where('tgl_presensi',$tgl_presensi)->first();
        // $datetime1 = new DateTime($presensihariini->jam_in);
        // $datetime2 = new DateTime($request->selisih);
        // $interval = date_diff($datetime1,$datetime2);
        // $hasil = $interval->format("%h:%i:%s");
        // var_dump($datetime1);

        }

     else{
        $simpan= DB::table('absensi')->insert($data);
        if ($simpan) {

            echo"success|Anda Sudah Berhasil Melakukan Presensi Selamat Bekerja|in";

            Storage::put($file,$image_base64);

        }else {
            echo "1";
        }
    }


    }
    //menghitung radius jarak presensi
   public function distance($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
        $miles = acos($miles);
        $miles = rad2deg($miles);
        $miles = $miles * 60 * 1.1515;
        $feet = $miles * 5280;
        $yards = $feet / 3;
        $kilometers = $miles * 1.609344;
        $meters = $kilometers * 1000;
        return compact('meters');
    }

 public function customprofil(){
    $nik = Auth::guard('karyawan')->user()->nik;
    $karyawanedit =DB::table('karyawan')
    ->where('nik',$nik)
    ->first();
    // dd($karyawanedit);
 return view('prosespresensi.edit',compact('karyawanedit'));
 }
 public function editprofil(Request $request){
    $nik = Auth::guard('karyawan')->user()->nik;
   // $nama_lengkap = $request->nama_lengkap;
   $password= Hash::make($request->password);
   $datakaryawan =DB::table('karyawan')->where('nik',$nik)->first();
   if ($request->hasFile('foto')) {
        $foto = $nik.".".$request->file('foto')->getClientOriginalExtension();

    }
   else{
    $foto =$datakaryawan->foto;
   }
   if (!empty($request->password)) {
    $data = [
        'nama_lengkap'=>$request->nama_lengkap,
        // 'jabatan'=>$request->jabatan,
        'no_hp'=>$request->no_hp,
        'password'=>$password,
        'alamat'=>$request->alamat,
        'foto'=>$foto
    ];

    }
    else{
        $data = [
            'nama_lengkap'=>$request->nama_lengkap,
            // 'jabatan'=>$request->jabatan,
            'no_hp'=>$request->no_hp,
            // 'password'=>$password,
            'alamat'=>$request->alamat,
            //  'foto'=>$foto
        ];
    }
    $update = DB::table('karyawan')->where('nik',$nik)->update($data);
    if ($update) {
        if ($request->hasFile('foto')) {
            $folderpath="public/uploads/fotoprofilkaryawan/";
            $request->file('foto')->storeAs($folderpath, $foto);
        }
        return  Redirect::back()->with(['berhasil'=>'Data Diri Berhasil Diubah']);
    }
    else{
        return  Redirect::back()->with(['tidakberhasil'=>'Data Diri Tidak Berhasil Diubah ']);
    }
 }
 public function izin(){
    $nik = Auth::guard('karyawan')->user()->nik;
    $karyawanizin =DB::table('karyawan')
    ->where('nik',$nik)
    ->first();
// dd($nik);
$cek = DB::table('selisihcuti')->where('totalcutidiajukan')->where('nik',$nik)->count();
 return view('prosespresensi.pengajuancuti', compact('karyawanizin','cek'));
 }

 public function storecuti(Request $request){
    $nik = Auth::guard('karyawan')->user()->nik;
    // $statuspersetujuan="Belum Disetujui";
    $namalengkap= Auth::guard('karyawan')->user()->nama_lengkap;
    $datakaryawan =DB::table('selisihcuti')->where('nik',$nik)->first();
    $cek = DB::table('selisihcuti')->where('totalcutidiajukan')->where('nik',$nik)->count();
    if ($request->hasFile('surat')) {
        $surat = $nik."-".$request->alasan.".".$request->file('surat')->getClientOriginalExtension();

    }
   else{
    $surat =$datakaryawan->surat;
   }

    $data = [
        'nik'=>$nik,
        'nama_lengkap'=>$namalengkap,
        // 'jabatan'=>$request->jabatan,
        'izinawal'=>$request->izinawal,
        // 'password'=>$password,
        'izinakhir'=>$request->izinakhir,
        'surat'=>$surat,
        'keterangan'=>$request->alasan,
        // 'status_persetujuan'=>$statuspersetujuan
    ];


    // return Redirect('/dashboard');

    $simpan= DB::table('pengajuanizin')->insert($data);
    if ($simpan) {
        if ($request->hasFile('surat')) {
            $folderpath="public/uploads/surat/";
            $request->file('surat')->storeAs($folderpath, $surat);
        }
        return  Redirect::back()->with(['berhasil'=>'Pengajuan Cuti Terkirim Mohon Tunggu kabar selanjutnya']);
    }
    else{
        return  Redirect::back()->with(['gagal'=>'Pengajuan Cuti Anda Gagal Harap Cek Kembali']);

    }



 }
public function histori(){
//    $tahun= date("Y");
    $namabulan = ["NamaBulan","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
    return view('prosespresensi.historipresensi',compact('namabulan',));
}

public function gethistori(Request $request){
    $bulan = $request->bulan;
    $tahun = $request->tahun;
    $nik = Auth::guard('karyawan')->user()->nik;
    $histori = DB::table('absensi')
    ->whereRaw('MONTH(tgl_presensi)="'.$bulan.'"')
    ->whereRaw('YEAR(tgl_presensi)="'.$tahun.'"')
    ->where('nik',$nik)
    ->orderBy('tgl_presensi')
    ->get();
// dd($histori);
return view('prosespresensi.gethistori', compact('histori'));
}
public function cuti (){
    $nik = Auth::guard('karyawan')->user()->nik;
    $datapengajuancuti = DB::table('selisihcuti')->where('nik',$nik)->get();
    // dd($datapengajuancuti);
    $datapengajuancuti1 = DB::table('selisihcuti')->where('nik',$nik)->whereNotNull('status_persetujuan')->get();
    return view ('prosespresensi.lihatpersetujuancuti', compact('datapengajuancuti','datapengajuancuti1'));
}

}
