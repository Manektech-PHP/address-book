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

									

									<form action="{{ route('contacts.update',['id'=>$contact->id]) }}" method="post">

										

										<input type="hidden" name="_method" value="PUT">

										@csrf

									

										<div class="form-body">

											<div class="form-group">

                                                <label>First Name</label>

                                                <div class="input-group">

                                                    <span class="input-group-addon">

                                                            <i class="fa fa-user"></i>

                                                     </span>

                                                  <input type="text" name="firstname" value="{{$contact->firstname}}" class="form-control" placeholder="First Name" disabled> 

												 </div>

                                            </div>

											<div class="form-group">

                                                <label>Last Name</label>

                                                <div class="input-group">

                                                    <span class="input-group-addon">

                                                            <i class="fa fa-user"></i>

                                                     </span>

                                                  <input type="text" name="lastname" value="{{$contact->lastname}}" class="form-control" placeholder="Last Name" disabled> 

												 </div>

                                            </div>

											<div class="input_fields_email">

												<div class="form-group">

												

													<label>Emails </label>

													<div class="input-group" style="margin-bottom:10px;">

														

													</div>

														@foreach($contact->emails as $email)

														<div class="input-group" style="margin-bottom:10px;">

														<span class="input-group-addon">

																<i class="fa fa-envelope"></i>

														 </span>

															<input type="hidden" name="emailid[]" value="{{$email->id}}">

															<input type="text" name="email[]" value="{{$email->email}}" class="form-control" placeholder="Email"  disabled>

																

														</div>

														@endforeach

														

													 

												</div>

												

											</div>

											<div class="input_fields_phone">

											<div class="form-group">

                                                <label>Phone Numbers </label>

												<div class="input-group" style="margin-bottom:10px;">

													

                                                </div>

													 @foreach($contact->phonenumbers as $phone)

													 <div class="input-group" style="margin-bottom:10px;">

														<span class="input-group-addon">

                                                            <i class="fa fa-phone"></i>

														</span>

														<input type="text" name="phoneNumber[]" value="{{$phone->phoneNumber}}" class="form-control" placeholder="Phone Number" disabled>

														<input type="hidden" name="phoneid[]" value="{{$phone->id}}">

														

														 </div>

													@endforeach

												

												 

												 

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



@endsection

