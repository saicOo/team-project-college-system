<?php

namespace App\Http\Controllers;
use App\Private_qa;
use App\Student_details;
use App\Student;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $messages = Private_qa::orderByDesc('id')->whereNotNull('private_q')->paginate(4);
      $messagesCount = Private_qa::whereNotNull('private_q')->count();
      $msgCount0 = Private_qa::where('status','0')->whereNotNull('private_q')->count();
      $msgCount1 = Private_qa::where('status','1')->whereNotNull('private_q')->count();
      $msgCount2 = Private_qa::where('status','2')->whereNotNull('private_q')->count();
        return view('messages.inbox',compact('messages','messagesCount','msgCount0','msgCount1','msgCount2'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $messages = Private_qa::findOrFail($id);
        $std_id = $messages->std_id;
        $student = Student::findOrFail($std_id);

        if($messages->status == 0){
            $messages->status = 1;
            $messages->save();
        }

        return view('messages.inbox_single', compact('messages','student'));
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
        $request->validate([
            'answer' => 'required|max:200|min:5',
        ]);
        $messages = Private_qa::findOrFail($id);
        $messages->status = 2;
        $messages->private_ans = $request->answer;
        $messages->save();
        session()->flash('done',"تم ارسال رسالتك بنجاح");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $comment_news = Private_qa::findOrFail($request->item_id)->delete();
        session()->flash('delete',"تم الحذف بنجاح");
        return redirect()->back();
    }

    public function ajaxFilter(Request $request)
    {
        if($request->ajax()){
            if($request->get('status') == "all"){
                $messages = Private_qa::orderByDesc('id')->whereNotNull('private_q')->paginate(4);
                return view('messages.ajax_inbox',compact('messages'));
            }else{
                $status = $request->get('status');
                $messages = Private_qa::orderByDesc('id')->whereNotNull('private_q')->where('status',$status)->paginate(4);
                return view('messages.ajax_inbox',compact('messages'));
            }
        }
        }
}
