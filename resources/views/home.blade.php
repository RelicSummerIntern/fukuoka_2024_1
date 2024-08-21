@extends('layouts.app')

<!-- header -->
@section('header')
	@include('parts.header')
@endsection

<!-- page contents -->
@section('content')
	<h2 class="fw-bold text-xl text-gray-800 leading-tight"
		style="font-family: 'Dancing Script', cursive; font-weight:auto; margin: 4px 0 0 12px; ">
		Cook Shot
	</h2>

	<img src="{{ asset('images/home_image.jpg') }}" alt="Aplication image">

	<div class="px-40 py-24">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white-subtle overflow-hidden shadow-sm sm:rounded-lg">
				<a href="{{ route('post.index') }}"
					class="bg-warning fs-2 border-b border-gray-200 p-6 block w-full text-center
                        　 font-semibold text-gray-800 hover:bg-gray-100 text-decoration-none">
					自炊をはじめる
				</a>
			</div>
		</div>
	</div>
@endsection

{{-- Footer --}}
