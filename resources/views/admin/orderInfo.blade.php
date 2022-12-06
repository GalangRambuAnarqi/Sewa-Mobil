@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card">
                <h5 class="card-header bg-primary text-white">Bukti Pembayaran</h5>
                <div class="card-body text-dark">
                    <div class="w-100 text-center mb-2">
                        <img src="{{ asset('storage/' . $ord->bukti_pembayaran) }}" alt="Bukti Pembayaran"
                            style="height: 200px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card">
                <h5 class="card-header bg-primary text-white">Invoice : <span
                        class="font-weight-bold">{{ $ord->invoice }}</span></h5>
                <div class="card-body text-dark">
                    <div class="row mb-3">
                        <p class="col-sm-4 mb-0">Tanggal Pinjam</p>
                        <div class="col-sm-8">
                            <p class="mb-0">: {{ date('d-m-Y', strtotime($ord->tanggal_pinjam)) }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <p class="col-sm-4 mb-0">Tanggal Kembali</p>
                        <div class="col-sm-8">
                            <p class="mb-0">: {{ date('d-m-Y', strtotime($ord->tanggal_kembali)) }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <p class="col-sm-4 mb-0">Status</p>
                        <div class="col-sm-8"> :
                            @if ($ord->status == 'Proses Peminjaman')
                                <span class="badge badge-warning">{{ $ord->status }}</span>
                            @else
                                <span class="badge badge-success">Selesai</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card">
                <h5 class="card-header bg-primary text-white">Peminjam</h5>
                <div class="card-body text-dark">
                    <div class="w-100 text-center mb-3">
                        <img src="{{ asset('storage/' . $ord->user->foto) }}" alt="" style="height: 150px;">
                    </div>
                    <div class="row mb-3">
                        <p class="col-sm-4 mb-0">Nama</p>
                        <div class="col-sm-8">
                            <p class="mb-0">: {{ $ord->user->name }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <p class="col-sm-4 mb-0">Email</p>
                        <div class="col-sm-8">
                            <p class="mb-0">: {{ $ord->user->email }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <p class="col-sm-4 mb-0">Alamat</p>
                        <div class="col-sm-8">
                            <p class="mb-0">: {{ $ord->user->alamat }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <p class="col-sm-4 mb-0">NIK</p>
                        <div class="col-sm-8">
                            <p class="mb-0">: {{ $ord->user->nik }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <p class="col-sm-4 mb-0">Foto KTP</p>
                        <div class="col-sm-8">
                            <img src="{{ asset('storage/' . $ord->user->ktp_foto) }}" alt="" style="height: 150px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card">
                <h5 class="card-header bg-primary text-white">Mobil</h5>
                <div class="card-body text-dark">
                    <div class="w-100 text-center mb-3">
                        <img src="{{ asset('storage/' . $ord->mobil->foto) }}" alt="" style="height: 150px;">
                    </div>
                    <div class="row mb-3">
                        <p class="col-sm-4 mb-0">Nama</p>
                        <div class="col-sm-8">
                            <p class="mb-0">: {{ $ord->mobil->nama }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <p class="col-sm-4 mb-0">Kapasitas</p>
                        <div class="col-sm-8">
                            <p class="mb-0">: {{ $ord->mobil->kapasitas }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <p class="col-sm-4 mb-0">Harga</p>
                        <div class="col-sm-8">
                            <p class="mb-0">: Rp {{ number_format($ord->mobil->harga_mobil, 0, '.', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('admin.order') }}" class="btn btn-secondary">Kembali</a>
@endsection
