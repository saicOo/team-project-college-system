<?php

namespace App\Http\Controllers;

use App\Department;
use App\Student_desire;
use App\Student_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{

    public function index($students = NULL)
    {
        if(Session::has('stds')){
            $students = Session::get('stds');
        }

        $depts = Department::all();

        if($students){
            return view('student.show', [
                'students'  => $students,
                'depts'     => $depts
            ]);
        }

        $students = Student_details::all()->where('dept_id', '!=', NULL);

        return view('student.show', [
            'students'  => $students,
            'depts'     => $depts
        ]);
    }

    public function update(Request $request, $id)
    {
        $std = Student_details::find($id);
        $std->status = 1;

        $std->save();

        return back()->with('done', 'تم تأكيد الدفع');
    }

    public function search(Request $request, $dept_id)
    {
        $stds = NULL;

        if($request->first_name){
            if($request->paid && $request->not_paid || !$request->paid && !$request->not_paid){
                $stds = Student_details::all()->where('first_name', $request->first_name);
            } else {
                $stds = Student_details::all()->where([
                    ['first_name', $request->first_name],
                    ['status', ($request->paid) ? 1 : 0]
                ]);
            }
        } else {
            if($request->paid && $request->not_paid || !$request->paid && !$request->not_paid){
                $stds = Student_details::all();
            } else {
                $stds = Student_details::all()->where('status', ($request->paid) ? 1 : 0);
            }
        }

        if($dept_id != 0)
            return redirect(route('department.show', $dept_id))
                ->with('stds', $stds->where('dept_id', $dept_id));
        else
            return redirect(route('students.index'))
            ->with('stds', $stds->where('dept_id', '!=', NULL));
    }


    /*
     * this method for list all
     * Not mapped students
     * to any of our departments
    */
    public function not_mapped_students()
    {
        $stds = Student_details::all()->where('dept_id', NULL);

        $desires = Student_desire::all();

        $depts = Department::all();

        // dd($depts->firstWhere('id', $desires->firstWhere('id', 1)->desire_1_id)->dept_name);

        return view ('student.map_students',
            [
                'stds' => $stds,
                'desires' => $desires,
                'depts' => $depts
            ]
        );
    }

    /*
     * This method is responsible for
     * mapping students to departments
     * that suitable for them under our
     * constraints
    */
    public function map()
    {
        $stds = Student_details::all();

        foreach($stds as $std) {

            if ($std->dept_id) continue;

            $desires = Student_desire::find($std->id);


            $desire = Department::find($desires->desire_1_id);
            $dept1 = $desire->dept_capacity_num; $dept2 = 0; $dept3 = 0;

            if($dept1 && $std->degree >= $desire->minimum_degree) {
                $std->dept_id = $desire->id;
            } else {

                $desire = Department::find($desires->desire_2_id);
                $dept2 = $desire->dept_capacity_num;
                if($dept2 && $std->degree >= $desire->minimum_degree) {
                    $std->dept_id = $desire->id;
                }
                else {

                    $dept3 = $desire->dept_capacity_num;
                    $desire = Department::find($desires->desire_3_id);
                    if($dept3 && $std->degree >= $desire->minimum_degree) {
                        $std->dept_id = $desire->id;
                    }

                }

            }

            if(!$dept1 && !$dept2 && !$dept3) break;

            $desire->dept_capacity_num--;
            $std->save();

        }

        return redirect('/map_students')->with('done', 'تم توزيع الطلاب على الاقسام حسب المعايير المحدده');

    }

}
