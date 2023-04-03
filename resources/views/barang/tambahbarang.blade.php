@extends('layout.sidebarbarang')
@section('contentbarang')
    <h1 class="text-center mb-4">Halaman Tambah Data Barang</h1>
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
                                        <form action="/noruangan/{{$ruanganku->noruangan}}/tambahbarangbaru" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="inputnama_Karyawan" class="form-label">Nama barang</label>
                                                <input type="text" name="namabarang" class="form-control"
                                                    id="namabarang" aria-describedby="inputNama">
                                                <div id="inputbarang" class="form-text">Jangan dikosongkan untuk nama barang</div>
                                            </div>

                                            <br>
                                            <div class="mb-2">
                                                <label for="exampleInputEmail" class="form-label">Nomor Ruangan {{$ruanganku->noruangan}}</label>

                                                <input type="hidden" name="noruangan" class="form-control" id="noruangan" aria-describedby="inputidruangan"  value="{{$ruanganku->noruangan}}" >

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
