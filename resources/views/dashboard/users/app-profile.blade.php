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
                    <div style="margin-bottom: 10px;" class="row">
                        <div class="col-lg-12 mt-2">
                    @if (\Session::has('alert-success'))
                      
        
                        <div class="alert alert-success solid alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                            <strong>Success!</strong> {!! \Session::get('message') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                            </button>
                        </div>
                    @endif
                        
                    @if (\Session::has('danger'))
                    <div class="alert alert-danger solid alert-dismissible fade show">
                        <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                        <strong>Error!</strong> {!! \Session::get('danger') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button>
                    </div>
        
                                 @endif
                        
                    @if (\Session::has('warning'))
        
                    <div class="alert alert-warning solid alert-dismissible fade show">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                        <strong>Warning!</strong>{!! \Session::get('warning') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button>
                    </div>
                    
                    @endif
                </div>
                </div>
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
                                                                    <input type="text" class="form-control" value="{{$user->team->name ?? ''}}">
                                                                </div>
                                                                <div class="mb-3 col-md-4">
                                                                    <label class="form-label">Role</label>
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
                                                        <hr>
                                                        <form method="POST" action="{{ route('upload.image') }}" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="input-group">
                                                                <div class="form-file">
                                                                    <input type="file" name="image" class="form-file-input form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <button class="btn btn-danger" type="submit">
                                                                    {{ trans('global.save') }}
                                                                </button>
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