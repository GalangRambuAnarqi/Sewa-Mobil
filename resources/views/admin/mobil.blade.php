@extends('layout.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Mobil</h1>
        <a href="{{ route('mobil.tambah') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
    </div>

    <div class="row">
        @if (count($mobil) > 0)
            @foreach ($mobil as $m)
                <div class="col-lg-3 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="w-100 text-center pb-2 mb-2 border-bottom">
                                <h6 class="text-uppercase mb-2 font-weight-bold text-dark">{{ $m->nama }}</h6>
                                <img src="{{ asset('storage/' . $m->foto) }}" alt="" class=img-fluid>
                            </div>
                            <div class="text-success mb-2">
                                <i class="fas fa-tags"></i>&nbsp;Rp {{ number_format($m->harga_mobil, 0, '.', '.') }}
                            </div>
                            <div class="text-secondary mb-2">
                                <i class="fas fa-users"></i>&nbsp;{{ $m->kapasitas }} Orang
                            </div>
                            <a href="#" class="btn btn-sm btn-warning">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
