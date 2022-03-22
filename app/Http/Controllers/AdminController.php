<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        if(Auth::user()->role == 0){
            $admins = Admin::all();
            return view('admin.show', ['admins' => $admins]);
        }else{
            return redirect()->back();
        }

    }

    public function create()
    {
        if(Auth::user()->role == 0){
        return view('admin.add');
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fname' => 'required|string',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:8|alpha_num|confirmed',
            'role' => 'required',
        ]);

        $admin = new Admin();
        $admin->name = $validated['fname'];
        $admin->email = $validated['email'];
        $admin->password = bcrypt($validated['password']);
        $admin->role = (int) $validated['role'];
        $admin->save();

        return redirect( route('admin.index') )->with('done', 'تمت اضافة الادمن بنجاح');
    }

    public function show($id, $done = NULL) // show and edit pages in profile
    {
        return view('admin.profile', [
            'admin' => Admin::find($id),
            'done' => $done
        ]);
    }

    public function update(Request $request, $id)
    {
        if($request->password){
            $validated = $request->validate([
                'password' => 'required|min:8|alpha_num|confirmed',
            ]);
            $admin = Admin::find($id);
            $admin->password = bcrypt($validated['password']);
            $admin->save();
        }else{
            $validated = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
            ]);
            $admin = Admin::find($id);
            $admin->name = $validated['name'];
            $admin->email = $validated['email'];
            if($request->role){
                $admin->role = $request->role;
            }
            $admin->save();
        }

        return $this->show($id, 'تم تعديل بيانات الادمن بنجاح');
    }

    public function destroy($id)
    {

        if (Auth::user()->id == $id){
            return redirect('/admin')->with('error', 'لا يمكن تعطيل الادمن الحالي وهو قيد التشغيل');
        }else{
            $admin = Admin::find($id);
            $admin->role = 3;
            $admin->save();
            return redirect('/admin')->with('done', 'تم تعطيل حساب الادمن بنجاح');
        }
    }
    public function upload(Request $request, $id)
    {
        $request->validate([
            'img' => 'required|file|image|mimes:webp|max:1000'
        ]);

        $bin = file_get_contents($request->img);

        $admin = Admin::find($id);

        $admin->img = $bin;

        $admin->save();

        return back();
    }

}
