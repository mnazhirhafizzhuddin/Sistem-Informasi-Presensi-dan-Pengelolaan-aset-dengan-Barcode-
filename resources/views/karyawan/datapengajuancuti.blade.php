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
        <div class="h3 mb-0">Dashboard Data pengajuan Cuti</div>
    </div>

    <div class="col-12">
        <div class="card mb-3 mb-md-4">
            <div class="card-header">
                <h5 class="font-weight-semi-bold mb-0">Data Pengajuan Cuti karyawan </h5>
            </div>

            <div class="card-body pt-0">
                {{-- <a href="/halamantambahdata"> <button data-toggle="modal" type="submit" class="btn btn-primary">Tambah
                        Data</button></a> --}}
                {{-- <a href=""></a> --}}

                <div class="table-responsive-xl" style="display: block; width: 100%; overflow-x: auto; height: 500px;">
                    <br>
                    <table class="table text-nowrap mb-0">
                        <thead>
                            <tr>
                                <th class="font-weight-semi-bold border-top-0 py-2">Nomor</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Nik</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Nama Karyawan</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">izinawal</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">izinakhir</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Total Cuti Yang Diajukan</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Bukti</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Keterangan</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">status Persetujuan</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($datapengajuancuti as $row =>$baris)
                            <tr>
                                <td class="py-3">{{$row+$datapengajuancuti->firstitem()}}</td>
                                <td class="py-3">
                                    <div>{{$baris->nik}}</div>

                                </td>
                                <td class="py-3">{{$baris->nama_lengkap}}</td>
                                <td class="py-3">{{$baris->izinawal}}</td>
                                <td class="py-3">{{$baris->izinakhir}}</td>
                                <td class="py-3">
                                    {{$baris->totalcutidiajukan}}
                                    Hari
                                </td>
                                <td class="py-3">
                                    {{$baris->surat}} <br>
                                    <a href="{{asset('storage/uploads/surat/'.$baris->surat)}}"target="_blank">Lihat Bukti</a>
                                </td>
                                <td class="py-3">
                                    {{$baris->keterangan}}
                                </td>
                                <td class="py-3">
                                    @if($baris->status_persetujuan=="disetujui")
                                    <b class="bg-success text-white">{{$baris->status_persetujuan}}</b>
                                    @elseif ($baris->status_persetujuan=="ditolak")
                                    <b class="bg-danger text-white">{{$baris->status_persetujuan}}</b>
                                    @else
                                    <b class="bg-warning text-white">Menunggu Persetujuan </b>
                                    @endif

                                </td>
                                <td class="py-3">
                                    <a class="unfold-link media align-items-center text-nowrap"
                                        href="/tampilpengajuancuti/{{$baris->id}}/karyawan">
                                        <i class="gd-pencil unfold-item-icon mr-3"></i>
                                        <span class="media-body">Edit</span>
                                    </a>
                                    <a class="unfold-link media align-items-center text-nowrap"
                                        href="/hapus/{{$baris->id}}/datacuti">
                                        <i class="gd-trash unfold-item-icon mr-3"></i>
                                        <span class="media-body">Delete</span>
                                    </a>

                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                    {{ $datapengajuancuti->links() }}
                </div>
            </div>
        </div>
        @endsection
        @push('myscript')

        @endpush
