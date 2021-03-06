@extends('layouts.app')

@section('title', 'Areas')

@section('content')

<div class="wrapper">
    <div class="row">

        <div class="md-col-12">
            <area-component></area-component>
        </div>





        @foreach ($areas as $country)
            <div class="md-col-12">
                <h2><a href="{{ route('user.area.store', $country) }}">{{ $country->name }}</a></h2>
                <div class="row flex masonry">
                    @foreach ($country->children as $state)
                        <div class="md-col-4 masonry__item">
                            <div class="panel shadow--3">
                                <div class="panel__header">
                                    <a href="{{ route('user.area.store', $state) }}">{{ $state->name }}</a>
                                </div>
                                <ul class="panel__list">
                                    @foreach ($state->children as $city)
                                        <li class="list__item">
                                            <a href="{{ route('user.area.store', $city) }}">{{ $city->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
