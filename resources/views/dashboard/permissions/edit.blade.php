

@extends('layouts.app')

@section('content')
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="col-xl-12 col-lg-8 col-sm-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <a class="btn btn-default" href="{{ route('users.index') }}">
                               back to list
                            </a>
                        </div>
                        <div class="card-body pb-0">
                            <div class="basic-form">


                                <form method="POST" action="{{ route("permissions.update", [$permission->id]) }}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label class="required" for="title">{{ trans('cruds.permission.fields.title') }}</label>
                                        <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $permission->title) }}" required>
                                        @if($errors->has('title'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('title') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.permission.fields.title_helper') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-danger m-2" type="submit">
                                            {{ trans('global.save') }}
                                        </button>
                                    </div>
                                </form>                                   
                               
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