@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <form action="{{ URL::to('/buy/process') }}" method="post">
      <div class="col-md-8 col-xs-12">
        <h3>Your Details</h3>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
          <label for="name">Full name</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>
      </div>

      <div class="col-md-4 col-xs-12">
        <div class="well">
          <h4>Your order</h4>
          <hr>
          <div class="table-responsive">
            <table class="table">
              <thead><tr><th>Offer</th><th>Price</th></tr></thead>
              <tr>
                <th>{{ $offer->name }} at {{ $offer->company->name }}</th>
                <th>{{ $offer->price }} DKK</th>
              </tr>
            </table>
          </div>

          <button class="btn btn-default btn-sm">Place order</button>

          {{ csrf_field() }}
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
