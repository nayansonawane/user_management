@extends('admin.layout.master')    
@section('main_content')

            
            <div class="row">
                
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
				
				@include('admin.layout._operation_status')
                
                @if(isset($role_slug) && $role_slug == 'admin')
                <div class="col-lg-3 col-md-6">
	                    <div class="panel panel-primary">
	                        <div class="panel-heading">
	                            <div class="row">
	                                <div class="col-xs-3">
	                                    <i class="fa fa-users fa-5x"></i>
	                                </div>
	                                <div class="col-xs-9 text-right">
	                                    <div class="huge"></div>
	                                    <div>Users</div>
	                                </div>
	                            </div>
	                        </div>
	                        <a href="{{url('/user')}}">
	                            <div class="panel-footer">
	                                <span class="pull-left">View Details</span>
	                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                                <div class="clearfix"></div>
	                            </div>
	                        </a>
	                    </div>
                </div>

                @else

                <h3><center>Welcome to {{ $role_name }} Panel</center></h3>

                @endif




            </div>
        

@stop