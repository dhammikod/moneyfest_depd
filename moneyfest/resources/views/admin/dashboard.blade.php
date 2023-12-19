<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
</head>

<body>
    <h1>Manage Users</h1>

    <!-- Form untuk menambahkan pengguna -->
    <form method="post" action="" style="text-align: center">
        @csrf
        <input type="hidden" name="create" value="true">
        <label for="name">Nama Pengguna:</label>
        <input type="text" name="name" required>
        <label for="email">Email Pengguna:</label>
        <input type="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <label for="role">Role:</label>
        <select name="role" required>
            <option value="admin">admin</option>
            <option value="member">member</option>
        </select>
        <button type="submit">Tambah Pengguna</button>

    </form>

    <hr>

    <!-- Form untuk menghapus pengguna -->
    <form method="post" action="" style="text-align: center">
        @csrf
        <input type="hidden" name="delete" value="true">


        <label for="user_id">Pilih Pengguna untuk Dihapus:</label>

        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>



            <input type="hidden" name="id" value="{{ $user['id'] }}">
            <button type="submit">Hapus Pengguna</button>
        @endforeach
    </form>
</body>

</html>
