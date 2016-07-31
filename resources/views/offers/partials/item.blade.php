<div class="thumbnail">
  <a href="#"><img src="{{ $offer->image }}" alt="..."></a>
  <div class="caption">
    <h4><a href="{{ URL::to('/offer/' . $offer->id) }}">{{ $offer->name }}</a></h4>
    <h5><small>ADDRESS HERE</small></h5>
    <p>{{ $offer->description }}</p>
    <p class="pull-right"><em>
        {{ $offer->company->name }}
      </em></p>
      <br>
  </div>
</div>
