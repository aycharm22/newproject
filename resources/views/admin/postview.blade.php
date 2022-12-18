@extends('admin.master')
@section('content')
    <div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-hover">
            <tr>
                <th>No:</th>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Image</th>
                <th>Date</th>
                <th>Content</th>
                <th>Status</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            @foreach($post as $i=>$val)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$val['post_title']}}</td>
                <td>{{$val['post_author']}}</td>
                <td>{{$val['category']['cat_title']}}</td>
                {{--//connect with post.php--}}

                <td><img src="{{asset('images/'.$val['post_image'])}}"
                         width="100" alt=""></td>
                <td>{{$val['post_date']}}</td>
                <td>{!! $val['post_content'] !!}</td>
                {{--!-> to change ckeditor words--}}
                <td>
                    @if($val['status']===0)
                        <a href="{{url('poststatus/'.$val['id'])}}" class="btn btn-success">Change Public</a>
                    @else
                        <a href="{{url('poststatus/'.$val['id'])}}" class="btn btn-info">Change Hide</a>
                    @endif
                </td>
                <td><a href="{{url('update/'.$val['id'])}}" class="btn btn-warning">Update</a></td>
                <td><a href="{{url('postdelete/'.$val['id'])}}"
                       onclick="return confirm('Are u sure baby?')" class="btn btn-danger">Delete</a></td>
            </tr>
                @endforeach
        </table>
    </div>
    </div>
    @stop