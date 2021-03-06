@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <img src="{{ $event->bannerFullPath() }}" class="img-responsive img-full-width">
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-3 categories-left">
            <div class="hidden-xs">
                <h3>Categorías</h3>
                <ul class="nav nav-pills nav-stacked">
                    @foreach($categories as $category)
                    <li role="presentation" class="active"><a href="{{ route('events.list-by-category', ['slug' => $category->slug]) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="hidden-sm hidden-md hidden-lg">
                <!-- Single button -->
                <div class="btn-group" style="width: 100%; margin-top: 10px;">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100%;">
                        Categorías <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" style="width: 100%;">
                        @foreach($categories as $category)
                            <li><a href="{{ route('events.list-by-category', ['slug' => $category->slug]) }}">{{ $category->name }}</a></li>
                            <li role="separator" class="divider"></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-9">            
            <div class="row">
                <div class="col-xs-12 col-md-8 event-content">
                    <h1>{{ $event->name }}</h1>
                    <div>
                        <div class="col-xs-12 row event-summary">
                            {{ $event->summary }}
                        </div>
                    </div>
                    <div class="row">
                        <img src="{{ $event->image }}" class="img-responsive">
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            {!! $event->description !!}
                        </div>
                    </div>
                    <div class="event-data">
                        <div class="row">
                            <div class="col-xs-4 event-data-label">
                                Fecha y hora:
                            </div>                        
                            <div class="col-xs-8">
                                {{ $event->formattedTime() }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 event-data-label">
                                Lugar:
                            </div>                        
                            <div class="col-xs-8">
                                {{ $event->place }}
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-xs-4 event-data-label">
                                Dirección:
                            </div>                        
                            <div class="col-xs-8">
                                {{ $event->address }}
                            </div>
                        </div>
                        <div class="row map-container">
                            <div id="map"></div>
                        </div>                            
                    </div>
                </div>

                <div class="col-xs-12 col-md-4 prices-block">
                    <h3>Entradas disponibles</h3>
                    <div class="prices">
                        @foreach($prices as $index => $price)
                        <div class="price-row{{ ($index == count($prices) - 1)? ' last' : '' }}">
                            <div class="col-xs-8 row">
                                <div class="col-xs-12">
                                    <p>{{ $price->description }}</p>
                                </div>
                                <div class="col-xs-12">
                                    ( {{ trans('currency.symbol') }} {{ $price->value }} )
                                </div>                            

                            </div>
                            <div class="col-xs-4">
                                @if(!is_null($user))
                                <a href="{{ route('cart.add', ['price_id' => $price->id]) }}" class="btn btn-warning">
                                    Comprar
                                </a>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="//maps.google.com/maps/api/js?key=AIzaSyCmtzzGjJtvA_dhYHlOPzdgVE7BpBOXdkM"></script>
<script type="text/javascript" src="{{ asset('assets/js/gmaps.min.js') }}"></script>
<script type="text/javascript">
var map = new GMaps({
    div: '#map',
    lat: {{$event->latitude}},
    lng: {{$event->longitude}}
});
map.addMarker({
    lat: {{$event->latitude}},
    lng: {{$event->longitude}},
    title: '{{ $event->place }}',
    infoWindow: {
        content: '{{ trim(preg_replace('/\s+/', ' ', $event->address)) }}'
    }
});
</script>
@stop