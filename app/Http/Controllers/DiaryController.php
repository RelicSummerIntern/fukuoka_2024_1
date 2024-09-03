<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // 画像の保存
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image'); // アップロードされた画像を取得
            $imagePath = $image->store('images', 'public'); // 画像を保存し、そのパスを取得
        }

        // データの保存
        $diary = new Diary();

        $diary->user_id = auth()->id(); // ログインしているユーザーのIDを設定
        $diary->image_path = $imagePath;
        $diary->title = $request->title;
        $diary->comment = $request->description;
        $diary->rating = $request->rating;

        $diary->save();

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
