@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>観光を「体験」しよう。</h1>
                <a href="{{ route('user_signup.get') }}" class="btn btn-success btn-lg">観光者として登録</a>
                <a href="" class="btn btn-success btn-lg">ガイドとして登録</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    テスト
@endsection