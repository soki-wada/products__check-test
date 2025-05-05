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
        <form action="" class="register-form">
            @csrf
            <p class="register-form-input-title">商品名 <span>必須</span></p>
            <input type="text" class="register-form-input" placeholder="商品名を入力" value="{{old('name')}}">
            <p class="register-form-input-title">値段 <span>必須</span></p>
            <input type="text" class="register-form-input" placeholder="値段を入力" value="{{old('price')}}">
            <p class="register-form-input-title">商品画像 <span>必須</span></p>
            <input type="file" class="register-form-input-file">
            <p class="register-form-input-title">季節 <span>必須</span></p>
            <div class="register-form-season">
                <label class="register-form-input-label" for="spring">
                    <input type="checkbox" class="register-form-input-season" id="spring" name="season[name]" value="春">
                    春
                </label>
                <label class="register-form-input-label" for="summer">
                    <input type="checkbox" class="register-form-input-season" id="summer" name="season[name]" value="夏">
                    夏
                </label>
                <label class="register-form-input-label" for="fall">
                    <input type="checkbox" class="register-form-input-season" id="fall" name="season[name]" value="秋">
                    秋
                </label>
                <label class="register-form-input-label" for="winter">
                    <input type="checkbox" class="register-form-input-season" id="winter" name="season[name]" value="冬">
                    冬
                </label>
            </div>
            <p class="register-form-input-title">商品説明 <span>必須</span></p>
            <textarea class="register-form-input-description" placeholder="商品の説明を入力">{{old('description')}}</textarea>
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