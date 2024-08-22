@extends('layouts.app')

<!-- page contents -->
@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card p-4" style="background-color: #FFF5E1; border-radius: 15px; height: 100%;">
                <form action="{{ route('recipe.index') }}" method="POST">
                    @csrf
                    <div class="row no-gutters align-items-center">
                        <!-- 食材リスト -->
                        <div class="col-12 col-md-6 mb-4 mb-md-0">
                            <div class="card bg-white p-3" style="border-radius: 10px; height: 100%;">
                                <div class="card-header bg-warning text-white text-center" style="border-radius: 10px; font-size: 2rem;">
                                    <h2>食材リスト</h2>
                                </div>
                                <div class="card-body" style="font-size: 1.5rem;">
                                    <!-- テスト用の固定食材リスト -->
                                    @php
                                    $ingredients = ['サバの切り身', '青ネギ', 'ひき肉', '豆腐', 'のり'];
                                    @endphp

                                    @if(isset($ingredients) && count($ingredients) > 0)
                                    @foreach($ingredients as $ingredient)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="{{ $ingredient }}" name="selected_ingredients[]" value="{{ $ingredient }}">
                                        <label class="form-check-label" for="{{ $ingredient }}">
                                            {{ $ingredient }}
                                        </label>
                                    </div>
                                    @endforeach
                                    @else
                                    <p>食材が見つかりませんでした。</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- 画像とボタン -->
                        <div class="col-12 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('images/icon_recipe.png') }}" alt="Cooking" class="img-fluid" style="width: 100vw; height: auto;">
                            <div class="text-center mt-4" style="width: 100%;">
                                <button type="submit" class="btn btn-warning w-100" style="font-weight: bold; color: white; font-size: 1.75rem; padding: 20px;">献立を見る!</button>
                            </div>
                            <div class="text-center mt-2" style="width: 100%;">
                                <a href="{{ route('home') }}" class="btn btn-warning w-100" style="font-weight: bold; color: white; font-size: 1.75rem; padding: 20px;">戻る</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection