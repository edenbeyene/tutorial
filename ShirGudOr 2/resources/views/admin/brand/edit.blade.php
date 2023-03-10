@extends('layouts.admin')

@section('content')
   <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Brand
                    <a href ="{{url('admin/brand')}}" class="btn btn-primary btn-sm text-white float-end"> Back </a>
                </h3>
            </div>
            <div class = "card-body">
                <form action="{{url('admin/brand/update-brand/'.$brand->id)}}" method = "POST" enctype="multipart/form-data">
                    @csrf   
                    @method('PUT') 
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Name</label>
                            <input type="text" name="name" value="{{$brand->name}}" class="form-control" />
                            @error('name') <small class="text-danger">{{$message}}</small> @enderror                    
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Slug</label>
                            <input type="text" name="slug" value="{{$brand->slug}}"" class="form-control" />
                            @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Status</label><br/>
                            <input type="checkbox" name="status" {{$brand->status == '1' ? 'Checked':''}} />
                            @error('status') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <button type="submit" class="btn  btn-primary">Update</button>
        
                        </div>
                        
                    </div>
                </form>
                
            </div>
        </div>
    </div>
   </div>

</div>
@endsection