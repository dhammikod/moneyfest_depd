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
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="text" name="nama" id="nama" placeholder="Nama"
                     required style="border-color: #2F80ED; background-color: #E0E9F4">
                <input type="text" name="jenis" id="jenis" placeholder="Jenis" 
                    required style="border-color: #2F80ED; background-color: #E0E9F4">
                    <input type="text" name="deskripsi" id="deskripsi" placeholder="deskripsi"
                    required style="border-color: #2F80ED; background-color: #E0E9F4">
                <input type="text" name="stok" id="Stok" placeholder="Stok"
                     required style="border-color: #2F80ED; background-color: #E0E9F4">
                <input type="number" name="harga_jual" id="harga_jual" placeholder="Harga_jual"
                     required style="border-color: #2F80ED; background-color: #E0E9F4">
                <input type="number" name="harga_beli" id="harga_beli" placeholder="Harga_beli"
                    required style="border-color: #2F80ED; background-color: #E0E9F4">
                <input type="number" name="terjual" id="terjual" placeholder="Terjual"
                    required style="border-color: #2F80ED; background-color: #E0E9F4">

                <button type="submit"
                    style="background: white; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold">SAVE</button>
            </form>
        </div>
        <div id="contacts">
            <table>
                <thead>
                    <tr>
                        <th class="sort" data-sort="nama">nama</th>
                        <th class="sort" data-sort="jenis">jenis</th>
                        <th class="sort" data-sort="deskripsi">deskripsi</th>
                        <th class="sort" data-sort="stok">stok</th>
                        <th class="sort" data-sort="harga_jual">harga_jual</th>
                        <th class="sort" data-sort="harga_beli">harga_beli</th>
                        <th class="sort" data-sort="terjual">terjual</th>
                        <th colspan="2">
                            <input type="text" class="search" placeholder="Search History" />
                        </th>
                    </tr>
                </thead>
                <tbody class="list">
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($produks as $data)
                        <tr>
                            <td class="id" style="display:none;">{{ $i }}</td>
                            <td class="nama">{{ $data['nama'] }}</td>
                            <td class="jenis">{{ $data['jenis'] }}</td>
                            <td class="deksripsi">{{ $data['deksripsi'] }}</td>
                            <td class="stok">{{ $data['stok'] }}</td>
                            <td class="harga_jual">{{ $data['harga_jual'] }}</td>
                            <td class="harga_beli">{{ $data['harga_beli'] }}</td>
                            <td class="terjual">{{ $data['terjual'] }}</td>
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

                                            <input type="hidden" name="id" value="{{ $data['id'] }}">
                                            <input type="text" name="nama" id="nama"
                                                placeholder="Name of Income" value="{{ $data['nama'] }}" required
                                                style="border-color: #2F80ED; background-color: #E0E9F4">
                                            <input type="text" name="jenis" id="jenis"
                                                placeholder="Nominal" value="{{ $data['jenis'] }}" required
                                                style="border-color: #2F80ED; background-color: #E0E9F4">
                                            <input type="text" name="deskripsi" id="deskripsi"
                                                placeholder="Amount" value="{{ $data['deskripsi'] }}" required
                                                style="border-color: #2F80ED; background-color: #E0E9F4">
                                            <input type="text" name="stok" id="stok"
                                                placeholder="Amount" value="{{ $data['stok'] }}" required
                                                style="border-color: #2F80ED; background-color: #E0E9F4">
                                            <input type="number" name="harga_jual" id="harga_jual"
                                                placeholder="Unit" value="{{ $data['harga_jual'] }}" required
                                                style="border-color: #2F80ED; background-color: #E0E9F4">
                                            <input type="number" name="harga_beli" id="harga_beli"
                                                placeholder="harga_beli" value="{{ $data['harga_beli'] }}" required
                                                style="border-color: #2F80ED; background-color: #E0E9F4">
                                            <input type="number" name="terjual" id="terjual" placeholder="Notes"
                                                value="{{ $data['terjual'] }}" required
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
