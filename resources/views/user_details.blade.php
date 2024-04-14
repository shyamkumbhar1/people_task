@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div>All Users Details :</div>

                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif


                        {{-- <div class="btn btn-success"><a href="{{route('get.all.notification')}}"  class="btn btn-success">Total Notification Send <sup>{{ $notifications->count() }}</sup></a> </div> --}}
                        {{-- <div class="btn btn-success" ><a href="{{route('unread.notification')}}" class="btn btn-success">UnRead Notification  <sup>{{ $unread_notifications->count() }}</sup></a> </div> --}}


                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Send Notification</th>
                                <th>Impersonate</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td><a href="{{ route('send.notification', $user->id) }} " class="btn btn-primary">Send Notification</a></td>
                                    <td><a href="{{ route('users.impersonate', $user->id) }}" class="btn btn-primary" >impersonate</a></td>
                                    <td>Unread</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.alert').alert();
        });
    </script>
@endsection
