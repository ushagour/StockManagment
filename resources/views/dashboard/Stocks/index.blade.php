@extends('layouts.app')

@section('content')
		
<div class="content-body">
    <div class="container-fluid">
        
        <div class="row page-titles">
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{route("home")}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">stocks</a></li>
                </ol>
            </div>
         
            
            
            <div class="float-right">
              <a style="float: right;" href="{{route("stock.create")}}" class="btn btn-primary btn-rounded  mb-2"> add new</a>
          </div>
        </div>
        
        
        <div class="row">
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12 mt-2">
    
                
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
        </div></div>
            

            <div class="col-12">
                <div class="card">
              
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>
                                       asset
                                        </th>
                                            <th>
                                                Hospital
                                            </th>
                                        <th>
                                            current_stock
                                        </th>
                                            <th>
                                                Add Stock
                                            </th>
                                            <th>
                                                Remove Stock
                                            </th>
                                        <th>
                                            &nbsp;
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stocks as $key => $stock)
                                    <tr>
                                        <td>
                                            {{ $stock->asset->name ?? '' }}
                                        </td>
                                            <td>
                                                {{ $stock->team->name }}
                                            </td>
                                        <td>
                                            {{ $stock->current_stock ?? '' }}
                                        </td>
                                        <td>
                                          <div class="input-group mb-3  input-success">
                                              <form action="{{ route('stock.addAssetToStock', ["stock"=>$stock->id]) }}" method="POST" >
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="action" value="add">
                                                <input type="number" name="stock" class="form-control" min="1">
                                                <input type="submit" class="btn btn-xs btn-success" value="ADD">
                                            </form>
                                            </div>  
                                
                                        </td>
                                        <td>
                                            <div class="input-group mb-3  input-danger">

                                            <form action="{{ route('stock.addAssetToStock', ["stock"=>$stock->id]) }}" method="POST" style="display: inline-block;" class="form-inline">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="action" value="remove">
                                                <input type="number" name="stock" class="form-control form-control-sm " min="1">
                                                <input type="submit" class="btn btn-xs btn-danger" value="REMOVE">
                                            </form>
                                        </div>  

                                        </td>
 
                                        <td>
                                                <a  href="{{ route('stock.show', $stock->id) }}">
                                                   detail

                                                </a>
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