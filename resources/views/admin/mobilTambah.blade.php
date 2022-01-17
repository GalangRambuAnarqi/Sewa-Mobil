@extends('layout.main')

@section('content')
    <div class="w-100 bg-white rounded shadow-sm p-3">
        <h1 class="h3 mb-4 text-gray-800">Tambah Mobil</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis" class="col-sm-3 col-form-label">Jenis</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="jenis" name="jenis">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kapasitas" class="col-sm-3 col-form-label">Kapasitas</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="kapasitas" name="kapasitas">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="harga_mobil" class="col-sm-3 col-form-label">Harga Mobil</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="harga_mobil" name="harga_mobil">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga_driver" class="col-sm-3 col-form-label">Harga Driver</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="harga_driver" name="harga_driver">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
