<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RecipeScraper;

class RecipeController extends Controller
{
    protected $recipeScraper;

    public function __construct(RecipeScraper $recipeScraper)
    {
        $this->recipeScraper = $recipeScraper;
    }

    public function search(Request $request)
    {
        $RAKUTEN_BASE_URL = "https://recipe.rakuten.co.jp"; # 楽天レシピのURL

        // 選択された食材を取得
        $selectedIngredients = $request->input('selected_ingredients', []);

        // サービスを使用してレシピを取得
        $recipes = $this->recipeScraper->fetchRecipes($selectedIngredients);

        // フィルタリングされたレシピをビューに渡す
        return view('recipes', ['recipes' => $recipes]);
    }
}
