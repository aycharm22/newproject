{{--copy from home.blade.php--}}
@extends('user.master')
@section('content')

    <h1 class="page-header">
        {{$page_title}}
        <small>Laravel 2020 Intern</small>
    </h1>

    <!-- First Blog Post -->
    <h2>
            <a href="{{url('detail/'.$post_detail[0]['id'])}}">{{$post_detail[0]['post_title']}}</a>
        </h2>
        <p class="lead">
            by <a href="index.php">{{$post_detail[0]['post_author']}}</a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on
            {{date('F j-Y',strtotime
            ($post_detail[0]['post_date']))}}</p>
        <hr>
        <a href="{{url('detail/'.$post_detail[0]['id'])}}">
            <img class="img-responsive" src="{{asset('images/'.$post_detail[0]['post_image'])}}" width="800" alt="">
            <hr>
            <p>{!!$post_detail[0]['post_content']!!}</p>
            <a href="{{url('detail/'.$post_detail[0]['id'])}}"></a>
        </a>
        <hr>
        <div style="margin-left: 50%">

        </div>

    <!-- Pager -->
    <ul class="pager">
        <li class="previous">
            <a href="#">&larr; Older</a>
        </li>
        <li class="next">
            <a href="#">Newer &rarr;</a>
        </li>
    </ul>

@endsection