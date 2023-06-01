@extends('layout/master')
@section('title', 'Dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> <a href="" class="btn btn-primary">Tambah</a></h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Penyelenggara</th>
                        <th scope="col">Acara</th>
                        <th scope="col">Jadwal</th>
                        <th scope="col">Status Pembayaran</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
