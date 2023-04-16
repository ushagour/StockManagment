

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
                                back_to_list
                            </a>
                        </div>
                        <div class="card-body pb-0">
                            <div class="basic-form">

                                <form method="POST" action="{{ route("stock.store") }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="required" for="asset_id">assets</label>
                                        <select class="form-control select2 {{ $errors->has('asset') ? 'is-invalid' : '' }}" name="asset_id" id="asset_id" required>
                                            @foreach($assets as $id => $asset)
                                                <option value="{{ $id }}" {{ old('asset_id') == $id ? 'selected' : '' }}>{{ $asset }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('asset'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('asset') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="required" for="asset_id">team</label>
                                        <select class="form-control select2 {{ $errors->has('team') ? 'is-invalid' : '' }}" name="team_id" id="team_id" required>
                                            @foreach($teams as $id => $team)
                                                <option value="{{ $id }}" {{ old('team_id') == $id ? 'selected' : '' }}>{{ $team }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('team'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('team') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="current_stock">current_stock</label>
                                        <input class="form-control {{ $errors->has('current_stock') ? 'is-invalid' : '' }}" type="number" name="current_stock" id="current_stock" value="{{ old('current_stock', '') }}" step="1">
                                        @if($errors->has('current_stock'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('current_stock') }}
                                            </div>
                                        @endif
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