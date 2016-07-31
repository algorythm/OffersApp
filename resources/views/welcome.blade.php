@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="page-header">
                <h1>Welcome to Offers <small>The right place to get the right offer</small></h1>
            </div>
            <!--<div class="col-md-6">
              <h4>Offer Title <em class="pull-right"><small>Wallstreet 2, New York</small></em></h4>
              <img src="{{ URL::to('images/placeholder.svg') }}" alt="Placeholder Image" class="center-block"><br>

              <p>Here is a small text about the greatest offer in the world! You really need to get this offer, because definitely is the greatest in the world. Well... Not the greast in like <em>highest price</em>. More like <em><strong>best offer efer</strong></em>.</p>
              <p>
                <a href="#">Get this offer</a>
                <em class="pull-right"><small>Company Name</small></em>
              </p>
              <br>
            </div>-->

            <div class="container">
              <div class="row">
                @foreach($offers as $offer)
                  @if ($offer->inStock())
                  <div class="col-md-4 col-sm-6">
                    @include('offers.partials.item')
                  </div>
                  @endif
                @endforeach
              </div>
            </div>

        </div>
    </div>
</div>
@endsection
