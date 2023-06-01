@extends('layout/master')
@section('title', 'List Team')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> <a href="{{ route('team.create') }}" class="btn btn-primary">Tambah</a></h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Divisi</th>
                        <th scope="col">Email</th>
                        <th scope="col">No Handphone</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                @foreach ($dataTeam as $item)
                    <tbody>
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $item->nama }}
                            </td>
                            <td>
                                {{ $item->divisi->nama_divisi }}
                            </td>
                            <td>
                                {{ $item->email }}
                            </td>
                            <td>
                                {{ $item->no_telp }}
                            </td>
                            <td>
                                <a href="/team/edit/{{ $item->id }}" class="btn btn-warning">Edit</a>
                                <a href="/delete/{{ $item->id }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
    <div>@include('sweetalert::alert')</div>
@endsection
