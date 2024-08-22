<?php

namespace App\Services;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\DomCrawler\Crawler;

class RecipeScraper
{
    public function createSearchRecipesUrl($ingredients)
    {
        $query = implode(' ', $ingredients);
        return "https://recipe.rakuten.co.jp/search/" . urlencode($query);
    }

    public function fetchRecipes($ingredients)
    {
        $client = new HttpBrowser(HttpClient::create(['timeout' => 60]));
        $url = $this->createSearchRecipesUrl($ingredients);
        $crawler = $client->request('GET', $url);

        $recipes = [];

        $crawler->filter('.recipe_ranking__item')->each(function (Crawler $node) use (&$recipes) {
            $image = $node->filter(".recipe_ranking__item img")->attr('src');
            $title = $node->filter('.recipe_ranking__recipe_title')->text();
            $url = $node->filter('.recipe_ranking__item a')->attr('href');

            $fullUrl = $url ? 'https://recipe.rakuten.co.jp' . $url : null;

            $recipe = [
                'url' => $fullUrl,
                'image' => $image,
                'title' => $title,
            ];

            if ($this->validateRecipe($recipe)) {
                $recipes[] = $recipe;
            }
        });

        return $recipes;
    }

    private function validateRecipe($recipe)
    {
        return isset($recipe['url'], $recipe['image'], $recipe['title']);
    }
}
