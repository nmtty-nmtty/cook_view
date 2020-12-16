@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="col-md-16">

                {{-- メッセージTODO --}}
                @if (session('flash_message'))
                <div class="flash_message bg-success text-center py-3 my-0">
                    {{ session('flash_message') }}
                </div>
                @endif

                <form class="form">
                    @csrf
                    <div class="keyword_input"><input type="search" name="search" id="search" class="search-field"
                            placeholder="料理名・食材名等" value="{{request('search')}}" autocomplete="off"></div>
                    <input type="submit" name="commit" value="レシピ検索" id="submit_button" class="button">
                </form>
            </div>
            <button type="submit" onclick="location.href=' {{ route('recipe')}}'" 　class="button">レシピを投稿する</button>
            <br>

            @if (isset($articles))
            @foreach ($articles as $article)
            <div>{{ $article->title }} ああああ</div>
            @endforeach
            @endif

            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
