<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Storage;
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

    public function update_image(Request $request, String $id)
    {
        $user = User::find($id);
        logger($user->toArray());
        $form = $request->all();

        $profileImage = $request->file('profile_image');
        if ($profileImage != null) {
            $form['profile_image'] = $this->saveProfileImage($profileImage, $id); // return file name
        }

        unset($form['_token']);
        unset($form['_method']);
        // プロフィール画像を更新
        $user->fill($form)->save();
        return redirect('/mypage/edit');
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

    private function saveProfileImage($image, $id)
    {
        // get instance
        $img = \Image::make($image);
        // resize
        $img->fit(100, 100, function ($constraint) {
            $constraint->upsize();
        });
        // save
        $file_name = 'profile_' . $id . '.' . $image->getClientOriginalExtension();
        $save_path = 'public/profiles/' . $file_name;
        logger($save_path);
        \Storage::put($save_path, (string) $img->encode());
        // return file name
        logger($file_name);

        return $file_name;
    }
}
