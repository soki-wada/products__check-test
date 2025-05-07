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
        <h2>{{$keyword}}商品一覧</h2>
        <a href="/products/register" class="register-button">+商品を追加</a>
    </div>
    <div class="product-display">
        <aside class="form-wrapper">
            <div class="search-form-wrapper">
                <form action="/products/search" class="search-form" method="get">
                    @csrf
                    <div class="search-form-item">
                        <input type="text" class="search-form-item-input" placeholder="商品名で検索" name="keyword" value="{{old('keyword', request('keyword'))}}">
                    </div>
                    <div class="search-form-button">
                        <button type="submit" class="search-form-button-submit">検索</button>
                    </div>
                </form>
            </div>
            <div class="sort-form-wrapper">
                <form action="/products" class="sort-form" method="get">
                    @csrf
                    <h3 class="sort-form-title">
                        価格順で表示
                    </h3>
                    <div class="sort-form-select-wrapper">
                        <select name="sort" id="" class="sort-form-select" onchange="this.form.submit()">
                            <option value="" selected class="sort-form-select-default" disabled {{ request('sort') ? '' : 'selected' }}>価格で並べ替え</option>
                            <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>高い順に表示</option>
                            <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>低い順に表示</option>
                        </select>
                        <div class="selected-sort">
                            @if(request('sort') == 'asc')
                            <div class="sort-tag">
                                <p class="sort-tag-text">低い順で表示</p>
                                <a href="{{ request()->fullUrlWithQuery(['sort' => null]) }}" class="sort-tag-delete">×</a>
                            </div>
                            @elseif(request('sort') == 'desc')
                            <div class="sort-tag">
                                <p class="sort-tag-text">高い順で表示</p>
                                <a href="{{ request()->fullUrlWithQuery(['sort' => null]) }}" class="sort-tag-delete">×</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </aside>
        <div class="product-information-wrapper">
            <div class="product-information">
                @foreach($products as $product)
                <a class="product-information-item" href="{{url('/products/' . $product->id)}}">
                    <div class="product-information-item-img">
                        <img src="{{asset('storage/images/' . $product->image)}}" alt="{{$product->name}}の画像">
                    </div>
                    <div class="product-information-item-tag">
                        <p class="product-information-item-tag-name">{{$product->name}}</p>
                        <p class="product-information-item-tag-price">￥{{$product->price}}</p>
                    </div>
                </a>
                @endforeach
            </div>
            {{$products->appends(request()->query())->links()}}
        </div>
    </div>
</div>
@endsection