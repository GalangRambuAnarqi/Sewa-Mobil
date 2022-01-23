@extends('layout.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order Saya</h1>
    </div>
    <div class="w-100 table-responsive">
        <table class="table table-striped" id="example">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Invoice</th>
                    <th scope="col">Mobil</th>
                    <th scope="col">Tanggal Pinjam</th>
                    <th scope="col">Tanggal Kembali</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $o)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $o->invoice }}</td>
                        <td>{{ $o->mobil->nama }}</td>
                        <td>{{ date('d-m-Y H:i', strtotime($o->tanggal_pinjam)) }}</td>
                        <td>{{ date('d-m-Y H:i', strtotime($o->tanggal_kembali)) }}</td>
                        <td>
                            @if ($o->status == 'Proses Peminjaman')
                                <span class="badge badge-warning">{{ $o->status }}</span>
                            @else
                                <span class="badge badge-warning">{{ $o->status }}</span>
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
