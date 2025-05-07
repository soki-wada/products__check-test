@extends('layouts.app')

@section('title')
商品登録画面
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('content')
<div class="register-content">
    <div class="section-title">
        <h2>商品登録</h2>
    </div>
    <div class="register-form-wrapper">
        <form action="/products/register" class="register-form" method="post" enctype="multipart/form-data">
            @csrf
            <p class="register-form-input-title">商品名 <span>必須</span></p>
            <input type="text" class="register-form-input" placeholder="商品名を入力" value="{{old('name')}}" name="name">
            @error('name')
            <p class="error-message">{{ $message }}</p>
            @enderror
            <p class="register-form-input-title">値段 <span>必須</span></p>
            <input type="text" class="register-form-input" placeholder="値段を入力" value="{{old('price')}}" name="price">
            @error('price')
            <p class="error-message">{{ $message }}</p>
            @enderror
            <p class="register-form-input-title">商品画像 <span>必須</span></p>
            <input type="file" class="register-form-input-file" name="image">
            @error('image')
            <p class="error-message">{{ $message }}</p>
            @enderror
            <p class="register-form-input-title">季節 <span>必須</span></p>
            <div class="register-form-season">
                @foreach($seasons as $season)
                <label class="register-form-input-label" for="{{$season->id}}">
                    <input type="checkbox" class="register-form-input-season" id="{{$season->id}}" name="seasons[]" value="{{$season->id}}">
                    {{$season->name}}
                </label>
                @endforeach
            </div>
            @error('seasons')
            <p class="error-message">{{ $message }}</p>
            @enderror
            <p class="register-form-input-title">商品説明 <span>必須</span></p>
            <textarea class="register-form-input-description" placeholder="商品の説明を入力" name="description">{{old('description')}}</textarea>
            @error('description')
            <p class="error-message">{{ $message }}</p>
            @enderror
            <div class="register-form-button">
                <div class="register-form-button-back">
                    <a href="/products" class="register-form-button-back-item">戻る</a>
                </div>
                <div class="register-form-button-create">
                    <button class="register-form-button-create-submit">登録</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection