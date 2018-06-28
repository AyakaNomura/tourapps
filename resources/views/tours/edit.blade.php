@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-xs-offset-3 col-xs-6">
        <div class="panel panel-default">
            <div class="panel-heading">観光プラン更新フォーム</div>
            <div class="panel-body">
                {!! Form::model($tour, ['route' => ['tours.update', $tour->id ], 'files' => true, 'method' => 'put']) !!}
                    <div class="form-group">
                        {!! form::label('tour_name', 'ツアー名') !!}
                        {!! form::text('tour_name', old('tour_name'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! form::label('place', '場所') !!}
                        {!! form::text('place', old('place'), ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! form::label('start_date', '開始日') !!}
                        {!! form::text('start_date', old('start_date'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! form::label('end_date', '終了日') !!}
                        {!! form::text('end_date', old('end_date'), ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! form::label('price', '費用') !!}
                        {!! form::text('price', old('price'), ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! form::label('category', 'カテゴリー') !!}
                        {!! form::text('category', old('category'), ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! form::label('thum', '画像') !!}
                        {!! form::file('thum', old('thum'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! form::label('content', '備考') !!}
                        {!! form::textarea('content', old('content'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="text-right">
                        {!! form::submit('更新', ['class' => 'btn btn-success']) !!}
                    </div>
                {!! form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection