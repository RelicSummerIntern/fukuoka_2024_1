@extends('layouts.app')

@section('content')
	<div class="px-40 py-24">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white-subtle overflow-hidden shadow sm:rounded-lg rounded-3">
				<a href="{{ route('diary.create') }}"
					class="bg-warning bg-opacity-75 fs-2 border-b border-gray-200 p-6 block w-full text-center
                    font-semibold text-gray-800 hover:bg-gray-100 text-decoration-none">
					新しく記録する
				</a>
			</div>
		</div>
	</div>

	<!-- 投稿の一覧を表示 -->
	<h1 class="text-center mb-4 fs-1"
		style="font-family: 'Dancing Script', cursive; color:rgb(203, 38, 20); font-weight: bold">~ Your Diary ~
	</h1>
	<div class="container">
		<hr>
		@foreach ($diaries as $diary)
			<div class="diary-item">
				<section class="left">

					<p>{{ $diary->created_at->format('Y-m-d') }}</p>

					<h3>{{ $diary->title }}</h3>

					@if ($diary->image_path)
						<img src="{{ asset('storage/' . $diary->image_path) }}" alt="{{ $diary->title }}" style="max-width: 300px;">
					@endif

					<section>
						<!-- 編集ボタン -->
						<a href="{{ route('diary.edit', $diary->id) }}" class="btn btn-primary id" id="edit">編集</a>

						<!-- 削除ボタン -->
						<form action="{{ route('diary.destroy', $diary->id) }}" method="POST" style="display:inline-block;"
							onsubmit="return confirm('本当に削除しますか？');">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger">削除</button>
						</form>
					</section>

					<hr>

				</section>

				<section class="right">
					<div class="stars">
						<p>評価</p>
						@for ($i = 1; $i <= 5; $i++)
							@if ($i <= $diary->rating)
								<span class="star">★</span> <!-- 星の塗りつぶし -->
							@else
								<span class="star" style="color: white;">★</span> <!-- 空の星 -->
							@endif
						@endfor
					</div>

					<div class="comment">
						<p>コメント</p>
						<p class="comment-box">{{ $diary->comment }}</p>
					</div>

				</section>
			</div>
		@endforeach
	</div>
@endsection

@section('styles')
	@vite('resources/css/my-posts.css')
@endsection
