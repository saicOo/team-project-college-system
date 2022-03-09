<?php

namespace App\Http\Controllers;
use App\Student_details;
use App\Student_desire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Student_detailsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
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
      if($id = Auth::user()->id){

          $student_details = Student_details::findOrFail($id);
          $student_desire = Student_desire::findOrFail($id);
              return view('profile.profile',compact('student_details','student_desire'));

    }else{
            return "test";
    }
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
  public function update(Request $request ,$id)
  {
    $request->validate([
        'img' => 'required|image|mimes:webp|max:200',
    ]);
    $student_details = Student_details::findOrFail($id);

    $student_details->img = file_get_contents($request->img);
    $student_details->save();
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
