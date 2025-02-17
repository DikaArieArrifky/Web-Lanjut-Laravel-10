<!DOCTYPE html>
<html>

<head>
    <title>Edit Item</title> <!-- Menentukan judul halaman -->
</head>

<body>
    <h1>Edit Item</h1> <!-- Menampilkan judul halaman -->

    <form action="{{ route('items.update', $item) }}" method="POST"> <!-- Form untuk memperbarui item -->
        @csrf <!-- Token keamanan CSRF untuk mencegah serangan CSRF -->
        @method('PUT') <!-- Menggunakan metode PUT untuk update data -->

        <label for="name">Name:</label> <!-- Label untuk input nama -->
        <input type="text" name="name" value="{{ $item->name }}" required> <!-- Input untuk nama item, dengan nilai default dari database -->
        <br>

        <label for="description">Description:</label> <!-- Label untuk input deskripsi -->
        <textarea name="description" required>{{ $item->description }}</textarea> <!-- Textarea untuk deskripsi item, dengan nilai default dari database -->
        <br>

        <button type="submit">Update Item</button> <!-- Tombol untuk mengirimkan form update -->
    </form>

    <a href="{{ route('items.index') }}">Back to List</a> <!-- Link untuk kembali ke daftar item -->
</body>

</html>