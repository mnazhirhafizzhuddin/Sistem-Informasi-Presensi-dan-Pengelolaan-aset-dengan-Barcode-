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
        <div class="h3 mb-0">Dashboard Karyawan</div>
    </div>

    <div class="col-12">
        <div class="card mb-3 mb-md-4">
            <div class="card-header">
                <h5 class="font-weight-semi-bold mb-0">Data Karyawan</h5>
            </div>

            <div class="card-body pt-0">
                <a href="/halamantambahdata"> <button data-toggle="modal" type="submit" class="btn btn-primary">Tambah
                        Data</button></a>
                {{-- <a href=""></a> --}}

                <div class="table-responsive-xl" style="display: block; width: 100%; overflow-x: auto; height: 500px;">
                    <br>
                    <table class="table text-nowrap mb-0">
                        <thead>
                            <tr>
                                <th class="font-weight-semi-bold border-top-0 py-2">Nomor</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Nik</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Nama_lengkap</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Tanggal-Lahir</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Jenis_kelamin</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Jabatan</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">No_hp</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Password</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Lokasi TAD</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Foto</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($karyawanku as $row =>$baris)
                            <tr>
                                <td class="py-3">{{$row+$karyawanku->firstitem()}}</td>
                                <td class="py-3">
                                    <div>{{$baris->nik}}</div>

                                </td>
                                <td class="py-3">{{$baris->nama_lengkap}}</td>
                                <td class="py-3">{{$baris->tanggallahir}}</td>
                                <td class="py-3">{{$baris->jenis_kelamin}}</td>
                                <td class="py-3">
                                    {{$baris->jabatan}}
                                    {{-- <span class="badge badge-pill badge-warning">Pending</span> --}}
                                </td>
                                <td class="py-3">
                                    {{$baris->no_hp}}
                                </td>
                                <td class="py-3">
                                    {{$baris->password}}
                                </td>
                                <td class="py-3">
                                    {{$baris->alamat}}
                                </td>
                                <td class="py-3">
                                    @php
                                    $path = Storage::url('uploads/fotoprofilkaryawan/'.$baris->foto);
                                    @endphp
                                    <img src="{{url($path)}}" alt="avatar" width="80" height="80">
                                </td>
                                <td class="py-3">

                                    <a class="unfold-link media align-items-center text-nowrap"
                                        href="/tampildata/{{$baris->nik}}/datakaryawan">
                                        <i class="gd-pencil unfold-item-icon mr-3"></i>
                                        <span class="media-body">Edit</span>
                                    </a>
                                    <a class="unfold-link media align-items-center text-nowrap"
                                        href="/hapus/{{$baris->nik}}/datakaryawan">
                                        <i class="gd-trash unfold-item-icon mr-3"></i>
                                        <span class="media-body">Delete</span>
                                    </a>

                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                    {{ $karyawanku->links() }}
                </div>
            </div>
        </div>
        @endsection
        @push('myscript')

        @endpush
