@extends('layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-8">
                            <p><span class="font-weight-bold">Nama</span> : {{ Auth::user()->name }}</p>
                            <hr>
                            <p><span class="font-weight-bold">Email</span> : {{ Auth::user()->email }}</p>
                            <hr>
                            <p><span class="font-weight-bold">No HP</span> :
                                {{ Auth::user()->no_hp == null ? '-' : Auth::user()->no_hp }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
