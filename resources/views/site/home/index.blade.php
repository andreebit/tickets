@extends('layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div id="slider" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @for($i=1; $i<=$quantity_slides; $i++)
                <li data-target="#slider" data-slide-to="{{ ($i-1) }}" class="{{ ($i == 1)? 'active' : '' }}"></li>
                @endfor
            </ol>                
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @foreach($slides as $index => $slide)
                <div class="item {{ ($index == 0)? 'active' : '' }}">
                    <a href="{{ $slide->url }}"><img class="img-responsive img-full-width" src="{{ $slide->image }}" alt="{{ $slide->title }}"></a>
                    <div class="carousel-caption">
                        {{ $slide->title }}
                    </div>
                </div>                    
                @endforeach
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="right carousel-control" href="#slider" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    </div>    
</div>
<div class="container home-main-container">
    <div class="row">
        <div class="col-xs-12 col-sm-3">
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
            <h3>Próximos eventos</h3>
            <div class="row">
                @foreach($events as $event)
                <div class="col-xs-12 col-sm-6 col-md-4 event-item">
                    <div class="event-container">
                        <a href="{{ route('events.show', ['slug' => $event->slug]) }}">
                            <h4 class="title-event">{{ $event->name }}</h4>
                            <img class="img-responsive" src="{{ $event->image }}" alt="{{ $event->name }}">
                            <p class="date-event">{{ $event->formattedTime() }}</p>
                            <p>{{ $event->place }}</p>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@stop