@if (Auth::check() && Auth::id() != $tour->id)
    @if (Auth::user()->is_joining($tour->id))
        {!! Form::open(['route' => ['user.dont_join', $tour->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unjoin', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.join', $tour->id]]) !!}
            {!! Form::submit('Join it', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    @endif
@endif