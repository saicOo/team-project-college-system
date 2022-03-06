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
          'img' => 'required|mimes:jpeg,png,jpg',
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
      $student_details->img = $request->file('img')->getClientOriginalName();

      $student_details->save();
      $request->img->move(public_path('attachments'), $student_details->img);

      return redirect()->route('showStep2');
    }
    public function showStep2()
    {
      return view('register_details.step_2');
    }
    public function step2(Request $request)
    {
      $request->validate([
          'english_degree' => 'required|integer|max:100',
          'degree' => 'required|integer|max:100',
          'attachments' => 'required|mimes:pdf',
      ]);
      $student_details = Student_details::findOrFail(Auth::user()->id);

      $student_details->english_degree = $request->english_degree;
      $student_details->degree = $request->degree;
      $student_details->attachments = $request->file('attachments')->getClientOriginalName();

      $student_details->save();
      $request->attachments->move(public_path('attachments'), $student_details->attachments);
      return redirect()->route('showStep3');
    }
    public function showStep3()
    {
      $degree = Student_details::findOrFail(Auth::user()->id)->degree;
      return view('register_details.step_3',  [
              'departments' => Department::where('minimum_degree','<=', $degree)->get(),
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
