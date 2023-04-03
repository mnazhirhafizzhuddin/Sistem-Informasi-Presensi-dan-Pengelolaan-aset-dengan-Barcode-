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
                                        <form action="/tambahdata" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="inputnikktp" class="form-label">Nik</label>
                                                <input type="text" name="nik" class="form-control"
                                                    id="nik" aria-describedby="inputNama">
                                                <div id="inputnikktp" class="form-text">Jangan dikosongkan untuk Nik
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputnama_Karyawan" class="form-label">Nama_Lengkap</label>
                                                <input type="text" name="nama_lengkap" class="form-control"
                                                    id="nama_lengkap" aria-describedby="inputNama">
                                                <div id="inputkaryawan" class="form-text">Jangan dikosongkan untuk nama
                                                    karyawan
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputalamat" class="form-label">Tanggal Lahir </label>
                                                <input type="date" name="tanggallahir" id="tanggallahir"/>
                                                <div id="alamat" class="form-text">Jangan dikosongkan untuk tanggal lahir
                                                </div>
                                            </div>
                                            <div class="mb-2">
                                                <label for="exampleInputEmail" class="form-label"></label>
                                                <select name="jenis_kelamin" class="form-select"
                                                    aria-label="Default select example">
                                                    <option selected>Jenis Kelamin</option>
                                                    <option value="laki-laki">laki-laki</option>
                                                    <option value="perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="mb-2">
                                                <label for="exampleInputEmail" class="form-label">Jabatan</label>
                                                <input type="text" name="jabatan" class="form-control"
                                                id="Jabatan" aria-describedby="inputJabatan">
                                                <div id="inputkaryawan" class="form-text">Jangan Kosongkan untuk Jabatan
                                                </div>
                                            </div>
                                            <br>
                                            <div class="mb-3">
                                                <label for="inputno_telpon" class="form-label">No_Telpon</label>
                                                <input type="text" name="no_hp" class="form-control" id="no_hp"
                                                    aria-describedby="nomor Handphone">
                                                <div id="alamat" class="form-text"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                                <input name="password" type="password"  class="form-control"
                                                    id="exampleInputPassword1" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputnik" class="form-label">Alamat</label>
                                                <input type="text" name="alamat" class="form-control" id="alamat"
                                                    aria-describedby="alamat">
                                                <div id="alamat" class="form-text">Jangan dikosongkan untuk alamat
                                                </div>
                                            </div>
                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
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
