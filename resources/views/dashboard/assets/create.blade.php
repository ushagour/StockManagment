

@extends('layouts.app')

@section('content')
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="col-xl-12 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <a class="btn btn-default" href="{{ route('asset.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <div class="card-body pb-0">
                            <div class="basic-form">


                                <form method="POST" action="{{ route("asset.store") }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="required" for="name">{{ trans('cruds.asset.fields.name') }}</label>
                                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                                        @if($errors->has('name'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.asset.fields.name_helper') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">{{ trans('cruds.asset.fields.description') }}</label>
                                        <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                                        @if($errors->has('description'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('description') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.asset.fields.description_helper') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="required" for="danger_level">Danger level</label>
                                        <input class="form-control {{ $errors->has('danger_level') ? 'is-invalid' : '' }}" type="number" name="danger_level" id="danger_level" value="{{ old('danger_level', 0) }}" required>
                                        @if($errors->has('danger_level'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('danger_level') }}
                                            </div>
                                        @endif
                                        <span class="help-block"></span>
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