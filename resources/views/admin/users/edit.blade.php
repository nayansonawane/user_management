@extends('admin.layout.master')    
@section('main_content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  $( function() {
    $( "#datepicker" ).datepicker({
        dateFormat: 'dd/mm/yy'
    });
  } );
</script>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit User</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">

        @include('admin.layout._operation_status')

        <div class="panel panel-default">
        
            <!-- <div class="panel-heading">
                Basic Form Elements
            </div> -->

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" name="form_create_user" method="POST" action="{{url('user/update')}}" enctype="multipart/form-data"> 
                            
                            {{csrf_field()}}
                        
                            <input type="hidden" name="user_id" value="{{$arr_user['id'] or ''}}">

                            <div class="form-group">
                                <label>Name <sup class="form_error">*</sup> </label>
                                <input class="form-control" type="text" placeholder="Enter Name" name="name" 
                                value="{{$arr_user['name'] or ''}}" >
                                <span class="form_error">{{$errors->first('name')}}</span>
                            </div>

                            <div class="form-group">
                                <label>Email <sup class="form_error">*</sup></label>
                                <input class="form-control" type="text" placeholder="Enter Email" name="email" value="{{$arr_user['email'] or ''}}" >
                                <span class="form_error">{{$errors->first('email')}}</span>
                            </div>

                            <div class="form-group">
                                <label>Country <sup class="form_error">*</sup></label>
                                <input class="form-control" type="text" placeholder="Enter Country" name="country" value="{{$arr_user['country'] or ''}}">
                                <span class="form_error">{{$errors->first('country')}}</span>
                            </div>
                            
                            <div class="form-group">
                                <label>Mobile No. <sup class="form_error">*</sup></label>
                                <input class="form-control" type="text" placeholder="Enter Mobile No." name="mobile_number" value="{{$arr_user['mobile_number'] or ''}}" >
                                <span class="form_error">{{$errors->first('mobile_number')}}</span>
                            </div>

                            <div class="form-group">
                                <label>About</label>
                                <textarea class="form-control" rows="3" name="about" placeholder="Enter About">{{$arr_user['about'] or ''}}</textarea>
                                <span class="form_error"></span>
                            </div>

                            <div class="form-group">
                                <label>Birthday <sup class="form_error">*</sup></label>
                                <input class="form-control" type="text" id="datepicker" placeholder="Enter Birthday" name="dob" value="{{$arr_user['dob'] or ''}}">
                                <span class="form_error">{{$errors->first('mobile_number')}}</span>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Update</button>

                        </form>
                    </div>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@stop