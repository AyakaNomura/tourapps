@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                @if (Auth::check() && !Auth::guard('guide')->check())
                    {!! Form::open(['route' => 'user.search']) !!}
                      <div class="form-group">
                          {!! Form::text('keyword', old('keyword'), ['class' => 'form-control']) !!}
                          {!! Form::submit('目的地を検索', ['class' => 'btn btn-primary btn-lg']) !!}
                      </div>
                    {!! Form::close() !!}
                @elseif(Auth::guard('guide')->check())
                    <h1>新しい観光をつくろう</h1>
                @else
                    <h1>観光を「体験」しよう。</h1>
                    <a href="{{ route('user_signup.get') }}" class="btn btn-success btn-lg">観光者として登録</a>
                    <a href="{{ route('guide_signup.get') }}" class="btn btn-success btn-lg">ガイドとして登録</a>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('content')
        @include('tours.tours')
@endsection