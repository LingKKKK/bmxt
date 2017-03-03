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
         <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">添加字段</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="form_add" class="form-horizontal" action="{{ url('/admin/activity/config').'/'.$id }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="input_name" class="col-sm-2 control-label">name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input_name" name="name" placeholder="name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="intpu_id" class="col-sm-2 control-label">id</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input_id" name="id" placeholder="id">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input_labeltext" class="col-sm-2 control-label">labeltext</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input_labeltext" name="labeltext" placeholder="labeltext">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input_required" class="col-sm-2 control-label">required</label>
                  <div class="checkbox col-sm-10">
                    <label>
                      <input id="input_required" name="required" type="checkbox">required
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input_type" class="col-sm-2 control-label">type</label>
                  <div class="col-sm-10">
                    <select id="input_type" name="type" class="form-control">
                      <option value="text">text</option>
                      <option value="text.email">text.email</option>
                      <option value="text.mobile">text.mobile</option>
                      <option value="text.date">text.date</option>
                      <option value="text.password">text.password</option>
                      <option value="select">select</option>
                      <option value="radiolist">radionlist</option>
                      <option value="checkboxlist">checkboxlist</option>
                      <option value="checkbox">checkbox</option>
                      <option value="file">file</option>
                    </select>                    
                  </div>
                </div>
                <!-- text -->
                <div class="form-group input-text input-text-email input-text-mobile">
                  <label for="input_placeholder" class="col-sm-2 control-label">placeholder</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input_placeholder" name="placeholder" placeholder="placeholder">
                  </div>
                </div>
                <div class="form-group input-text input-text-checkbox">
                  <label for="input_value" class="col-sm-2 control-label">value</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input_value" name="value" placeholder="value">
                  </div>
                </div>
                <div class="form-group input-text input-select input-radiolist input-checkboxlist">
                  <label for="input_items" class="col-sm-2 control-label">items</label>
                  <div class="col-sm-10">
                    <textarea rows="10" style="width: 100%;" name="items" id="input_items"></textarea>                    
                  </div>
     
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" id="btn_add" class="btn btn-info">添加</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">
            <div class="box-body table-responsive no-padding">
              <table id="fieldpreview" class="table table-hover">
                <tr>
                  <th>name</th>
                  <th>labeltext</th>
                  <th>type</th>
                  <th>required</th>
                  <th>items</th>
                </tr>
                @foreach($fields as $tag)
                <tr>
                  <td>{{ $tag['name'] }}</td>
                  <td>{{ $tag['labeltext'] }}</td>
                  <td>{{ $tag['type'] }}</td>
                  <td>{{ $tag['required'] }}</td>
                  <td></td>
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

<script type="text/javascript">

  function appendRow(rowdata) {
    var newRow = template('tablerow',{rowdata : rowdata});
    $('#fieldpreview').append(newRow);
  }

  $(function(){
    var ajaxFormOption = {
      type : "post",
      dataType : "json",
      data : [],
      success: function(res) {
        if (res.status == 0) {
          var rowdata = {};
          rowdata['name'] = $('#input_name').val();
          rowdata['labeltext'] = $('#input_labeltext').val();
          rowdata['type'] = $('#input_type').val();
          rowdata['required'] = $("#input_required").prop("checked");
          console.log(rowdata);
          appendRow(rowdata);
          console.log(res);
        }
      }
    };
    $('#btn_add').click(function(){
      $('#form_add').ajaxSubmit(ajaxFormOption);
       
    });
  });
</script>
<script type="text/javascript">


</script>

@stop