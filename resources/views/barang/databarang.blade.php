@extends('layout.sidebarbarang')
@section('contentbarang')
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
@if(!empty($barangs1->noruangan))
<div class="py-4 px-3 px-md-4">
    <div class="mb-3 mb-md-4 d-flex justify-content-between">
        <div class="h3 mb-0">Dashboard Data Barang</div>
    </div>

    <div class="col-12">
        <div class="card mb-3 mb-md-4">
            <div class="card-header">

                <h5 class="font-weight-semi-bold mb-0">Anda Sedang Di Dalam nomor Ruangan : {{$barangs1->noruangan}} dan
                    Ruangan {{$barangs1->namaruangan}} </h5>


                <br>
                <a href="/noruangan/{{$ruanganku->noruangan}}/tambahbarang"> <button data-toggle="modal" type="submit"
                        class="btn btn-primary">Tambah Barang</button></a>
                <a href="/noruangan/{{$barangs1->noruangan}}/excelbarang"> <button data-toggle="modal" type="submit"
                        class="btn btn-primary">Export Excel</button></a>


            </div>

            <div class="card-body pt-0">
                {{-- <a href="/halamantambahdata"> <button data-toggle="modal" type="submit"
                        class="btn btn-primary">Tambah
                        Data</button></a> --}}
                {{-- <a href=""></a> --}}

                <div class="table-responsive-xl" style="display: block; width: 100%; overflow-x: auto; height: 500px;">
                    <br>
                    <table class="table text-nowrap mb-0">
                        <thead>
                            <tr>
                                <th class="font-weight-semi-bold border-top-0 py-2">Baris </th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Nomor Ruangan </th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Asal Ruangan </th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Nomor Barang </th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Nama Barang </th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($barangs as $row =>$baris)
                            <tr>
                                <td class="py-3">{{$row+$barangs->firstitem()}}</td>
                                <td class="py-3">{{$baris->noruangan}}</td>
                                <td class="py-3">{{$baris->namaruangan}}</td>
                                <td class="py-3">{{$baris->nomorbarang}}</td>
                                <td class="py-3">{{$baris->namabarang}}</td>
                                <td class="py-3">
                                    <a class="unfold-link media align-items-center text-nowrap"
                                        href="/tampilbarang/{{$baris->noruangan}}/nobarang/{{$baris->nomorbarang}}">
                                        <i class="gd-pencil unfold-item-icon mr-3"></i>
                                        <span class="media-body">Edit</span>
                                    </a>
                                    <a class="unfold-link media align-items-center text-nowrap"
                                        href="/hapus/{{$baris->nomorbarang}}/databarang">
                                        <i class="gd-trash unfold-item-icon mr-3"></i>
                                        <span class="media-body">Delete</span>
                                    </a>

                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                    {{ $barangs->links() }}
                </div>
            </div>
        </div>
        @else
        <h1><b>Pada Ruangan Ini Tidak Ada Barang </b></h1>
        @endif
    </div>
    @endsection
