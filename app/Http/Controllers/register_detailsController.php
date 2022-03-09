<?php

namespace App\Http\Controllers;
use App\Student_desire;
use App\Department;
use App\Student_details;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class register_detailsController extends Controller
{
    public function showStep1()
    {
      return view('register_details.step_1');
    }

    public function step1(Request $request)
    {
      $request->validate([
          'first_name' => 'required|max:25|min:2',
          'last_name' => 'required|max:25|min:2',
          'address' => 'required|max:100|min:2',
          'phone' => 'required|digits:11',
          'national_id' => 'required|integer|digits:15',
          'age' => 'required|date',
          'gender' => 'required',
          'img' => 'required|image|mimes:webp|max:200',
      ]);
      $student_details = new Student_details;
      $student_details->id = Auth::user()->id;
      $student_details->first_name = $request->first_name;
      $student_details->last_name = $request->last_name;
      $student_details->phone = $request->phone;
      $student_details->address = $request->address;
      $student_details->age = $request->age;
      $student_details->gender = $request->gender;


      $student_details->national_id = $request->national_id;
      $student_details->img = file_get_contents($request->img);

      $student_details->save();
      return redirect()->route('showStep2');
    }
    public function showStep2()
    {
      return view('register_details.step_2');
    }
    public function step2(Request $request)
    {
      $request->validate([
          'degree' => 'required|numeric|max:100|min:50',
          'english_degree' => 'required|numeric|max:60|min:30',
          'attachments' => 'required|mimes:pdf',
      ]);
      $student_details = Student_details::findOrFail(Auth::user()->id);

    $sum_degree = $request->degree / 100 * 500;


      $student_details->english_degree = $request->english_degree;
      $student_details->degree = $sum_degree;
      $student_details->attachments = file_get_contents($request->attachments);
      $student_details->save();
      return redirect()->route('showStep3');
    }
    public function showStep3()
    {
      $degree = Student_details::findOrFail(Auth::user()->id)->degree;
      $degree_en = Student_details::findOrFail(Auth::user()->id)->english_degree;

      return view('register_details.step_3',  [
              'departments' => Department::where('minimum_degree','<=', $degree)->where('minimum_degree_en','<=', $degree_en)->get(),
          ]);
    }
    public function step3(Request $request)
    {
        $student_desire = new Student_desire;
        $student_desire->id = Auth::user()->id;
        $student_desire->desire_1_id  = $request->desire_1;
        $student_desire->desire_2_id = $request->desire_2;
        $student_desire->desire_3_id  = $request->desire_3 ;
        $student_desire->save();
        $student_status = User::findOrFail(Auth::user()->id);
        $student_status->status = 1;
        $student_status->save();
      return view('register_details.step_4');
    }
}
