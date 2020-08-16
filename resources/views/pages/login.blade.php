@extends('main')

@section('title', '| Login')

@section('content')
    {{-- Login Form Block START --}}
    <div class="auth-block">

        {{-- Login Form Heading START --}}
        <div class="auth-block-header">
            <h2>Login Form</h2>
        </div>
        {{-- Login Form Heading END --}}

        {{-- Login Form START --}}
        <div class="auth-block-body">
            <login-form></login-form>
        </div>
        {{-- Login Form END --}}

    </div>
    {{-- Login Form Block END --}}
@endsection