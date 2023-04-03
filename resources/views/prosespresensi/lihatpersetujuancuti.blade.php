@extends('layout.presensi')
@section('header')
<div class="appHeader bg-success text-light">
    <div class="left">
    </div>
    <div class="pageTitle">Halaman Persetujuan cuti</div>
    <div class="right"></div>
</div>
@endsection
@section('content')
<div class="row" style="margin-top: 70px ">
    <div class="col">
        <div class="row">

            <div class="col-12">
                @foreach($datapengajuancuti as $baris)
                <div class="form-group">

                    <div class="custom-file">

                        <ul class="listview image-listview">
                            <li>
                                <div class="item">

                                       {{-- <img src="{{url($path)}}" alt="image" class="imaged w64 rounded-bottom"> <div class="in"> --}}
                                        <div class="tglpresensi">
                                            <small> Nama </small><br>
                                           <b>{{$baris->nama_lengkap}}</b>
                                        </div> &nbsp; &nbsp;
                                        <div class="tglpresensi">
                                            <small> Tanggal izin </small><br>
                                            <b>{{$baris->izinawal}}</b>
                                        </div>&nbsp; &nbsp;
                                        <div class="jammasuk">
                                            <small> Tanggal Izin AKhir  </small><br>
                                           <b>{{$baris->izinakhir}}</b>
                                        </div>&nbsp; &nbsp;
                                        <div class="'jamkeluar">
                                            <small>Jumlah pengajuan Cuti</small><br>
                                           <b>{{$baris->totalcutidiajukan}}</b>
                                        </div>&nbsp; &nbsp;
                                        <div class="surat">
                                            <small>Bukti</small><br>
                                          <b>{{$baris->surat}}</b>
                                        </div>&nbsp; &nbsp;
                                        <div class="Keterangan">
                                            <small>Keterangan</small><br>
                                            <b>{{$baris->keterangan}}</b>
                                        </div>&nbsp; &nbsp;
                                        <div class="StatusPersetujuan">
                                            <small>Status Persetujuan</small><br>

                                            @if($baris->status_persetujuan=="disetujui")
                                            <b class="bg-success text-white">{{$baris->status_persetujuan}}</b>
                                            @elseif ($baris->status_persetujuan=="ditolak")
                                            <b class="bg-danger text-white">{{$baris->status_persetujuan}}</b>
                                            @else
                                            <b class="bg-warning text-white">menunggu persetujuan </b>
                                            @endif
                                        </div>

                                        <span class="text-muted"></span>
                                    </div>
                                </div>
                            </li>
                        </ul>

                    </div>

                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>


 @endsection
