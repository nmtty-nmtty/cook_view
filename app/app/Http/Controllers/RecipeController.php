<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Integer;
use Session;

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
        Session::put('article', $article);
        Session::put('article_id', $id);

        return view('recipe.update_index', compact('article'));
    }

    public function update_edit()
    {
        $article = Session::get('article');
        logger($article);

        // 更新用にカテゴリをバリューからキーに変換
        foreach (config('category') as $key => $score) {
            if ($article->category == $score['label']) {
                $article->category = $key;
            }
        }

        return view('recipe.update_edit', compact('article'));
    }

    public function update_confirm(Request $request)
    {
        //フォームから受け取った値を取得し加工
        $inputs = $this->confirm_requset_setting($request);
        $request->session()->put($inputs);

        return view('recipe.update_confirm', compact('inputs'));
    }

    public function delete(Request $request)
    {
        $article = (new Article)->find_Id($request->id)->delete();
        logger($article);

        $request->session()->flash('msg_success', 'レシピを削除しました');

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

    public function update()
    {
        //登録画面に入力した値を取得
        $inputs = session()->all();
        logger($inputs);
        $inputs["article"]->update([
            'title' => $inputs["title"],
            'context' => $inputs["context"],
            'category' => $inputs["category"],
            'recipe_title' => $inputs["recipe_title"],
            'recipe_author' => $inputs["recipe_author"],
            'recipe_referer' => $inputs["recipe_referer"],
        ]);

        Session::flash('msg_success', 'レシピを更新しました');

        return redirect('/top');
    }

    private function confirm_requset_setting(Request $request)
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

        return $inputs;
    }
}
