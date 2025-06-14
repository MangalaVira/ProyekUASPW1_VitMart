<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Member</title>
</head>
<body>
    <h2>Tambah Member</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('member.store') }}" method="POST">
        @csrf
        <label>Nama:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Poin Awal:</label><br>
        <input type="number" name="points" value="0" min="0"><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>