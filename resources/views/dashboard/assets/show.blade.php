

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
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex px-0 justify-content-between">
                                    <strong>id</strong>
                                    <span class="mb-0">{{ $asset->id ?? '' }}</span>
                                </li>
                                <li class="list-group-item d-flex px-0 justify-content-between">
                                    <strong>name</strong>
                                    <span class="mb-0">{{ $asset->name ?? '' }}</span>
                                </li>
                                <li class="list-group-item d-flex px-0 justify-content-between">
                                    <strong>Designation</strong>
                                    <span class="mb-0">{{ $asset->description ?? '' }}</span>
                                </li>
                                <li class="list-group-item d-flex px-0 justify-content-between">
                                    <strong>Danger level</strong>
                                    <span class="mb-0">{{ $asset->danger_level }}</span>
                                </li>


                           
                            </ul>
                        </div>
                        <div class="card-footer pt-0 pb-0 text-center">
                            <div class="row">
                                <div class="col-4 pt-3 pb-3 border-end">
                                    <h3 class="mb-1 text-primary">150</h3>
                                    <span>Projects</span>
                                </div>
                                <div class="col-4 pt-3 pb-3 border-end">
                                    <h3 class="mb-1 text-primary">140</h3>
                                    <span>Uploads</span>
                                </div>
                                <div class="col-4 pt-3 pb-3">
                                    <h3 class="mb-1 text-primary">45</h3>
                                    <span>Tasks</span>
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