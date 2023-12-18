@extends('layout.admin.main')

@section 
<div class="container mt-5">

<div class="row justify-content-center">
<div class="col-md-8">


    <h1>Post a job</h1>
    <form action="" method="POST">@csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
         <div class="form-group">
            <label for="description">description</label>
            <textarea id="description" name="description" class="form-control"></textarea>
            </div>
              <div class="form-group">
            <label for="description">Roles and responsiblity</label>
            <textarea id="description" name="roles" class="form-control"></textarea>
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
        <div class="form-group">
            <label for="date">Application close date</label>
            <input type="date" name="datee" id="date" class="form-control">
        </div>
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-success">Post Job</button>
        </div>
            
    </form>
</div>

</div>

    </div>
    @endsection