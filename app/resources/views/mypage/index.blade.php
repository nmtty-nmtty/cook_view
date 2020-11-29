@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">MyPage</div>
                @if (session('flash_message'))
                <div class="flash_message bg-success text-center py-3 my-0">
                    {{ session('flash_message') }}
                </div>
                @endif
                <div class="card-body">
                    <div>
                        プロフィール画像：
                        <img src="{{ asset('storage/profiles/'.Auth::user()->profile_image) }}" alt="プロフィール画像">
                    </div>
                    <div>
                        ユーザー名：{{ Auth::user()->name }}
                    </div>
                    <div>
                        メールアドレス：{{ Auth::user()->email }}
                    </div>
                    <div>
                        フォロー数：1
                    </div>
                    <div>
                        フォロワー数：1
                    </div>
                    <div>
                        Good数：
                    </div>
                    <div class="row justify-content-center">
                        <a class="btn btn-primary" href='{{ route('mypage.edit')}}'>ユーザー情報を変更する
                        </a>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <button type="button" onclick="location.href=' {{ route('top')}}'"
                            　class="btn btn-primary">戻る</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
