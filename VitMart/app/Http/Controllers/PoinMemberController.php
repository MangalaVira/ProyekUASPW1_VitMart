<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoinMemberController extends Controller
{
    public function create() {
    return view('member/create');
}

public function store(Request $request) {
    $request->validate([
        'nama' => 'required',
        'no_telp' => 'required',
        'poin' => 'required|integer',
    ]);

    Member::create([
        'nama' => $request->nama,
        'no_telp' => $request->no_telp,
        'poin' => $request->poin,
    ]);

    return redirect('/member/poin')->with('success', 'Member berhasil ditambahkan');
}
    public function index() {
    $members = Member::all();
    return view('member.index', compact('members'));
}

}