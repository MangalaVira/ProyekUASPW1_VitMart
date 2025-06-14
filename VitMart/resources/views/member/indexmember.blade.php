@extends('layout.master')

@section('title', 'Daftar Member')

@section('content')
<div class="container mt-4">
    <h3>Daftar Member</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('member.create') }}" class="btn btn-primary mb-3">+ Tambah Member Baru</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($members as $member)
                <tr>
                    <td>{{ $member->nama }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->telepon }}</td>
                    <td>{{ $member->alamat }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data member.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection