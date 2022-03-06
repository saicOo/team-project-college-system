<?php

namespace App\Http\Controllers;

use App\News;
use App\Comment_news;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderByDesc('id')->paginate(3);
        $newsSide = News::orderByDesc('id')->limit(3)->get();

        if($news->count() > 0){
            foreach ($news as $item) {
                $comment_news_count[] = Comment_news::where('news_id',$item->id)->get()->count();
            }
        }else{
                  $comment_news_count= 0;
        }


         return view('blog.blogs',compact('news','comment_news_count','newsSide'));
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
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        $comment_news = Comment_news::where('news_id',$id)->get();
        $comment_news_count = Comment_news::where('news_id',$id)->get()->count();
        $newsSide = News::orderByDesc('id')->limit(3)->get();
        return view('blog.single_blog',compact('news','comment_news','comment_news_count','newsSide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment_news = new Comment_news;
        $comment_news->std_id = Auth::user()->id;
        $comment_news->news_id = $id;
        $comment_news->comment = $request->comment;
        $comment_news->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment_news = Comment_news:: findOrFail($id)->delete();

        return redirect()->back();
    }
    public function search(Request $request)
    {
        if($request->search != ''){
            $search = $request->search;
            $news = News::where('text','like','%'.$search.'%')->paginate(3);
            $newsSide = News::orderByDesc('id')->limit(3)->get();
            $newsSide = News::orderByDesc('id')->limit(3)->get();
            foreach ($news as $item) {
                $comment_news_count[] = Comment_news::where('news_id',$item->id)->get()->count();
            }
            if($news->count() != 0){

                return view('blog.blogs',compact('news','comment_news_count','newsSide'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
        }
}
