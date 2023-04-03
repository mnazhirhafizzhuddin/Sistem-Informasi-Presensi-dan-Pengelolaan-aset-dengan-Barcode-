@extends('layout.presensi')
@section('header')
<div class="appHeader bg-success text-light">
    <div class="left">

    </div>
    <div class="pageTitle">Halaman Edit Profil</div>
    <div class="right"></div>
</div>
@endsection


@section('content')
<div class="row"style="margin-top: 1rem">
    <div class="col">
        @php
            $pesanberhasil = Session::get('berhasil');
            $pesangagal = Session::get('tidakberhasil');

       @endphp
       @if (Session::get('berhasil'))
       <script>
        tampilpesan = '<?php echo $pesanberhasil?>'
        alert(tampilpesan)
       </script>
         @endif
       @if (Session::get('tidakberhasil'))
       <script>
        tampilpesan = '<?php echo $pesangagal?>'
        alert(tampilpesan)
       </script>  @endif
    </div>
</div>
<form action="/presensi/{{$karyawanedit->nik}}/updateprofil" method="POST" enctype="multipart/form-data"  style="margin-top: 5rem">
    @csrf
    <div class="col">
        <div class="form-group boxed">
            <div class="input-wrapper">
                <input type="text" class="form-control" value="{{$karyawanedit->nama_lengkap}}" name="nama_lengkap" placeholder="Nama Lengkap" autocomplete="off">
            </div>
        </div>
        <div class="form-group boxed">
            <div class="input-wrapper">
                <input type="text" class="form-control" disabled value="{{$karyawanedit->jabatan}}" name="jabatan" placeholder="Jabatan" autocomplete="off">
            </div>
        </div>
        <div class="form-group boxed">
            <div class="input-wrapper">
                <input type="text" class="form-control" value="{{$karyawanedit->no_hp}}" name="no_hp" placeholder="No. HP" autocomplete="off">
            </div>
        </div>
        <div class="form-group boxed">
            <div class="input-wrapper">
                <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
            </div>
        </div>
        <div class="form-group boxed">
            <div class="input-wrapper">
                <input type="text" class="form-control" value="{{$karyawanedit->alamat}}" name="alamat" placeholder="alamat" autocomplete="off">
            </div>
        </div>
        <div class="custom-file-upload" id="fileUpload1">
            <input type="file" name="foto" id="fileuploadInput" accept=".png, .jpg, .jpeg">
            <label for="fileuploadInput">
                <span>
                    <strong>
                        <ion-icon name="cloud-upload-outline" role="img" class="md hydrated" aria-label="cloud upload outline"></ion-icon>
                        <i>Tap to Upload</i>
                    </strong>
                </span>
            </label>
        </div>
        <div class="form-group boxed">
            <div class="input-wrapper">
                <button type="submit" class="btn btn-primary btn-block">
                    <ion-icon name="refresh-outline"></ion-icon>
                    Update
                </button>
            </div>
        </div>


    </div>
</form>


@endsection
