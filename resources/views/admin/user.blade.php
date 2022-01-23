@extends('layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data User</h1>
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
                    <th scope="col">Nama</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $u)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>
                            <h5 class="mb-0">{{ $u->name }}</h5>
                            {{ $u->email }}
                        </td>
                        <td>
                            @if (empty($u->no_hp))
                                <span class="badge badge-info">-</span>
                            @else
                                <span class="badge badge-info">{{ $u->no_hp }}</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.user.delete') }}" method="post"
                                onsubmit="return confirm('yakin ?')">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{ $u->id }}">
                                <button type="submit" class="btn btn-danger"><i
                                        class="fas fa-trash"></i>&nbsp;Hapus</button>
                            </form>
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
