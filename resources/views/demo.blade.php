<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <title>demo页面</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/matchbj.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/kenrobot.css')}}">
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/utils.js')}}"></script>
</head>
<body>
    <div class="main">
        <form id="form" name="form" action="/demo" onkeydown="if(event.keyCode==13)return false;" enctype="multipart/form-data" method="POST" novalidate>
            <div class="input-field">
                <span class="input-label">航班/车次  :</span>
                <input data-type="Alltype" required tip-warn="不能为空" tip-warn="" tip-info="输入您的航班/车次" class="input-field-text" type="text" value="">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">航班/车次  :</span>
                <input data-type="Alltype" required tip-warn="不能为空" tip-warn="" tip-info="输入您的航班/车次" class="input-field-text" type="text" value="">
                <div class="tips"></div>
            </div>
        </form>
    </div>
    <script type="text/javascript">
    
    </script>
</body>
</html>
