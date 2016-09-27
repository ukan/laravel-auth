<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\CommentsRequest;

use App\Comment;
use App\User;
use App\Article;
use Sentinel;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
  /*  public function __construct(){

    }*/

    public function index()
    {
        /*$datas = Article::orderBy('id', 'DESC')->paginate(3);
        return view('articles.show')->with('datas', $datas);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentsRequest $request)
    {

    	$article = Article::findOrFail(2);
    	$artic = $article->id;

        $user = Sentinel::getUser();
        dd($user);
        $tambah = new Comment();

		$tambah->user_id = $user->id;
		$tambah->article_id = $artic;        
        $tambah->comment = $request['comment'];
        
    	dd($tambah);
        $tambah->save();

        return redirect()->to('/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$tampilkan = Article::find($id);
        return view('articles.tampil')->with('tampilkan', $tampilkan);*/
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
