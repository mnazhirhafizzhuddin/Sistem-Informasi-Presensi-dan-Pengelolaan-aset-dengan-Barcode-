@extends('layout.sidebar')
@section('contentadmin')
<script>
    jQuery(document).ready(function($) {
      //jQuery Functionality
      $('#example').DataTable();
      $(document).on('click', '#example tbody tr button', function() {
        $("#modaldata tbody tr").html("");
        $("#modaldata tbody tr").html($(this).closest("tr").html());
        $("#exampleModal").modal("show");
      });
    } );
</script>
<div class="py-4 px-3 px-md-4">
    <div class="mb-3 mb-md-4 d-flex justify-content-between">
        <div class="h3 mb-0">Dashboard Ruangan</div>
    </div>

    <div class="col-12">
        <div class="card mb-3 mb-md-4">
            <div class="card-header">
                <h5 class="font-weight-semi-bold mb-0">Data Ruangan</h5>
            </div>

            <div class="card-body pt-0">
                <a href="/halamantambahdataruangan"> <button data-toggle="modal" type="submit" class="btn btn-primary">Tambah
                        Data</button></a>
                {{-- <a href=""></a> --}}

                <div class="table-responsive-xl" style="display: block; width: 100%; overflow-x: auto; height: 500px;">
                    <br>
                    <table class="table text-nowrap mb-0">
                        <thead>
                            <tr>
                                <th class="font-weight-semi-bold border-top-0 py-3">Baris</th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Nomor ruangan</th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Nama ruangan</th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Fungsi ruangan</th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Status</th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Penanggung Jawab</th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Lihat Detail Barang</th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($ruangan as $row =>$baris)
                            <tr>
                                <td class="py-3">{{$row+$ruangan->firstitem()}}</td>
                                <td class="py-3">
                                    <div>{{$baris->noruangan}}</div>
                                </td>
                                <td class="py-3">{{$baris->namaruangan}}</td>
                                <td class="py-3">{{$baris->fungsiruangan}}</td>
                                <td class="py-3">
                                    @if($baris->status=="aktif")
                                    <b class="bg-success text-white">{{$baris->status}}</b>
                                    @elseif ($baris->status=="tidakaktif")
                                    <b class="bg-danger text-white">{{$baris->status}}</b>
                                    @endif
                                </td>
                                <td class="py-3">
                                    <div class="visible-print ">
                                       {!! QrCode::eyeColor(1, 80, 155, 55, 9, 10, 7)->generate($baris->penanggungjawab) !!}
                                       <br>
                                       <br>
                                       <div class="penanggungjawab"> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;<b>{{$baris->penanggungjawab}}</b></div>

                                       {{-- <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('https://www.seeklogo.net/wp-content/uploads/2016/09/facebook-icon-preview-1.png', .3, true)->size(200)->generate('{{$baris->penanggungjawab}}')) !!} "></div> --}}

                                    {{-- <span class="badge badge-pill badge-warning">Pending</span> --}}
                                </td>
                                <td class="py-3">

                                    <a class="unfold-link media align-items-center text-nowrap"
                                        href="/dashboard/{{$baris->noruangan}}/databarang">
                                        <i class="gd-eye unfold-item-icon mr-3"></i>
                                        <span class="media-body">Lihat Detail Barang </span>
                                    </a>

                                </td>
                                <td class="py-3">

                                    <a class="unfold-link media align-items-center text-nowrap"
                                        href="/tampildata/{{$baris->noruangan}}/dataruangan">
                                        <i class="gd-pencil unfold-item-icon mr-3"></i>
                                        <span class="media-body">Edit</span>
                                    </a>
                                    <a class="unfold-link media align-items-center text-nowrap"
                                        href="/hapus/{{$baris->noruangan}}/dataruangan">
                                        <i class="gd-trash unfold-item-icon mr-3"></i>
                                        <span class="media-body">Delete</span>
                                    </a>

                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                    {{ $ruangan->links() }}
                </div>
            </div>
        </div>
        @endsection
        @push('myscript')

        @endpush
