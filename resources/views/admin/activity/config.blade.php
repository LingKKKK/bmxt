@extends('admin.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    报名
    <small>报名表配置</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>主页</a></li>
    <li class="active">报名</li>

    <li class="active">配置</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

 <div class="row">
      @if (count($errors) > 0) 
      <div class=" col-md-6 alert alert-warning alert-dismissible">
      <h4><i class="icon fa fa-warning"></i> 错误!</h4>
        @foreach ($errors->all() as $error)
            {{ $error }}<br/>
        @endforeach 
      </div>
      @endif
     
    </div>
    <div class="row">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">表单配置</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form id="form_editform" class="form-horizontal" action="{{ url('/admin/activity/editform').'/'.$id }}">
            <div class="box-body">
      
              <div class="form-group">
                <label for="input_theme" class="col-sm-3 control-label">主题</label>
                <div class="col-sm-9">
                  <select id="input_theme" name="theme" class="form-control">
                    <option value="default">* 默认</option>
                  </select>                    
                </div>
              </div>
              <div class="form-group">
                <label for="input_verificationtype" class="col-sm-3 control-label">表单验证码</label>
                <div class="col-sm-9">
                  <select id="input_verificationtype" name="verificationtype" class="form-control">
                      <option value="captcha" {{$form->verificationtype == 'captcha' ? 'selected="selected"' : ''}}> {{$form->verificationtype == 'captcha' ? '*' : ''}}图片验证码</option>
                      <option value="mobile" {{$form->verificationtype == 'mobile' ? 'selected="selected"' : ''}}>{{$form->verificationtype == 'mobile' ? '*' : ''}} 手机验证码</option>
                      <option value="email" {{$form->verificationtype == 'email' ? 'selected="selected"' : ''}}>{{$form->verificationtype == 'email' ? '*' : ''}} 邮件验证码</option>
                  </select>                    
                </div>
              </div>
   
            </div>
            <!-- /.box-body -->
            <div class="box-footer ">
              <button type="button" id="btn_editform" class="btn btn-info">修改</button>
            </div>
            <!-- /.box-footer -->
          </form>
        </div>
    </div>
    <div class="row">
         <div class="col-md-4">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">添加字段</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="form_addfield" class="form-horizontal" action="{{ url('/admin/activity/addfield').'/'.$id }}">
              <div class="box-body">
        
                <div class="form-group">
                  <label for="input_labeltext" class="col-sm-3 control-label">字段名</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="input_labeltext" name="labeltext" placeholder="labeltext">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input_required" class="col-sm-3 control-label">是否必填</label>
                  <div class="checkbox col-sm-9">
                    <label>
                      <input id="input_required" name="required" type="checkbox">必填
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input_type" class="col-sm-3 control-label">类型</label>
                  <div class="col-sm-9">
                    <select id="input_type" name="type" class="form-control">
                      <option value="text">text</option>
                      <option value="text.email">text.email</option>
                      <option value="text.mobile">text.mobile</option>
                      <option value="text.date">text.date</option>
                      <option value="text.password">text.password</option>
                      <option value="select">select</option>
                      <option value="radiolist">radiolist</option>
                      <option value="checkboxlist">checkboxlist</option>
                      <option value="checkbox">checkbox</option>
                      <option value="file">file</option>
                    </select>                    
                  </div>
                </div>

                <div class="form-group input-text input-select input-radiolist input-checkboxlist">
                  <label for="input_items" class="col-sm-3 control-label">列表项</label>
                  <div class="col-sm-9">
                    <textarea rows="10" style="width: 100%;" name="items" id="input_items"></textarea>                    
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer ">
                <button type="button" id="btn_addfield" class="btn btn-info">添加</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-8">
            <div class="box-body table-responsive no-padding">
              <table id="fieldpreview" class="table table-hover">
                <tr>
                  <th>编号</th>
                  <th>字段名</th>
                  <th>类型</th>
                  <th>是否必填</th>
                  <th>选项列表</th>
                  <th>操作</th>
                </tr>
                @foreach($form->fields as $tag)
                <tr>
                  <th></th>
                  <td>{{ $tag->labeltext }}</td>
                  <td>{{ $tag->type }}</td>
                  <td>{{ $tag->required ? 'true' : 'false' }}</td>
                  <td>{{ join("  ", $tag->items) }}
                  @if(!empty($tag->items))
                    @foreach($tag->items as $k => $item)
                      {{$k.'. '.$item.' '}}
                    @endforeach
                  @endif
                  </td>
                  <td>
                    <a class="field-edit" data-key='{{ $tag->name }}' href="javascript:void(0);">编辑</a>
                    <a class="field-del"  data-key='{{ $tag->name }}' href="javascript:void(0);">删除</a>
                  </td>
                </tr>
                @endforeach

              </table>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
@stop

@section('scripts')
<script src="{{ asset('assets/admin/plugins/jQuery/jquery.form.min.js') }}"></script>
<script src="{{ asset('assets/js/artTemplate/template.js') }}"></script>

<script id="tablerow" type="text/html">
<tr>
    @{{each rowdata as value i}}
        <td>@{{value}}</td>
    @{{/each}}
</tr>
</script>
<script id="" type="text/javascript">
  
</script>

<script type="text/javascript">

  function appendRow(rowdata) {
    var newRow = template('tablerow',{rowdata : rowdata});
    $('#fieldpreview').append(newRow);
  }

  $(function(){

    var addFieldOption = {
      type : "post",
      dataType : "json",
      data : [],
      success: function(res) {
        if (res.status == 0) {
          var rowdata = res.data.field;
          console.log(rowdata);
          appendRow(rowdata);
          console.log(res);
        }
      }
    };
    $('#btn_addfield').click(function(){
      $('#form_addfield').ajaxSubmit(addFieldOption);
    });

    var editform = {
      type : "post",
      dataType : "json",
      data : [],
      success: function(res) {
        if (res.status == 0) {
            $("#input_theme").val(res.data.theme);
            
            $("#input_theme").val(res.data.verificationtype);

            $("#input_verificationtype").find("option[text='pxx']").attr("selected",true);


        }
      }
    };
    $('#btn_editform').click(function(){
      $('#form_editform').ajaxSubmit(editform);
    });



  });
</script>
<script type="text/javascript">


</script>

@stop