@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12 col-md-offset-3">
            <div class="tour">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <img src="{{ asset('storage/' . $tour->thum) }}" alt="images">
                    </div>
                    <div class="panel-body">
                        <p class="tour-title">{{ $tour->tour_name }}</p>
                        <div class="buttons text-center">
                            @if(! Auth::guard('guide')->check() || Auth::check() )
                                @include('tours.join_button', ['tour' => $tour, 'user' => $user])
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="guide-name">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        ガイドする人
                    </div>
                    <div class="panel-body">
                        <p>{{ $guide }}</p>
                    </div>
                </div>
            </div>
            <div class="have-users">
                <div class="panel">
                    <p>場所：{{ $tour->place }}</p>
                    <p>開催期間：{{ $tour->start_date }} ~ {{ $tour->end_date }}</p>
                    <p>費用：{{ $tour->price }}</p>
                    <p>カテゴリー：{{ $tour->category }}</p>
                    <p>備考：{{ $tour->content }}</p>
                </div>
            </div>
            @if(Auth::guard('guide')->check() && \Auth::guard('guide')->user()->id === $tour->guide_id)
                <div class="text-center">
                    {!! link_to_route('tours.edit','編集する',  ['id' => $tour->id], ['class' => 'btn btn-primary']) !!}
                </div>
            @endif
        </div>
    </div>
@endsection