<form action="{{ url('/member.poin') }}" method="POST">
    @csrf
    <label>Nama Member</label>
    <input type="text" name="nama" required>
    
    <label>No Telepon</label>
    <input type="text" name="no_telp" required>

    <label>Total Poin</label>
    <input type="number" name="poin" required>

    <button type="submit">Simpan</button>
</form>