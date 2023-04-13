@extends('layouts.app')

@section('content')
		
<div class="content-body">
    <div class="container-fluid">
        
        <div class="row page-titles">
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{route("home")}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Assets</a></li>
                </ol>
            </div>
         
            
            
            <div class="float-right">
              <a style="float: right;" href="{{route("asset.create")}}" class="btn btn-primary btn-rounded  mb-2"> add new</a>
          </div>
        </div>
        
        
        <div class="row">
            
            @if (\Session::has('alert-success'))
              

                <div class="alert alert-success solid alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                    <strong>Success!</strong> {!! \Session::get('message') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button>
                </div>
            @endif
                
            @if (\Session::has('danger'))
            <div class="alert alert-danger solid alert-dismissible fade show">
                <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                <strong>Error!</strong> {!! \Session::get('danger') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                </button>
            </div>

                         @endif
                
            @if (\Session::has('warning'))

            <div class="alert alert-warning solid alert-dismissible fade show">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                <strong>Warning!</strong>{!! \Session::get('warning') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                </button>
            </div>

            @endif
                
            

            <div class="col-12">
                <div class="card">
              
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>danger level</th>
                                      
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($assets as $key => $asset)
                                    <tr>

                                       
                                        <td>{{ $asset->id ?? '' }}</td>
                                        <td>{{ $asset->name ?? '' }}</td>
                                        <td>{{ $asset->description ?? '' }}</td>
                                        <td>
                                            @switch($asset->danger_level)
                                                @case(1)
                                                <span class="badge light badge-success">
                                                    <i class="fa fa-circle text-success me-1"></i>
                                                   low
                                                </span>
                                                    @break
                                                @case(2)
                                                <span class="badge light badge-worning">
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
                                       
                                         
                                        </td>
                                        <td>
                                            <div class="dropdown ms-auto text-end">
                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                 
                                                    <a href="{{ route('asset.edit', $asset->id) }}" alt=" edit" class="dropdown-item ">
                                                        Edit</a>


                                                        <a class="dropdown-item ai-icon" href="{{ route('asset.destroy', $asset->id) }}" onclick="event.preventDefault();
                                                                     DeleteMe()">
                                                                                                              <span> Delete</span>
                    
                                                        
                                                     </a>
                    
                                                     <form id="delete-form"  action="{{ route('asset.destroy', $asset->id) }}" method="POST" class="d-none">
                                                        <input name="_method" type="hidden" value="DELETE">
                                                         @csrf
                                                     </form>


                                                
                                                    <a class="dropdown-item" alt="View Details"  href="{{ route('asset.show', $asset->id) }}">
                                                        View Details
                                                    </a>
                                                </div>
                                            </div>
                                        </td>												
                                    </tr>
                              @endforeach
                                </tbody>
                            </table>
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

@section("more_script")
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
    function DeleteMe(){
          var form =  document.getElementById('delete-form');
        //   var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
        }
  
</script>
  

@endsection