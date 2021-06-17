@extends ('layout')

<style>
.invalid-feedback
{
	display: block !important;
}
table th{
    text-align: center;
}
.text-center{
    text-align: center;
}
.text-right{
    text-align: right;
    padding-bottom: 20px;
}
</style>

@section ('content')
        
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Participants</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                @if ($message = Session::get('success'))
                <div class="col-md-12 alert alert-success">
                {{ $message }}
                </div>
                @endif
                
                <div id='calendar'></div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
@endsection

<script>
window.onload = function() {
    load_participant_talks();
}
</script>