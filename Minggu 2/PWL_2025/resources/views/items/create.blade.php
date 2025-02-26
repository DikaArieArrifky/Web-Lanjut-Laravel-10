<!DOCTYPE html>
<html>

<head>
    <title>Add Item</title> <!-- Menentukan judul halaman -->
</head>

<body>
    <h1>Add Item</h1> <!-- Menampilkan judul halaman -->

    <form action="{{ route('items.store') }}" method="POST"> <!-- Form untuk menambahkan item baru -->
        @csrf <!-- Token keamanan CSRF untuk mencegah serangan CSRF -->

        <label for="name">Name:</label> <!-- Label untuk input nama -->
        <input type="text" name="name" required> <!-- Input untuk nama item, wajib diisi -->
        <br>

        <label for="description">Description:</label> <!-- Label untuk input deskripsi -->
        <textarea name="description" required></textarea> <!-- Textarea untuk deskripsi item, wajib diisi -->
        <br>

        <button type="submit">Add Item</button> <!-- Tombol untuk mengirimkan form -->
    </form>

    <a href="{{ route('items.index') }}">Back to List</a> <!-- Link untuk kembali ke daftar item -->
</body>

</html>