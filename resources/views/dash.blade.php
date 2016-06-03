@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>
            <div class="panel-body">
                <div class="col-md-3">
                    <div id="datepicker"></div>
                    <div class="row">
                        <div class="col-md-12" style="text-align: center;margin: 10px;0px;">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default" style="background-color: limegreen;">+</button>
                                <button type="button" class="btn btn-default" style="background-color: limegreen;">New</button>
                                <button type="button" class="btn btn-default" style="background-color: limegreen;"><span class="glyphicon glyphicon-chevron-down"></span></button>
                            </div>
                        </div>
                        <div class="col-md-12" style="text-align: center;margin: 10px;0px;">
                            Calenders
                        </div>
                        <div class="col-md-12" style="text-align: center;">
                            Clients
                        </div>
                        <div class="col-md-12" style="text-align: center;">
                            Stylists
                        </div>
                        <div class="col-md-12" style="text-align: center;">
                            Volenteers
                        </div>
                        <div class="col-md-12" style="text-align: center;">
                            Holidays
                        </div>
                        <div class="col-md-12" style="text-align: center;">
                            Personal
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    {!! $calendar->calendar() !!}
                    {!! $calendar->script() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection