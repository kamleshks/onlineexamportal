@extends('admin.master')
@section('style')
 <meta charset="utf-8"/>
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta name="_token" content="{{ csrf_token() }}">
    
    <style>html { font-size: 14px; font-family: Arial, Helvetica, sans-serif; }</style>
    
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2020.3.915/styles/kendo.common.min.css" />
   <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2020.3.915/styles/kendo.silver.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2020.3.915/styles/kendo.silver.mobile.min.css" />
    <style>
    #active
{
    font-size: 15px;
    color:white;
}
#inactive{
   font-size: 15px;
    color:white;
}
</style>
    
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Admin Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        

          <div id="Admingrid"></div>
          <div id="activeWindow" style="display:none">
             <div class="row" style='overflow:hidden;'>
        <div class="col-md-12">
            <label class="label" style='padding-bottom:10px;'>Are you sure make Active member.??</label>
        </div>
    </div>
    <div class="m-t-10 row">
        <div class="col">
            <a id="ActiveAction" class="k-button k-primary text-white float-right" data-role="button">OK</a>
        </div>
    </div>
          </div>
          <div id="InactiveWindow" style="display:none">
             <div class="row" style='overflow:hidden;'>
        <div class="col-md-12">
            <label class="label" style='padding-bottom:10px;'>Are You Want to InActive</label>
        </div>
    </div>
    <div class="m-t-10 row">
        <div class="col">
            <a id="InactiveAction" class="k-button k-primary text-white float-right" data-role="button">OK</a>
        </div>
    </div>
          </div>
             
            

         
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
@section('javascript')
 <script src="https://kendo.cdn.telerik.com/2020.3.915/js/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2020.3.915/js/kendo.all.min.js"></script> 
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script type="text/javascript" src="{{URL::asset('js/Admin/adminDashboard.js?')}}"></script>

@endsection