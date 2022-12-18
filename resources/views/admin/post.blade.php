@extends('admin.master')
@section('content')
    <h2 class="text-center text-primary">Upload Post</h2>
    <form action="{{url('postcreate')}}" method="post"
    enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="">Post Title</label>
            <input type="text" name="post_title" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Post Category</label>
            <select name="post_category_id" id="" class="form-control">
                @foreach($category as $data)
                <option value="{{$data['id']}}">{{$data['cat_title']}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Post Author</label>
            <input type="text" name="post_author" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Post Image</label>
            <input type="file" name="post_image" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Post Date</label>
            <input type="date" name="post_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Post Content</label>
            <textarea name="post_content"  class="form-control"
                      id="editor" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Upload" class="btn btn-primary">
        </div>
    </form>
@stop