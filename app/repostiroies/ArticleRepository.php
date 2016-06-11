<?php
/**
 * Created by PhpStorm.
 * User: GURU
 * Date: 6/11/2016
 * Time: 8:40 AM
 */

namespace App;


class ArticleRepository
{

    public function add(Article $article)
    {
        $article->save();
    }

    public function remove(Article $article)
    {
        $article->delete();
    }

    public function edit(Article $article, array $data)
    {
        $article->update($data);
        return $article;
    }

    public function all()
    {
        return Article::all();
    }
}