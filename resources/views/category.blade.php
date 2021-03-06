@extends('layout')

@section('title')
  {{$category->name}} - Sport DeeDee
@endsection

@section('main')
  <div class="container">
    <div class="row">
      <div class="col-12 mt-3">
        <h1>{{ $category->name }}</h1>
        <div class="container col-12 col-lg-3">
          <div class="row">
            @foreach ($category->products as $product)
              @include('product-card', ['product' => $product])
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
