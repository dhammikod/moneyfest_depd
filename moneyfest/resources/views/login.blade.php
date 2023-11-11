<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if ($invalid)
        {{"invalid"}}
    @endif
    <form action="" method="post">
        @csrf
        Email:
        <input type="email" name="email" id="" required>
        password:
        <input type="password" name="password" id="" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>