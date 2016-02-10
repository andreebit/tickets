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
                    <img class="img-responsive" src="{{ $slide->imageFullPath() }}" alt="{{ $slide->title }}">
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
            <h3>Categorías</h3>
            <ul class="nav nav-pills nav-stacked">
                @foreach($categories as $category)
                <li role="presentation" class="active"><a href="#">{{ $category->name }}</a></li>
                @endforeach
            </ul>            
        </div>
        <div class="col-xs-12 col-sm-9">
            <h3>Eventos próximos</h3>
            <div class="row">
                @foreach($events as $event)
                <div class="col-xs-12 col-sm-6 col-md-4 event-item">
                    <div class="event-container">
                        <a href="#">
                            <h4 class="title-event">{{ $event->name }}</h4>
                            <img class="img-responsive" src="{{ $event->imageFullPath() }}" alt="{{ $event->name }}">
                            <p class="date-event">{{ $event->formattedTime() }}</p>
                            <p>{{ $event->summary }}</p>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@stop