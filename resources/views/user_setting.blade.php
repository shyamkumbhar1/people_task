@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div>User Setting</div>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update.user.setting') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number', auth()->user()->phone_number) }}" required>
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Receive Notification</label><br>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="notification_on" name="notification_switch" value="1" {{ auth()->user()->notification_switch == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="notification_on">On</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="notification_off" name="notification_switch" value="0" {{ auth()->user()->notification_switch == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="notification_off">Off</label>
                                </div>
                            </div>


                            <div class="form-group form-check">
                                <input type="checkbox" required   value="1" class="form-check-input" >
                                <label class="form-check-label" >Please Select checkbox </label>
                            </div>

                            <button type="submit" class="btn btn-primary">Save Settings</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
