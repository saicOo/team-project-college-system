<?php

namespace App\Http\Controllers;
use App\Alert_msgs;
use App\Private_qa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $private_qa = Private_qa::where('std_id',Auth::user()->id)->orderByDesc('created_at')->get();

       return view('messages.inbox',compact('private_qa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|max:200|min:5',
        ]);
        if(Auth::user()){
            $private_qa = new Private_qa;
            $private_qa->std_id = Auth::user()->id;
            $private_qa->private_q = $request->message;
            $private_qa->save();
            session()->flash('done',"تم ارسال رسالتك بنجاح");
        }else{
            session()->flash('messageErrore',"فشل في الارسال يجب تسجيل الاشتراك وتسجيل الدخول");

        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
