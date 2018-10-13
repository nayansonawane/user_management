@if (Session::has('error'))
    <div class="alert alert-danger">
        @if( Session::has('error'))
            <i class="fa fa-exclamation-triangle fa-lg"></i>
        @endif

        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! Session::get('error') !!}
    </div>
@endif

@if (Session::has('success'))
    <div class="alert alert-success">
        @if( Session::has('success'))
            <i class="fa fa-check-circle fa-lg"></i>
        @endif

        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! Session::get('success') !!}
    </div>
@endif