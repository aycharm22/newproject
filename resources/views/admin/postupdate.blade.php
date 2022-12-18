{{--copy from post.blade.php--}}

@extends('admin.master')
@section('content')
    <h2 class="text-center text-primary">Update Post</h2>
    <form action="{{url('postupdate/'.$post->id)}}" method="post"
          enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="">Post Title</label>
            <input type="text" name="post_title" value="{{$post->post_title}}" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Post Category</label>
            <select name="post_category_id" id="" class="form-control">
                <option value="{{$post->post_category_id}}">
                    {{$post->category->cat_title}}</option>
                @foreach($category as $data)
                    <option value="{{$data['id']}}">{{$data['cat_title']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Post Author</label>
            <input type="text" name="post_author" value="{{$post->post_author}}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Post Image</label>
            <img src="{{asset('images/'.$post['post_image'])}}" width="100" alt="">
            <input type="file" name="post_image" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Post Date</label>
            <input type="date" name="post_date"
                   vaule="{{$post->post_date}}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Post Content</label>
            <textarea name="post_content"  class="form-control"
                      id="editor" cols="30" rows="10">{{$post->post_content}}</textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Update" class="btn btn-primary">
        </div>
    </form>
@stop