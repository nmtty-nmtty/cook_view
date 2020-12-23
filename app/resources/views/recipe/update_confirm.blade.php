@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Recipe Update_confirm</div>
                <div class="card-body">
                    <br>
                    <form action="{{ route('recipe.update') }}" method="POST" class="form">
                        @csrf
                        <div>
                            投稿タイトル：{{ $inputs["title"] }}
                        </div>
                        <div>
                            レシピ作者：{{ $inputs["recipe_author"] }}
                        </div>
                        <div>
                            参考元料理名：{{ $inputs["recipe_title"] }}
                        </div>

                        <div>
                            投稿カテゴリ：{{ $inputs["category"] }}
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
                            投稿者コメント：{{ $inputs["context"] }}
                        </div>
                        <br>
                        <div>
                            レシピURL：{{ $inputs["recipe_referer"] }}
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <button class="btn btn-primary" type="submit">投稿内容を更新する
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <button type="button" onclick="location.href=' {{ route('recipe.update_edit')}}'"
                                　class="btn btn-primary">編集画面に戻る</button>
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <button type="button" onclick="location.href=' {{ route('top')}}'"
                                　class="btn btn-primary">更新をキャンセルする</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
</script>
