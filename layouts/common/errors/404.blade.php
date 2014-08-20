@extends('frontend.lara.layout')

@section('content')
<hr/>
<div class="col-md-5 col-md-offset-3 well text-center">
    <h1>{{Lang::get('strings.404_error')}}</h1>
    <p>{{Lang::get('strings.404_error_msg')}}. <a class="btn btn-primary" href="javascript::history.back()">{{Lang::get('strings.click_to_go_back')}}</a></p>
</div>
@stop