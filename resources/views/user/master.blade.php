{{--copy from cms-template index.html--}}
@include('user.user_layout.header')
@include('user.user_layout.nav')
<!-- Navigation -->


<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            @yield('content')
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4" style="position: sticky; top:70px;">

@include('user.user_layout.sidebar')

        </div>

    </div>
    <!-- /.row -->

    <hr>

    <!--footer-->
@include('user.user_layout.footer')