@extends('layout.admin.main')

@section 
<div class="container mt-5">
<h2>All jobs</h2>
<div class="row justify-content-center">

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Your Jobs
            if(Session::has('success'))

    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Created ON</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Title</th>
                        <th>Created on</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($jobs as $job)
                    <tr>
                        <td>{{$job->title}}</td>
                        <td>{{$job->created_at->format('Y-m-d')}}</td>
                        <td><a href="{{route('job.edit',[$job->id])}}">Edit</a></td>
                        <td><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal>
  Delete</a></td>
    </tr>
   
  <div class="modal fade" id="exampleModal{{$job->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <form action="{{route('job.delete', [$job->id])}}" method="POST">@csrf
        @method('DELETE')
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel{{$job->id}}">Delete Confirmation</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger">Save changes</button>
      </div>
    </div>
  </div>
  </form>
</div>
                        @endforreach
                  
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection