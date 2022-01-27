@extends('layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    </div>
    <div class="w-100 p-3 bg-white">
        @if (session('sukses'))
            <div class="alert alert-success w-50 mb-3 alert-dismissible fade show" role="alert">
                {{ session('sukses') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <nav class="mb-3">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="nav-akun-tab" data-toggle="tab" href="#nav-akun" role="tab"
                    aria-controls="nav-akun" aria-selected="true">Akun</a>
                <a class="nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab"
                    aria-controls="nav-password" aria-selected="false">Password</a>
                <a class="nav-link" id="nav-foto-tab" data-toggle="tab" href="#nav-foto" role="tab"
                    aria-controls="nav-foto" aria-selected="false">Foto</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-akun" role="tabpanel" aria-labelledby="nav-akun-tab">
                <form action="{{ route('user.profile.edit') }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group row mb-3">
                        <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="nama" class="form-control" id="nama" name="name"
                                value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ Auth::user()->email }}" disabled>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="nik" class="col-sm-4 col-form-label">NIK</label>
                        <div class="col-sm-8">
                            <input type="nik" class="form-control" id="nik" name="nik" value="{{ Auth::user()->nik }}">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="no_hp" class="col-sm-4 col-form-label">No HP</label>
                        <div class="col-sm-8">
                            <input type="no_hp" class="form-control" id="no_hp" name="no_hp"
                                value="{{ Auth::user()->no_hp }}">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <input type="alamat" class="form-control" id="alamat" name="alamat"
                                value="{{ Auth::user()->alamat }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
            <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
                @if ($errors->any())
                    <div class="alert alert-danger w-50">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('user.profile.password') }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group row mb-3">
                        <label for="password" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password2" class="col-sm-4 col-form-label">Konfirmasi Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password2" name="password2">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ganti Password</button>
                </form>
            </div>
            <div class="tab-pane fade" id="nav-foto" role="tabpanel" aria-labelledby="nav-foto-tab">
                <div class="row">
                    <div class="col-md-4">
                        <div class="w-100 text-center">
                            <img src="{{ asset('storage/' . Auth::user()->foto) }}" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('user.foto') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" name="foto" id="customFile" required
                                    accept="image/*">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Edit Foto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
