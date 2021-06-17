@extends ('layout')

<style>
.invalid-feedback
{
	display: block !important;
}
table th{
    text-align: center;
}
.text-right{
    text-align: right;
    padding-bottom: 20px;
}
.text-center{
    text-align: center;
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
                        <h4 class="page-title">Speakers</h4>
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
                <div class="col-md-12 text-right">
                    <a href="{{ route('add_speaker') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add Speaker</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>SI No.</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody id="table_body">
                    
                    </tbody>
                </table>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
@endsection

<script>
window.onload = function() {
    load_speakers();
}
</script>