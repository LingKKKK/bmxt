@extends('enroll.master')

@section('content')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <table class="table">
            <tr>
               <th>属性</th>
               <th>值</th> 
            </tr>
            @foreach($pretty_data['titles'] as $name => $labeltext)
            <tr>
                <td>{{$labeltext}}</td>
                <td>{{$pretty_data['content'][$name]}}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="col-md-2"></div>
</div>
@stop

