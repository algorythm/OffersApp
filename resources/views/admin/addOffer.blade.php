@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @include('common.errors')
    <h1>Add New Offer <small>{{$company->name}}</small></h1>
    <form action="{{ URL::to('/admin/add/offer') }}" method="post">
      <div class="form-group">
        <label for="name">Title</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Title for the post" value="{{ old('name') }}">
        <small id="nameHelp" class="form-text text-muted">A descriptive title that catches the eye.</small>
      </div>

      <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" aria-describedby="slugHelp" placeholder="Slug for the post" value="{{ old('slug') }}">
      </div>

      <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" aria-descripedby="stockHelp" placeholder="i.e. 26 or -1 for inifite" value="{{ old('stock') }}">
        <small id="stockHelp" class="form-text text-muted">How many offers should be available to be purchased?</small>
      </div>

      <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" aria-descripedby="priceHelp" placeholder="i.e. 25.00 or 0 for free" value="{{ old('price') }}">
        <small id="priceHelp" class="form-text text-muted">How much should the offer cost?</small>
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="3" class="form-control" placeholder="Write a descriptive description for the offer here.">{{ old('descriptionb') }}</textarea>
      </div>

      <div class="image_upload form-group">
          <label for="exampleInputFile">File input</label>
          <input type="file" class="form-control-file" id="inputImage" name="inputImage" aria-describedby="fileHelp">
          <small id="fileHelp" class="form-text text-muted">Choose a file to upload. The image should be 800 px by 500 px to best fit the layout.</small>
      </div>

      <button type="submit" class="btn btn-primary">Create Offer</button>

      <input type="hidden" name="company_id" value="{{ $company->id }}">
      {{ csrf_field() }}
    </form>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    document.write("Hello, World");
</script>
@endsection
