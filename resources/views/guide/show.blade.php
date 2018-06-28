@extends('layouts.app')

@section('content')
    <div class="guide-profile">
        <div class="icon text-center">
            <img src="{{ Gravatar::src(Auth::guard('guide')->user()->email, 100) . '&d=mm' }}" alt="" class="img-circle">
        </div>
        <div class="name text-center">
            <h1>{{ Auth::guard('guide')->user()->name }}</h1>
        </div>
        <div class="status text-center">
            <div class="status-label">ガイド数</div>
            <div id="guide_count" class="status-value">
                {{ Auth::guard('guide')->user()->tours()->count() }}
            </div>
        </div>
    </div>
    @include('tours.tours', ['tours' => $tours])
@endsection