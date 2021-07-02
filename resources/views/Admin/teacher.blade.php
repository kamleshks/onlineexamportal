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
            <h1 class="m-0 text-dark"> Teacher Dashboard</h1>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                

                <p>Active Members</p>
                @foreach ($actives as $a)
                  <h3> {{$a->active}}</h3>
                 @endforeach
                
                 
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
           
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                  <p>Inactive Inactive</p>
                  @foreach ($actives as $a)
                  <h3> {{$a->inactive}}</h3>
                 @endforeach

              
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                

                <p>Total Teachers</p>
                 @foreach ($roles as $a)
                  <h3> {{$a->teacher}}</h3>
                 @endforeach

              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
               

                <p>Total Students</p>
                 @foreach ($roles as $a)
                 <h3>  {{$a->student}}</h3>
                 @endforeach

              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
                         </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
                <div id="teacher" class="tab-pane">
                 <div id="Teachergrid"></div>
        </div>
        <div id="student"class="tab-pane">
                 <div id="Admingrid"></div>
        </div>
         <div id="exam"class="tab-pane">
                 <div id="examgrid">
                 <!-- <input type="text" name="tolerance"  placeholder='Question' class="k-textbox">-->
                   </div>
        </div>
         <div id="#uploadQuestions"class="tab-pane">
          </form>
          <input type="hidden" name="id[]" value="1">
          <div class="row" id="studdropdown">
                            <div class="col-md-3 ">
                                <select class="form-control" id="studentname"></select>
                                <button class="btn btn-primary btn-sm" id="questionSubmit"  type="submit">Submit</button>
                            </div>
                          </div>
        
           <div id="files">
            </form>
            </div>
            <div id="#importquestions"class="tab-pane">
             <div class="demo-section"  id="importfile">
               <div id="questionimport">
                   
                     <form  method="POST" id="formid" enctype="multipart/form-data">
                        @csrf
                       <input type="file" name="file" class="form-control">
                        <br>
                        <br>
                        <button class="btn btn-success btn-sm" id="upload_csv"  type="submit">Import CSV or Excel File</button>
                    </form>
                   </div>
             </div>
           </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
@section('javascript')
 <script src="https://kendo.cdn.telerik.com/2020.3.915/js/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2020.3.915/js/kendo.all.min.js"></script> 

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="{{asset('dist/js/kendo.dropdownlist.min.js')}}"></script>


<script type="text/javascript" src="{{URL::asset('js/Admin/teacher.js?')}}"></script>

@endsection