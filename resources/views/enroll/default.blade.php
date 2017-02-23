@extends('enroll.master')

@section('content')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
         <form class="form-horizontal" method="post" action="/enroll/{{$id}}">
            @foreach($form_design['fields'] as $tag)
            <div class="form-group">
                <label for="{{$tag['id']}}">{{$tag['labeltext']}}</label>
                 {{ parse_field($tag)  }}
            </div>
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