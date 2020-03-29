@extends('backend.backend_template')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header border-0">
        <a href="{{route('agent.property.create')}}" class="btn btn-primary float-right">Add New Property</a>
        <h3 class="mb-0">Property tables</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered align-items-center table-white table-flush example" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-light">
                    <tr>
                      <th>No</th>
                      <th>Status</th>
                      <th>Type</th>
                      <th>Bedroom</th>
                      <th>Bathroom</th>
                      <th>Land Area</th>
                      <th>Building Area</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="medicineTable">
                    <?php $i=1;?>
                    @foreach($properties as $property)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$property->status->status}}</td>
                        <td>{{$property->type->type}}</td>
                        <td>{{$property->bedroom}}</td>
                        <td>{{$property->bathroom}}</td>
                        <td>{{$property->land_area}}</td>
                        <td>{{$property->building_area}}</td>
                        <td>{{$property->price}}</td>
                        <td><a href="{{route('agent.property.edit',$property->id)}}"><i class="btn fas fa-edit text-white"  style="background-color: #5e72e4"></i></a>
                      

                          <form method="post" action="{{route('agent.property.destroy',$property->id)}}" class="d-inline-block">

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" style="background-color: #5e72e4"><i class="fas fa-trash text-white" ></i></button>
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
