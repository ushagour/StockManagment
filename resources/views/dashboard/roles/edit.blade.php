

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


                                <form method="POST" action="{{ route("roles.update", [$role->id]) }}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label class="required" for="title">{{ trans('cruds.role.fields.title') }}</label>
                                        <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $role->title) }}" required>
                                        @if($errors->has('title'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('title') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.role.fields.title_helper') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="required" for="permissions">{{ trans('cruds.role.fields.permissions') }}</label>
                                        <div style="padding-bottom: 4px">
                                            <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                            <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                                        </div>
                                        <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple required>
                                            @foreach($permissions as $id => $permissions)
                                                <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('permissions'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('permissions') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.role.fields.permissions_helper') }}</span>
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
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
		
@endsection