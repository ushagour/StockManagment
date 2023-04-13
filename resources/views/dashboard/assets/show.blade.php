

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
                                back to list
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

                                    @switch($asset->danger_level)
                                    @case(1)
                                    <span class="badge light badge-danger">
                                        <i class="fa fa-circle text-success me-1"></i>
                                       low
                                    </span>
                                        @break
                                    @case(2)
                                    <span class="badge light badge-danger">
                                        <i class="fa fa-circle text-worning me-1"></i>
                                     MEDIUM
                                    </span>
                                        @break
                                    @case(3)
                                    <span class="badge light badge-danger">
                                        <i class="fa fa-circle text-danger me-1"></i>
                                        HIGH
                                    </span>
                                        @break
                                
                                        
                                @endswitch
                                </li>


                           
                            </ul>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
		
@endsection