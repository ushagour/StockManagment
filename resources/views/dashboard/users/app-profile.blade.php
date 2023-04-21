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

                                                        <form method="POST" action="{{ route("users.update",["user"=>$user->id]) }}" enctype="multipart/form-data">
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
                                                         
                                                      
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Team</label>
                                                                    <input type="text" class="form-control" value="{{$user->team->name}}">
                                                                </div>
                                                                <div class="mb-3 col-md-4">
                                                                    <label class="form-label">Permissions</label>
                                                                    <select id="inputState" class="default-select form-control wide" style="display: none;">                                                                        <option selected="">Choose...</option>
                                                                        @foreach($user->roles as $key => $roles)
                                                                        <option selected="">{{ $roles->title }}</option>

                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3 col-md-2">
                                                                    <label class="form-label">Created at </label>
                                                                    <input type="date" class="form-control" value="{{ $user->created_at }}">
                                                                </div>
                                                            </div>
                             
                                                            <button class="btn btn-primary" type="submit">update</button>
                                                            {{-- <button class="btn btn-danger" type="submit">cancel</button> --}}
                                                        </form>
                                                        <hr>
                                                        <h4 class="text-primary">Password Update</h4>

                                                        <form method="POST" action="{{ route("profile.password.update") }}">
                                                            @csrf

                                                            <div class="row">

                                                                <div class="mb-3 col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="required" for="title">New {{ trans('cruds.user.fields.password') }}</label>
                                                                        <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                                                                        @if($errors->has('password'))
                                                                            <div class="invalid-feedback">
                                                                                {{ $errors->first('password') }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    </div>
                                                                    <div class="mb-3 col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="required" for="title">Repeat New {{ trans('cruds.user.fields.password') }}</label>
                                                                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required>
                                                                    </div>
                                                                   
                                                                </div>
                                                                      <div class="form-group">
                                                                        <button class="btn btn-danger" type="submit">
                                                                            {{ trans('global.save') }}
                                                                        </button>
                                                                    </div>
                                                                                                                                
                                                            </div>
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