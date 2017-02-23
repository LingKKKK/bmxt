<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>报名系统</title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets/bootstrap-3.3.7/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
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
   
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('assets/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            $('#capacha_area > img').click(function(){
                var timestamp = Date.parse(new Date());

                $(this).attr('src', "{{url('/capacha')}}"+"?t="+timestamp);
            });
        });
    </script>
  </body>