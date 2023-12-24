@extends('layout.app')

@section('content')


<div class="container">
    <div class="row mt-5">
        <div class="col-md-8">
          <h3>applied jobs</h3>
          @foreach ($user as $user)
          @foreach($user->listings as $listing )
              
          @endforeach
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">{{$listing->title}}</h5>
              <p class="card-text">applied: {{$listing->pivot->created_at}} </p>
              <a href="#{{route('job.show'[$listings->slug])}}" class="btn btn-dark">View</a>
            </div>
          </div>     
          @endforeach  
          @endforeach
        </div>
      </div

</div>

@endsection