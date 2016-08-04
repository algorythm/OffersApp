@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @include('common.errors')
    <form action="{{ URL::to('/buy/process') }}" method="post" id="checkout">
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
          <input type="hidden" name ="offer_id" value="{{ $offer->id }}">

          {{ csrf_field() }}
        </div>
      </div>

      <!-- BRAINTREE Implementation -->
      <!--<section>
         <div class="bt-drop-in-wrapper">
             <div id="bt-dropin"></div>
         </div>

         <label for="amount">
             <span class="input-label">Amount</span>
             <div class="input-wrapper amount-wrapper">
                 <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="10">
             </div>
         </label>
     </section>-->
     <!-- /BRAINTREE Implementation -->

    </form>
  </div>
</div>
@endsection

<!-- BRAINTREE Implementation -->
{{--}}@section('script')
  <script src="https://js.braintreegateway.com/js/braintree-2.27.0.min.js"></script>
<script>
// We generated a client token for you so you can test out this code
// immediately. In a production-ready integration, you will need to
// generate a client token on your server (see section below).
var clientToken = "eyJ2ZXJzaW9uIjoyLCJhdXRob3JpemF0aW9uRmluZ2VycHJpbnQiOiJjZmRlYTMxNTE5NjgzZDg0MGExYTRjNzEzMmRiNmE0MTk1NThjYjI4YTIxZTliZmRkMTU0OTFkYzMxYzYzNjZhfGNyZWF0ZWRfYXQ9MjAxNi0wOC0wMVQxNzowNTowMC44NzYzOTcwOTUrMDAwMFx1MDAyNm1lcmNoYW50X2lkPTM0OHBrOWNnZjNiZ3l3MmJcdTAwMjZwdWJsaWNfa2V5PTJuMjQ3ZHY4OWJxOXZtcHIiLCJjb25maWdVcmwiOiJodHRwczovL2FwaS5zYW5kYm94LmJyYWludHJlZWdhdGV3YXkuY29tOjQ0My9tZXJjaGFudHMvMzQ4cGs5Y2dmM2JneXcyYi9jbGllbnRfYXBpL3YxL2NvbmZpZ3VyYXRpb24iLCJjaGFsbGVuZ2VzIjpbXSwiZW52aXJvbm1lbnQiOiJzYW5kYm94IiwiY2xpZW50QXBpVXJsIjoiaHR0cHM6Ly9hcGkuc2FuZGJveC5icmFpbnRyZWVnYXRld2F5LmNvbTo0NDMvbWVyY2hhbnRzLzM0OHBrOWNnZjNiZ3l3MmIvY2xpZW50X2FwaSIsImFzc2V0c1VybCI6Imh0dHBzOi8vYXNzZXRzLmJyYWludHJlZWdhdGV3YXkuY29tIiwiYXV0aFVybCI6Imh0dHBzOi8vYXV0aC52ZW5tby5zYW5kYm94LmJyYWludHJlZWdhdGV3YXkuY29tIiwiYW5hbHl0aWNzIjp7InVybCI6Imh0dHBzOi8vY2xpZW50LWFuYWx5dGljcy5zYW5kYm94LmJyYWludHJlZWdhdGV3YXkuY29tLzM0OHBrOWNnZjNiZ3l3MmIifSwidGhyZWVEU2VjdXJlRW5hYmxlZCI6dHJ1ZSwicGF5cGFsRW5hYmxlZCI6dHJ1ZSwicGF5cGFsIjp7ImRpc3BsYXlOYW1lIjoiQWNtZSBXaWRnZXRzLCBMdGQuIChTYW5kYm94KSIsImNsaWVudElkIjpudWxsLCJwcml2YWN5VXJsIjoiaHR0cDovL2V4YW1wbGUuY29tL3BwIiwidXNlckFncmVlbWVudFVybCI6Imh0dHA6Ly9leGFtcGxlLmNvbS90b3MiLCJiYXNlVXJsIjoiaHR0cHM6Ly9hc3NldHMuYnJhaW50cmVlZ2F0ZXdheS5jb20iLCJhc3NldHNVcmwiOiJodHRwczovL2NoZWNrb3V0LnBheXBhbC5jb20iLCJkaXJlY3RCYXNlVXJsIjpudWxsLCJhbGxvd0h0dHAiOnRydWUsImVudmlyb25tZW50Tm9OZXR3b3JrIjp0cnVlLCJlbnZpcm9ubWVudCI6Im9mZmxpbmUiLCJ1bnZldHRlZE1lcmNoYW50IjpmYWxzZSwiYnJhaW50cmVlQ2xpZW50SWQiOiJtYXN0ZXJjbGllbnQzIiwiYmlsbGluZ0FncmVlbWVudHNFbmFibGVkIjp0cnVlLCJtZXJjaGFudEFjY291bnRJZCI6ImFjbWV3aWRnZXRzbHRkc2FuZGJveCIsImN1cnJlbmN5SXNvQ29kZSI6IlVTRCJ9LCJjb2luYmFzZUVuYWJsZWQiOmZhbHNlLCJtZXJjaGFudElkIjoiMzQ4cGs5Y2dmM2JneXcyYiIsInZlbm1vIjoib2ZmIn0";

braintree.setup(clientToken, "dropin", {
  container: "payment-form"
});
</script>
@endsection--}}
<!-- /BRAINTREE Implementation -->
