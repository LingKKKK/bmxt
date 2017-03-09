@extends('admin.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    报名
    <small>报名列表</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>主页</a></li>
    <li class="active">报名</li>

    <li class="active">列表</li>
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
         <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">创建活动</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{url('admin/activity/create')}}" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputact_name" class="col-sm-2 control-label">活动名称</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputact_name" name="act_name" placeholder="act_name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input_start_time" class="col-sm-2 control-label">开始时间</label>
                  <div class="col-sm-9 input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control" id="input_start_time" name="start_time" placeholder="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input_end_time" class="col-sm-2 control-label">结束时间</label>
                  <div class="col-sm-9 input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control" id="input_end_time" name="end_time" placeholder="">
                  </div>
                </div>
                <div class="form-group">
                <label for="input_status" class="col-sm-2 control-label">活动开启</label>
                <div class="checkbox col-sm-10">
                  <label>
                    <input id="input_status" name="status" type="checkbox">开始
                  </label>
                </div>
                </div>
                <div class="form-group">
                    <label for="input_verificationtype" class="col-sm-2 control-label">验证类型</label>
                    <div class="col-sm-10">
                     <select name="verificationtype" id="input_verificationtype" class="form-control">
                        <option value="captcha">图片验证码</option>
                        <option value="email">邮件验证码</option>
                        <option value="mobile">短信验证码</option>
                        <option value="none">无验证码</option>
                     </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="remark" class="col-sm-2 control-label">说明</label>
                    <div class="col-sm-10">
                      <textarea id="remark" name="remark" class="form-control" rows="4"></textarea>
                    </div>
                </div>
         
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info">提交</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
    </div>
</section>
<!-- /.content -->
@stop

@section('pre_scripts')
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>

<script src="{{ asset('assets/admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>

@stop

@section('scripts')
<script type="text/javascript">
 $(function(){
      //Date picker
    $('#input_start_time').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
    });

    $('#input_end_time').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
    });
});
</script>


@stop

