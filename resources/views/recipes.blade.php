@extends('layouts.app')

<!-- page contents -->
@section('content')
	<section id="service" class="container my-5" style="background-color:bisque; border-radius:2%; padding-bottom:10px;">
		<h2 class="text-center mb-4 fs-1"
			style="font-family: 'Dancing Script', cursive; color:rgb(244, 146, 18); font-weight: bold; transform: translateY(60%) ;">
			~ Recipe
			Recommendation ~
		</h2>

		<div class="container mt-5">
			@if (isset($recipes) && count($recipes) > 0)
				<?php
				$ranking = 1;
				?>
				@foreach ($recipes as $recipe)
					<div class="form-check col-12 mb-5">
						<figure class="card w-100">
							<figcaption class="card-header text-center">
								<h3 style="font-size: 14px; text-align: center; margin:0">
									<{{ $ranking }}: {{ $recipe['title'] }}>
								</h3>
							</figcaption>
							<img src="{{ $recipe['image'] }}" alt="Latest your diary" width="368px" height="368px"
								class="d-flex justify-content-center">
							<div class="card-body">
								<a href={{ $recipe['url'] }} class="about-description" style="text-decoration: underline;">レシピURL</a>
							</div>
						</figure>
					</div>
					<?php
					$ranking++;
					?>
				@endforeach
			@else
				<p> 最適なレシピが提案できませんでした。選択された食材が多かったのかもしれません。もう一度やり直してください。
				<p>
			@endif
		</div>
	</section>
@endsection

{{-- Footer --}}
