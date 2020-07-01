@extends('layouts.app')

@section('content')
 <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Welcome !</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb p-0 m-0">
                                            <li class="breadcrumb-item"><a href="#">Inventory</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!--Widget-4 -->
                        <div class="row">
                           
                               <!-- Basic example -->
                            <div class="col-md-8 offset-md-2">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <h3 class="card-title">Product Import</h3></div><br>
                                         <div class="mb-0" >
                                           
                                                 <a href="{{route('export')}}" class="btn btn-primary float-right">Download Xlsx</a>
                                           </div>
                                          
                                        @if($errors->any())
                                        <div class="alert alert-danger">
                                            
                                            <ul>
                                                @foreach($errors->all as $error)
                                                <li>{{$error}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                    <div class="card-body">
                                        <form method="post" action="{{route('/import')}}" enctype="multipart/form-data">
                                        	@csrf
                                         
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">xlsx file import</label><br>
                                                <input type="file" id="exampleInputEmail1"
                                                name="import_file" required>
                                            </div>
                                           
                                            
                                          
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">upload</button>
                                        </form>
                                    </div>
                                    <!-- card-body -->
                                </div>
                                <!-- card -->
                            </div>
                        </div>
                         

                    </div>
                    <!-- end container-fluid -->

                </div>
                <!-- end content -->

                

             

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <script type="text/javascript">
	function readURL(input) {
		
     if(input.files && input.files[0])
     {
     	var reader=new FileReader();
     	reader.onload=function(e)
     	{
          $("#image").attr('src',e.target.result).height(80).width(80);
     	};
     	reader.readAsDataURL(input.files[0]);
     }
   }
</script>

@endsection

