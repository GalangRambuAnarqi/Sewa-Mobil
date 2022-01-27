@extends('layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order</h1>
    </div>
    @if (session('sukses'))
        <div class="alert alert-success w-50">
            {{ session('sukses') }}
        </div>
    @endif
    <div class="w-100 table-responsive">
        <table class="table table-striped" id="example">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Invoice</th>
                    <th scope="col">User</th>
                    <th scope="col">Mobil</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $o)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $o->invoice }}</td>
                        <td>{{ $o->user->name }}</td>
                        <td>{{ $o->mobil->nama }}</td>
                        <td>
                            @if ($o->status == 'Proses Peminjaman')
                                <span class="badge badge-warning">{{ $o->status }}</span>
                            @else
                                <span class="badge badge-success">Selesai</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.order.info', ['id' => Crypt::encrypt($o->id)]) }}"
                                class="btn btn-sm btn-info" target="_blank"><i class="fas fa-info-circle"></i></a>
                            @if ($o->status == 'Proses Peminjaman')
                                <form action="{{ route('admin.order.status') }}" method="post" class="d-inline-block"
                                    onsubmit="return confirm('order selesai ?')">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="id" value="{{ $o->id }}">
                                    <input type="hidden" name="mobil_id" value="{{ $o->mobil->id }}">
                                    <button type="submit" class="btn btn-sm btn-success"><i
                                            class="fas fa-check"></i></button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
