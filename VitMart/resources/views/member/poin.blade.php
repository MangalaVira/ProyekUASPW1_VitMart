@extends('layout.master')

@section('content')
<div class="container">
    <h1>Daftar Member dan Poin</h1>

    @if(session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('member.add_points') }}" class="btn btn-primary mb-3">+ Tambah Poin</a>
    </div>

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama Member</th>
                <th>Email</th>
                <th>Total Poin</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $index => $member)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $member->nama }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->poin }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada member.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection