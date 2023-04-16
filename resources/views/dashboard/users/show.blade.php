

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
                            <a class="btn btn-default" href="{{ route('user.index') }}">
                                back to list
                            </a>
                        </div>
                        <div class="card-body pb-0">
                            <table class="table table-bordered table-striped">

                                <tbody>
                                    <tr>
                                        <th>
                                        id
                                        </th>
                                        <td>
                                            {{ $user->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
    name                                    </th>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                    </tr>
                                </tbody>
                                </table>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
		
@endsection