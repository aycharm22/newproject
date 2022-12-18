<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getallcategory()
    {
        $category = Category::all();
        //return $category;
        return json_encode($category);
    }

    public function insertcategory(Request $request)
    {
        $cat_title = $request->get('cat_title');
        Category::create(['cat_title' => $cat_title]);
        return json_encode('Successfully');
    }

    public function editcategory($id)
    {
        $cat = Category::find($id);
        return json_encode($cat);
    }

    public function updatecategory(Request $request, $id)
    {
        $update_category = $request->get('update_category');
        Category::findOrFail($id)->update(['cat_title' => $update_category]);
        return json_encode("Sucessfully Update");
    }

    public function deletecategory($id)
    {
        Category::find($id)->delete();
        return json_encode('Successfully deleted');
    }
    //------------------------------------------------------------------

    //post
    public function getallpost()
    {
        $post = Post::all();
        //return $post;
        return json_encode($post);
    }

    public function insertpost(Request $request)
    {
        $file = $request->file('post_image');
        $filename = uniqid() . '_' . $file->getClientOriginalName();
        $file->move(public_path() . '/images/', $filename);
        $post = new Post([
            'post_title' => $request->get('post_title'),
            'post_category_id' => $request->get('post_category_id'),
            'post_author' => $request->get('post_author'),
            'post_date' => $request->get('post_date'),
            'post_content' => $request->get('post_content'),
            'post_image' => $filename
        ]);
        $post->save();
        return json_encode('Successfully Inserted');

    }

    public function editpost($id)
    {
        $post = Post::find($id);
        return json_encode($post);

    }
    public function updatepost(Request $request,$id){
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
        return json_encode('Successfully updated');
    }
    public function deletepost($id){
        $post = Post::find($id);
        $img_path = public_path().'/images'.$post->post_image;
        if(file_exists($img_path)){
            unlink($img_path);
        }
        $post->delete();
        return json_encode('Successfully deleted');
    }
}
