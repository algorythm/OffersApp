@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <h1>{{ Auth::user()->name }}</h1>
    <h2>Roles:</h2>
    <ul>
      @foreach (Auth::user()->roles as $role)
        <li>{{ $role->name }}</li>
      @endforeach
    </ul>

    <h2>Companies</h2>
    @foreach (Auth::user()->companies as $company)
    <div class="list-group">
      <a href="{{ URL::to('/admin/company/manage') . '/' . $company->id }}" class="list-group-item">
        <h4 class="list-group-item-heading">{{ $company->name }}</h4>
        <p class="list-group-item-text">{{ $company->address->getReadbleAddress($company->address) }}</p>
      </a>
    </div>
    @endforeach
  </div>
</div>
@endsection
