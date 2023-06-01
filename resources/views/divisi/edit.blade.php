@extends('layout/master')
@section('title', 'divisi')
@section('content')
    <form action="{{ route('divisi.update', ['divisi' => $divisi->id]) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Divisi</label>
            <input type="text" class="form-control" name="nama_divisi" id="exampleInputEmail1"
                value="{{ old('nama_divisi', $divisi->nama_divisi) }}" aria-describedby="emailHelp">

        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
