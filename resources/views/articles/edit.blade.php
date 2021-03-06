@extends('layout')



@section('content')


    @section('head')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css"/>
        @stop


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
        <h1 class="heading has-text-weight-bold is-size-4">Update Article</h1>
        <form method="POST" action="/articles/{{$article->id}}">
            @csrf
            @method('PUT')

            <div class="field">
                <label class="label" for="title">
                    Title
                </label>
                <div class="control">
                    <input class="input" type="text" name="title" id="title" value="{{$article->title}}">
                </div>
            </div>

            <div class="field">
                <label class="label" for="excerpt">
                    Excerpt
                </label>
                <div class="control">
                    <textarea class="textarea" name="excerpt" id="excerpt"> {{$article->excerpt}} </textarea>
                </div>
            </div>

            <div class="field">
                <label class="label" for="body">
                    Body
                </label>
                <div class="control">
                    <textarea class="textarea" name="body" id="body"> {{$article->body}} </textarea>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>


@endsection
