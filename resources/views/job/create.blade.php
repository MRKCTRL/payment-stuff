@extends('layout.admin.main')

@section 
<div class="container mt-5">

<div class="row justify-content-center">
<div class="col-md-8">


    <h1>Post a job</h1>
    <form action="{{route('job.store')}}" method="POST">@csrf
        <div class="form-group">
            <label for="feature_image">Feature Image</label>
            <input type="file" name="feature_image" id="feature_image" class="form-control">
             @if($error->has('feature_image'))
            <div class="error">{{$error->first('feature_image')}}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control">
            @if($error->has('title'))
            <div class="error">{{$error->first('title')}}</div>
            @endif
        </div>
         <div class="form-group">
            <label for="description">description</label>
            <textarea id="description" name="description" class="form-control summernote"></textarea>
             @if($error->has('description'))
            <div class="error">{{$error->first('description')}}</div>
            @endif
            </div>
              <div class="form-group">
            <label for="description">Roles and responsiblity</label>
            <textarea id="description" name="roles" class="form-control summernote"></textarea>
             @if($error->has('roles'))
            <div class="error">{{$error->first('roles')}}</div>
            @endif
            </div>
            <div class="form-group">
                <label for="">job type</label>
 <div class="form-check">
                <input type="radio" class="form-check-input" name="job_type" id="job_type" value="fulltime">
                <label for="job_type" class="form-check-label">full time</label>
            </div>
            
            <div class="form-check">
                <input type="radio" class="form-check-input" name="job_type" id="parttime" value="parttime">
                <label for="parttime" class="form-check-label">Part time</label>
            </div>
             @if($error->has('job_type'))
            <div class="error">{{$error->first('job_type')}}</div>
            @endif
            <div class="form-check">
                <input type="radio" class="form-check-input" name="job_type" id="contract" value="contract">
                <label for="contract" class="form-check-label">contract</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="job_type" id="temporary" value="temporary">
                <label for="temporary" class="form-check-label">temporaryfull time</label>
            </div>
           
            </div>
            <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>
         @if($error->has('address'))
            <div class="error">{{$error->first('address')}}</div>
            @endif
            <div class="form-group">
            <label for="salary">Salary</label>
            <input type="text" name="salary" id="salary" class="form-control">
        </div>
         @if($error->has('salary'))
            <div class="error">{{$error->first('salary')}}</div>
            @endif
        <div class="form-group">
            <label for="date">Application close date</label>
            <input type="date" name="date" id="datepicker" class="form-control">
             @if($error->has('date'))
            <div class="error">{{$error->first('date')}}</div>
            @endif
        </div>
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-success">Post Job</button>
        </div>
            
    </form>
</div>

</div>
<style>

.note-insert {
    display: none!important;
}

.error {
    color: red;
    font-weight: bold;
}
</style>

    </div>
    @endsection