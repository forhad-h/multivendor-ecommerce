@extends('admin.auth.layouts.app')
@section('title', 'Reset Password')

@section('content')
    <div class="col-sm-8 col-md-offset-4">
        <div class="ibox-content">
            <div style="text-align: center">
                <a href="{{ config('app.url') }}" target="_blank">
                    <img alt="image"
                         src="@if(empty($globalSettingInfo)) @else {{ $globalSettingInfo->image()->where('type', 'logo')->first()->url }} @endif"
                         width="166"/>
                </a>
            </div>

            <h3 class="font-bold">Reset</h3>
            <form class="m-t" role="form" method="POST" action="{{ route('admin.password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">


                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                           placeholder="Email">
                    @error('email')
                    <span class="help-block m-b-none text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" required autocomplete="new-password" placeholder="New Password">
                    @error('password')
                    <span class="help-block m-b-none text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required autocomplete="new-password" placeholder="Confirm Password">
                </div>
                <button type="submit" class="btn btn-primary block full-width"><strong>Reset Password</strong></button>
            </form>
        </div>
    </div>
@endsection
