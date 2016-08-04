<div class="thumbnail">
  <a href="{{ URL::to('/offer/' . $offer->id) }}"><img src="{{ $offer->image }}" alt="..."></a>
  <div class="caption">
    <h4><a href="{{ URL::to('/offer/' . $offer->id) }}">{{ $offer->name }}</a></h4>
      <h5><small>{{ $offer->company->address->getReadbleAddress($offer->company->address) }}</small></h5>
    <p>{{ $offer->description }}</p>
    <p class="pull-right"><em>
        {{ $offer->company->name }}
      </em></p>
      <br>
  </div>
</div>
