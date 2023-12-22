@extends('layout.admin.main')

@section 
<div class="container mt-5">
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
                        <th>Total applicants</th>
                        <th>View applicants</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listing as $listings)
                    <tr>
                        <td>{{$listings->title}}</td>
                        <td>{{$listings->created_at->format('Y-m-d')}}</td>
                        <td>{{$lisitngs->users_count}}</td>
                        <td>View</td>
                        <td><a href="{{route('applicants.show',$listing->$slug)}}">View</a></td>
    </tr>
   
                        @endforreach
                  
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

