

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
                            <a class="btn btn-default" href="{{ route('roles.index') }}">
                                back to list
                            </a>
                        </div>
                        <div class="card-body pb-0">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.role.fields.id') }}
                                        </th>
                                        <td>
                                            {{ $role->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.role.fields.name') }}
                                        </th>
                                        <td>
                                            {{ $role->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.role.fields.email') }}
                                        </th>
                                        <td>
                                            {{ $role->email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.role.fields.email_verified_at') }}
                                        </th>
                                        <td>
                                            {{ $role->email_verified_at }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.role.fields.roles') }}
                                        </th>
                                        <td>
                                            @foreach($role->permissions as $key => $roles)
                                                <span class="label label-info">{{ $roles->title }}</span>
                                            @endforeach
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