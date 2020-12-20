<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    public function find_userId($user_id)
    {
        return Article::where('user_id', $user_id)->get();
    }

    public function find_Id($id)
    {
        return Article::find($id);
    }
}
