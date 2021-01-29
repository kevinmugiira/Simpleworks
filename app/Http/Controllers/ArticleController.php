<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\request('tag')) {
            $articles = Tag::where('name', \request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }
            return view('articles.index', ['articl' => $articles]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$tags = Tag::all(); //has been inlined from this
        return view('articles/create', [
            'tags' => Tag::all()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validateArticle();
        $article = new Article(\request(['title','excerpt','body']));
        $article->user_id = 6;
        $article->save();

        $article->tags()->attach(\request('tags'));
        /*
        Article::create(\request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]));
        */
        /*
        $article = new Article();

        $article->title = \request('title');
        $article->excerpt = \request('excerpt');
        $article->body = \request('body');
        $article->save();
        */

        /*
        Article::create([
            'title'=> \request('title'),
            'excerpt' => \request('excerpt'),
            'body' => \request('body')
        ]);
        */

        return redirect(route('articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $artic)
    {
        //$artic = Article::find($id);
        return view('articles.show', ['artc' => $artic]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //$article = Article::find($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Article $article)
    {
        $article->update($this->validateArticle());
        /*  2
        $article->update(\request()->validate([
           'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]));
        */

        //$article = Article::find($id);

        /*
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();
        */

        return redirect($article->path());
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

    protected function validateArticle()
    {
        return \request()->validate([
           'title' => 'required',
           'excerpt' => 'required',
           'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
}
