@section('layout.app')

@section('content')

<div class="container mt-5">

    <div class="d-flex justify-content-center">
        <h3>Recommended jobs </h3> <button class="btn btn-dark">view</button>
    </div>
    <div class="row mt-2 g-1">
        @foreach(jobs as $job)
        <div class="col-md-3">
            <div class="card p-2">
                <div class="text-right"><small>{{$job->job_type}}</small></div>
                <div class="text-center mt-2 p-3"><img src="{{Storage::url($job->profile->profile_pic)}}" width="80" class="rounded-circle" alt="">
                    <br>
                    <span class="d-block font-weight-bold">{{$job->title}}</span>
                    <span>{{$job->profile->name}}</span>
                    <div class="d-flex flex-row align-items-center justify-content-center">
                        <small class="ml-1">{{job->address}}</small>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <span>ZAR{{number_formt($job->salary,2)}}</span>
                       <a href="{{$job->slug}}"> <button class="btn btn-sm btn-outline-dark">Apply</button> </a>
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
</style>
@endsection