<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class AdminController extends Controller
{

    public function index()
    {
        $admins = Admin::all();

        return view('admin.show', ['admins' => $admins]);
    }

    public function create()
    {
        return view('admin.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:8|alpha_num|confirmed',
            'role' => 'required'
        ]);

        $admin = new Admin();
        $admin->name = $validated['fname'] . ' ' . $validated['lname'];
        $admin->email = $validated['email'];
        $admin->password = bcrypt($validated['password']);
        $admin->role = (int) $validated['role'];

        $admin->save();

        return redirect('/admin');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
