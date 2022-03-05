<?php

namespace App\Http\Controllers;

use App\Department;
use App\Student_desire;
use App\Student_details;
use Illuminate\Http\Request;

class MapStudentController extends Controller
{

    public function index()
    {
        $stds = Student_details::all()->where('dept_id', NULL);

        $desires = Student_desire::all();

        $depts = Department::all();

        // dd($depts->firstWhere('id', $desires->firstWhere('id', 1)->desire_1_id)->dept_name);

        return view ('map_students',
            [
                'stds' => $stds,
                'desires' => $desires,
                'depts' => $depts
            ]
        );
    }

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

        return redirect('/map_students');

    }

}
