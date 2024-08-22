@extends('layouts.app')

<!-- title -->
@section('title')
	Cook Shot
@endsection

<!-- page contents -->
@section('content')
	<img src="{{ asset('images/home_image.jpg') }}" alt="Aplication image">

	<div class="px-40 py-24">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white-subtle overflow-hidden shadow sm:rounded-lg rounded-3">
				<a href="{{ route('post.index') }}"
					class="bg-warning bg-opacity-75 fs-2 border-b border-gray-200 p-6 block w-full text-center
                        　 font-semibold text-gray-800 hover:bg-gray-100 text-decoration-none">
					自炊をはじめる
				</a>
			</div>
		</div>
	</div>

	<div class="container mt-5">
		<div class="d-flex justify-content-center">
			<figure class="card w-25">
				<figcaption class="card-header text-center">
					<h2>最新の日記</h2>
				</figcaption>
				<img src="{{ asset('images/home_image.jpg') }}" alt="Latest your diary" width="100px" height="100px">
				<div class="card-body">
					<p class="about-description"> ひとこと </p>
				</div>
			</figure>
		</div>
	</div>
@endsection

{{-- Footer --}}
