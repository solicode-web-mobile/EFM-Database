<?php

namespace App\Services;

use App\Models\Article;

class ArticleService
{
    public function getArticlesWithRelations()
    {
        return Article::with(['user', 'categories', 'comments'])->get();
    }

    public function incrementArticleViews(Article $article)
    {
        return $article->increment('views');
    }

    public function incrementCommentViews(Article $article)
    {
        return $article->comments()->increment('views');
    }

    public function updateArticleCategories(Article $article, array $categoryIds)
    {
        return $article->categories()->sync($categoryIds);
    }

    public function addPopularArticles($articles)
    {
        foreach ($articles as $article) {
            $categories = $article->categories;

            if ($article->views > 10 && !$categories->contains('name', 'Popular')) {
                $categories->push((object) ['name' => 'Popular']);
            }

            $article->setRelation('categories', $categories);
        }

        return $articles;
    }

    public function addMoreThanAverageArticles($articles)
    {
        $averageViews = $articles->avg('views');

        foreach ($articles as $article) {
            $categories = $article->categories;

            if ($article->views > $averageViews && !$categories->contains('name', 'MoreThanAverage')) {
                $categories->push((object) ['name' => 'MoreThanAverage']);
            }

            $article->setRelation('categories', $categories);
        }

        return $articles;
    }
}
