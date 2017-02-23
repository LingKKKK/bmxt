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
            @foreach($pretty_data as $item)
            <tr>
                <td>{{$item['labeltext']}}</td>
                <td>{{$item['data']}}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="col-md-2"></div>
</div>
@stop

