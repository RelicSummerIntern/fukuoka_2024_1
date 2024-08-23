<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatGPTController extends Controller
{
    public function showUploadForm()
    {
        return view('photo-reader');
    }

    public function processImage(Request $request)
    {
        // Base64データが適切であるか確認
        $request->validate([
            'image_data' => 'required|string',
        ]);

        // Base64エンコードされた画像データを取得
        $base64Image = $request->input('image_data');

        // 画像データの形式をチェック
        if (strpos($base64Image, 'data:image') !== 0) {
            throw new \Exception('Invalid image data format.');
        }

        // Base64データからプレフィックスを取り除き、純粋な画像データにする
        $base64Image = preg_replace('/^data:image\/\w+;base64,/', '', $base64Image);

        return $base64Image;
    }

    private function sendChatGPTRequest(string $base64Image)
    {
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . env('CHATGPT_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4o',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => [
                        ['type' => 'text', 'text' => 'What ingredients are shown in this image? Please output "only" the names of the ingredients in Japanese.'],
                        ['type' => 'image_url', 'image_url' => ['url' => "data:image/jpeg;base64,{$base64Image}"]]
                    ]
                ]
            ],
            'max_tokens' => 300
        ])->json();
    }

    public function getIngredientsList(Request $request)
    {
        // 画像処理
        $base64Image = $this->processImage($request);

        // ChatGPT APIにリクエストを送信
        $responseData = $this->sendChatGPTRequest($base64Image);

        // レスポンスデータを処理してresultビューに渡す
        if (isset($responseData['choices'][0]['message']['content'])) {
            $content = $responseData['choices'][0]['message']['content'];
            $ingredients = array_filter(explode("\n", trim($content)));
        } else {
            \Log::error('API Response Error:', $responseData);
            $ingredients = ['エラーが発生しました。もう一度お試しください。'];
        }

        return view('food-configuration', ['ingredients' => $ingredients]);
    }
}
