@extends('layout.sidebar')
@section('contentadmin')
    <h1 class="text-center mb-4">Tambah Data Pegawai</h1>
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
                                        <form action="/tambahdataruangan" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="inputnamaruangan" class="form-label">Nama Ruangan</label>
                                                <input type="text" name="namaruangan" class="form-control"
                                                    id="namaruangan" aria-describedby="inputNamaruangan">
                                                <div id="inputkaryawan" class="form-text">Jangan dikosongkan untuk nama
                                                    Ruangan
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputalamat" class="form-label">fungsi Ruangan  </label>
                                                <input type="text" name="fungsiruangan" class="form-control"
                                                id="fungsiruangan" aria-describedby="inputFungsiruangan">
                                                <div id="alamat" class="form-text">Jangan dikosongkan untuk fungsi Ruangan
                                                </div>
                                            </div>
                                            {{-- <div class="mb-2">
                                                <label for="exampleInputEmail" class="form-label"></label>
                                                <select name="status" class="form-select"
                                                    aria-label="Default select example">
                                                    <option selected>J</option>
                                                    <option value="digunakan">laki-laki</option>
                                                    <option value="perempuan">Perempuan</option>
                                                </select>
                                            </div> --}}
                                            <br>
                                            <div class="mb-2">
                                                <label for="exampleInputpenanggungjawab" class="form-label">Penanggung Jawab </label>
                                                <input type="text" name="penanggungjawab" class="form-control"
                                                id="penanggungjawab" aria-describedby="inputJabatan">
                                                <div id="penanggungjawab" class="form-text">Jangan Kosongkan untuk penanggung jawab
                                                </div>
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
