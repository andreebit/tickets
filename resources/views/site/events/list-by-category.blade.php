@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-3">
            <h3>Categorías</h3>
            <ul class="nav nav-pills nav-stacked">
                @foreach($categories as $category)
                <li role="presentation" class="active"><a href="{{ route('events.list-by-category', ['slug' => $category->slug]) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>            
        </div>
        <div class="col-xs-12 col-sm-9">
            <h3>{{ $category->name }}</h3>
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