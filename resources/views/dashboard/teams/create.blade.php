

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
                            <a class="btn btn-default" href="{{ route('team.index') }}">
                               back to list
                            </a>
                        </div>
                        <div class="card-body pb-0">
                            <div class="basic-form">

                                <form method="POST" action="{{ route("team.store") }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="required" for="name">name</label>
                                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                                        @if($errors->has('name'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-danger m-2" type="submit">
                                        save                                        </button>
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