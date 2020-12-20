<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopController extends Controller
{
    public function index()
    {
        $articles = (new Article)->find_userId(Auth::id());
        logger($articles->toArray());

        return view('top.index', compact('articles'));
    }
}
