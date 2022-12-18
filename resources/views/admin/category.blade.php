@extends('admin.master')
@section('content')
    <div class="col-md-6">
    <form action="{{url('category')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
        <label for="">Add Category</label>
        <input type="text" name="cat_title" class="form-control">
        </div>

        <div class="form-group">
            <input type="submit"  name="add_category" value="Add Category" class="btn btn-primary">
        </div>
    </form>
        <hr>
{{--@php @endphp--}}
        @if(@$editform=="edit")
            <form action="{{url('category/'.$edit->id)}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="">Update Category</label>
                    <input type="text" name="cat_title"
                    value="{{$edit->cat_title}}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="Submit" value="Update Category" class=" btn btn-primary">
                </div>
            </form>
            @endif
    </div>
    <div class="col-md-6">
        <table class="table table-bordered table-hover">
            <tr>
                <th class="text-center">No:</th>
                <th class="text-center">Category</th>
                <th class="text-center">Status</th>
                <th class="text-center">Update</th>
                <th class="text-center">Delete</th>
            </tr>
            @foreach ($category as $i=>$val)


            <tr>
                <td class="text-center">{{++$i}}</td>
                <td class="text-center">{{$val['cat_title']}}</td>
                <td class="text-center">
                    @if($val['status']===0)
                        <a href="{{url('update_status/'.$val['id'])}}" class="btn btn-primary">Change Public</a>
                        @else
                        <a href="{{url('update_status/'.$val['id'])}}" class="btn btn-warning">Change Hide</a>
                        @endif
                </td>
                <td>
                    <a href="{{url('edit_category/'.$val['id'])}}"  class="btn btn-info">Update</a></td>
                <td><a href="{{url('delete_category/'.$val['id'])}}" onclick="return confirm('are u sure!')" class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach
        </table>
    </div>
    @stop