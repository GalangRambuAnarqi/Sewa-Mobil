@extends('layout.main')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Tambah Mobil</h1>
    <form action="{{ route('mobil.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card mb-3 shadow-sm">
            <div class="card-header bg-info text-white">
                <div class="w-100 d-flex justify-content-between">
                    <h5 class="mb-0">Foto</h5>
                    <div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image-photo" onchange="previewImageUpdate()"
                                required accept="image/*" name="foto">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="w-100 text-center">
                    <img src="#" alt="Foto Mobil" id="image-preview" class="img-fluid m-auto">
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
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kapasitas" class="col-sm-3 col-form-label">Kapasitas</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="kapasitas" name="kapasitas" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga_mobil" class="col-sm-3 col-form-label">Harga Mobil</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="harga_mobil" name="harga_mobil" required>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-info">Tambah</button>
        <a href="{{ route('mobil') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection

@section('js')
    <script>
        function previewImageUpdate() {
            document.getElementById("image-preview").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("image-photo").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview").src = oFREvent.target.result;
            };
        };
    </script>
@endsection
