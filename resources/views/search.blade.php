<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/search.css')}}"> 
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
</head>
<body>
        <div class="header">
            <div class="inner">
                <img src="{{ asset('assets/img/logo-white-word.png')}}" alt="">
            </div>
        </div>
        <!-- <input class="button-print" type="button" value="打印" onclick="window.print()"> -->
        <div class="content">
            <div>
             @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                <span>{{$error}}</span>
                @endforeach 
             @endif   
            </div>
            <form id="form" action="/search"  method="POST" novalidate>
                <div class="inner">
                    <div class="input-field">
                        <span class="input-label">姓名  :</span>
                        <input data-type="name" class="input-field-text"  id="leader_name" type="text" name="leader_name">
                        <div class="tips"></div>
                    </div>
                    <div class="input-field">
                        <span class="input-label">身份证号  :</span>
                        <input data-type="ID" class="input-field-text"  id="leader_ID" type="text" name="leader_ID">
                        <div class="tips"></div>
                    </div>
                    <div class="input-field">
                        <span class="input-label">手机号  :</span>
                        <input data-type="mobile" class="input-field-text"  id="leader_mobile" type="text" name="leader_mobile">
                        <div class="tips"></div>
                    </div>
                    <span class="tips">tips: 请输入领队手机号,并至少填写领队姓名和领队身份证号的其中一项~</span>
                    <button type="submit">查询</button>
                </div>
            </form>
        </div>
        <div class="footer">
            <div class="inner">
                <img src="{{ asset('assets/img/logo-white-word.png')}}" alt="">
                <span class="sp1">© 2017 KenRobot  |  京 ICP备15039570号 </span>
                <span class="sp2">北京市海淀区天秀路10号中国农大国际创业园1号楼526</span>
            </div>
        </div>
<script type="text/javascript">

</script>
</body>
</html>
