@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="wrapper">
    <br>
    <div class="row flex justify--center">
        <div class="md-col-4">
            <x-social-login></x-social-login>

            <div class="panel shadow--1">
                <div class="panel__header">{{ __('Register') }}</div>
                <div class="panel__body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf
                        <div class="row">
                            <div class="form__group md-col-6 {{ $errors->has('first_name') ? ' has--danger' : '' }} ">
                                <label for="first_name" class="form__label font--bold">{{ __('First Name') }}</label>
                                <div class="form__wrap">
                                    <i class="lunacon lunacon-user-solid"></i>
                                    <input type="text" name="first_name" id="first_name" class="form__item" value="{{ old('first_name') }}">

                                </div>
                                @if ($errors->has('first_name'))
                                    <strong class="form__helper">
                                        {{ $errors->first('first_name') }}
                                    </strong>
                                @endif
                            </div>
                            <div class="form__group md-col-6 {{ $errors->has('last_name') ? ' has--danger' : '' }} ">
                                <label for="last_name" class="form__label font--bold">{{ __('Last Name') }}</label>
                                <div class="form__wrap">
                                    <i class="lunacon lunacon-user-solid"></i>
                                    <input type="text" name="last_name" id="last_name" class="form__item" value="{{ old('last_name') }}">

                                </div>
                                @if ($errors->has('last_name'))
                                    <strong class="form__helper">
                                        {{ $errors->first('last_name') }}
                                    </strong>
                                @endif
                            </div>
                        </div>
                        <div class="form__group {{ $errors->has('email') ? ' has--danger' : '' }} ">
                            <label for="email" class="form__label font--bold">{{ __('E-Mail Address') }}</label>
                            <div class="form__wrap">
                                <i class="lunacon lunacon-mail-envelope"></i>
                                <input type="email" name="email" id="email" class="form__item" value="{{ old('email') }}">

                            </div>
                            @if ($errors->has('email'))
                                <strong class="form__helper">
                                    {{ $errors->first('email') }}
                                </strong>
                            @endif
                        </div>
                        <div class="row">
                            <div class="form__group md-col-6 {{ $errors->has('password') ? ' has--danger' : '' }} ">
                                <label for="password" class="form__label font--bold">{{ __('Password') }}</label>
                                <div class="form__wrap">
                                    <i class="lunacon lunacon-shield-lock-solid"></i>
                                    <input type="password" name="password" id="password" class="form__item" value="{{ old('password') }}">
                                </div>
                                @if ($errors->has('password'))
                                    <strong class="form__helper">
                                        {{ $errors->first('password') }}
                                    </strong>
                                @endif
                            </div>
                            <div class="form__group md-col-6">
                                <label for="password-confirm" class="form__label font--bold">{{ __('Password Confirm') }}</label>
                                <div class="form__wrap">
                                    <i class="lunacon lunacon-shield-lock-solid"></i>
                                    <input id="password-confirm" type="password" class="form__item" name="password_confirmation">
                                </div>
                            </div>
                        </div>
                        <div class="form__group">
                            <button type="submit" class="btn btn--primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                        <div class="flex justify--center">
                            <span>I already have account ? <a href="{{ route('login') }}"> Login</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
