@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ __('site.weather') }}</div>

                <div class="panel-body weather-block">
                    <div>{{ __('site.city') }}: <b>{{ $weather->getCity() }}</b></div>
                    <div>{{ __('site.temperature') }}: <b>{{ $weather->getTemperature() }} {{ "&deg;C" }}</b></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
