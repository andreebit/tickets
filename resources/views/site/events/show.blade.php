@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <img src="{{ $event->bannerFullPath() }}" class="img-responsive">
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-3 categories-left">
            <h3>Categorías</h3>
            <ul class="nav nav-pills nav-stacked">
                @foreach($categories as $category)
                <li role="presentation" class="active"><a href="{{ route('events.list-by-category', ['slug' => $category->slug]) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>            
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
                        <img src="{{ $event->imageFullPath() }}" class="img-responsive">
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
                                <a href="#" class="btn btn-warning">
                                    Comprar
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="//maps.google.com/maps/api/js"></script>
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
        content: '{{ $event->address }}'
    }
});
</script>
@stop