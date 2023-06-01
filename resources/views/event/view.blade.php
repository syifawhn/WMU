@extends('layout/master')
@section('title', 'View Event')
@section('content')

    <style>
        @media print {
            .sidebar {
                display: none;
            }

            .print-button {
                display: none;
            }

            .table-responsive {
                overflow-x: unset;
            }

            .table {
                display: table;
            }

            .table tr {
                display: table-row;
            }

            .table th,
            .table td {
                display: table-cell;
            }
        }

        .print-view .hide-on-print {
            display: none;
        }
    </style>
    <div class="card">
        <div class="card-body">
            <h3 class="print-view"><span class="text-black"> Waskita Media Utama</span></h3>
            <br>
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
                <tr class="hide-on-print">
                    <th>Biaya</th>
                    <td>{{ $event->harga }}</td>
                </tr>
                <tr class="hide-on-print">
                    <th>DP</th>
                    <td>{{ $event->dp }}</td>
                </tr>
                <tr class="hide-on-print">
                    <th>Sisa</th>
                    <td>{{ $event->sisa }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if ($event->sisa == 0)
                            <span class="badge badge-success">Lunas</span>
                        @else
                            <span class="badge badge-danger">Belum Lunas</span>
                        @endif
                    </td>
                </tr>
            </table>

        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Properti</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($event->detailProperty as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_property }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Karyawan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($event->detailTeam as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-primary print-button" href="{{ route('event.index') }}">Kembali</a>
                        <button class="btn btn-secondary print-button" onclick="printLaporan()">Cetak Detail Event</button>
                        <button class="btn btn-info print-button" onclick="window.print()">Cetak Laporan Event</button>
                    </div>
                </div> --}}

            </div>
            {{-- <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <a class="btn btn-primary print-button" href="{{ route('event.index') }}">Kembali</a>
                    <button class="btn btn-secondary print-button" onclick="printLaporan()">Cetak Detail Event</button>
                    <button class="btn btn-info print-button" onclick="window.print()">Cetak Laporan Event</button>
                </div>
            </div> --}}

            <div class="card-footer">
                <div class="row justify-content-end">
                    <div class="col-auto">
                        <a class="btn btn-primary print-button" href="{{ route('event.index') }}">Kembali</a>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-secondary print-button" onclick="printLaporan()">Cetak Detail Event</button>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-info print-button" onclick="window.print()">Cetak Laporan Event</button>
                    </div>
                </div>
            </div>

        </div>
        {{-- <a class="btn btn-primary print-button" href="{{ route('event.index') }}">Kembali</a> --}}
    </div>

    <script>
        function printLaporan() {
            var elementsToHide = document.querySelectorAll('.hide-on-print');
            for (var i = 0; i < elementsToHide.length; i++) {
                elementsToHide[i].style.display = 'none';
            }

            window.print();

            for (var i = 0; i < elementsToHide.length; i++) {
                elementsToHide[i].style.display = 'table-row';
            }
        }
    </script>

@endsection
