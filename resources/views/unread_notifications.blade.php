@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Unread  Notification :') }}                </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Unique Notification Id</th>
                                <th>User Id</th>
                                {{-- <th>Read Status</th> --}}



                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($unread_notifications as $notification)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $notification->id }}</td>
                                    <td>{{ $notification->notifiable_id }}</td>
                                    {{-- <td>{{ $notification->read_at }}</td> --}}


                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
