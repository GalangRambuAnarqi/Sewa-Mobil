@extends('layout.main')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Mobil</h1>
    <form action="{{ route('mobil.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="hidden" name="id" value="{{ $mbl->id }}">
        <input type="hidden" name="img_lama" value="{{ $mbl->foto }}">
        <div class="card mb-3 shadow-sm">
            <div class="card-header bg-info text-white">
                <div class="w-100 d-flex justify-content-between">
                    <h5 class="mb-0">Foto</h5>
                    <div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image-photo" onchange="previewImageUpdate()"
                                accept="image/*" name="foto">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="w-100 text-center">
                    <img src="{{ asset('storage/' . $mbl->foto) }}" alt="Foto Mobil" id="image-preview"
                        class="img-fluid m-auto">
                </div>
            </div>
        </div>
        <div class="card mb-3 shadow-sm">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Data</h5>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $mbl->nama }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kapasitas" class="col-sm-3 col-form-label">Kapasitas</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="kapasitas" name="kapasitas"
                            value="{{ $mbl->kapasitas }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga_mobil" class="col-sm-3 col-form-label">Harga Mobil</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="harga_mobil" name="harga_mobil"
                            value="{{ $mbl->harga_mobil }}">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-info">Edit</button>
        <a href="{{ route('mobil') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection

@section('js')
    <script>
        function previewImageUpdate() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("image-photo").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview").src = oFREvent.target.result;
            };
        };
    </script>
@endsection
