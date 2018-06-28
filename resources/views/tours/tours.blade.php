@if ($tours)
    <div class="row">
        @foreach ($tours as $tour)
            <div class="tour">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <img src="{{ asset('storage/' . $tour->thum) }}" alt="images">
                            
                        </div>
                        <div class="panel-body">
                            <h4 class="tour-title">
                                {!! link_to_route('tours.show',$tour->tour_name,['id' => $tour->id]) !!}
                            </h4>
                            <p>{{ $tour->start_date }} ~ {{ $tour->end_date }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {!! $tours->render() !!}
@endif