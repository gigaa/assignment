<?php

namespace App\Http\Controllers;

use App\CustomCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;
use App\Comment;
use App\Article_Comment;
use App\Tag;
use App\Article_Tag;
use Illuminate\Support\Str;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $caunt = DB::table('articles')->count();

    if($caunt != 0){
     $article=Article::orderBy('id',$_GET["order"])->paginate($_GET["paginate"]);
     return response()->json($article,200); 
     }
     else{
        return response()->json("articles table empty",200);
     } 

      if ($request->expectsJson()) {
            return new JsonResponse($errors, 400);
        }


    }
    
    // public function showdataapi($id)
    // {
    //     $article=Article::find($id);
    //     return response()->json($article,200);   
    // }
    public function showcomments($id)
    {
        $article=Article::find($id);
        // $article_comment=Article_Comment::all();
        // $article_comment=DB::table('article_comment')->get();


        if ( ! $article)
        {
        return response()->json([
        'message' => '404 Record not found',
        ], 404);
        }
        else{
        $article_comment=array();
         $article_comment = Article_Comment::where('article_id',$id)->pluck('comment_id');

        // $size=Article_Comment::where('article_id',$id)->count();
        // for ($i=0; $i < $size; $i++) { 
        //     $article_comment[$i] = Article_Comment::where('article_id',$id)->pluck('comment_id');
        // }

        
        $size=Article_Comment::where('article_id',$id)->count();
        for ($i=0; $i < $size; $i++) { 
        $comment[$i]=Comment::where('id',$article_comment[$i])->get();
        }
        // $data['links'] = Article::find($id)->links()->get();
        // foreach ($data['links'] as $key => $value) {
        // $data['links'][$key]['tags'] = DB::table('tags')->where('user_id', $user->id)->where('link_id', $value->id)->get();
        // }

        return response()->json($comment,200);
    }
        if ($request->expectsJson()) {
            return new JsonResponse($errors, 400);
        }

    }




    public function showtags()
    {
       $article_caunt = Article::orderBy('created_at','desc') ->count();
       $tag=Tag::orderBy('id','desc')->get();
       $sizetag=Tag::orderBy('id','desc')->count();

       for ($i=0; $i < $sizetag; $i++) { 
                  }
       // $tag1=Article_Tag::where();
       return response()->json($tag,200);
           if ($request->expectsJson()) {
            return new JsonResponse($errors, 400);
        }
    }



    public function articletag($id){
        $article=Tag::find($id);

        if ( ! $article)
        {
        return response()->json([
        'message' => '404 Record not found',
        ], 404);
        }
        else{

        $article_tag=array();
        $article_tag= Article_Tag::where('article_id',$id)->pluck('tag_id');
        $size=Article_Tag::where('article_id',$id)->count();
        for ($i=0; $i < $size; $i++) { 
        $tag[$i]=Article::where('id',$article_tag[$i])->get();
        }
        return response()->json($tag);
    }
            if ($request->expectsJson()) {
            return new JsonResponse($errors, 400);
        }

    }


    // public function pnginate(Collection $collection)
    // {
    //     $page=LangthAwarePaginator::resolveCurrentPage();
    //     $perPage=10;
    //     $resulte=$collection->slice(($page-1)*$perPage,$perPage)->value();
    //     $pnginated = new LangthAwarePaginator($resulte,$collection->count(),$perPage,$page,[
    //         'path'=> LangthAwarePaginator::resolveCurrentPage(),
    //     ]);
    //     $pnginated->append($request->all());
    //     return $pnginated;
    // }
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
                $article=Article::find($id);
        return response()->json($article,200);
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
