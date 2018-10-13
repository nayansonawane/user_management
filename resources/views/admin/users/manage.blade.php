@extends('admin.layout.master')    
@section('main_content')

<!-- DataTables CSS -->
<link href="{{url('/')}}/assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="{{url('/')}}/assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Manage Users
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">

        @include('admin.layout._operation_status')


        <div class="panel panel-default">
            <!-- <div class="panel-heading">
                DataTables Advanced Tables
            </div> -->
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>Mobile No.</th> 
                            <th>About</th>
                            <th>Birthday</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(isset($arr_users) && count($arr_users) > 0)
                            @foreach($arr_users as $key => $user)
                                <tr class="odd gradeX">
                                    <td>{{ $user['name'] or '' }}</td>
                                    <td>{{ $user['email'] or '' }}</td>
                                    <td>{{ $user['country'] or '' }}</td>
                                    <td>{{ $user['mobile_number'] or '' }}</td>
                                    <td title="{{$user['about'] or ''}}">{{ isset($user['about']) ? trim(str_limit($user['about'] , 80)) : "" }}</td>
                                    <td>{{ isset($user['dob']) ? date('d/m/Y', strtotime($user['dob'])):'-' }}</td>
                                    <td>
                                        <a href="{{url('/user/edit')}}/{{$user['id']}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- DataTables JavaScript -->
<script src="{{url('/')}}/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="{{url('/')}}/assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="{{url('/')}}/assets/vendor/datatables-responsive/dataTables.responsive.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>

@stop