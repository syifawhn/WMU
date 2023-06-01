@extends('layout/master')
@section('title', 'Add team')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" name="nama">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Divisi</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <select class="form-control select2" style="width: 100%;" name="id_divisi">
                                <option>Pilih Divisi</option>
                                @foreach ($dataDivisi as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_divisi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" name="email">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">No Handphone</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="" name="no_telp">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Foto Team</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="" name="foto_team">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary">Batal</button>
            </form>
        </div>
    </div>
@endsection
