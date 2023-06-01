@extends('layout/master')
@section('title', 'List Property')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> <a href="{{ route('property.create') }}" class="btn btn-primary">Tambah</a></h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Property</th>
                        <th scope="col">Jumlah Property</th>
                        <th scope="col">Foto Property</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($properties as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_property }}</td>
                            <td>{{ $item->jumlah_property }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $item->foto_property) }}" alt="" width="100px">
                            </td>
                            <td>
                                <a href="/property/edit/{{ $item->id }}" class="btn btn-warning">Edit</a>
                                <a href="/delete1/{{ $item->id }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <div>@include('sweetalert::alert')</div>
@endsection
