@extends('layout/master')
@section('title', 'team')
@section('content')
    <form action="{{ route('team.update', ['team' => $team->id]) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="exampleInputEmail1"
                value="{{ old('nama', $team->nama) }}" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
            <label for="" class="col-sm-2 col-form-label">Divisi</label>

            <div class="form-group">
                <select class="form-control select2" style="width: 100%;" name="id_divisi">
                    <option>Pilih Divisi</option>
                    @foreach ($dataDivisi as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_divisi }}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"
                value="{{ old('team', $team->email) }}">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">No Handphone</label>
            <input type="text" class="form-control" name="no_handphone" id="exampleInputEmail1"
                aria-describedby="emailHelp" value="{{ old('team', $team->no_telp) }}">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Foto team</label>
            <input type="image" class="form-control" name="foto_team" id="exampleInputEmail1" aria-describedby="emailHelp"
                value="{{ old('foto_team', $team->foto_team) }}">

        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
