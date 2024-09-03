<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use App\Http\Requests\DiaryRequest;

class DiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('my-posts');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('diary-post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiaryRequest $request)
    {
        // バリデーション済みデータを取得
        $validatedData = $request->validated();

        // 画像の保存
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image'); // アップロードされた画像を取得
            $imagePath = $image->store('images', 'public'); // 画像を保存し、そのパスを取得
        }

        // データの保存
        try {
            $diary = new Diary();

            $diary->user_id = auth()->id(); // ログインしているユーザーのIDを設定
            $diary->image_path = $imagePath;
            $diary->title = $validatedData['title'];
            $diary->comment = $validatedData['description'];
            $diary->rating = $validatedData['rating'];

            $diary->saveOrFail();
        } catch (\Exception $e) {
            return redirect()->route('diary.create')->with('error_message', '日記の投稿に失敗しました');
        }

        // 一覧画面へリダイレクト
        return redirect()->route('diary.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Diary $diary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diary $diary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diary $diary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diary $diary)
    {
        //
    }
}
