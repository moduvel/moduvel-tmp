@extends('moduvel-core::backend.non-auth.layouts.master')

@section('contents')

<h3>Enter your credentials</h3>

@if($errors->count() > 0)
<div class="errors">
    <p>Invalid Credentials</p>
</div>
@endif

<form action="{{ locale_route('backend.login') }}" method="post">
    {{ csrf_field() }}
    <input type="text" name="email" value="{{ old('email') }}" placeholder="Email" />
    <input type="password" name="password" value="" placeholder="Password" />
    <button type="submit">{{ trans('moduvel-core::login.button-text') }}</button>
</form>

@endsection