<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    {{-- Include bootstrap js popper --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Include Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Include DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
    <link rel="stylesheet" href="/assets/css/dashboard.css">
</head>

<body>
    <div style="margin: 20px">
        <div style="text-align: right; padding-bottom: 20px">
            <form action="/logout" method="post">
                @csrf
                <button type="submit"
                    style="font-size: 12px;  background: #2D36A1; color: white; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer;">Logout</button>
            </form>
        </div>
        <div style="display: flex; justify-content: flex-end">
            <form method="post" action="" class="form" style="text-align: center">
                <h2 style="font-weight: bold">Input New Expenditures</h2>
                @csrf
                <input type="hidden" name="create" value="yes">
                <select id="kategori" name="kategori" style="border-color: #2F80ED; background-color: #E0E9F4">
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori['id'] }}">{{ $kategori['kategori'] }}</option>
                    @endforeach
                </select>

                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="text" name="name" id="name" placeholder="Name of Income" required
                    style="border-color: #2F80ED; background-color: #E0E9F4">
                <input type="number" name="nominal" id="nominal" placeholder="Nominal" required
                    style="border-color: #2F80ED; background-color: #E0E9F4">
                <input type="number" name="jumlah" id="jumlah" placeholder="Amount" required
                    style="border-color: #2F80ED; background-color: #E0E9F4">
                <input type="text" name="satuan" id="satuan" placeholder="Unit" required
                    style="border-color: #2F80ED; background-color: #E0E9F4">
                <input type="text" name="tanggal" id="tanggal" placeholder="Date" required
                    style="border-color: #2F80ED; background-color: #E0E9F4">
                <input type="text" name="catatan" id="catatan" placeholder="Notes" required
                    style="border-color: #2F80ED; background-color: #E0E9F4">

                <button type="submit"
                    style="background: white; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold">SAVE</button>
            </form>
        </div>
        <div id="contacts">
            <table>
                <thead>
                    <tr>
                        <th class="sort" data-sort="name">Name</th>
                        <th class="sort" data-sort="age">Kategori</th>
                        <th class="sort" data-sort="nominal">Nominal</th>
                        <th class="sort" data-sort="jumlah">Jumlah</th>
                        <th class="sort" data-sort="satuan">Satuan</th>
                        <th class="sort" data-sort="tanggal">Tanggal</th>
                        <th class="sort" data-sort="tanggal">Catatan</th>
                        <th colspan="2">
                            <input type="text" class="search" placeholder="Search History" />
                        </th>
                    </tr>
                </thead>
                <tbody class="list">
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($datas as $data)
                        <tr>
                            <td class="id" style="display:none;">{{ $i }}</td>
                            <td class="name">{{ $data['nama'] }}</td>
                            <td class="kategori">{{ $data['kategori'] }}</td>
                            <td class="nominal">{{ $data['nominal'] }}</td>
                            <td class="jumlah">{{ $data['jumlah'] }}</td>
                            <td class="satuan">{{ $data['satuan'] }}</td>
                            <td class="tanggal">{{ $data['tanggal'] }}</td>
                            <td class="catatan">{{ $data['catatan'] }}</td>
                            <td class="edit"><button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $data['id'] }}">
                                    Edit
                                </button></td>
                            <td class="remove"><button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $data['id'] }}">
                                Delete
                            </button></td>
                        </tr>
                        @php
                            $i++;
                        @endphp

                        {{-- Modal section --}}
                        {{-- Modal section --}}
                        {{-- Modal section --}}
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $data['id'] }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">

                            <div class="modal-dialog">

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <h2 style="font-weight: bold">Edit Expenditures</h2>
                                        <form method="post" action="" style="text-align: center">
                                            @csrf
                                            <input type="hidden" name="edit" value="true">
                                            <select id="kategori" name="kategori"
                                                style="border-color: #2F80ED; background-color: #E0E9F4">
                                                @foreach ($kategoris as $kategori)
                                                    <option value="{{ $kategori['id'] }}">{{ $kategori['kategori'] }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <input type="hidden" name="id" value="{{ $data['id'] }}">
                                            <input type="text" name="nama" id="name"
                                                placeholder="Name of Income" value="{{ $data['nama'] }}" required
                                                style="border-color: #2F80ED; background-color: #E0E9F4">
                                            <input type="number" name="nominal" id="nominal"
                                                placeholder="Nominal" value="{{ $data['nominal'] }}" required
                                                style="border-color: #2F80ED; background-color: #E0E9F4">
                                            <input type="number" name="jumlah" id="jumlah" placeholder="Amount"
                                                value="{{ $data['jumlah'] }}" required
                                                style="border-color: #2F80ED; background-color: #E0E9F4">
                                            <input type="text" name="satuan" id="satuan" placeholder="Unit"
                                                value="{{ $data['satuan'] }}" required
                                                style="border-color: #2F80ED; background-color: #E0E9F4">
                                            <input type="text" name="tanggal" id="tanggal" placeholder="Date"
                                                value="{{ $data['tanggal'] }}" required
                                                style="border-color: #2F80ED; background-color: #E0E9F4">
                                            <input type="text" name="catatan" id="catatan" placeholder="Notes"
                                                value="{{ $data['catatan'] }}" required
                                                style="border-color: #2F80ED; background-color: #E0E9F4">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Model Delete --}}
                        {{-- Model Delete --}}
                        {{-- Model Delete --}}
                        <div class="modal fade" id="deleteModal{{ $data['id'] }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">

                            <div class="modal-dialog">

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <h2 style="font-weight: bold">Are you sure?</h2>
                                        <h5 style="font-weight: bold">Delete data</h2>
                                        <form method="post" action="" style="text-align: center">
                                            @csrf
                                            <input type="hidden" name="delete" value="true">
                                            <input type="hidden" name="id" value="{{ $data['id'] }}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="/assets/js/histori.js"></script>

</body>

</html>
