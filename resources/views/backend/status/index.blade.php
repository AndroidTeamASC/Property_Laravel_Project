@extends('backend.backend_template')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header border-0">
        <a href="{{route('admin.status.create')}}" class="btn btn-primary float-right">Add New Status</a>
        <h3 class="mb-0">Status tables</h3>
      </div>
      @if($errors->any())
        <div class="alert alert-warning alert-dismissible fade show col-6 offset-3" role="alert">
          <strong>{{$errors->first()}}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered align-items-center table-white table-flush example" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-light">
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Father Name</th>
                    </tr>
                  </thead>
                  <tbody id="statusTable">
                    <?php $i=1;?>
                    @foreach($statuses as $status)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$status->status}}</td>
                        <td><a href="{{route('admin.status.edit',$status->id)}}"><i class="btn-sm fas fa-edit text-white"  style="background-color: #5e72e4"></i></a>
                      

                          <form method="post" action="{{route('admin.status.destroy',$status->id)}}" class="d-inline-block">

                            @csrf
                            @method('DELETE')  
                            <button type="submit" class="btn btn-danger btn-sm d-inline-block" ><i class="ni ni-fat-delete" ></i></button>
                          </form>
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
@endsection

@section('script')
<script type="text/javascript">
 
</script>
@endsection
