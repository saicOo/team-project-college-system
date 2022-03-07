<?php

namespace App\Http\Controllers;

use App\Department;
use App\Student_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Session::put('depts', Department::all('id', 'dept_name'));

        $all_stds = Student_details::all();

        $all_stds_count = count($all_stds); // 1

        $reg_stds = $all_stds->where('dept_id', '!=', 'NULL')->where('status', 1);

        $reg_stds_count = count($reg_stds); // 2

        $depts = Department::all();

        $depts_count = count($depts); // 3

        $money = 0; // 4
        foreach($reg_stds as $std){
            $money += Department::find($std->dept_id)->price;
        }

        $each_dept_count = [];
        foreach($depts as $dept) {
            // dd($dept->);
            $each_dept_count[$dept->dept_name] = count($reg_stds->where('dept_id', $dept->id)); // rest
        }

        return view('home', [
            'all_stds'  => $all_stds_count,
            'reg_stds'  => $reg_stds_count,
            'depts'     => $depts_count,
            'money'     => $money,
            'each_dept' => $each_dept_count
        ]);
    }
}
