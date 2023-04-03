@extends('layout.sidebar')
@section('contentadmin')
    <h1 class="text-center mb-4">Halaman Edit Data Presensi</h1>
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
                                        <form action="/update/{{$historijamkerja->id}}/datapresensi" method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{-- @foreach($karyawan as $row)

                                            @endforeach --}}
                                            <div class="mb-3">
                                                <label for="inputnama_Karyawan" class="form-label">Jam pulang</label>
                                                <input type="text" name="jam_out" class="form-control"
                                                  name="nama_lengkap"  id="jam_out" aria-describedby="inputNama"value="{{$historijamkerja->jam_out}}">
                                                <div id="inputkaryawan" class="form-text">kosongkan untuk Jam_out
                                                </div>
                                            </div>
                                            {{-- <div class="mb-3">
                                                <label for="inputalamat" class="form-label">Lokasi Pulang </label>
                                                <input type="text" name="tanggallahir" id="tanggallahir"value="{{$historijamkerja->lokasi_out}}"/>
                                                <div id="alamat" class="form-text">Jangan dikosongkan untuk tanggal lahir
                                                </div>
                                            </div> --}}

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
