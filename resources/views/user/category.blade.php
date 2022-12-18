@extends('user.master')
@section('content')

    <h1 class="page-header">
        {{$page_title}}
        <small>Laravel 2020 Intern</small>
    </h1>

    <!-- First Blog Post -->
    @foreach($post as $data)
        <h2>
            <a href="{{url('detail/'.$data['id'])}}">{{$data['post_title']}}</a>
        </h2>
        <p class="lead">
            by <a href="index.php">{{$data['post_author']}}</a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on
            {{date('F j-Y',strtotime
            ($data['post_date']))}}</p>
        <hr>
        <a href="{{url('detail/'.$data['id'])}}">
            <img class="img-responsive" src="{{asset('images/'.$data['post_image'])}}" width="800" alt="">
            <hr>
            <p>{!! substr($data['post_content'],0,100).'...' !!}</p>
            <a class="btn btn-primary" href="{{url('detail/'.$data['id'])}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        </a>
        <hr style="background: #333; height: 1px;">
        <div style="margin-left: 50%">
            {{$post->links()}}
        </div>
    @endforeach
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