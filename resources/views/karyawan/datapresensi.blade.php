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
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
    integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
    integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<div class="py-4 px-3 px-md-4">
    <div class="mb-3 mb-md-4 d-flex justify-content-between">
        <div class="h3 mb-0">Dashboard presensi</div>
    </div>

    <div class="col-12">
        <div class="card mb-3 mb-md-4">
            <div class="card-header">
                <h5 class="font-weight-semi-bold mb-0">Data Kehadiran Bulan  : {{$namabulan[$tgl_presensi]}} </h5>
            </div>

            <div class="card-body pt-0">
                <a href="/datapresensi/export_excel"> <button data-toggle="modal" type="submit"
                        class="btn btn-primary">Export Excel</button></a>
                {{-- {{-- <a href=""></a> --}}

                <div class="table-responsive-xl" style="display: block; width: 100%; overflow-x: auto; height: 500px;">
                    <br>
                    <table class="table text-nowrap mb-0">
                        <thead>
                            <tr>
                                <th class="font-weight-semi-bold border-top-0 py-2">Nomor presensi</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Nik</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Nama_lengkap</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Tanggalpresensi</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Jam masuk</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Jam keluar</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">foto masuk </th>
                                <th class="font-weight-semi-bold border-top-0 py-2">foto keluar </th>
                                <th class="font-weight-semi-bold border-top-0 py-2">lokasi masuk</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">lokasi keluar</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Jumlahjamkerja</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach( $historijamkerja as $row =>$baris)
                            <tr>
                                {{-- {{$row+$historijamkerja->firstitem()}} --}}
                                <td class="py-3">{{$row+$historijamkerja->firstitem()}}</td>
                                {{-- <td class="py-3">{{$baris->id}}</td> --}}
                                <td class="py-3">
                                    {{$baris->nik}}
                                </td>
                                <td class="py-3">{{$baris->nama_lengkap}}</td>
                                <td class="py-3">{{$baris->tgl_presensi}}</td>
                                <td class="py-3">{{$baris->jam_in}}</td>
                                <td class="py-3">
                                    {{$baris->jam_out}}
                                    {{-- <span class="badge badge-pill badge-warning">Pending</span> --}}
                                </td>
                                <td class="py-3">
                                    @php
                                    $path = Storage::url('uploads/absensi/'.$baris->foto_in);
                                    @endphp
                                    <img src="{{url($path)}}" alt="avatar" width="80" height="80">

                                    {{-- {{$baris->foto_in}} --}}
                                </td>
                                <td class="py-3">
                                    @php
                                    $path = Storage::url('uploads/absensi/'.$baris->foto_out);
                                    @endphp
                                    <img src="{{url($path)}}" alt="avatar" width="80" height="80">

                                    {{-- {{$baris->foto_out}} --}}
                                </td>
                                <td class="py-3">

                                    <a class="unfold-link media align-items-center text-nowrap"
                                        href="/tampilmap/{{$baris->id}}/lokasimasuk" target="_blank">
                                        <i class="gd-eye unfold-item-icon mr-3"></i>
                                        <span class="media-body">lihatmap</span>
                                    </a>
                                </td>
                                <td class="py-3">
                                    @if($baris->lokasi_out)
                                    <a class="unfold-link media align-items-center text-nowrap"
                                    href="/tampilmap/{{$baris->id}}/lokasikeluar" target="_blank">
                                    <i class="gd-eye unfold-item-icon mr-3"></i>
                                    <span class="media-body">lihatmap</span>
                                     </a>
                                    @endif


                                </td>
                                <td class="py-3">
                                    {{$baris->jumlahjamkerja}}
                                </td>
                                <td class="py-3">
                                    {{-- <p>{{$baris->id}}</p> --}}
                                    <a class="unfold-link media align-items-center text-nowrap"
                                        href="/tampildata/{{$baris->id}}/datapresensi">
                                        <i class="gd-pencil unfold-item-icon mr-3"></i>
                                        <span class="media-body">Edit</span>
                                    </a>
                                    <a class="unfold-link media align-items-center text-nowrap"
                                        href="/hapus/{{$baris->id}}/datapresensi">
                                        <i class="gd-trash unfold-item-icon mr-3"></i>
                                        <span class="media-body">Delete</span>
                                    </a>

                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                     {{ $historijamkerja->links() }}
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card mb-3 mb-md-4">
                <div class="card-header">
                    <h5 class="font-weight-semi-bold mb-0">Data Kehadiran Keseluruhan</h5>
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
                                    {{-- <th class="font-weight-semi-bold border-top-0 py-2">Nomor presensi</th> --}}
                                    <th class="font-weight-semi-bold border-top-0 py-2">Nik</th>
                                    <th class="font-weight-semi-bold border-top-0 py-2">Nama_lengkap</th>
                                    <th class="font-weight-semi-bold border-top-0 py-2">Tanggalpresensi</th>
                                    <th class="font-weight-semi-bold border-top-0 py-2">Jam masuk</th>
                                    <th class="font-weight-semi-bold border-top-0 py-2">Jam keluar</th>
                                    <th class="font-weight-semi-bold border-top-0 py-2">foto masuk </th>
                                    <th class="font-weight-semi-bold border-top-0 py-2">foto keluar </th>
                                    <th class="font-weight-semi-bold border-top-0 py-2">lokasi masuk</th>
                                    <th class="font-weight-semi-bold border-top-0 py-2">lokasi keluar</th>
                                    <th class="font-weight-semi-bold border-top-0 py-2">Jumlahjamkerja</th>
                                    <th class="font-weight-semi-bold border-top-0 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach( $historikeseluruhan as $row =>$baris)
                                <tr>
                                    {{-- {{$row+$historijamkerja->firstitem()}} --}}
                                    {{-- <td class="py-3">{{$row+$historikeseluruhan->firstitem()}}</td> --}}
                                    {{-- <td class="py-3">{{$baris->id}}</td> --}}
                                    <td class="py-3">
                                        {{$baris->nik}}
                                    </td>
                                    <td class="py-3">{{$baris->nama_lengkap}}</td>
                                    <td class="py-3">{{$baris->tgl_presensi}}</td>
                                    <td class="py-3">{{$baris->jam_in}}</td>
                                    <td class="py-3">
                                        {{$baris->jam_out}}
                                        {{-- <span class="badge badge-pill badge-warning">Pending</span> --}}
                                    </td>
                                    <td class="py-3">
                                        @php
                                        $path = Storage::url('uploads/absensi/'.$baris->foto_in);
                                        @endphp
                                        <img src="{{url($path)}}" alt="avatar" width="80" height="80">

                                        {{-- {{$baris->foto_in}} --}}
                                    </td>
                                    <td class="py-3">
                                        @php
                                        $path = Storage::url('uploads/absensi/'.$baris->foto_out);
                                        @endphp
                                        <img src="{{url($path)}}" alt="avatar" width="80" height="80">

                                        {{-- {{$baris->foto_out}} --}}
                                    </td>
                                    <td class="py-3">
                                        <a class="unfold-link media align-items-center text-nowrap"
                                            href="/tampilmap/{{$baris->id}}/lokasimasuk" target="_blank">
                                            <i class="gd-eye unfold-item-icon mr-3"></i>
                                            <span class="media-body">lihatmap</span>
                                        </a>
                                    </td>
                                    <td class="py-3">
                                        @if($baris->lokasi_out)
                                        <a class="unfold-link media align-items-center text-nowrap"
                                        href="/tampilmap/{{$baris->id}}/lokasikeluar" target="_blank">
                                        <i class="gd-eye unfold-item-icon mr-3"></i>
                                        <span class="media-body">lihatmap</span>
                                         </a>
                                        @endif


                                    </td>
                                    <td class="py-3">
                                        {{$baris->jumlahjamkerja}}
                                    </td>
                                    <td class="py-3">

                                        <a class="unfold-link media align-items-center text-nowrap"
                                            href="/tampildata/{{$baris->id}}/datapresensi">
                                            <i class="gd-pencil unfold-item-icon mr-3"></i>
                                            <span class="media-body">Edit</span>
                                        </a>
                                        <a class="unfold-link media align-items-center text-nowrap"
                                            href="/hapus/{{$baris->id}}/datapresensi">
                                            <i class="gd-trash unfold-item-icon mr-3"></i>
                                            <span class="media-body">Delete</span>
                                        </a>

                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                         {{-- {{ $historikeseluruhan->links() }} --}}
                    </div>
                </div>
            </div>



        @endsection
        @push('myscript')

        @endpush
