@extends('layout.sidebar')
@section('contentadmin')
    <h1 class="text-center mb-4">Halaman Validasi Cuti</h1>
    <div class="input-group mb-2">
        <div class="container">
            <div class="row">
                <div class="card" style="max-height: 2852px">
                    <div class="panel-body"></div>
                    <div class="card-body">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="modal-body">
                                        <form action="/updatedatapengajuancuti/{{$tampilcuti->id}}/cuti" method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{-- @foreach($karyawan as $row)

                                            @endforeach --}}

                                            <div class="mb-3">
                                                <label for="inputalamat" class="form-label">Status Persetujuan : </label>
                                                @if($tampilcuti->status_persetujuan=="disetujui")
                                                <b class="bg-success text-white">{{$tampilcuti->status_persetujuan}}</b>
                                                @elseif ($tampilcuti->status_persetujuan=="ditolak")
                                                <b class="bg-danger text-white">{{$tampilcuti->status_persetujuan}}</b>
                                                @else
                                                <b class="bg-warning text-white">Belom Divalidasi </b>
                                                @endif
                                            </div>
                                            <div class="mb-2">
                                                &nbsp;&nbsp;<label for="exampleInputEmail" class="form-label"> Rubah </label> <br>
                                                <label for="exampleInputEmail" class="form-label"> Pilihan Validasi </label> &nbsp;
                                                <select name="status_persetujuan" class="form-select"
                                                    aria-label="Default select example">
                                                    <option selected>
                                                    </option>
                                                    <option value="disetujui">disetujui</option>
                                                    <option value="ditolak">ditolak</option>
                                                </select>
                                            </div>
                                            <button data-toggle="modal" type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</body>

@endsection
