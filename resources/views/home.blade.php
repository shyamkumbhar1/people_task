@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                      


                       <div>
                        <p>               Notification   <sup>{{Auth::user()->unreadNotifications->count()}}</sup> </p>        </p>
                       </div>
                        @foreach (Auth::user()->notifications as $notification)
                        <div class="bg-primary ">
                           You Have 1 Notification As Title {{$notification->data['title']}}
                            <a href="{{route('markasread',$notification->id)}}" class="bg-danger "> Mark As Read</a>
                        </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
