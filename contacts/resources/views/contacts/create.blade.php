@extends('layouts.app_login')

@section('content')

    <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                       <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="{{url('contacts')}}">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                             	 <li>
                                    <a href="{{url('contacts/create')}}">Add Contacts</a>                                   
                                </li>
                           
                            </ul>
							
                        </div>
					
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"></small>
						
                        </h1>
							@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
								</div>
							@endif
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
						<div class="row">
							<div class="col-md-12 ">
								<div class="portlet light bordered">
                                    
									
									<div class="portlet-body form">
									
									<form action="{{ route('contacts.store') }}" method="post">
										@csrf
									
										<div class="form-body">
											<div class="form-group">
                                                <label>First Name</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                     </span>
                                                  <input type="text" name="firstname" class="form-control" placeholder="First Name" required> 
												 </div>
                                            </div>
											<div class="form-group">
                                                <label>Last Name</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                     </span>
                                                  <input type="text" name="lastname" class="form-control" placeholder="Last Name" required> 
												 </div>
                                            </div>
											<div class="input_fields_email">
												<div class="form-group">
													<label>Email</label>
													<div class="input-group">
														<span class="input-group-addon">
																<i class="fa fa-envelope"></i>
														 </span>
													  <input type="email" name="email[]" class="form-control" placeholder="Email" style="width:90%;" required> 
														<a href="javascript:;" class="btn green add_more_email" style="float:right;" ><i class="fa fa-plus"></i></a>
													 </div>
													 
												</div>
											</div>
											<div class="input_fields_phone">
											<div class="form-group">
                                                <label>Phone Number</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                            <i class="fa fa-phone"></i>
                                                     </span>
                                                  <input type="number" name="phoneNumber[]" class="form-control" placeholder="Phone Number" maxlength="10" style="width:90%;" required>
													<a href="javascript:;" class="btn green add_more_phone" style="float:right;" ><i class="fa fa-plus"></i></a>
												 </div>
												 
												 
                                            </div>
											</div>
											 <div class="form-group">                                               
                                                    <div class="input-group center">
													
														<input type="submit" class="btn green" value="Add Contact" name="submit">
													
														<a href="{{url('contacts')}}" class="btn default" type="button">Cancel</a>
													</div>
                                             </div>
											
										</div>
									</form>
									</div>
								</div>
							</div>
						</div>
                     
                     </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
    <script>
        $(document).ready(function() {
       
        
        $('.add_more_email').click(function(e){ //click event on add more fields button having class add_more_button
          e.preventDefault();            
          $('.input_fields_email').append('<div style="margin-bottom:10px;float: left;width: 100%;" class="input-group"><span class="input-group-addon"> <i class="fa fa-envelope"></i></span><input type="email" name="email[]" class="form-control" placeholder="Email" style="width:90%;float:left" required><a href="#" class="btn red remove_field" style="float:right;"><i class="fa fa-minus"></i></a></div>'); //add input field
            
        });  
        $('.input_fields_email').on("click",".remove_field", function(e){ //user click on remove text links
            e.preventDefault(); 
			$(this).parent('div').remove();
        })
		
		 $('.add_more_phone').click(function(e){ //click event on add more fields button having class add_more_button
          e.preventDefault();            
          $('.input_fields_phone').append('<div style="margin-bottom:10px;float: left;width: 100%;" class="input-group"><span class="input-group-addon"> <i class="fa fa-phone"></i></span><input type="number" name="phoneNumber[]" class="form-control" placeholder="Phone Number" style="width:90%;float:left"><a href="#" class="btn red remove_field" style="float:right;"><i class="fa fa-minus"></i></a></div>'); //add input field
            
        });  
        $('.input_fields_phone').on("click",".remove_field", function(e){ //user click on remove text links
            e.preventDefault(); 
			$(this).parent('div').remove();
        });

    });
    </script>

@endsection
