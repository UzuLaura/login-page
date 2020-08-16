@extends('main')

@section('title', '| Home')

@section('content')
    {{-- Welcome Block START --}}
    <div class="welcome-block">
        <h2>Welcome</h2>
        <h3>{{ Auth::user()->username }}</h3>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="button" type="submit">Logout</button>
        </form>
    </div>
    {{-- Welcome Block END --}}
@endsection