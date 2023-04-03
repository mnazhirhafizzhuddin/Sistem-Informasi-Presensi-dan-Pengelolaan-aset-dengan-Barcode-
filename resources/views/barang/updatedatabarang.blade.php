@extends('layout.sidebarbarang')
@section('contentbarang')
    <h1 class="text-center mb-4">Halaman Update Data Barang</h1>
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
                                        <form action="/noruangan/{{$barangku->nomorbarang}}/updatebarang" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="inputnama_Karyawan" class="form-label">Nama barang</label>
                                                <input type="text" name="namabarang" class="form-control"
                                                    id="namabarang" aria-describedby="inputNama"value="{{$barangku->namabarang}}">
                                                <div id="inputbarang" class="form-text">Jangan dikosongkan untuk nama barang</div>
                                            </div>
                                            <br>
                                            <div class="mb-2">
                                                <label for="exampleInputEmail" class="form-label">Nama Ruangan</label>
                                                <select name="noruangan" class="form-select"
                                                    aria-label="Default select example">
                                                    <option selected>{{$barangs1->noruangan}}</option>
                                                    @foreach ($namaruangan as $row )
                                                    <option value="{{$row->noruangan}}">
                                                      <p>
                                                        nomor ruangan : {{$row->noruangan}}
                                                      </p>
                                                      <br>
                                                       <p>
                                                        nama Ruangan : {{$row->namaruangan}}
                                                       </p>
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
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
