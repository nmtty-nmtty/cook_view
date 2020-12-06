@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="col-md-16">
                <form class="form">
                    @csrf
                    <div class="keyword_input"><input type="search" name="search" id="search" class="search-field"
                            placeholder="料理名・食材名等" value="{{request('search')}}" autocomplete="off"></div>
                    <input type="submit" name="commit" value="レシピ検索" id="submit_button" class="button">
                </form>
            </div>
            <button type="submit" onclick="location.href=' {{ route('recipe')}}'" 　class="button">レシピを投稿する</button>
            <br>
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
