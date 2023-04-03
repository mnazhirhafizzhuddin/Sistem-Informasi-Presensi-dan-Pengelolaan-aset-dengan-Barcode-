@extends('layout.presensi')
@section('content')
<div class="section" id="user-section">
    <div id="user-detail">
        <div class="avatar">
            @if(!empty(Auth::guard('karyawan')->user()->foto))
           @php
                    $path = Storage::url('uploads/fotoprofilkaryawan/'.Auth::guard('karyawan')->user()->foto);
           @endphp
               <img src="{{url($path)}}" alt="avatar" class="imaged w120 rounded-buttom">
            @else
            <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged w120 rounded-bottom">
            @endif
        </div>
        <div id="user-info">
            @if(Auth::guard('karyawan')->check())
            <h2 id="user-name">{{Auth::guard('karyawan')->user()->nama_lengkap}} </h2>
            <span id="user-role">{{Auth::guard('karyawan')->user()->jabatan}}</span>
            @endif

        </div>
    </div>
</div>


<div class="section" id="menu-section">
    <br>
    <br>
    <nav class="navbar navbar-expand-lg navbar-light  bg-primary">
        {{-- <a class="navbar-brand" href="#">Navbar</a>--}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item text-white">
              <a class="nav-link {{request()->is ('presensi/histori') ?'active' : ''}}" style="color: white" href="/presensi/histori"><ion-icon name="calendar-outline"></ion-icon> &nbsp;Histori</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle"style="color: white" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <ion-icon name="person-outline"></ion-icon> User
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item text-primary" style="color: white; background-color: bg-primary"href="/proseslogout"><ion-icon name="log-in-outline"></ion-icon>Log Out</a>
                <a class="dropdown-item text-primary" style="color: white; background-color: bg-primary"href="/presensi/lihatpersetujuancuti"><ion-icon name="eye-outline"></ion-icon>Lihat Persetujuan Cuti</a>
            </div>
            </li>
          </ul>
        </div>
      </nav>
</div>
{{--
<div class="section" id="menu-section">
    <div class="card">
        <div class="card-body text-center">
            <div class="list-menu">
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="" class="green" style="font-size: 40px;">
                            <ion-icon name="person-sharp"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        <span class="text-center">Profil</span>
                    </div>
                </div>
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="" class="danger" style="font-size: 40px;">
                            <ion-icon name="calendar-number"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        <span class="text-center">Cuti</span>
                    </div>
                </div>
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="" class="warning" style="font-size: 40px;">
                            <ion-icon name="document-text"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        <span class="text-center">Histori</span>
                    </div>
                </div>
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <a href="" class="orange" style="font-size: 40px;">
                            <ion-icon name="location"></ion-icon>
                        </a>
                    </div>
                    <div class="menu-name">
                        Lokasi
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Image and text -->

<div class="section mt-2" id="presence-section">
    <div class="todaypresence">
        <div class="row">
            <div class="col-6">
                <div class="card gradasigreen">
                    <div class="card-body">
                        <div class="presencecontent">
                            <div class="iconpresence">
                            @if($presensihariini != null )
                            @php
                                $path = Storage::url('uploads/absensi/'.$presensihariini->foto_in);
                            @endphp
                            <img src="{{url($path)}}" alt="image" class="imaged w64 rounded-buttom">
                            @else
                            <ion-icon name="camera"></ion-icon>
                            @endif
                            </div>
                            <div class="presencedetail">
                                <h4 class="presencetitle">Masuk</h4>
                                <span>{{$presensihariini != null ?  $presensihariini->jam_in: 'Belum Presensi Masuk'}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card gradasired">
                    <div class="card-body">
                        <div class="presencecontent">
                            <div class="iconpresence">
                                @if($presensipulangini != null && $presensipulangini->jam_out !=null )
                                @php
                                    $path = Storage::url('uploads/absensi/'.$presensipulangini->foto_out);
                                @endphp
                                <img src="{{url($path)}}" alt="image" class="imaged w64 rounded-bottom">
                                @else
                                <ion-icon name="camera"></ion-icon>
                                @endif
                            </div>
                            <div class="presencedetail">
                                <h4 class="presencetitle">Pulang</h4>
                                <span class="text-black">{{$presensipulangini != null  && $presensipulangini->jam_out !=null ? $presensipulangini->jam_out: 'Belum Presensi Pulang'}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="row">

</div>
    <div class="rekappresence">
        <div class="container">
            <div class="container-fluid">
            <center style="font-weight: bold">
                <marquee behavior="" direction="">
                    <span style="font-style:italic ">Rekap Presensi Bulan : {{$namabulan[$bulanini]}} Dan Tahun {{$tahunini}}</span>
                </marquee>
            </center>
            </div>
        </div>
        <br>
        &nbsp;        &nbsp;        &nbsp;        &nbsp;
        <div class="container-fluid" style="  display: flexbox;
        justify-content: center;">
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-body text-center" style="padding: 12px 12px !important">
                            <span class="badge bg-danger" style="position: absolute; top: 3px; right: 2px; font-size: 0.6rem;
                            z-index: 999">{{$rekapkehadiran->jumlahhadir}}</span>
                            <ion-icon name="accessibility-outline" style="font-size: 1.6rem" class="text-success mb-1"></ion-icon>
                            <br>
                            <span>Hadir</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body text-center" style="padding: 12px 12px !important">
                            <span class="badge bg-danger" style="position: absolute; top: 3px; right: 2px; font-size: 0.6rem;
                            z-index: 999">{{$hitung1}}</span>
                            <ion-icon name="clipboard-outline" style="font-size: 1.6rem" class="text-info mb-1" ></ion-icon>
                            <br>
                            <span>Izin</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body text-center" style="padding: 12px 12px !important">
                            <ion-icon name="time-outline"></ion-icon><br>
                            <span style="font-size: 16.9px">Total Jam Kerja Hari ini</span>
                            <span class="badge bg-secondaryr" style="position: absolute; top: 3px; right: 2px; font-size: 0.6rem;
                            z-index: 999"></span>
                            @foreach($historijamkerjahariini as $histori)
                            <p>Jumlah jam {{$histori->jumlahjamkerja}}</p>
                            @endforeach
                    </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body text-center" style="padding: 12px 12px !important">
                            <span class="badge bg-danger" style="position: absolute; top: 3px; right: 2px; font-size: 0.6rem;
                            z-index: 999">{{$hitung}}</span>
                            <ion-icon name="pulse-outline" style="font-size: 1.6rem" class="text-danger mb-1"></ion-icon>
                            <br>
                            <span>Sakit</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <div class="presencetab mt-2">
        <div class="tab-pane fade show active" id="pilled" role="tabpanel">
            <ul class="nav nav-tabs style1" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                        Bulan Ini
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                        Leaderboard
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content mt-2" style="margin-bottom:100px;">
            <div class="tab-pane fade show active" id="home" role="tabpanel">
                <ul class="listview image-listview">
                    @foreach($historibulanini as $row)
                    @php
                        $path=Storage::url('uploads/absensi/'.$row->foto_in)
                    @endphp
                    <li>
                        <div class="item">
                            <span style="font-size: 10px">Foto Masuk </span>
                            <br>
                            <div class="icon-box bg-primary">
                                <br><img src="{{url($path)}}" alt="" class="imaged w64 rounded-bottom"><br>
                            </div>
                            <div class="in">
                                <div>{{date("d-m-Y",strtotime($row->tgl_presensi))}}</div>
                                <div>
                                    <span class="badge badge-primary">{{$row->jam_in}}</span><br><br>
                                    <span class="badge badge-success">{{$presensihariini!=null&&$row->jam_out !=null
                                    ? $row->jam_out :'Belum Presensi Pulang!'}}</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach


                </ul>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel">
                <ul class="listview image-listview">
                    @forelse ( $leaderboard as $row )
                    @php
                    $path=Storage::url('uploads/absensi/'.$row->foto_in)
                    @endphp
                    <li>
                        <div class="item">
                            <img src="{{url($path)}}" alt="image" class="image">
                            <div class="in">
                                <div class="lead">{{$row->nama_lengkap}} <br>
                                    <small>
                                    {{$row->jabatan}}
                                    </small>
                                </div>
                                <div class="jammasuk">
                                    <small> Jam Presensi Masuk </small><br>
                                    {{$row->jam_in}}
                                </div>
                                <div class="'jamkeluar">
                                    <small>Jam Presensi Keluar</small><br>
                                    {{$row->jam_out}}
                                </div>

                                <span class="text-muted"></span>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</div>
@endsection
