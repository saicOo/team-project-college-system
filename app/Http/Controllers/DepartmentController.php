<?php

namespace App\Http\Controllers;
use App\Department;
use App\Student_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DepartmentController extends Controller
{
    public function index()
    {
        $department = Department::all();
        return view('department.index', compact("department" ,$department));
    }

    public function store(Request $request)
    {
        $request->validate([
            "dept_name"            => ['required','unique:departments' ],
            "dept_capacity_num"    => ['required','numeric'],
            "price"                => ['required','numeric'],
            "minimum_degree"       => ['required','numeric' ,'max:500|min250'],
            "minimum_degree_en"    => ['required','numeric','max:60|min30'],
        ]);
        $department = new Department();
        $department->dept_name         =$request->dept_name;
        $department->dept_capacity_num =$request->dept_capacity_num;
        $department->price             =$request->price;
        $department->minimum_degree    =$request->minimum_degree;
        $department->minimum_degree_en =$request->minimum_degree_en;
        $department->save();

        // add new dept in session for side bar use
        Session::forget('depts');
        Session::put('depts', Department::all('id', 'dept_name'));

        return redirect("department")->with("done" , "تمت اضافة القسم بنجاح");
    }

    public function show($id, $students = NULL)
    {
        if(Session::has('stds'))
            $students = Session::get('stds');

        $dept = NULL;
        foreach(Session::get('depts') as $d) {
            if($d->id == $id) {
                $dept = $d;
                break;
            }
        }

        if(!$dept){
            return redirect('/');
        }

        if($students){
            return view('department.show', [
                'dept_name' => $dept->dept_name,
                'dept_id'   => $dept->id,
                'students'  => $students
            ]);
        }

        $students = Student_details::all()->where('dept_id', $dept->id);

        return view('department.show', [
            'dept_name' => $dept->dept_name,
            'dept_id'   => $dept->id,
            'students'  => $students
        ]);
    }

    public function edit($id)
    {
        $department = Department::find($id);
        return view('department.edit' , compact("department" ,$department));
    }

    public function update(Request $request,$id)
    {
        $request->validate([

            "dept_name"            => ['required'],
            "dept_capacity_num"    => ['required','numeric'],
            "price"                => ['required','numeric'],
            "minimum_degree"       => ['required','numeric' ,'max:500|min250'],
            "minimum_degree_en"    => ['required','numeric','max:60|min30'],
        ]);

        $department = Department::find($id);
        $department->dept_name         =$request->dept_name;
        $department->dept_capacity_num =$request->dept_capacity_num;
        $department->price             =$request->price;
        $department->minimum_degree    =$request->minimum_degree;
        $department->minimum_degree_en =$request->minimum_degree_en;
        $department->save();

        // add new dept in session for side bar use
        Session::forget('depts');
        Session::put('depts', Department::all('id', 'dept_name'));

        return redirect("department")->with("done" , "تم تعديل القسم بنجاح");

    }

    public function destroy($id)
    {
        $department = Department::find($id);
        $department->DELETE();

        // add new dept in session for side bar use
        Session::forget('depts');
        Session::put('depts', Department::all('id', 'dept_name'));

        return redirect("department")->with('done' , "تم حذف القسم المطلوب");
    }

}

?>
