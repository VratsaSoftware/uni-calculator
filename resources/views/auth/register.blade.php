@extends('layouts.app')

@section('content')

<div class="form-login">
    @foreach($errors->all() as $error)
        {{ $error }}
    @endforeach
    <div>
        <h3>{{ __('Регистрация') }}</h3>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="username">{{ __('Потребителско име') }}</label>

            <div>
                <input id="username" type="text" class="@error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <label for="email">{{ __('Имейл адрес') }}</label>

            <div>
                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <label for="password">{{ __('Парола') }}</label>

            <div>
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <label for="password-confirm">{{ __('Потвърди парола') }}</label>

            <div>
                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
        <div>
            <label for="first_name">{{ __('Име') }}</label>

            <div>
                <input id="first_name" type="text" class="@error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div>
            <label for="last_name">{{ __('Фамилия') }}</label>

            <div>
                <input id="last_name" type="text" class="@error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">

                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="auth-btn">
            <button type="submit" class="btn btn-primary">
                {{ __('Регистрирай се!') }}
            </button>
        </div>
    </form>
</div>

@endsection
