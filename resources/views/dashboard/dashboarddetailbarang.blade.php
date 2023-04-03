@extends('layout.sidebarbarang')
@section('contentbarang')
<div class="row">
    <div class="col-md-6 col-xl-4 mb-3 mb-xl-4">
        <!-- Widget -->
        <div class="card flex-row align-items-center p-3 p-md-4">
            <div class="icon icon-lg bg-soft-warning rounded-circle mr-3">
                <i class="gd-user icon-text d-inline-block text-success"></i>
            </div>
            <div>
                <h4 class="lh-1 mb-1">{{$barangs1}}</h4>
                <h6 class="mb-0">Jumlah barang</h6>
            </div>
            <a href="/noruangan/{{$ruanganku->noruangan}}/lihatbarang"class="gd-arrow-up icon-text d-flex text-success ml-auto"></a>
        </div>
        <!-- End Widget -->
    </div>
</div>




@endsection
