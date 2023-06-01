@extends('layout/master')
@section('title', 'Tambah Divisi')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Divisi</h3>
        </div>
        <form action="{{ route('divisi.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="">Nama Divisi</label>
                    <input type="text" class="form-control" id="" placeholder="Masukkan Nama Divisi"
                        name="nama_divisi">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
