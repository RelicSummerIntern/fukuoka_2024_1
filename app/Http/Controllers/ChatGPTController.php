<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Http;

class ChatGPTController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function processImage(Request $request)
    {
        // 画像のバリデーション
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 画像を取得
        $image = $request->file('image');
        $imagePath = $image->getPathname();

        $base64Image = base64_encode(file_get_contents($imagePath));

    $response = Http::withHeaders([
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
    ]);

    $responseData = $response->json();

    if (isset($responseData['choices'][0]['message']['content'])) {
        $content = $responseData['choices'][0]['message']['content'];
        $ingredients = array_filter(explode("\n", trim($content)));
    } else {
        \Log::error('API Response Error:', $responseData);
        $ingredients = ['エラーが発生しました。もう一度お試しください。'];
    }

    return view('result', ['ingredients' => $ingredients]);
}
    

}


