<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
</head>

<body>
    
    <h1>Data User</h1>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>ID Level Pengguna</th>
        </tr>
        <tr>
            <th>{{ $data->user_id }}</th>
            <th>{{ $data->username }}</th>
            <th>{{ $data->nama }}</th>
            <th>{{ $data->level_id }}</th>
        </tr>
        
    </table>
</body>

</html>