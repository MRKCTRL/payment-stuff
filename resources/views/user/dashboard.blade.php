@extends ('layout.app')

@section('content')

<div class="container mt-5">
  hello, {{ auth()->user()->name }}
  @if(! auth()->user()billingDebit)
  @if(Auth::check() && auth()->user()->user_type == 'employer')
  <p>Your Trial {{now()->format('Y-m-d') > auth()->user()->user_trial ? 'has expired': 'will expire'}} on {{auth()->user()->user_trial}}</p>
  @endif
  @endif

   @if(Auth::check() && auth()->user()->user_type == 'employer')
  <p>Your Trial {{now()->format('Y-m-d') > auth()->user()->billingDebit ? 'has expired': 'will expire'}} on {{auth()->user()->billingDebit}}</p>
  @endif


<div class="row justify-content-center">


    @if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif

    if(Session::has('error'))
    <div class="alert alert-danger">{{Session::get('error')}}</div>

    {{-- {{ auth()->user()->email }} --}}
<div class="col-md-3">
<div class="card-counter primary">
<p class="text-center mt-3 lead">User Profile</p>
<button class="btn btn-primary float-end">View</button>
</div>
</div>
<div class="col-md-3">
<div class="card-counter danger">
<p class="text-center mt-3 lead">Post Jobs</p>
<button class="btn btn-primary float-end">View</button>
</div>
</div>
<div class="col-md-3">
<div class="card-counter successy">
<p class="text-center mt-3 lead">All Jobs</p>
<button class="btn btn-primary float-end">View</button>
</div>
</div>
<div class="col-md-3">
<div class="card-counter info">
<p class="text-center mt-3 lead">Item 4</p>
<button class="btn btn-primary float-end">View</button>


</div>


</div>
</div>
    </div>

@endsection


<style>
.card-counter {
    box-shadow: 2px 2px 10px #dadada;
    margin: 5px;
    padding: 20px 10px;
    background color: #fff;
    height: 130px;
    border-radius: 5px;
    transition: .3s linear all;
}
,.card-counter.primary{
    background-color: #007bd0;
    color: :aqua;
}
.card-counter.danger{
    background-color: aquamarine;
    color: cadetblue;
}
.card-counter.success {
    background-color: navy;
    color: cornflowerblue;
}
.card-counter.info {
    background-color: cyan;
    color: powderblue;
}
</style>
