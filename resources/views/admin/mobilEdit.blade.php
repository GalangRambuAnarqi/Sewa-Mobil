@extends('layout.main')

@section('content')
    <div class="w-100 bg-white rounded shadow-sm p-3">
        <h1 class="h3 mb-4 text-gray-800">Edit Mobil</h1>
        <form action="{{ route('mobil.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{ $mbl->id }}">
            <input type="hidden" name="img_lama" value="{{ $mbl->foto }}">
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" value="{{ $mbl->nama }}" class="form-control" id="nama" name="nama"
                                required>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label for="jenis" class="col-sm-3 col-form-label">Jenis</label>
                        <div class="col-sm-9">
                            <select class="custom-select" required>
                                <option selected>Pilih ---</option>
                                <option value="1">Mini Bus</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label for="kapasitas" class="col-sm-3 col-form-label">Kapasitas</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="kapasitas" name="kapasitas"
                                value="{{ $mbl->kapasitas }}" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="harga_mobil" class="col-sm-3 col-form-label">Harga Mobil</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="harga_mobil" name="harga_mobil" required
                                value="{{ $mbl->harga_mobil }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_driver" class="col-sm-3 col-form-label">Harga Driver</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="harga_driver" name="harga_driver"
                                placeholder="( Opsional )" value="{{ $mbl->harga_driver }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image-photo" class="col-sm-3 col-form-label">Foto</label>
                        <div class="col-sm-9">
                            <input type="file" id="image-photo" name="foto" onchange="previewImageUpdate()">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image-preview" class="col-sm-3 col-form-label">Review</label>
                        <div class="col-sm-9">
                            <img src="{{ asset('storage/' . $mbl->foto) }}" style="height: 80px;width:auto;"
                                id="image-preview">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Edit</button>
            <a href="{{ route('mobil') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
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
