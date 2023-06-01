@extends('layout/master')
@section('title', 'property')
@section('content')
    <form action="{{ route('property.update', ['property' => $property->id]) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Property</label>
            <input type="text" class="form-control" name="nama_property" id="exampleInputEmail1"
                value="{{ old('nama_property', $property->nama_property) }}" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Jumlah Property</label>
            <input type="text" class="form-control" name="nama_property" id="exampleInputEmail1"
                aria-describedby="emailHelp" value="{{ old('nama_property', $property->jumlah_property) }}">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Foto property</label>
            <input type="image" class="form-control" name="foto_property" id="exampleInputEmail1"
                aria-describedby="emailHelp" value="{{ old('foto_property', $property->foto_property) }}">

        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
