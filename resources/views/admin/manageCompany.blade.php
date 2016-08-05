@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <h1>Managing: {{ $company->name }}</h1>
    <a href="{{ URL::to('/admin') }}">&larr; Back</a>
    <h3>Company Addess</h3>
    {{ $company->address->getReadableAddress($company->address) }}
    [<a href="{{ URL::to('/admin/edit/address') . '/' . $company->address->id }}">Edit</a>]

    <h3>Posts <small><a href="{{ URL::to('/admin/add/offer') .'/'. $company->id }}">Add New</a></small></h3>
    @foreach ($company->offers as $offer)
      <div class="col-md-4 col-sm-6">
        <div style="margin-bottom: 10px;"><span class="label label-info">Stock: {{ $offer->stock }}</span>
          @if ($offer->hasLowStock())
            <span class="label label-warning">Low stock</span>
          @endif

          @if ($offer->outOfStock())
            <span class="label label-danger">Out of stock</span>
          @endif

          [<a href="{{ URL::to('/admin/edit/offer' .'/'. $offer->id) }}">Edit</a>]

          <a href="#" class="pull-right">delete</a>
        </div>


        @include('offers.partials.item')
      </div>
    @endforeach
  </div>
</div>
@endsection
