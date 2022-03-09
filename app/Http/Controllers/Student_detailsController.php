<?php

namespace App\Http\Controllers;
use App\Student_details;
use App\Student_desire;
use App\Student;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Student_detailsController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $degree = Student_details::findOrFail($id)->degree;
    $degree_en = Student_details::findOrFail($id)->english_degree;

    // كان بيطلع ايرور اما الطالب يكون مالي اول جزء بس في الفورم
    // ومش مالي الباقي عشان مبيباقش لسه دخل درجته
    $departments = [];
    if ($degree) {
        $departments = Department::select('dept_name', 'id')->where('minimum_degree','<=', $degree)->where('minimum_degree_en','<=', $degree_en)->get();
    }

    $student = Student_details::findOrFail($id);
    $user = Student::findOrFail($id);
    return view('student.profile',compact('student','user','departments'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request , $id)
  {

    $request->validate([
        'first_name' => 'required|max:25|min:2',
        'last_name' => 'required|max:25|min:2',
        'address' => 'required|max:100|min:2',
        'phone' => 'required|digits:11',
        'national_id' => 'required|integer|digits:14',
        'age' => 'required|date',
        'dept_id' => 'nullable|integer',
    ]);

    $student_details = Student_details::findOrFail($id);

    if($request->dept_id){

        $selected_dept = Department::find($request->dept_id);

        if(!$selected_dept->dept_capacity_num) {
            return back()->with('myErr', 'القسم ممتلئ');
        }

        $selected_dept->dept_capacity_num--; // decrement target department capacity by 1
        $selected_dept->save();

        $leave_dept = Department::find($student_details->dept_id);

        $leave_dept->dept_capacity_num++; // increment left department capacity by 1
        $leave_dept->save();

    } elseif ($student_details->dept_id) { // لو الطالب ليه قسم و الريكويست مفيهوش رقم القسم طلع الايرور
        return back()->with('myErr', 'يجب ادخال قسم محدد');
    }

    $student_details->first_name = $request->first_name;
    $student_details->last_name = $request->last_name;
    $student_details->phone = $request->phone;
    $student_details->national_id = $request->national_id;
    $student_details->address = $request->address;
    $student_details->age = $request->age;
    $student_details->dept_id = $request->dept_id;


    $student_details->save();
    session()->flash('done',"تم التعديل بنجاح");
    return redirect()->back();
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

}

?>
