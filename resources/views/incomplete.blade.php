@extends('layouts.app')

@section('content')
	<div class="container d-flex justify-content-center align-items-center flex-column text-center" style="min-height: 50vh;">
		<h1 class="display-4 mb-3">このページは現在開発中です</h1>
		<img src="{{ asset('images/icon_development.png') }}" alt="Development Icon" class="img-fluid mb-2 mx-auto"
			style="max-width: 400px;">
		<p class="lead mb-3">最高の体験をお届けするために努力しています。後ほど再度ご確認ください。</p>
		<a href="{{ url('/') }}" class="btn btn-warning btn-lg">戻る</a>
	</div>

	<style>
		.btn-warning {
			background-color: #f7c600;
			color: #fff;
			border: none;
			border-radius: 8px;
			font-weight: bold;
		}
	</style>
@endsection
