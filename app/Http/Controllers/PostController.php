<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post =Post::orderby('id','desc')->get();
        return view('admin.postview',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.post',compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('post_image');
        $filename =uniqid().'_'.$file->getClientOriginalName();
        $file->move(public_path().'/images/',$filename);

        $post = new Post([
            'post_title'=>$request->get('post_title'),
            'post_category_id'=>$request->get('post_category_id'),
            'post_author'=>$request->get('post_author'),
            'post_date'=>$request->get('post_date'),
            'post_content'=>$request->get('post_content'),
            'post_image'=>$filename
        ]);
        $post->save();
        return redirect('post');
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
        $category = Category::all();
        $post = Post::find($id);
        return view('admin.postupdate',compact('post','category'));
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
       $post =Post::find($id);
       if($request->file('post_image'))
       {
           unlink(public_path('/images/'.$post->post_image));

           $file = $request->file('post_image');
           $filename = uniqid() . '_' . $file->getClientOriginalName();
           $file->move(public_path() . '/images/', $filename);
           $post->post_image = $filename;
       }
        $post->post_title = $request->get('post_title');
        $post->post_author = $request->get('post_author');
        $post->post_category_id = $request->get('post_category_id');
        $post->post_date = $request->get('post_date');
        $post->post_content = $request->get('post_content');

        $post->save();
        return redirect('postview');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $img_path = public_path().'/images'.$post->post_image;
        if(file_exists($img_path)){
            unlink($img_path);
        }
        $post->delete();
        return redirect('postview');
    }

    public function poststatus($id)
    {
        $post = Post::find($id);
        if($post->status===0){
            $post->status=1;
        }else{
            $post->status=0;
        }
        $post->save();
        return redirect('postview');
    }
}
