@extends('layouts.master')

@section('content')
<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        {{$student->name}}
                        <small>Enrolled: {{$student->dpt}}</small>
                        @if ($student->shift == 0)
                            <small>Shift: Evening</small>
                        @else
                            <small>Shift: Morning</small>                            
                        @endif
                    </h2>
                </div>
                <div class="body">
                    <ul class="list-group">
                        <li class="list-group-item">Father Name:{{$student->fathername}}</li>
                        <li class="list-group-item">Gender: {{$student->gender}}</li>
                        <li class="list-group-item">Age: {{$student->age}}</li>
                        <li class="list-group-item">Date of Birth: {{$student->dob}}</li>
                        <li class="list-group-item">CNIC: {{$student->cnic}}</li>
                        <li class="list-group-item">Address: {{$student->address}}</li>
                        <li class="list-group-item">Email: {{$student->email}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="header">
                    <h2>
                        Criterea
                        <small>To see if the student passed the criterea</small>
                    </h2>
                </div>
                <div class="body">
                    <ul class="list-group">
                        @if ($student->cgpa > 2.5)
                            <li class="list-group-item">CGPA: {{$student->cgpa}} <span class="badge bg-success">PASS</span></li>
                        @else
                            <li class="list-group-item">CGPA: {{$student->cgpa}} <span class="badge bg-danger">FAIL</span></li>                            
                        @endif
                        @if ($student->fee_status == 'clear')
                            <li class="list-group-item">Fee Status: {{$student->fee_status}} <span class="badge bg-success">CLEAR</span></li>
                        @else
                            <li class="list-group-item">Fee Status: {{$student->fee_status}} <span class="badge bg-danger">PENDING</span></li>                            
                        @endif
                        @if ($student->library_status == 'clear')
                            <li class="list-group-item">Library Status: {{$student->library_status}} <span class="badge bg-success">CLEAR</span></li>
                        @else
                            <li class="list-group-item">Library Status: {{$student->library_status}} <span class="badge bg-danger">PENDING</span></li>                            
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="header">
                    <h2>
                        Process Request
                        <small>Process the request of the student</small>
                    </h2>
                </div>
                <div class="body">
                    <form action="{{url('process-request/')}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="notification_id" value="{{$notification->id}}">
                        <div class="form-group">
                            <div class="form-line">
                                <textarea name="notes" rows="4" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                            </div>
                        </div>
                        <button class="btn btn-block bg-pink waves-effect" type="submit">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection