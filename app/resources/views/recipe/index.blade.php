@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Recipe Create</div>
                <div class="card-body">
                    <br>
                    <form action="{{ route('mypage.update',['id' => Auth::user()->id]) }}" method="POST" class="form">
                        @csrf
                        <div>
                            料理名：
                            <input type="text" name="name" class="form-control" maxlength="255"
                                value="{{ old('name',Auth::user()->name) }}">
                        </div>
                        <div>
                            メールアドレス：
                            <input type="text" name="email" class="form-control" maxlength="255"
                                value="{{ old('email',Auth::user()->email) }}">
                        </div>
                        <br>
                        <div>
                            料理画像：
                            <img src="{{ asset('storage/profiles/'.Auth::user()->profile_image) }}" alt="プロフィール画像">
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
                            </form>
                        </div>

                        <div>
                            投稿者コメント：
                            <input type="text" name="email" class="form-control" maxlength="255"
                                value="{{ old('email',Auth::user()->email) }}">
                        </div>

                        <div>
                            レシピURL：
                            <input type="text" name="email" class="form-control" maxlength="255"
                                value="{{ old('email',Auth::user()->email) }}">
                        </div>
                        <div class="row justify-content-center">
                            <button class="btn btn-primary" type="submit">投稿内容を確認する
                        </div>
                        <div class="row justify-content-center">
                            <button class="btn btn-primary" type="submit">投稿をキャンセルする
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <button type="button" onclick="location.href=' {{ route('mypage')}}'"
                                　class="btn btn-primary">戻る</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function updateImage(){
        document.updateImage.submit();
    }

    function previewImage(obj)
    {
      var fileReader = new FileReader();
      fileReader.onload = (function() {
        document.getElementById('img').src = fileReader.result;
      });
      fileReader.readAsDataURL(obj.files[0]);
    }
</script>
