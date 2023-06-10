@extends('layout.master')
@section('title', 'Add Event')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Penyelenggara</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror"
                            name="penyelenggara" value="{{ old('penyelenggara') }}">
                        @error('penyelenggara')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Nama Event</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('nama_event') is-invalid @enderror"
                            name="nama_event" value="{{ old('nama_event') }}">
                        @error('nama_event')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Jadwal Event</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control @error('jadwal_event') is-invalid @enderror"
                            name="jadwal_event" value="{{ old('jadwal_event') }}">
                        @error('jadwal_event')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Alamat Event</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('alamat_event') is-invalid @enderror"
                            name="alamat_event" value="{{ old('alamat_event') }}">
                        @error('alamat_event')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Property</label>
                    <div class="col-sm-10">
                        <select class="form-control select2 @error('property') is-invalid @enderror" id="propertySelect"
                            onchange="loadPropertyTable()" name="property[]" multiple>
                            @error('property')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            {{-- <option value="">Pilih Property</option> --}}
                            @foreach ($dataProperti as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_property }}</option>
                            @endforeach
                        </select>
                        {{-- <div id="propertyTableContainer"></div> --}}
                    </div>
                </div>
                <input type="hidden" name="team[]" id="teamList" />
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Team</label>
                    <div class="col-sm-10">
                        <select class="form-control select2 @error('team') is-invalid @enderror" id="teamSelect"
                            onchange="loadTeamTable()" multiple>
                            @error('team')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            {{-- <option value="">Pilih Team</option> --}}
                            @foreach ($dataTeam as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        {{-- <div id="teamTableContainer"></div> --}}
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="harga" id="harga" oninput="calculateSisa()">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">DP</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="dp" id="dp" oninput="calculateSisa()">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Sisa</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="sisa" id="sisa" readonly>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary">Batal</button>
            </form>
        </div>
    </div>

    <script>
        function calculateSisa() {
            var harga = parseInt(document.getElementById('harga').value) || 0;
            var dp = parseInt(document.getElementById('dp').value) || 0;
            var sisa = harga - dp;

            document.getElementById('sisa').value = sisa;
        }
        var propertyList = [];
        var teamList = [];

        function loadPropertyTable() {
            var propertySelect = document.getElementById("propertySelect");
            var tableContainer = document.getElementById("propertyTableContainer");

            // Check if propertySelect has a value selected
            if (propertySelect.value) {
                var property = {
                    value: propertySelect.value,
                    name: propertySelect.options[propertySelect.selectedIndex].text
                };

                propertyList.push(property);

                renderPropertyTable();
            }
        }

        function renderPropertyTable() {
            var tableContainer = document.getElementById("propertyTableContainer");

            // Create table element
            var table = document.createElement("table");
            table.classList.add("table");
            table.classList.add("table-bordered");

            // Create table header
            var tableHeader = document.createElement("thead");
            var headerRow = document.createElement("tr");
            var noHeaderCell = document.createElement("th");
            noHeaderCell.textContent = "No";
            var nameHeaderCell = document.createElement("th");
            nameHeaderCell.textContent = "Nama Property";
            var deleteHeaderCell = document.createElement("th");
            deleteHeaderCell.textContent = "Hapus";
            headerRow.appendChild(noHeaderCell);
            headerRow.appendChild(nameHeaderCell);
            headerRow.appendChild(deleteHeaderCell);
            tableHeader.appendChild(headerRow);
            table.appendChild(tableHeader);

            // Create table body
            var tableBody = document.createElement("tbody");
            for (var i = 0; i < propertyList.length; i++) {
                var property = propertyList[i];

                var bodyRow = document.createElement("tr");
                var noCell = document.createElement("td");
                noCell.textContent = i + 1;
                var nameCell = document.createElement("td");
                nameCell.textContent = property.name;
                var deleteCell = document.createElement("td");
                var deleteButton = document.createElement("button");
                deleteButton.classList.add("btn");
                deleteButton.classList.add("btn-danger");
                deleteButton.textContent = "Hapus";
                deleteButton.onclick = createDeletePropertyHandler(i);
                deleteCell.appendChild(deleteButton);
                bodyRow.appendChild(noCell);
                bodyRow.appendChild(nameCell);
                bodyRow.appendChild(deleteCell);
                tableBody.appendChild(bodyRow);
            }
            table.appendChild(tableBody);

            // Clear previous table
            tableContainer.innerHTML = "";

            // Append table to the container
            tableContainer.appendChild(table);
        }

        function createDeletePropertyHandler(index) {
            return function() {
                propertyList.splice(index, 1);
                renderPropertyTable();
            };
        }

        function loadTeamTable() {
            var select = document.getElementById('teamSelect');

            var result = [];
            var options = select && select.options;
            var opt;

            for (var i = 0, iLen = options.length; i < iLen; i++) {
                opt = options[i];

                if (opt.selected) {
                    result.push(opt.value);
                }
            }

            var inputList = document.getElementById("teamList");
            inputList.value = result
        }

        function renderTeamTable() {
            var tableContainer = document.getElementById("teamTableContainer");

            // Create table element
            var table = document.createElement("table");
            table.classList.add("table");
            table.classList.add("table-bordered");

            // Create table header
            var tableHeader = document.createElement("thead");
            var headerRow = document.createElement("tr");
            var noHeaderCell = document.createElement("th");
            noHeaderCell.textContent = "No";
            var nameHeaderCell = document.createElement("th");
            nameHeaderCell.textContent = "Nama Divisi";
            var deleteHeaderCell = document.createElement("th");
            deleteHeaderCell.textContent = "Hapus";
            headerRow.appendChild(noHeaderCell);
            headerRow.appendChild(nameHeaderCell);
            headerRow.appendChild(deleteHeaderCell);
            tableHeader.appendChild(headerRow);
            table.appendChild(tableHeader);

            // Create table body
            var tableBody = document.createElement("tbody");
            for (var i = 0; i < teamList.length; i++) {
                var team = teamList[i];

                var bodyRow = document.createElement("tr");
                var noCell = document.createElement("td");
                noCell.textContent = i + 1;
                var nameCell = document.createElement("td");
                nameCell.textContent = team.name;
                var deleteCell = document.createElement("td");
                var deleteButton = document.createElement("button");
                deleteButton.classList.add("btn");
                deleteButton.classList.add("btn-danger");
                deleteButton.textContent = "Hapus";
                deleteButton.onclick = createDeleteTeamHandler(i);
                deleteCell.appendChild(deleteButton);
                bodyRow.appendChild(noCell);
                bodyRow.appendChild(nameCell);
                bodyRow.appendChild(deleteCell);
                tableBody.appendChild(bodyRow);
            }
            table.appendChild(tableBody);

            // Clear previous table
            tableContainer.innerHTML = "";

            // Append table to the container
            tableContainer.appendChild(table);
        }

        function createDeleteTeamHandler(index) {
            return function() {
                teamList.splice(index, 1);
                renderTeamTable();
            };
        }
    </script>
@endsection
