<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Integer;

class RecipeController extends Controller
{
    public function index()
    {
        $articles = (new Article)->find_userId(Auth::id());
        logger($articles->toArray());

        return view('recipe.index', compact('articles'));
    }

    public function confirm(Request $request)
    {
        //フォームから受け取ったすべてのinputの値を取得
        $inputs = $request->all();
        $category = $request->category;

        // 登録用にカテゴリをキーからバリューに変換
        foreach (config('category') as $key => $score) {
            if ($key == $category) {
                $inputs["category"] = $score['label'];
            }
        }

        $request->session()->put($inputs);

        return view('recipe.confirm', compact('inputs'));
    }

    public function update_index($id)
    {
        $article = (new Article)->find_Id($id);
        logger($article);

        return view('recipe.update_index', compact('article'));
    }

    public function delete(Request $request)
    {
        $article = (new Article)->find_Id($request->id)->delete();
        logger($article);

        session()->flash('msg_success', 'レシピを削除しました');

        return redirect('/top');
    }

    public function create()
    {
        //登録画面に入力した値を取得
        $inputs = session()->all();
        logger($inputs);
        $article = Article::create([
            'user_id' => Auth::id(),
            'title' => $inputs["title"],
            'context' => $inputs["context"],
            'category' => $inputs["category"],
            'recipe_title' => $inputs["recipe_title"],
            'recipe_author' => $inputs["recipe_author"],
            'recipe_referer' => $inputs["recipe_referer"],
        ]);

        logger($article->toArray());

        session()->flash('msg_success', 'レシピを登録しました');

        return redirect('/top');
    }
}
