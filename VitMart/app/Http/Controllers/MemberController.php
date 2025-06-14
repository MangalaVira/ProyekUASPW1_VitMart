<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{

    public function create()
    {
        return view('member/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:members,email',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);

        Member::create($request->all());

        return redirect()->route('member.indexmember')->with('success', 'Member berhasil dibuat!');
    }

    public function addPointsForm()
    {
    $members = Member::all();
    return view('member.add_points', compact('members'));
    }

    public function addPointsSubmit(Request $request)
    {
    $request->validate([
        'member_id' => 'required|exists:members,id',
        'poin' => 'required|integer|min:1',
    ]);

    $member = Member::find($request->member_id);
    $member->poin += $request->poin;
    $member->save();

    return redirect()->route('member/poin')->with('success', 'Poin berhasil ditambahkan.');
    }
    public function poin()
    {
    $members = Member::all();
    return view('member/poin', compact('members'));
    }

    public function index()
    {
    $members = Member::all();
    return view('member.indexmember', compact('members'));
    }
}