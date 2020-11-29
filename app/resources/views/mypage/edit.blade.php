@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">MyPage Edit</div>
                <?php $user = Auth::user() ?>
                <form action="{{ route('mypage.update',['id' => $user->id]) }}" method="POST" class="form">
                    @csrf
                    <div class="card-body">
                        <div>
                            プロフィール画像
                        </div>
                        <br>
                        <div>
                            ユーザー名：
                            <input type="text" name="name" class="form-control" maxlength="255"
                                value="{{ old('name',$user->name) }}">
                        </div>
                        <br>
                        <div>
                            メールアドレス：
                            <input type="text" name="email" class="form-control" maxlength="255"
                                value="{{ old('email',$user->email) }}">
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <button class="btn btn-primary" type="submit">変更を確定する
                        </div>

                        <div class="row justify-content-center">
                            <button type="button" onclick="location.href=' {{ route('todo.home')}}'"
                                　class="btn btn-primary">戻る</button>
                        </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
