@extends('layouts.app')

@section('content')

<div class="form-login">
    @if($errors->has("email"))
        <div class="alert alert-error alert-danger">
            <ul>
                <li>{{ $errors->first("email") }}</li>
            </ul>
        </div>
    @endif
    <div>
        <h3>{{ __('Вход') }}</h3>
    </div>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">{{ __('Имейл адрес') }}</label>
            <div>
                <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div >
            <label for="password" >{{ __('Парола') }}</label>

            <div>
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="auth-btn">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-outline-primary">
                    {{ __('Влез') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Забравена парола?') }}
                    </a>
                @endif
            </div>
        </div>
    </form>
</div>

@endsection
