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
            <br>
            {{-- 権限ごとにボタンの表示内容と遷移先TODO --}}
            @if (isset($articles))
            @foreach ($articles as $article)
            <div class="card mb-3">
                <?php $id = $article->id ?>
                <div>投稿タイトル：{{ $article->title }}</div>
                <div>投稿者コメント：{{ $article->context }}</div>
                <div>投稿カテゴリ：{{ $article->category }}</div>
                <div>参考元料理名：{{ $article->recipe_title }}</div>
                <div>レシピ作者：{{ $article->recipe_author }}</div>
                <div>レシピURL：{{ $article->recipe_referer }}</div>
                <div class="row justify-content-center">
                    <button type="submit" onclick="location.href=' {{ route('recipe.update_index',['id' => $id]) }}'"
                        　class="button">編集する</button>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
