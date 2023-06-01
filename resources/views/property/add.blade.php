@extends('layout/master')
@section('title', 'Add property')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('property.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Nama Property</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" name="nama_property">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Jumlah Property</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="" name="jumlah_property">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Foto Property</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="" name="foto_property">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary">Batal</button>
            </form>
        </div>
    </div>
@endsection
