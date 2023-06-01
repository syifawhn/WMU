@extends('layout/master')
@section('title', 'Divisi')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> <a href="{{ route('divisi.create') }}" class="btn btn-primary">Tambah Divisi</a></h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Divisi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_divisi }}</td>
                            <td>
                                <a href="/divisi/edit/{{ $item->id }}" class="btn btn-warning">Edit</a>
                                <a href="/delete2/{{ $item->id }}" class="btn btn-danger">Delete</a>
                                {{-- <div class="alert alert-secondary" role="alert">
                                    Divisi Berhasil Dihapus!
                                </div> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div>@include('sweetalert::alert')</div>
@endsection
