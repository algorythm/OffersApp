@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <img src="{{ $offer->image }}" alt="{{ $offer->name }} image" class="thumbnail img-responsive">
    </div>
    <div class="col-md-8">
      <span class="label label-info">Stock: {{ $offer->stock }}</span>
      @if ($offer->hasLowStock())
        <span class="label label-warning">Low stock</span>
      @endif

      @if ($offer->outOfStock())
        <span class="label label-danger">Out of stock</span>
      @endif

      <h3>{{ $offer->name }}</h3>
      <p>{{ $offer->description }}</p>

      <br>

      @if ($offer->inStock())
        <a href="#" class="btn btn-default btn-sm">Buy now!</a>
      @endif
    </div>
  </div>
</div>
@endsection
