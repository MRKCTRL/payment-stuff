@extends('layout.app')

@section('content')

<div class="container" mt-5>
    <div class=row>
        <div class="col-md-4">
    col1<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <!-- <img src="..." class="img-fluid rounded-start" alt="..."> -->
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Weekly - Zar 300</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
        <a href="{{route('pay.weekly')}}" class="card-link"></a>
         <button class="btn btn-success">Pay</button>
      </div>
    </div>
  </div>
</div>
        </div>
         <div class="col-md-4">
    col2<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <!-- <img src="..." class="img-fluid rounded-start" alt="..."> -->
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Monthly Zar 540</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
        <a href="{{route('pay.monthly')}}" class="card-link"></a>
        <button>Pay</button>
      </div>
    </div>
  </div>
</div>
        </div>
         <div class="col-md-4">
    col3<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <!-- <img src="..." class="img-fluid rounded-start" alt="..."> -->
    </div>
    <div class="col-md-8">
      <div class="card-body text-center">
        <h5 class="card-title">Yearly - Zar 740</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
        <a href="{{route('pay.yearly')}}" class="card-link"></a>
         <button>Pay</button>
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</div>

@endsection
