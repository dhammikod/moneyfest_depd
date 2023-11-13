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

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

</head>
<body>
    <form action="/logout" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
    <form method="post" action="">
        @csrf
        <input type="hidden" name="user_id" value="{{$user->id}}">
        name: <input type="text" name="name" id="name" required>
        nominal: <input type="number" name="nominal" id="nominal" required>

        Jenis:
        <select id="jenis" name="jenis">
            <!-- Options will be dynamically populated using JavaScript -->
        </select>

        Kategori:
        <select id="kategori" name="kategori">
            <!-- Options will be dynamically populated using JavaScript -->
        </select>
        jumlah: <input type="number" name="jumlah" id="jumlah" required>
        satuan: <input type="text" name="satuan" id="satuan" required>
        tanggal: <input type="text" name="tanggal" id="tanggal" required>
        catatan: <input type="text" name="catatan" id="catatan" required>

        <button type="submit">submit</button>
    </form>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>nama</th>
                <th>Jenis Kategori</th>
                <th>Kategori</th>
                <th>nominal</th>
                <th>jumlah</th>
                <th>satuan</th>
                <th>tanggal</th>
                <!-- Add more columns based on your data structure -->
            </tr>
        </thead>
        <tbody>
            <!-- DataTables will dynamically populate the table body -->
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="assets/js/autoload_form.js"></script>
</body>
</html>