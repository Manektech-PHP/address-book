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
                                    <span>Contacts</span>
                                </li>
                            </ul>
                            <div class="actions">
							   <a href="{{route('contacts.create')}}" class="btn green indexbtn">Add Contact</a>
							</div>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">
						Contacts
                        </h1>
							@if (session()->has('success'))
								<div class="alert alert-success">
									<ul>
										<li>{{ session('success') }}</li>
									</ul>
								</div>
							@endif
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
						<div class="mt-bootstrap-tables">
                            <div class="row">
							<div class="col-md-12">
                                    <div class="portlet light bordered">
                                        <div class="portlet-body">
                                            <table id="datatbl" class="table table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>First Name</th>
														<th>Last Name</th>
														<th>Emails</th>
														<th>Phone Numbers</th>
														<th>Actions</th>                                                                                           						
                                                    </tr>
                                                </thead>
												<tbody>
												@foreach($contacts as $contact)
													<tr>
														<td>{{$contact->firstname}}</td>
														<td>{{$contact->lastname}}</td>
														<td>
														{{$contact->emails->first()->email}} 														
														</td>
														<td>
														{{$contact->phonenumbers->first()->phoneNumber}} 																
														</td>
														<td>
															<a href="contacts/{{$contact->id}}/edit" class="fa fa-pencil"></a>
															
															<a href="contacts/delete/{{$contact->id}}" onclick="return confirm('Are You Sure ? Do you want to delete?');" class="fa fa-trash"></a>
															<a href="contacts/show/{{$contact->id}}" class="fa fa-eye"></a>
														</td>
													</tr>
												@endforeach
												</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
							</div>
						</div>
                     
                     </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->


@endsection
