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
use Illuminate\Support\Facades\Validator;
class TampilanController extends Controller
{
    //
    public function Index(Request $request){
        $hariini=date("Y-m-d");
        $bulanini=date("m")*1;//cek ambil bulan
        $tahunini=date("Y");// cek ambil tahun
        $jamkeluar=date("h:i:s");
        $nik = Auth::guard('karyawan')->user()->nik;
        $presensihariini= DB::table('absensi')->where('nik',$nik)->where('tgl_presensi',$hariini)->first();
        $presensipulangini= DB::table('absensi')->where('nik',$nik)->where('tgl_presensi',$hariini)->first();
        // if ($presensipulangini!=null) {
        //   $datetime1 = new DateTime($request->masuk);
        //     $datetime2 = new DateTime($request->selisih);
        //     $interval = date_diff($datetime1,$datetime2);
        //     $hasil = $interval->format("%h:%i:%s");
        //     $datajamkerja = [
        //         'jumlahjamkerja'=>$hasil
        //     ];
        //     $update = DB::table('absensi')->where('tgl_presensi',$hariini)->where('nik',$nik)->update($datajamkerja);

        // }
        //rekap jumlah hadir
        // $rows = DB::select('select * from viewtampildata');
        // foreach ($rows as $row) {
        // var_dump($row->jumlahjamkerja);
        // }
        $historijamkerjahariini=DB::table('viewtampildata')
        ->where('nik',$nik)
        ->where('tgl_presensi',$hariini)
        ->get('jumlahjamkerja');
        // dd($historijamkerjahariini);
        // $image_parts = explode(":",$historijamkerjahariini);
        // $image_base64 = base64_decode($image_parts[1]);// dd($historijamkerjahariini);
         $rekapkehadiran = DB::table('absensi')
        ->selectRaw('COUNT(nik) as jumlahhadir,SUM(IF(jam_in>"07:00",1,0)) as jumlahterlambat')
        ->where('nik',$nik)
        ->whereRaw('MONTH(tgl_presensi)="'.$bulanini.'"')
        ->whereRaw('YEAR(tgl_presensi)="'.$tahunini.'"')
        ->first();

        //untuk ngasih kondisi terkait hitung batasan jam presensi
        // $rekapkehadiran1 = DB::table('absensi')
        // ->selectRaw('COUNT(nik) as jumlahhadir, SUM(IF(jam_in>"07:00",1,0)) as jumlahterlambat')
        // ->where('nik',$nik)
        // ->whereRaw('MONTH(tgl_presensi)="'.$bulanini.'"')
        // ->whereRaw('YEAR(tgl_presensi)="'.$tahunini.'"')
        // ->first();

        //untuk histori didashboard
        $historibulanini=DB::table('absensi')
        ->where('nik',$nik)
        ->whereRaw('MONTH(tgl_presensi)="'.$bulanini.'"')
        ->whereRaw('YEAR(tgl_presensi)="'.$tahunini.'"')
        ->orderBy('tgl_presensi')
        ->get();
       $leaderboard = DB::table('absensi')
        ->join('karyawan', 'absensi.nik','=','karyawan.nik')
        ->where('tgl_presensi',$hariini)
        ->orderBy('jam_in')
        ->get();
        $hitung=DB::table('selisihcuti')
        ->where('nik',$nik)
        ->where('keterangan','=','sakit')
        ->count();
        $hitung1=DB::table('selisihcuti')
        ->where('nik',$nik)
        ->where('keterangan','=','acara_keluarga')
        ->count();
        $namabulan = ["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

        // ,'image_parts','image_base64'
        return view('dashboard.dashboard',compact('presensihariini','presensipulangini','historibulanini','namabulan','bulanini','tahunini','jamkeluar','rekapkehadiran','leaderboard','historijamkerjahariini','hitung','hitung1'));

        // return view('dashboard.dashboard');
    }

    public function reloadCaptcha(){
        //  response()->json(['Captcha'=>captcha_img()]);
    return redirect()->back()->response()->json(['captcha'=>captcha_img('captcha')]);

        // response()->json(['Captcha'=>captcha_img('flat')]);
    }
}
