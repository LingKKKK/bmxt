@extends('enroll.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1> {{$act['act_name']}}</h1>
        <p>
            {{ $act['remark']}}
        </p>
    </div>
</div>

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
         <form class="form-horizontal" method="post" action="/enroll/{{$act['id']}}">
            @foreach($form->fields as $tag)
                
            @if ($tag['type'] == 'text')
            <div class="form-group">
                <label for="{{$tag['id']}}">{{$tag['labeltext'] or ''}}</label>
                <input class="form-control" type="text" id="{{$tag['id']}}" value="{{ old($tag['name']) }}" name="{{$tag['name']}}" {{ $tag['required'] ? 'required' : '' }}>
            </div>
            @elseif ($tag['type'] == 'radio')
            <div class="radio">
                <label>
                    <input type="radio" name="{{$tag['name']}}" id="{{$tag['id']}}" value="{{$tag['value'] or ''}}" {{ $tag['checked'] or ''}} {{ $tag['required'] ? 'required' : '' }}>
                    {{$tag['labeltext'] or ''}}
                </label>
            </div>
            @elseif ($tag['type'] == 'checkbox')
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="{{$tag['id']}}" name="{{$tag['name']}}" value="{{$tag['value'] or ''}}" {{ $tag['checked'] or ''}} {{ $tag['required'] ? 'required' : '' }}>
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
                <select class="form-control" id="{{$tag['id']}}" name="{{$tag['name']}}"  {{$tag['multiple'] ? 'mutiple' : ''}} {{ $tag['required'] ? 'required' : '' }}>
                @foreach($tag['items'] as $value => $text)
                    <option value="{{$value}}">{{$text}}</option>
                @endforeach
                </select>
            </div>
            @elseif ($tag['type'] == 'radiolist')
            <div class="form-group">
                <div>
                    <label>{{$tag['labeltext'] or ''}}</label>
                </div>
                @if($tag['items'])
                @foreach($tag['items'] as $value => $text)
                <label class="radio-inline">
                    <input type="radio" name="{{ $tag['name'].'[]' }}" value="{{$value or ''}}" {{ $tag['required'] ? 'required' : '' }}>
                    {{$text or ''}}
                </label>
                @endforeach
                @endif
            </div>
            @elseif ($tag['type'] == 'checkboxlist')
            <div class="form-group">
                <div>
                    <label>{{$tag['labeltext'] or ''}}</label>
                </div>        
                @foreach($tag['items'] as $value => $text)
                <label class="checkbox-inline">
                    <input type="checkbox" name="{{ $tag['name'].'[]' }}" value="{{$value or ''}}" {{ $tag['required'] ? 'required' : '' }}  >
                    {{$text or ''}}
                </label>
                @endforeach
            </div>
            @else
            
            @endif
            @endforeach
    
            @if( $form->verificationtype == 'mobile')
            <div class="form-group form-inline">
                  <div class="form-group">
                  <label for="verificationcode">验证码</label>
                  <input type="text" class="form-control" id="verificationcode" name="verificationcode" data-verifyfield="mobile" placeholder="验证码" required>
                   </div>
                  <button id="getverifycode" data-toggle="modal" data-target="#myModal" class="btn btn-default">发送手机验证码</button>
            </div>
            @elseif( $form->verificationtype == 'email')
            <div class="form-group form-inline">
                  <div class="form-group">
                  <label for="verificationcode">验证码</label>
                  <input type="text" class="form-control"  id="verificationcode" name="verificationcode" data-verifyfield="email" placeholder="验证码" required>
                   </div>
                  <button id="getverifycode" data-toggle="modal" data-target="#myModal" class="btn btn-default">发送邮箱验证码</button>
            </div>
            @elseif( $form->verificationtype == 'captcha')
            <div id="captcha_area" class="form-group form-inline">
                <input type="text" id="captcha" name="captcha">
                <img class="captcha_img" src="{{captcha_src()}}">
            </div>
            @else 
           
            @endif

          
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
                <img class="captcha_img" = src="{{captcha_src()}}">
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

    function refresh_captcha($el) {
        var timestamp = Date.parse(new Date());
        $($el).attr('src', "{{url('/captcha')}}"+"?t="+timestamp);
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
        $('.captcha_img').click(function(){
           refresh_captcha(this);
        });

        $('#sendcaptchacode').click(function(){
            var captchacode = $('#captchacode').val();
            var mobile = $('#input_mobile').val();
            var email = $('#input_email').val();

            var verifyfield = $('#verificationcode').attr('data-verifyfield');
            if (verifyfield == 'email') {
                if (!email) {
                    alert('未填写的email');
                }
            }

            if (verifyfield == 'mobile') {
                if (!mobile) {
                    alert('未填写mobile');
                }
            }

            $.post(
                "{{url('/captcha/verify')}}",
                {
                    captcha : captchacode,
                    mobile  : mobile,
                    email   : email,
                    type    : verifyfield,
                },
                function(res){
                    if (res.status == 0) {
                        $('#myModal').modal('hide')
                        console.log(res.message);
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