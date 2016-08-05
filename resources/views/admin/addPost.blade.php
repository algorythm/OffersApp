@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <h1>Add New Post <small>{{$company->name}}</small></h1>
    <form action="{{ URL::to('/admin/add/offer') }}" method="post">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" placeholder="Title for the post">
        <small id="titleHelp" class="form-text text-muted">A descriptive title that catches the eye.</small>
      </div>

      <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" aria-descripedby="stockHelp" placeholder="i.e. 26 or -1 for inifite">
        <small id="stockHelp" class="form-text text-muted">How many offers should be available to be purchased?</small>
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="3" class="form-control" placeholder="Write a descriptive description for the offer here."></textarea>
      </div>

      <fieldset class="form-group">
        <div class="radio">
          <label><input type="radio" name="imageSelection" value="internal" checked> Upload Image (800*500 px)</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="imageSelection" value="external"> Use external link</label>
        </div>
      </fieldset>

      <div class="image_upload form-group">
          <label for="exampleInputFile">File input</label>
          <input type="file" class="form-control-file" id="inputImage" name="inputImage" aria-describedby="fileHelp">
          <small id="fileHelp" class="form-text text-muted">Choose a file to upload. The image should be 800 px by 500 px to best fit the layout.</small>
      </div>

      <div class="image_url hidden">
        <label for="imageUrl">Url to Image (without HTTP://)</label>
        <div class="input-group">
          <span class="input-group-addon" id="imageUrlAddon">http://</span>
          <input type="text" class="form-control" id="imageUrl" name="imageUrl" aria-descripedby="imageUrlAddon">
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    document.write("Hello, World");
</script>
@endsection
