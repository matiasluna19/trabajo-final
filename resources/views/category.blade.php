@extends('layout')

@section('title')
  {{ $category->name }} - Digital House Market
@endsection

@section('main')
  <h1>{{ $category->name }}</h1>

  <div class="container">
    <div class="row">
      @foreach ($category->products as $product)
        <a href="{{ route('product', ['productId' => $product->id]) }}" class="col-12 col-md-4 col-lg-3 mb-4">
          <div class="card">
            <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
            <div class="card-body">
              <p class="card-text">{{ $product->name }}</p>
            </div>
          </div>
        </a>
      @endforeach
    </div>
  </div>
@endsection