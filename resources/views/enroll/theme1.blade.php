@extends('enroll.master')

@section('content')

<div class="row">
<div class="col-md-2"></div>

  @if (count($errors) > 0) 

  <div class="col-md-6 bg-warning">    
    <p class="">
    @foreach ($errors->all() as $error)
          {{ $error }}<br>
    @endforeach  
    </p>
  </div>
  @endif
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
         <form class="form-horizontal" method="post" action="/enroll/{{$id}}">
            @foreach($config['fieldlist'] as $tag)
                
            @if ($tag['type'] == 'text')
            <div class="form-group">
                <label for="{{$tag['id']}}">{{$tag['labeltext'] or ''}}</label>
                <input class="form-control" type="text" id="{{$tag['id']}}" value="{{ old($tag['name']) }}" name="{{$tag['name']}}">
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
            
            <div class="form-group form-inline">
                  <div class="form-group">
                  <label for="verificationcode">验证码</label>
                  <input type="text" class="form-control" id="verificationcode" name="verificationcode" placeholder="验证码" required>
                   </div>
                  <button id="getverifycode"   data-toggle="modal" data-target="#myModal" class="btn btn-default">获取验证码</button>
            </div>

          
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>

<div class="modal fade" tabindex="-1" id="myModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">请输入下图中的文字或字母</h4>
      </div>
      <div class="modal-body">
        <form class="form-inline">
            <div id="captcha_area" class="form-group">
                <input type="text" id="captchacode" name="captchacode">
                <img src="{{captcha_src()}}">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="sendcaptchacode" type="button" class="btn btn-primary">确定</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop

@section('scripts')
<script type="text/javascript">

    function refresh_captcha() {
        var timestamp = Date.parse(new Date());
        $('#captcha_area > img').attr('src', "{{url('/captcha')}}"+"?t="+timestamp);
    }

    function countdown() {
        var t = 60;
        var countdown = setInterval(function(){
            $('#getverifycode').html('获取验证码('+ t-- + ')');

            if (t <= 0) {
                $('#getverifycode').html('获取验证码');
                clearInterval(countdown);
            }
        },1000);
    }
    $(function(){
        $('#captcha_area > img').click(function(){
           refresh_captcha();
        });

        $('#sendcaptchacode').click(function(){
            var captchacode = $('#captchacode').val();
            var mobile = $('#mobile').val();

            $.post(
                "{{url('/captcha/verify')}}",
                {
                    captcha : captchacode,
                    mobile : mobile,
                },
                function(res){
                    if (res.status == 0) {
                        $('#myModal').modal('hide')
                        refresh_captcha();
                        countdown();
                    } else {
                        alert(res.message);
                    }
                }
            );
        });
    });
</script>
@stop