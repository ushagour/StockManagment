@extends('layouts.app')

@section('content')
		

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
				
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="{{route("home")}}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
					</ol>
                </div>
                <!-- row -->
           
                <div class="row">
                  
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                    
                                        <div class="tab-content">
                                        
                                            <div>
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        <h4 class="text-primary">Account Setting</h4>

                                                        <form method="POST" action="{{ route("users.update",["user"=>$user]) }}" enctype="multipart/form-data">
                                                            @csrf                                                      
                                                                  <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Email</label>
                                                                    <input type="email" placeholder="Email" value="{{$user->email}}" class="form-control">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">name</label>
                                                                    <input type="text"   value="{{$user->name}}"  class="form-control">
                                                                </div>
                                                            </div>
                                                         
                                                            <div class="mb-3">
                                                                <label class="form-label">Address 2</label>
                                                                <input type="text" placeholder="Apartment, studio, or floor" class="form-control">
                                                            </div>
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">City</label>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                                <div class="mb-3 col-md-4">
                                                                    <label class="form-label">State</label>
                                                                    <select class="form-control default-select wide" id="inputState">
                                                                        <option selected="">Choose...</option>
                                                                        <option>Option 1</option>
                                                                        <option>Option 2</option>
                                                                        <option>Option 3</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3 col-md-2">
                                                                    <label class="form-label">Zip</label>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <div class="form-check custom-checkbox">
																	<input type="checkbox" class="form-check-input" id="gridCheck">
																	<label class="form-check-label form-label" for="gridCheck"> Check me out</label>
																</div>
                                                            </div>
                                                            <button class="btn btn-primary" type="submit">update</button>
                                                            {{-- <button class="btn btn-danger" type="submit">cancel</button> --}}
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<!-- Modal -->
								
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
		@endsection