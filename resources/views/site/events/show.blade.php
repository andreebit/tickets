@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <img src="{{ $event->bannerFullPath() }}" class="img-responsive">
    </div>
</div>
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
            <div class="row">
                <div class="col-xs-12 col-md-9 event-content">
                    <h1>{{ $event->name }}</h1>
                    <div class="row">
                        <div class="col-xs-12">
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
                    <div class="row">

                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <h3>No te quedes fuera</h3>
                    <div class="row">
                        venta de tickets
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop