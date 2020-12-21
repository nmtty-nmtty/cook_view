@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Recipe Update_index</div>
                <div class="card-body">
                    <br>
                    @csrf
                    <div>
                        投稿タイトル：{{ $article->title }}
                    </div>
                    <div>
                        レシピ作者：{{ $article->recipe_author }}
                    </div>
                    <div>
                        参考元料理名：{{ $article->recipe_title }}
                    </div>

                    <div>
                        投稿カテゴリ：{{ $article->category }}
                    </div>

                    <br>
                    <div>
                        料理画像：
                        {{-- <img src="{{ asset('storage/profiles/'.Auth::user()->profile_image) }}" alt="プロフィール画像">
                        <form action="{{ route('mypage.update',['id' => Auth::user()->id]) }}" method="POST"
                            class="form">
                            @csrf
                            <label for="profile_image" class="btn">
                                <img src="{{ asset('storage/profiles/'.Auth::user()->profile_image) }}" id="img">
                                <input id="profile_image" type="file" name="profile_image"
                                    onchange="previewImage(this);" value="画像をアップロードする">
                                <button type="button" onclick="updateImage();"
                                    class="btn btn-primary">画像をアップロード</button>
                            </label>
                        </form> --}}
                    </div>

                    <div>
                        投稿者コメント：{{ $article->context }}
                    </div>
                    <br>
                    <div>
                        レシピURL：{{ $article->recipe_referer }}
                    </div>
                    <br>
                    <form action='{{ route('recipe.delete') }}' method='post'>
                        @csrf
                        <input type='hidden' name='id' value='{{ $article->id }}'>
                        <div class="row justify-content-center">
                            <button class="btn btn-danger" type="submit">投稿記事を削除する
                        </div>
                    </form>
                    <div class="row justify-content-center">
                        <button class="btn btn-primary" type="submit">更新内容を入力する
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <button type="button" onclick="location.href=' {{ route('top')}}'"
                            　class="btn btn-primary">更新をキャンセルする</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
</script>
