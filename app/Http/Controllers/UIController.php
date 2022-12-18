<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Category;
class UIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function front(){
        $cat = Category::orderby('id','desc')->limit(4)->get();
        $post = Post::orderby('id','desc')->where('status',1)->paginate(5); //paginate->pagination (number)
        $page_title = "All Post";
        return view('user.home',compact('post','page_title','cat'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $page_title = "Detail Page";
        $cat = Category::orderby('id','desc')->limit(4)->get();
        $post_detail = Post::where('id',$id)->get();
        return view('user.detail',compact('post_detail','cat','page_title'));
    }

    public function category($id){
        $page_title ="Category Page";
        $cat = Category::orderby('id','desc')->limit(4)->get();
        $post = Post::orderby('id','desc')->where(['post_category_id'=>$id
            ,'status'=>1])->paginate(5);

        return view('user.category',compact('page_title','cat','post'));
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
        //
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
