@extends('layouts.app')

@section('content')
    <div class="guide-profile">
        <div class="icon text-center">
            <img src="{{ Gravatar::src(Auth::user()->email, 100) . '&d=mm' }}" alt="" class="img-circle">
        </div>
        <div class="name text-center">
            <h1>{{ Auth::user()->name }}</h1>
        </div>
        <div class="status text-center">
            <div class="status-label">参加した数</div>
            <div id="user_count" class="status-value">
                {{ Auth::user()->tours()->count() }}
            </div>
        </div>
    </div>
    @include('tours.tours', ['tours' => $tours])
@endsection