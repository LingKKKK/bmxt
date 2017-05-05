<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lzsignup.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/kenrobot.css')}}">
  <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/jquery.tmpl.js')}}"></script>
  <script>
    // $.validator.setDefaults({
    //     submitHandler: function() {
    //       alert("提交事件!");
    //     }
    // });
    // $().ready(function() {
    //     $("#commentForm").validate();
    // });
  </script>
</head>
<body>
  <div class="wrap clearfix">
    <div class="header clearfix">
      <div class="stripe"></div>
      <div class="inner">
        <div class="clearfix">
          <button class="back-index">返回首页</button>
          <img class="img" src="" alt="">
        </div>
        <div class="enroll-title clearfix">
          <span class="title">报名专区</span>
          <p class="logo">SIGN  UP</p>
        </div>
        <div class="cut"></div>
        <div class="enroll-content clearfix">
          <p>达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦</p>
        </div>
      </div>
      </div>
    <div class="content clearfix">
      <span class="content-title">报名系统信息表单</span>
      <div class="cut"></div>
      <form id="form" enctype="multipart/form-data" method="post" action="/submitForm" novalidate>
        <div class="form">
          <div>
            <div class="input-field width415">
              <span class="input-label">学校  :</span>
              <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text " id="school_name" name="school_name" type="text" value="">
              <div class="tips"></div>
            </div>
            <div class="input-field width415">
              <span class="input-label">院系  :</span>
              <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text " id="department" name="department" type="text" value="">
              <div class="tips"></div>
            </div>
            <div class="cut"></div>
          </div>
          <div>
            <div class="input-field width450">
              <span class="input-label">领队姓名  :</span>
              <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="leader_name" name="leader_name" type="text" value="">
              <div class="tips"></div>
            </div>
            <div class="input-field width450">
              <span class="input-label">领队手机  :</span>
              <input data-type="mobile" required tip-info="请填写您的常用手机" class="input-field-text"  id="leader_mobile" type="text" name="leader_mobile" value="{{old('leader_mobile')}}">
              <div class="tips"></div>
            </div>
            <div class="input-field width450">
              <span class="input-label">领队邮箱  :</span>
              <input data-type="email" required class="input-field-text" tip-info="请填写正确的邮箱格式" id="leader_email" type="text" name="leader_email" required>                            
              <div class="tips"></div>
            </div>
            <div class="input-field width450">
              <span class="input-label">领队职务  :</span>
              <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="leader_job" name="leader_job" type="text" value="">
              <div class="tips"></div>
            </div>
            <div class="cut"></div>
          </div>
           <div>
            <ul class="team-nav">
              <li class="active">队伍1</li>
            </ul>
            <div class="button-add">
              <i class="icon kenrobot ken-add"></i>
            </div>
            <div class="clearfix"></div>
            <div class="team-list">
              <?php $i = 0 ?>
              @foreach((array)old('members') as $member)
              <div class="team clearfix active">
                <div class="input-field width450">
                  <span class="input-label">队伍名称  :</span>
                  <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="school_name" name="school_name" type="text" value="{{old('school_name')}}">
                  <div class="tips"></div>
                </div>
                <div class="input-field width875">
                  <span class="input-label">参赛项目  :</span>
                  <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text width700" id="project" name="project" type="text" value="{{old('project')}}" style="width: 700px;">
                  <div class="tips"></div>
                </div>
                <div class="members">
                  <span class="member-title">参赛队员</span>
                  <div class="input-field">
                    <span class="input-label">队长姓名  :</span>
                    <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="department" name="department" type="text" value="{{old('department')}}"">
                    <div class="tips"></div>
                  </div>
                  <div class="input-field">
                    <span class="input-label">队长电话  :</span>
                    <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="department" name="department" type="text" value="{{old('department')}}"">
                    <div class="tips"></div>
                  </div>
                  <div class="input-field">
                    <span class="input-label">队员姓名1  :</span>
                    <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="department" name="department" type="text" value="{{old('department')}}"">
                    <div class="tips"></div>
                  </div>
                  <div class="input-field">
                    <span class="input-label">队员姓名2  :</span>
                    <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="department" name="department" type="text" value="{{old('department')}}"">
                    <div class="tips"></div>
                  </div>
                  <div class="input-field">
                    <span class="input-label">队员姓名3  :</span>
                    <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="department" name="department" type="text" value="{{old('department')}}"">
                    <div class="tips"></div>
                  </div>
                </div>

                <div class="members">
                  <span class="member-title">指导教师<i class="addTeacher icon kenrobot ken-add"></i></span>
                  <div class="input-field">
                    <span class="input-label">教师姓名  :</span>
                    <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="department" name="department" type="text" value="{{old('department')}}"">
                    <div class="tips"></div>
                  </div>
                  <div class="input-field">
                    <span class="input-label">教师电话  :</span>
                    <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="department" name="department" type="text" value="{{old('department')}}"">
                    <div class="tips"></div>
                  </div>
                  <div class="input-field">
                    <span class="input-label">教师邮箱  :</span>
                    <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="department" name="department" type="text" value="{{old('department')}}"">
                    <div class="tips"></div>
                  </div>
                  <div class="input-field">
                    <span class="input-label">校内职务  :</span>
                    <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="department" name="department" type="text" value="{{old('department')}}"">
                    <div class="tips"></div>
                  </div>
                </div>
              </div>
              <?php $i++ ?>
              @endforeach
            </div>
          </div>
          <div class="cut" style="margin-top: 34px;"></div>
          <div>
            <div class="invoice-header clearfix">
              <span>发票抬头:</span>
              <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="invoice_header" name="invoice_header" type="text" value="{{old('invoice_header')}}"">
            </div>
          </div>
          <div class="cut" style="margin-top: 34px;"></div>
          <div>
            <div class="code-send clearfix">
              <span>验证码:</span>
              <input data-type="realname" required tip-warn="" tip-info="请输入手机短信收到的验证码" class="input-field-text" id="verificationcode" name="verificationcode" type="text" value="">
              <a id="tel" class="tel">发送验证码</a>
            </div>
          </div>
          <div class="logo-img"></div>
          <button class="submit" type="submit">申请报名</button>
        </div>
      </form>
    </div>
    <div class="footer clearfix">
      <div class="inner clearfix">
        <img class="" alt="">
      </div>
      <div class="bot"></div>
    </div>

    <div class="identifying">
      <div class="showBox">
        <span class="tip">提示: 请您在右侧输入图中的数字或者字母~</span>
        <span id="tipes">验证成功之后,我们会将验证码发送至您的手机:  <i></i></span>
        <span class="tipes-false">您输入的手机号码或者验证码有误,请重新输入!!!</span>
        <img src="{{url('/captcha')}}">
        <input id="v_code" name="v_code" type="text" placeholder="请输入">
        <a id="sendCode" class="yes">确认</a>
        <a class="no"><i class="icon kenrobot ken-close"></i></a>
      </div>
    </div>
  </div>
  <div id="div_ifelse"></div>
  <script id="ifelse" type="text/x-jquery-tmpl"> 
      <!-- 添加指导教师 -->
      <div class="members">
        <span class="member-title">指导教师<i class="closeTeacher icon kenrobot ken-close"></i></span>
        <div class="input-field">
          <span class="input-label">教师姓名  :</span>
          <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="team[{{$i}}][teacher_name]" name="team[{{$i}}][teacher_name]" type="text" value="{{old('teacher_name')}}">
          <div class="tips"></div>
        </div>
        <div class="input-field">
          <span class="input-label">教师电话  :</span>
          <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="team[{{$i}}][teacher_tel]" tel="team[{{$i}}][teacher_tel]" type="text" value="{{old('teacher_tel')}}">
          <div class="tips"></div>
        </div>
        <div class="input-field">
          <span class="input-label">教师邮箱  :</span>
          <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="team[{{$i}}][teacher_email]" name="team[{{$i}}][teacher_email]" type="text" value="{{old('teacher_email')}}">
          <div class="tips"></div>
        </div>
        <div class="input-field">
          <span class="input-label">校内职务  :</span>
          <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="team[{{$i}}][teacher_job]" name="team[{{$i}}][teacher_job]" type="text" value="{{old('teacher_job')}}">
          <div class="tips"></div>
        </div>
      </div>
  </script> 

    <script type="text/javascript">

    (function($){
      $.fn.tipInfo = function(tipMsg){
        $(this).siblings('.tips').html('<span class="cue"></span>');
      }

      $.fn.tipWarn = function(tipMsg) {
        $(this).siblings('.tips').html('<span class="unuse">x</span>')
      }

      $.fn.tipValid = function() {
        $(this).siblings('.tips').html('<span class="useable">√</i></span>');
      }

      $.fn.tipClear = function() {
        $(this).siblings('.tips').html('');
      }

      $.fn.refreshCaptcha = function(){
        if($(this).prop('tagName') == 'IMG'){
          var timestamp = Date.parse(new Date());
          $(this).attr('src', "{{url('/captcha')}}"+"?t="+timestamp);
        }
      }
    })(jQuery);
    //修改
    function refresh_captcha($el) {
      var timestamp = Date.parse(new Date());
      $($el).attr('src', "{{url('/captcha')}}"+"?t="+timestamp);
    }
    function countdown() {
      var t = 60;
      var countdown = setInterval(function(){
        $('#tel').html('重新获取验证码('+ t-- + ')s');
        $('#tel').addClass('active');
        if (t <= 0) {
          $('#tel').html('获取验证码');
          $('#tel').removeClass('active');
          clearInterval(countdown);
        }
      },1000);
    }
    //判断是否位真实姓名
    function isName(val) {
      reg= /^[\u4e00-\u9fa5a-z]+$/gi;
      if(!reg.test(val)) {
        return false;
      }
      return true;
    }
    //数字 英文 汉字
    function isMathEngCha(val) {
      reg= /^[\u4e00-\u9fa5a-z0-9]+$/gi;
      if(!reg.test(val)) {
        return false;
      }
      return true;
    }
    //数字 英文 汉字  agemenber
    function isAgemenber(val) {
      reg= /^[0-9]+$/gi;
      if(!reg.test(val)) {
        return false;
      }
      return true;
    }
    //邮件判断
    function isEmail(mail) {
      reg=/^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/gi;
      if(!reg.test(mail)) {
        return false;
      }
      return true;
    }
    //手机
    function isMobile(val) {
      reg = /^1(?:[38]\d|4[4579]|5[0-35-9]|7[35678])\d{8}$/;
      if(!reg.test(val)) {
        return false;
      }
      return true;
    }
    //身份证
    function isID(val) {        
      var vcity={ 11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古", 21:"辽宁",22:"吉林",23:"黑龙江",31:"上海",32:"江苏", 33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南", 42:"湖北",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆", 51:"四川",52:"贵州",53:"云南",54:"西藏",61:"陕西",62:"甘肃", 63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外"}; 
      var idCardReg =/(^\d{15}$)|(^\d{17}([0-9]|X|x))$/gi;

      if(!idCardReg.test(val)) {
        return false;
      }
      return true;
    }
    //校验表单字段
    function validField(el) {
      var $el = $(el);
      var name = $el.attr('name');
      var type = $el.attr('type');
      var val = $el.val();
      var datatype = $el.data('type');// 数据类型 email , mobile , ID,

      if (type == 'file') {
        if ($el.prop('required') && val == '') {
          $el.tipWarn('照片不能为空');
          return false;
        }
        
        var fileObj = document.getElementById($el.prop('id'));
        if(fileObj)
        {
          var f = fileObj.files[0];
          if(f)
          {
            if(f.size > 2 * 1024 * 1024)
            {
              $el.tipWarn('文件大小不能超过2M！');
              return false;
            }

          }
        }

      } else if(type == 'text') {
        if ($el.prop('required') && val == '') {
          $el.tipWarn('不能为空！');
          //console.log('不能')
          return false;
        }

        if (datatype == 'realname' && !isName(val)) {
          $el.tipWarn('姓名不能是数字或特殊字符，请重新输入!');
          return false;
        }

        if (datatype == 'schoolname' && !isMathEngCha(val)) {
          $el.tipWarn('不能为特殊字符,请重新输入!');
          return false;
        }

        if (datatype == 'agemenber' && !isAgemenber(val)) {
          $el.tipWarn('只能输入数字!');
          return false;
        }

        if (datatype == 'email' && !isEmail(val)) {
          $el.tipWarn('邮件格式不正确');
          //console.log('Email');

          return false;
        }

        if (datatype == 'mobile' && !isMobile(val)) {
          $el.tipWarn('手机格式不正确');
          return false;
        }

        if (datatype == 'ID' && ! isID(val)) {
          $el.tipWarn('身份证号格式不正确');
          return false;
        }
      }

      $el.tipValid();
      return true;
    }
    // 重新绑定事件, DOM发生变化时调用
    function rebindVlidation() {
      // 空间验证
      $("input").unbind('blur').blur(function(){
        validField(this);

        return false;
      });

      //输入提示
      $("input").unbind('focus').focus(function(){
        $(this).tipClear();
        var tip_info = $(this).attr('tip-info');
        var required = $(this).prop('required');
        var tip_info = tip_info ? tip_info : required ? '不能为空' : '';
        if (tip_info) {
          $(this).tipInfo(tip_info);
        }
        return false;
      });
      // 添加队伍信息按钮
      $('.button-add').unbind();
      $('.button-add').bind("click", function() {
        var li_num = $('.team-nav li').length + 1;
        // 添加li
        var num_li_list = '<li>队伍' + li_num + '</li>';
        $('.team-nav').append(num_li_list);
        teacher_list_num = 1;
        addMemberList();
        $('.team-nav li').eq(li_num - 1).addClass("active").siblings().removeClass("active");
        $(".team-list .team").eq(li_num - 1).addClass("active").siblings().removeClass("active");
        $('.team-list .active .members:eq(1) .member-title .ken-add').css('display', 'block');
        $('.team-list .active .members:eq(1) .member-title .closeTeacher').css('display', 'none');
      });
      // 点击切换队伍信息
      $('.team-nav li').unbind();
      $('.team-nav li').bind("click", function() {
        $(this).addClass("active").siblings().removeClass("active");
        var index = $(this).index();
        iNow = index;
        $(".team-list .team").eq(iNow).addClass("active").siblings().removeClass("active");
        $('.team-list .active .members:eq(1) .member-title .ken-add').css('display', 'block');
        $('.team-list .active .members:eq(1) .member-title .closeTeacher').css('display', 'none');
      })
      // 添加队伍信息
      var users = [{ID: 'think8848',Name: 'Joseph Chan',Status: 1,App: 0}];
      $(".addTeacher").unbind();
      $(".addTeacher").bind("click",function(){
        addTeacherList();
        $(".closeTeacher").unbind();
        deleteList();
      });
    }
    // 更新预览界面
    function updatePreview() {
      $('input,select').each(function(){
        var type = $(this).prop('type');
        var id = $(this).prop('id');
        var name = $(this).prop('name');
        var val = $(this).val();
        if (type == 'select-one') {
          val = $('#'+id+' option:selected').val();
        }

        if (type == 'text' || type == 'select-one') {
          $('#preview_' + id).html(val);
        }

        if (type == 'radio') {
          var chkVal = $('input:radio[name="'+name+'"]:checked').val();
          $('#preview_' + name).html(chkVal);
        }
      });
    }

    function deleteList() {
      $(".closeTeacher").bind("click", function() {
        console.log('删除元素')
        $(this).parents('.member-title').parents('.members').remove();
        teacher_list_num -= 1;
      });
    }
    // 点击确认输入验证码
    $('.identifying .yes').click(function() {
      console.log('获取验证码')
      // $('.identifying').removeClass('active');
      var captchacode = $('#v_code').val();
      var mobile = $('#leader_mobile').val();
      // console.log(mobile);
      var type = 'mobile';
      console.log(captchacode,mobile,type);
      $.post(
        "{{url('/verificationcode/send')}}",
        {
          type    : type,
          captcha : captchacode,
          mobile  : mobile,
        },
        function(res){
          if (res.status == 0) {
            console.log('验证码填写成功并确定')
            refresh_captcha();
            $('.identifying').removeClass('active');
            countdown();

          } else {
            console.log(res)
            $('.tipes-false').css('opacity', 1);
          }
        }
      );
    });

    function submitCheck() {
      var prevent = false;
      var $inputs = $($('form')).find('input').each(function(){
      var ret = validField(this);
         console.log($(this).attr('name'));
         if (!ret) {
         prevent = true;
         }
      });
      console.log('prevent', prevent);
      if (prevent) {
        return false;
      }
    }

    var memberListNum = 0;
    var teacher_list_num = 1;

    addMemberList();
    $('.team-nav li:eq(0)').click();

    // 判断 如果当前的teacher_else {list_num 等于1 那么让teacher_list_num = 1;
    function addMemberList() {
      memberListNum += 1;
      var fieldHtml = '';
      // console.log(fieldHtml);
      fieldHtml += '<div class="team clearfix">';
      // console.log(fieldHtml);
      fieldHtml += buildField('input-field width450', '队伍名称', 'team[' + memberListNum + '][name]', 'name');
      fieldHtml += selectField('input-field width875', '参赛项目', 'team[' + memberListNum + '][department]', 'department');
      fieldHtml += buildMember('参赛队员', '队长姓名', 'team[' + memberListNum + '][captain_name]', '队长电话', 'team[' + memberListNum + '][captain_tel]', 'team[' + memberListNum + '][member_name1]', 'team[' + memberListNum + '][member_name2]', 'team[' + memberListNum + '][member_name3]');
      fieldHtml += buildTeaacher('指导教师', 'team[' + memberListNum + '][' + teacher_list_num + '][teacher_name]', 'team[' + memberListNum + '][' + teacher_list_num + '][teacher_tel]', 'team[' + memberListNum + '][' + teacher_list_num + '][teacher_email]', 'team[' + memberListNum + '][' + teacher_list_num + '][teacher_job]');
      fieldHtml += '</div>';
      console.log(fieldHtml);
      $('.team-list').append(fieldHtml);
      // memberListNum += 1;
      rebindVlidation();
    }
    function addTeacherList() {
      var fieldHtml = buildTeaacher('指导教师', 'team[' + memberListNum + '][' + teacher_list_num + '][teacher_name]', 'team[' + memberListNum + '][' + teacher_list_num + '][teacher_tel]', 'team[' + memberListNum + '][' + teacher_list_num + '][teacher_email]', 'team[' + memberListNum + '][' + teacher_list_num + '][teacher_job]');
      $('.team-list .active').append(fieldHtml);
    }
    function teacherNumChange() {
      teacher_list_num = $('.team-list .active .members').length - 1;
      console.log(teacher_list_num);
    };
    function teamNumChange() {
      console.log(memberListNum);
      memberListNum = $('.team-nav .active').index() + 1;
    };
    // 添加队伍信息部分
    function buildField(className, lablename, name, variable) {
      // teamNumChange();
      var fieldHtml = '';
      fieldHtml += '<div class="' + className + '">';
      fieldHtml += '<span class="input-label">' + lablename + '  :</span>';
      fieldHtml += '<input data-type="realname" required tip-warn="" tip-info="" class="input-field-text" name="' + name + '" type="text" value="{{old('+ variable +')}}">';
      fieldHtml += '<div class="tips"></div></div>';
      // console.log(fieldHtml);
      return fieldHtml;
    }
    // 添加select部分
    function selectField(className, lablename, name, variable) {
      // teamNumChange();
      var fieldHtml = '';
      fieldHtml += '<div class="' + className + '">';
      fieldHtml += '<span class="input-label">' + lablename + '  :</span>';
      fieldHtml += '<select id="competition_type" name="' + name + 'competition_type" class="input-field-text">';
      fieldHtml += '<option value="">21312</option>';
      fieldHtml += '<select>';
      fieldHtml += '<div class="tips"></div></div>';
      // console.log(fieldHtml);
      return fieldHtml;
    }
    // 队员部分
    function buildMember(lablename, captain_name, captain_tel, member1 ,member2 ,member3) {
      // teamNumChange();
      var fieldHtml = '';
      fieldHtml += '<div class="members">';
      fieldHtml += '<span class="member-title">' + lablename + '</span>';
      fieldHtml += '<div class="input-field">';
      fieldHtml += '<span class="input-label">队长姓名  :</span>';
      fieldHtml += '<input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" name="'+ captain_name +'" type="text" value="{{old('captain_name')}}"">';
      fieldHtml += '<div class="tips"></div></div>';
      fieldHtml += '<div class="input-field">';
      fieldHtml += '<span class="input-label">队长电话  :</span>';
      fieldHtml += '<input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" name="' + captain_tel + '" type="text" value="{{old('captain_tel')}}"">';
      fieldHtml += '<div class="tips"></div></div>';
      fieldHtml += '<div class="input-field">';
      fieldHtml += '<span class="input-label">队员姓名1  :</span>';
      fieldHtml += '<input data-type="realname" class="input-field-text" name="' + member1 + '" type="text" value="{{old('member_name1')}}"">';
      fieldHtml += '<div class="tips"></div></div>';
      fieldHtml += '<div class="input-field">';
      fieldHtml += '<span class="input-label">队员姓名2  :</span>';
      fieldHtml += '<input data-type="realname" class="input-field-text" name="' + member2 + '" type="text" value="{{old('member_name2')}}"">';
      fieldHtml += '<div class="tips"></div></div>';
      fieldHtml += '<div class="input-field">';
      fieldHtml += '<span class="input-label">队员姓名3  :</span>';
      fieldHtml += '<input data-type="realname" class="input-field-text" name="' + member3 + '" type="text" value="{{old('member_name3')}}"">';
      fieldHtml += '<div class="tips"></div></div></div>';
      // console.log(fieldHtml);
      return fieldHtml;
    }
    // 添加指导老师部分
    function buildTeaacher (lablename, name, tel, email, job){
      // teamNumChange();
      var fieldHtml = '';
      fieldHtml += '<div class="members">';
      fieldHtml += '';
      fieldHtml += '<span class="member-title">' + lablename + '<i class="addTeacher icon kenrobot ken-add"></i><span class="closeTeacher icon kenrobot ken-close"></span></span>';
      fieldHtml += '<div class="input-field">';
      fieldHtml += '<span class="input-label">教师姓名  :</span>';
      fieldHtml += '<input data-type="realname" required class="input-field-text" name="' + name + '" type="text" value="{{old('teacher_name')}}"">';
      fieldHtml += '<div class="tips"></div></div>';
      fieldHtml += '<div class="input-field">';
      fieldHtml += '<span class="input-label">教师电话  :</span>';
      fieldHtml += '<input data-type="realname" required class="input-field-text" name="' + tel + '" type="text" value="{{old('teacher_tel')}}"">';
      fieldHtml += '<div class="tips"></div>';
      fieldHtml += '</div><div class="input-field">';
      fieldHtml += '<span class="input-label">教师邮箱  :</span>';
      fieldHtml += '<input data-type="realname" required class="input-field-text" name="' + email + '" type="text" value="{{old('teacher_email')}}"">';
      fieldHtml += '<div class="tips"></div></div>';
      fieldHtml += '<div class="input-field">';
      fieldHtml += '<span class="input-label">校内职务  :</span>';
      fieldHtml += '<input data-type="realname" required class="input-field-text" name="' + job + '" type="text" value="{{old('teacher_job')}}"">';
      fieldHtml += '<div class="tips"></div></div>';
      // memberListNum -= 1;
      teacher_list_num += 1;
      return fieldHtml;
    }

    $(function(){
      // 点击刷新验证码图片
      $('.identifying .showBox img').click(function (){
        $(this).refreshCaptcha();
      });
      //更新表单验证绑定
      $('.submit').click(function(){
        var prevent = false;
        var $inputs = $($('form')).find('input').each(function(){
        var ret = validField(this);
        console.log($(this).attr('name'), ret);
        if (!ret) {
            prevent = true;
           }
        });
        console.log('prevent', prevent);
        if (prevent) {
          return false;
        }
      });
      rebindVlidation();
    })

    // 发送手机验证码
    $('#tel').click(function() {
      console.log(1);
      $('.identifying').addClass('active');
      var partten = /^1[3,5,8]\d{9}$/;
      if(partten.test($('#leader_mobile').val())){
         $('.identifying').addClass('active');
         $('#tipes i').html($('#leader_mobile').val());
         countdown();
      }else {
         //console.log('格式错误');
      }
    });

    $('.identifying .showBox .no').click(function() {
      $('.identifying').removeClass('active');
    });

    $('.falseCodeAlert').click(function(){
      $(this).css('display', 'none');
    })
  </script>



</body>
</html>
