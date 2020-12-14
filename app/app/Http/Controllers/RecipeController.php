<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        return view('recipe/index');
    }

    public function confirm(Request $request)
    {
        //フォームから受け取ったすべてのinputの値を取得
        $inputs = $request->all();
        $category = $request->category;

        foreach (config('category') as $key => $score) {
            if ($key == $category) {
                $inputs["category"] = $score['label'];
            }
        }

        // ログイン後トップ画面に遷移
        return view('recipe.confirm', compact('inputs'));
    }

    public function create(Request $request)
    {
        $article = Article::create([
            'user_id' => $user_id,
            'title' => $request->title,
            'context' => $request->context,
            'category' => $request->category,
            'recipe_title' => $request->recipe_title,
            'recipe_author' => $request->recipe_author,
            'recipe_referer' => $request->recipe_referer,
        ]);

        logger($article->toArray());

        // fillable対象を全てupdate
        $request->session()->flash('flash_message', '登録しました');

        // ログイン後トップ画面に遷移
        return redirect('/top');
    }
}
