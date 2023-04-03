@foreach($histori as $baris)
<ul class="listview image-listview">
    <li>
        <div class="item">
            @php
            $path=Storage::url('uploads/absensi/'.$baris->foto_in)
            @endphp
               <img src="{{url($path)}}" alt="image" class="imaged w64 rounded-bottom"> <div class="in">
                <div class="lead">{{$baris->nama_lengkap}} <br>
                    <small>
                        {{Auth::guard('karyawan')->user()->jabatan}}
                    </small>
                </div>
                <div class="tglpresensi">
                    <small> Tanggal Presensi </small><br>
                    {{$baris->tgl_presensi}}
                </div>
                <div class="jammasuk">
                    <small> Jam Presensi Masuk </small><br>
                    {{$baris->jam_in}}
                </div>
                <div class="'jamkeluar">
                    <small>Jam Presensi Keluar</small><br>
                    {{$baris->jam_out}}
                </div>

                <span class="text-muted"></span>
            </div>
        </div>
    </li>
</ul>
@endforeach
