@extends('layout.sidebar')
@section('contentadmin')
    <h1 class="text-center mb-4">Edit Data Ruangan</h1>
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
                                        <form action="/update/{{$ruangan->noruangan}}/dataruangan" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="inputnamaruangan" class="form-label">Nama ruangan</label>
                                                <input type="text"  class="form-control"
                                                  name="namaruangan"  id="namaruangan" aria-describedby="inputNama"value="{{$ruangan->namaruangan}}">
                                                <div id="inputkaryawan" class="form-text">Jangan dikosongkan untuk nama
                                                    ruangan
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputalamat" class="form-label">Fungsi Ruangan</label>
                                                <input type="text"  class="form-control"
                                                  name="fungsiruangan"  id="fungsiruangan" aria-describedby="inputNama"value="{{$ruangan->fungsiruangan}}">
                                                   <div id="alamat" class="form-text">Jangan dikosongkan untuk tanggal lahir
                                                </div>
                                            </div>
                                            <div class="mb-2">
                                                <label for="exampleInputEmail" class="form-label">Status</label>
                                                <br>
                                                <select name="status" class="form-select"
                                                    aria-label="Default select example">
                                                    <option selected>{{$ruangan->status}}</option>
                                                    <option value="aktif">Aktif</option>
                                                    <option value="tidakaktif">Tidak aktif</option>
                                                </select>
                                              <div id="inputpenanggungjawab" class="form-text">Jangan Kosongkan Untuk Status</div>
                                            </div>
                                            <div class="mb-2">
                                                <label for="exampleInputEmail" class="form-label">Penanggungjawab</label>
                                                <input type="text" name="penanggungjawab" class="form-control"
                                                id="penanggungjawab" aria-describedby="inputpenanggungjawab"value="{{$ruangan->penanggungjawab}}">
                                                <div id="inputpenanggungjawab" class="form-text">Jangan Kosongkan Untuk penanggung Jawab
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
