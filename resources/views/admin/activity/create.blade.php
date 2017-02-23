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
                  <label for="inputstart_time" class="col-sm-2 control-label">开始时间</label>
                  <div class="col-sm-10 input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="inputstart_time" name="start_time" placeholder="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputend_time" class="col-sm-2 control-label">结束时间</label>
                  <div class="col-sm-10 input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="inputend_time" name="end_time" placeholder="">
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
    $('#inputstart_time').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
    });

    $('#inputend_time').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
    });
});
</script>


@stop

