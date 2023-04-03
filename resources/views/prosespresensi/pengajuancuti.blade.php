@extends('layout.presensi')
@section('header')
<div class="appHeader bg-success text-light">
    <div class="left">
    </div>
    <div class="pageTitle">Halaman Pengajuan Cuti</div>
    <div class="right"></div>
</div>
@endsection
@section('content')
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

</script>
@endif
<form action="/presensi/{{$karyawanizin->nik}}/updatecuti" method="POST" enctype="multipart/form-data" style="margin-top: 5rem">
    @csrf
    <div class="row" style="margin-top: 70px ">
        <div class="col">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <div class="custom-file">
                            <label for="birthday">Tanggal Izin awal </label>
                            <input type="date" id="izinawal" name="izinawal">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <div class="custom-file">
                            <label for="birthday">Tanggal Izin akhir</label>
                            <input type="date" id="izinakhir" name="izinakhir">
                        </div>
                    </div>
                </div>
            </div>
            Bukti Penguat
            <b>
                <p>*Wajib Sertakan Bukti</p>
            </b>
            <div class="custom-file-upload" id="fileUpload1">
                <input type="file" name="surat" id="fileuploadInput" accept=".png, .jpg, .jpeg, .pdf">
                <label for="fileuploadInput">
                    <span>
                        <strong>
                            <ion-icon name="cloud-upload-outline" role="img" class="md hydrated" aria-label="cloud upload outline"></ion-icon>
                            <i>Tap to Upload</i>
                        </strong>
                    </span>
                </label>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>Alasan</p>
                    <div class="form-group">
                        <select name="alasan" id="alasan" class="form-control">
                            <option value="sakit">Sakit</option>
                            <option value="acara_keluarga">Acara Keluarga</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        @if ($cek>12)

                        @else
                        <button type="submit" class="btn btn-primary btn-block" id="caridata">
                            <ion-icon name="add-outline"></ion-icon>Ajukan Cuti
                        </button>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
