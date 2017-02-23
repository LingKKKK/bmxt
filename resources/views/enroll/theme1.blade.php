@extends('enroll.master')

@section('content')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
         <form class="form-horizontal" method="post" action="/enroll/{{$id}}">
            @foreach($form_design['fields'] as $tag)
                
            @if ($tag['type'] == 'text')
            <div class="form-group">
                <label for="{{$tag['id']}}">{{$tag['labeltext'] or ''}}</label>
                <input class="form-control" type="text" id="{{$tag['id']}}" name="{{$tag['name']}}">
            </div>
            @elseif ($tag['type'] == 'radio')
            <div class="radio">
                <label>
                    <input type="radio" name="{{$tag['name']}}" id="{{$tag['id']}}" value="{{$tag['value'] or ''}}" {{ $tag['checked'] or ''}} >
                    {{$tag['labeltext'] or ''}}
                </label>
            </div>
            @elseif ($tag['type'] == 'checkbox')
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="{{$tag['id']}}" name="{{$tag['name']}}" value="{{$tag['value'] or ''}}" {{ $tag['checked'] or ''}}>
                    {{$tag['labeltext'] or ''}}
                </label>
            </div>   
            @elseif ($tag['type'] == 'select')
            <div class="form-group">
                <div>
                    <label>
                        {{$tag['labeltext'] or ''}}
                    </label>
                </div>
                <select class="form-control" id="{{$tag['id']}}" name="{{$tag['name']}}{{isset($tag['multiple']) ? '[]' : ''}}"  {{$tag['multiple'] or ''}}>   
                @foreach($tag['options'] as $option)
                    <option value="{{$option['value']}}">{{$option['text']}}</option>
                @endforeach
                </select>
            </div>
            @elseif ($tag['type'] == 'radiolist')
            <div class="form-group">
                <div>
                    <label>{{$tag['labeltext'] or ''}}</label>
                </div>
                @foreach($tag['items'] as $radio)
                <label class="radio-inline">
                    <input type="radio" name="{{isset($tag['name']) ? $tag['name'].'[]' : $radio['name']}}" id="{{$radio['id']}}" value="{{$radio['value'] or ''}}" {{ $radio['checked'] or ''}} >
                    {{$radio['labeltext'] or ''}}
                </label>
                @endforeach
            </div>
            @elseif ($tag['type'] == 'checkboxlist')
            <div class="form-group">
                <div>
                    <label>{{$tag['labeltext'] or ''}}</label>
                </div>                @foreach($tag['items'] as $checkbox)
                <label class="checkbox-inline">
                    <input type="checkbox" name="{{isset($tag['name']) ? $tag['name'].'[]' : $checkbox['name']}}" id="{{$checkbox['id']}}" value="{{$checkbox['value'] or ''}}" {{ $checkbox['checked'] or ''}} >
                    {{$checkbox['labeltext'] or ''}}
                </label>
                @endforeach
            </div>
            @else
            
            @endif
            @endforeach


            <div id="capacha_area" class="form-group">
                <input type="text" name="capacha">
                <img src="{{captcha_src()}}">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>
@stop

@section('scripts')
<script type="text/javascript">
    $(function(){
        $('#capacha_area > img').click(function(){
            var timestamp = Date.parse(new Date());

            $(this).attr('src', "{{url('/capacha')}}"+"?t="+timestamp);
        });
    });
</script>
@stop