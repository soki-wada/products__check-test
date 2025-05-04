@extends('layouts.app')

@section('title')
商品一覧ページ
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="index-content">
    <div class="section-title">
        <h2>商品一覧</h2>
        <a href="" class="register-button">+商品を追加</a>
    </div>
    <div class="product-display">
        <form action="" class="search-form">
            @csrf
            <div class="search-form-wrapper">
                <div class="search-form-item">
                    <input type="text" class="search-form-item-input">
                </div>
                <div class="search-form-button">
                    <button class="search-form-button-submit">検索</button>
                </div>
            </div>
        </form>
        <form action="" class="sort-form">
            @csrf
            <div class="sort-form-wrapper">
                <h3 class="sort-form-title">
                    価格順で表示    
                </h3>
                <div class="sort-form-select-wrapper">
                    <select name="" id="" class="sort-form-select">
                        <option value="">高い順に表示</option>
                        <option value="">低い順に表示</option>
                    </select>
                </div>
            </div>
        </form>
        <div class="product-information">
            <div class="product-information-item">
                <div class="product-information-item-img">
                    <img src="" alt="">
                </div>
                <div class="product-information-item-tag">
                    <p class="product-information-item-tag-name"></p>
                    <p class="product-information-item-tag-price"></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection