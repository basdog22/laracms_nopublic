@extends('frontend.lara.layout')

@section('content')
<hr/>
<div class="col-md-4 col-md-offset-4 well text-center">
    <h1>{{Lang::get('strings.403_error')}}</h1>
    <p>{{Lang::get('strings.403_error_msg')}}. <a class="btn btn-primary" href="javascript::history.back()">{{Lang::get('strings.click_to_go_back')}}</a></p>
</div>
@stop