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

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #CEDCEE;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .form {
            background-color: #E0E9F4;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #333;
        }

        select,
        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #E0E9F4;
        }
    </style>
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
                <select id="jenis" name="jenis" style="border-color: #2F80ED; background-color: #E0E9F4" disabled>
                    <!-- Options will be dynamically populated using JavaScript -->
                </select>

                <select id="kategori" name="kategori" style="border-color: #2F80ED; background-color: #E0E9F4">
                    <!-- Options will be dynamically populated using JavaScript -->
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


        <div style="margin: 20px" style="background-color: #E0E9F4">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category Type</th>
                        <th>Category</th>
                        <th>Nominal</th>
                        <th>Amount</th>
                        <th>Unit</th>
                        <th>Date</th>
                        <!-- Add more columns based on your data structure -->
                    </tr>
                </thead>
                <tbody>
                    <!-- DataTables will dynamically populate the table body -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="assets/js/autoload_pengeluaran.js"></script>
</body>
</html>