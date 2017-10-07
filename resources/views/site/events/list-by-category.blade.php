@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-3">
            <div class="hidden-xs">
                <h3>Categorías</h3>
                <ul class="nav nav-pills nav-stacked">
                    @foreach($categories as $categoryMenuItem)
                        <li role="presentation" class="active"><a href="{{ route('events.list-by-category', ['slug' => $categoryMenuItem->slug]) }}">{{ $categoryMenuItem->name }}</a></li>
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
                        @foreach($categories as $categoryMenuItem)
                            <li><a href="{{ route('events.list-by-category', ['slug' => $categoryMenuItem->slug]) }}">{{ $categoryMenuItem->name }}</a></li>
                            <li role="separator" class="divider"></li>
                        @endforeach
                    </ul>
                </div>
            </div>
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