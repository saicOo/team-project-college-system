<?php

namespace App\Http\Controllers;
use App\Department;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
        $department = Department::all();
        return view('department.index', compact("department" ,$department));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('department.index');

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
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
    return redirect("department")->with("done" , "تمت اضافة القسم بنجاح");

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
        $department = Department::find($id);
        return view('department.edit' , compact("department" ,$department));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request,$id)
  {
    
    $request->validate([
      "dept_name"            => ['required','unique:departments' ],
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
    return redirect("department")->with("done" , "تم تعديل القسم بنجاح");
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $department = Department::find($id);
    $department->DELETE();
    return redirect("department")->with('done' , "تم حذف القسم المطلوب");

  }

}

?>
