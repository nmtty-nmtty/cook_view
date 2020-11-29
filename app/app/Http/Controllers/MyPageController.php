<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class MyPageController extends Controller
{
    public function index()
    {
        return view('mypage/index');
    }

    public function edit()
    {
        return view('mypage/edit');
    }

    public function update(Request $request, String $id)
    {
        $user = User::find($id);
        logger($user->toArray());
        logger($request->name);

        // fillable対象を全てupdate
        $user->fill($request->all())->save();
        $request->session()->flash('flash_message', '更新しました');

        // mypageのトップ画面に遷移
        return redirect('/mypage');
    }
}
