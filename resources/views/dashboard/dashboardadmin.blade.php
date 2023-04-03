@extends('layout.sidebar')
@section('contentadmin')
<div class="row">
    <div class="col-md-6 col-xl-4 mb-3 mb-xl-4">
        <!-- Widget -->
        <div class="card flex-row align-items-center p-3 p-md-4">
            <div class="icon icon-lg bg-soft-warning rounded-circle mr-3">
                <i class="gd-user icon-text d-inline-block text-success"></i>
            </div>
            <div>
                <h4 class="lh-1 mb-1">{{$jumlah}}</h4>
                <h6 class="mb-0">Jumlah Karyawan</h6>
            </div>
            <a href="/datakaryawan"class="gd-arrow-up icon-text d-flex text-success ml-auto"></a>
        </div>
        <!-- End Widget -->
    </div>
    <div class="col-md-6 col-xl-4 mb-3 mb-xl-4">
        <div class="card flex-row align-items-center p-3 p-md-4">
            <div class="icon icon-lg bg-soft-secondary rounded-circle mr-3">
                <i class="gd-calendar icon-text d-inline-block text-secondary"></i>
            </div>
            <div>
                <h4 class="lh-1 mb-1">{{$cek}}</h4>
                <h6 class="mb-0">Pengajuan Cuti</h6>
            </div>
            <a href="/datapengajuancuti"class="gd-arrow-up icon-text d-flex text-success ml-auto"></a>
        </div>
    </div>
    <div class="col-md-6 col-xl-4 mb-3 mb-xl-4">
        <div class="card flex-row align-items-center p-3 p-md-4">
            <div class="icon icon-lg bg-soft-secondary rounded-circle mr-3">
                <i class="gd-calendar icon-text d-inline-block text-secondary"></i>
            </div>
            <div>
                <h4 class="lh-1 mb-1">{{$kehadiran}}</h4>
                <h6 class="mb-0">Data Kehadiran Bulan Ini</h6>
            </div>
            <a href="/datapresensi"class="gd-arrow-up icon-text d-flex text-success ml-auto"></a>
        </div>
    </div>
    <div class="col-md-6 col-xl-4 mb-3 mb-xl-4">
        <div class="card flex-row align-items-center p-3 p-md-4">
            <div class="icon icon-lg bg-soft-secondary rounded-circle mr-3">
                <i class="gd-home icon-text d-inline-block text-secondary"></i>
            </div>
            <div>
                <h4 class="lh-1 mb-1">{{$ruangan}}</h4>
                <h6 class="mb-0">Jumlah Ruangan</h6>
            </div>
            <a href="/dataruangan"class="gd-arrow-up icon-text d-flex text-success ml-auto"></a>
        </div>
    </div>
</div>
@endsection
