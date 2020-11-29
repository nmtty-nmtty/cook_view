@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">MyPage Edit</div>
                <div class="card-body">
                    <div>
                        プロフィール画像：
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
                    <br>
                    <form action="{{ route('mypage.update',['id' => Auth::user()->id]) }}" method="POST" class="form">
                        @csrf
                        <div>
                            ユーザー名：
                            <input type="text" name="name" class="form-control" maxlength="255"
                                value="{{ old('name',Auth::user()->name) }}">
                        </div>
                        <br>
                        <div>
                            メールアドレス：
                            <input type="text" name="email" class="form-control" maxlength="255"
                                value="{{ old('email',Auth::user()->email) }}">
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <button class="btn btn-primary" type="submit">変更を確定する
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <button type="button" onclick="location.href=' {{ route('mypage')}}'"
                                　class="btn btn-primary">戻る</button>
                        </div>
                    </form>
                    <form name="updateImage" action="{{ route('mypage.update_image',['id' => Auth::user()->id]) }}"
                        method="POST" class="form" enctype="multipart/form-data">
                        <input class="" type="submit" disabled="true">
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
