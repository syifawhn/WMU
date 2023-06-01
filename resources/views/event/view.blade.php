@extends('layout/master')
@section('title', 'View Event')
@section('content')
    <div class="card">
        <div class="card-body">
            {{-- <h3><span class=' text-black'> DETAIL EVENT</span></h3>
            <br> --}}
            {{-- @php
                dd($event->client->nama_client);
            @endphp --}}
            <table class="table">
                <tr>
                    <th>Penyelenggara</th>
                    <td>{{ $event->penyelenggara }}</td>
                </tr>
                <tr>
                    <th>Nama Event</th>
                    <td>{{ $event->nama_event }}</td>
                </tr>
                <tr>
                    <th>Jadwal Event</th>
                    <td>{{ $event->jadwal_event }}</td>
                </tr>
                <tr>
                    <th>Alamat Event</th>
                    <td>{{ $event->alamat_event }}</td>
                </tr>
                <tr>
                    <th>Properti dan Tim</th>
                    <td>
                        @foreach ($details as $item)
                            <div class="badge badge-primary">
                                {{ $item->property->nama_property }} ({{ $item->team->nama }})
                            </div>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>Biaya</th>
                    <td>{{ $event->biaya }}</td>
                </tr>
                <tr>
                    <th>DP</th>
                    <td>{{ $event->dp }}</td>
                </tr>
                {{-- <tr>
                    <th>catatan</th>
                    <td>{{ $event->catatan }}</td>
                </tr> --}}
                {{-- <tr>
                    <th>Karyawan</th>
                    <td>{{ $event->$karyawan }}</td>
                </tr> --}}

            </table>
            <div class="card-title">
                <div class="d-flex-justify content-between">
                    <a class="btn btn-primary" href="{{ route('event.index') }}">Kembali</a>
                    <a class="btn btn-secondary" href="{{ route('event.index') }}">Cetak Detail</a>
                </div>
            </div>
        </div>
    @endsection
