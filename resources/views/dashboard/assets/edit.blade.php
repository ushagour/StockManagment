

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
                            <a class="btn btn-default" href="{{ route('asset.index') }}">
                               back to list
                            </a>
                        </div>
                        <div class="card-body pb-0">
                            <div class="basic-form">


                                <form method="POST" action="{{ route("asset.update", [$asset->id]) }}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label class="required" for="name">{{ trans('cruds.asset.fields.name') }}</label>
                                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ $asset->name }}" required>
                                        @if($errors->has('name'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.asset.fields.name_helper') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">{{ trans('cruds.asset.fields.description') }}</label>
                                        <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ $asset->description }}</textarea>
                                        @if($errors->has('description'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('description') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.asset.fields.description_helper') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="required" for="danger_level">Danger level</label>
                                        <input class="form-control {{ $errors->has('danger_level') ? 'is-invalid' : '' }}" type="number" name="danger_level" id="danger_level" value="{{ $asset->danger_level }}" required>
                                        @if($errors->has('danger_level'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('danger_level') }}
                                            </div>
                                        @endif
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-danger m-2" type="submit">
                                           save
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