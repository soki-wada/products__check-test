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
    <form action="/products/{{$product->id}}/update" class="products-form" enctype="multipart/form-data" method="post">
        @csrf
        @method('patch')
        <input type="hidden" name="id" value="{{$product->id}}">
        <div class="products-detail">
            <div class="products-detail-img-file">
                <div class="products-detail-img">
                    <img src="{{asset('storage/images/' . $product->image)}}" alt="{{$product->name}}の画像">
                </div>
                <div class="products-detail-img-button">
                    <input type="file" class="products-detail-img-button-select" name="image">
                </div>
                @error('image')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="products-detail-input">
                <p class="products-input-title">商品名</p>
                <input type="text" class="products-detail-input-item" value="{{old('name', $product->name)}}" placeholder="商品名を入力" name="name">
                @error('name')
                <p class="error-message">{{ $message }}</p>
                @enderror
                <p class="products-input-title">値段</p>
                <input type="text" class="products-detail-input-item" value="{{old('price', $product->price)}}" placeholder="値段を入力" name="price">
                @error('price')
                <p class="error-message">{{ $message }}</p>
                @enderror
                <p class="products-input-title">季節</p>
                <div class="products-detail-input-season">
                    @foreach($seasons as $season)
                    <label class="products-detail-input-item-label" for="{{$season->id}}">
                        <input type="checkbox" class="products-detail-input-season-item" id="{{$season->id}}" name="seasons[]" value="{{$season->id}}" {{ in_array($season->id, old('seasons', $product->seasons->pluck('id')->toArray())) ? 'checked' : '' }}>
                        {{$season->name}}
                    </label>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="products-description">
            <p class="products-input-title">商品説明</p>
            <textarea class="products-description-input" placeholder="商品の説明を入力" name="description">{{old('description', $product->description)}}</textarea>
            @error('description')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div class="products-form-button">
            <div class="products-form-button-back">
                <a href="/products" class="products-form-button-back-item">戻る</a>
            </div>
            <div class="products-form-button-update">
                <button class="products-form-button-update-submit">変更を保存</button>
            </div>
        </div>
    </form>
    <form action="/products/{{$product->id}}/delete" class="products-form-delete" method="post">
        @csrf
        @method('delete')
        <input type="hidden" name="id" value="{{$product->id}}">
        <div class="products-form-button-delete">
            <button class="products-form-button-delete-submit">
                <img src="{{asset('images/icons/delete-icon.png')}}">
            </button>
        </div>
    </form>
</div>
@endsection