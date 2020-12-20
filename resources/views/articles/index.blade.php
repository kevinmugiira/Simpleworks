@extends('layout')



@section('content')

    <div id="header-wrapper">
        <div id="header" class="container">
            <div id="logo">
                <h1><a href="#">SimpleWork</a></h1>
            </div>
            <div id="menu">
                <ul>
                    <li><a href="/" accesskey="1" title="">Homepage</a></li>
                    <li><a href="#" accesskey="2" title="">Our Clients</a></li>
                    <li class="#"><a href="/about" accesskey="3" title="">About Us</a></li>
                    <li class="current_page_item"><a href="/articles" accesskey="4" title="">Articles</a></li>
                    <li><a href="/contact" accesskey="5" title="">Contact Us</a></li>
                </ul>
            </div>
        </div>

    </div>

    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                @foreach($articl as $arti)
                <div class="title">
                    <h2><a href="{{ $articles->path() }}">{{$arti->title}}</a></h2>
                </div>
                <p><img src="/assets/images/banner.jpg" alt="" class="image image-full" /> </p>
                <p>{{$arti->excerpt}}</p>

                @endforeach
            </div>

        </div>
    </div>

@stop
