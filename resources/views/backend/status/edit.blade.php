@extends('backend.backend_template')
@section('content')
	
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3>Edit Status <a href="{{route('admin.status.index')}}" class="float-right"><i class="fas fa-backward"></i> back</a></h3>
      </div>

      <div class="card-body">
        <form method="post" action="{{route('admin.status.update',$status->id)}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-6 offset-3 my-2">
              <div class="form-group">
                <label for="status">Name</label>
                <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" autofocus value="{{$status->status}}">

                @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div> 
            </div>
          </div>
          <input type="submit" class="btn btn-primary col-2 offset-5" value="submit">
        </form>
      </div>
    </div>
  </div>
</div>
                    
@endsection