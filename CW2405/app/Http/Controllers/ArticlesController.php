<?php

namespace App\Http\Controllers;

use App\Models\Article;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('Article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('Article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path = null;
        $file = $request->file("image");
        if(isset($file)){
            $path = str_replace("public\\","",Storage::putFile("public\images", $file));
        }

        $article = new Article();

        $article->summary = $request->get('summary');
        $article->short_description = $request->get('short_description');
        $article->full_text = $request->get('full_text');
        $article->image = $path;
        $article->created_at = new DateTime();
        $article->updated_at = new DateTime();

        $article->save();
        return redirect('articles');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view ('Article.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view ('Article.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        
        $article->summary = $request->get('summary');
        $article->short_description = $request->get('short_description');
        $article->full_text = $request->get('full_text');
        $article->updated_at = new DateTime();

        $article->save();
        return redirect('articles');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('articles');
    }
}
