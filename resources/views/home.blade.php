@section('layout.app')

@section('content')

<div class="container mt-5">

    <div class="d-flex justify-content-center">
        <h3>Recommended jobs </h3> 

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              salary
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('listing.index', ['sort' => 'salary_high_to_low '])}}">High to low</a></li>
              <li><a class="dropdown-item" href="{{route('listing.index', ['sort' => 'salary_low_to_high '])}}">low to high</a></li>
            </ul>
            </ul>
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Date
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('listing.index', ['date' => 'latest'])}}">latest</a></li>
                <li><a class="dropdown-item" href="{{route('listing.index', ['date' => 'oldest'])}}">oldest</a></li>
              </ul>
              <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Job type
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('listing.index', ['job_type' => 'Fulltime'])}}">Full timne</a></li>
                <li><a class="dropdown-item" href="{{route('listing.index', ['job_type' => 'parttime'])}}">Part time</a></li>
                <li><a class="dropdown-item" href="{{route('listing.index', ['job_type' => 'Contract'])}}">Contract</a></li>
                <li><a class="dropdown-item" href="{{route('listing.index', ['job_type' => 'Casual'])}}">Casual</a></li>
              </ul>
              </ul>
          </div>
    </div>
    <div class="row mt-2 g-1">
        @foreach(jobs as $job)
        <div class="col-md-3">
            <div class="card p-2{{$job->job_type}}">
                <div class="text-right"><small class="badge text-bg-info">{{$job->job_type}}</small></div>
                <div class="text-center mt-2 p-3"><img src="{{Storage::url($job->profile->profile_pic)}}" width="80" class="rounded-circle" alt="">
                    <br>
                    <span class="d-block font-weight-bold">{{$job->title}}</span>
                    <span>{{$job->profile->name}}</span>
                    <div class="d-flex flex-row align-items-center justify-content-center">
                        <small class="ml-1">{{job->address}}</small>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <span>ZAR{{number_format($job->salary,2)}}</span>
                       <a href="{{route('job.show', [$job->slug])}}"> <button class="btn btn-sm btn-outline-dark">Apply</button> </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<style>
    .card:hover{
        background-color:aquamarine; 
    }
    .fulltime {
        background-color: blue;
        color: aliceblue;
    }
    .contract{
        background-color: cadetblue;
        color: azure;
    }
    .casual  {
        background-color: cornflowerblue;
        color: darkcyan;
    }
    .partime {
        background-color: darkcyan;
        color: teal;
    }

</style>
@endsection