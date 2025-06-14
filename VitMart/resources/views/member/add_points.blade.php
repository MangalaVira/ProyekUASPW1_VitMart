@extends('layout.master')

@section('content')
<div class="container">
    <h1>Tambah Poin</h1>

    <form action="{{ route('member.add_points_submit') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="member_id">Pilih Member:</label>
            <select name="member_id" class="form-control">
                @foreach ($members as $member)
                    <option value="{{ $member->id }}">{{ $member->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-2">
            <label for="poin">Jumlah Poin:</label>
            <input type="number" name="poin" class="form-control">
        </div>

        <button type="submit" class="btn btn-success mt-3">Simpan Poin</button>
    </form>
</div>
@endsection