@extends('layout.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Mobil</h1>
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
                            @if ($m->order == 'sudah')
                                <button class="btn btn-primary btn-sm w-100 disabled" data-toggle="modal"
                                    data-target="#modal{{ $m->id }}" disabled><i
                                        class="fas fa-cart-plus"></i>&nbsp;Order</button>
                            @else
                                <button class="btn btn-primary btn-sm w-100" data-toggle="modal"
                                    data-target="#modal{{ $m->id }}"><i
                                        class="fas fa-cart-plus"></i>&nbsp;Order</button>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modal{{ $m->id }}" tabindex="-1"
                    aria-labelledby="modal{{ $m->id }}Label" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark font-weight-bold m-auto"
                                    id="modal{{ $m->id }}Label">ORDER</h5>
                            </div>
                            <div class="modal-body text-dark">
                                <form action="{{ route('user.order.mobil') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="mobil_id" value="{{ $m->id }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <p class="mb-0 font-weight-bold">Nama</p>
                                                <p>{{ $m->nama }}</p>
                                            </div>
                                            <div class="mb-3">
                                                <p class="mb-0 font-weight-bold">Metode Pembayaran</p>
                                                <p>Transfer Bank</p>
                                            </div>
                                            <div class="mb-3">
                                                <p class="mb-0 font-weight-bold">Nomor Rekening</p>
                                                <p>BRI 08221200 a/n RENTALMOBILSMG</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <p class="mb-0 font-weight-bold">Tanggal Pinjam</p>
                                                <input type="datetime-local" class="form-control" name="tanggal_pinjam"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <p class="mb-0 font-weight-bold">Tanggal Kembali</p>
                                                <input type="datetime-local" class="form-control" name="tanggal_kembali"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <p class="mb-0 font-weight-bold">Bukti Pembayaran</p>
                                                <input type="file" name="bukti_pembayaran" accept="image/*" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Bayar Sekarang</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12 text-center">
                <h1>Mobil Belum Tersedia</h1>
            </div>
        @endif
    </div>
@endsection
