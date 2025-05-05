@extends('layouts.app')

@section('title')
商品詳細画面
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/products.css')}}">
@endsection

@section('content')
<div class="products-content">
    <div class="products-pass">
        <a href="/products" class="products-index">商品一覧</a>
        <p class="products-name">> {{$product->name}}</p>
    </div>
    <form action="" class="products-form">
        @csrf
        <div class="products-detail">
            <div class="products-detail-img-file">
                <div class="products-detail-img">
                    <img src="{{asset('storage/' . $product->image)}}" alt="{{$product->name}}の画像">
                </div>
                <div class="products-detail-img-button">
                    <button class="products-detail-img-button-select">
                        ファイルを選択
                    </button>
                    <p class="product-detail-img-file-name"></p>
                </div>
            </div>
            <div class="products-detail-input">
                <p class="products-input-title">商品名</p>
                <input type="text" class="products-detail-input-item" value="{{old('name', $product->name)}}" placeholder="商品名を入力">
                <p class="products-input-title">値段</p>
                <input type="text" class="products-detail-input-item" value="{{old('price', $product->price)}}" placeholder="値段を入力">
                <p class="products-input-title">季節</p>
                <div class="products-detail-input-season">
                    <label class="products-detail-input-item-label" for="spring">
                        <input type="checkbox" class="products-detail-input-season-item" id="spring" name="season[name]" value="春">
                        春
                    </label>
                    <label class="products-detail-input-item-label" for="summer">
                        <input type="checkbox" class="products-detail-input-season-item" id="summer" name="season[name]" value="夏">
                        夏
                    </label>
                    <label class="products-detail-input-item-label" for="fall">
                        <input type="checkbox" class="products-detail-input-season-item" id="fall" name="season[name]" value="秋">
                        秋
                    </label>
                    <label class="products-detail-input-item-label" for="winter">
                        <input type="checkbox" class="products-detail-input-season-item" id="winter" name="season[name]" value="冬">
                        冬
                    </label>
                </div>
            </div>
        </div>
        <div class="products-description">
            <p class="products-input-title">商品説明</p>
            <textarea class="products-description-input" placeholder="商品の説明を入力">{{old('description', $product->description)}}</textarea>
        </div>
        <div class="products-form-button">
            <div class="products-form-button-back">
                <a href="/products" class="products-form-button-back-item">戻る</a>
            </div>
            <div class="products-form-button-update">
                <button class="products-form-button-update-submit">変更を保存</button>
            </div>
            <div class="products-form-button-delete">
                <button class="products-form-button-delete-submit">
                🗑️                    
                </button>
            </div>
        </div>
    </form>
</div>
@endsection