<?php

namespace App\Http\Controllers;

use App\News;
use App\Comment_news;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::orderByDesc('id')->paginate(4);


        if($news->count() > 0){
            foreach ($news as $item) {
                $comment_news_count[] = Comment_news::where('news_id',$item->id)->get()->count();
            }
        }else{
                  $comment_news_count= 0;
        }


         return view('news.news',compact('news','comment_news_count'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|max:500|min:10',
        ]);
        $news = new News;
        $news->text = $request->text;
        $news->admin_id = Auth::user()->id;
        $news->save();
        session()->flash('done',"تم اضافة المقالة بنجاح");
        return redirect()->back();

    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        $comment_news = Comment_news::where('news_id',$id)->get();
        $comment_news_count = Comment_news::where('news_id',$id)->get()->count();
        return view('news.single_news',compact('news','comment_news','comment_news_count'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|max:150|min:2',
        ]);
        $comment_news = new Comment_news;
        $comment_news->admin_id = Auth::user()->id;
        $comment_news->news_id = $id;
        $comment_news->comment = $request->comment;
        $comment_news->save();
        session()->flash('done',"تم اضافة التعليق بنجاح");
        return redirect()->back();
    }

    // delete news
    public function destroy($id)
    {
        $news = News:: findOrFail($id)->delete();
        session()->flash('delete',"تم الحذف بنجاح");
        return redirect()->Route('news.index');
    }
    // delete comment
    public function destroyComment($id)
    {
        $comment_news = Comment_news:: findOrFail($id)->delete();
        session()->flash('delete',"تم الحذف بنجاح");
        return redirect()->back();
    }

    // Search by news content
        public function ajax_show(Request $request)
    {
        if($request->ajax()){
            $search = $request->get('search');
            $search = str_replace(" ","%",$search);
            $news = News::orderByDesc('id')->where('text','like','%'.$search.'%')->paginate(4);
            if($news->count() > 0){
                foreach ($news as $item) {
                    $comment_news_count[] = Comment_news::where('news_id',$item->id)->get()->count();
                }
            }else{
                      $comment_news_count= 0;
            }
            return view('news.ajax_news',compact('news','comment_news_count'));
        }
    }
}
