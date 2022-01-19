@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body bg-info text-white">
                    <div class="w-100 d-flex justify-content-between pb-2 border-bottom mb-2">
                        <div class="kiri">
                            <h4 class="mb-0"><i class="fas fa-fw fa-car"></i>&nbsp;Mobil</h4>
                        </div>
                        <div class="kanan">
                            <h4 class="mb-0">{{ $mobil }}</h4>
                        </div>
                    </div>
                    <a href="" class="mb-0 text-white">Selengkapnya&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body bg-success text-white">
                    <div class="w-100 d-flex justify-content-between pb-2 border-bottom mb-2">
                        <div class="kiri">
                            <h4 class="mb-0"><i class="fas fa-users"></i>&nbsp;Users</h4>
                        </div>
                        <div class="kanan">
                            <h4 class="mb-0">{{ $user }}</h4>
                        </div>
                    </div>
                    <a href="" class="mb-0 text-white">Selengkapnya&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body bg-primary text-white">
                    <div class="w-100 d-flex justify-content-between pb-2 border-bottom mb-2">
                        <div class="kiri">
                            <h4 class="mb-0"><i class="fas fa-fw fa-cart-arrow-down"></i>&nbsp;Order</h4>
                        </div>
                        <div class="kanan">
                            <h4 class="mb-0">{{ $user }}</h4>
                        </div>
                    </div>
                    <a href="" class="mb-0 text-white">Selengkapnya&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
