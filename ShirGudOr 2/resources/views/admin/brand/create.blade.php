@extends('layouts.admin')

@section('content')
   <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Brand
                    <a href ="{{url('admin/brand')}}" class="btn btn-primary btn-sm text-white float-end"> Back </a>
                </h3>
            </div>
            <div class = "card-body">
                <form action="{{url('admin/brand')}}" method = "POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        {{-- <div class="mb3"> </label>
                            <label> Select Category </label>
                            <select wire:model.defer ="category_id" required class="form-control"> 
                              <option value="">--Select Category--</option>
                              @foreach ($categories as $cateItem)
                              <option value="{{$cateItem->id}}">{{$cateItem->name}}</option>           
                              @endforeach
                            </select>
                            @error('category_id')<small class="text-danger">{{$message}}</small>@enderror
                        </div> --}}
                        <div class="col-md-12 mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" />
                            @error('name') <small class="text-danger">{{$message}}</small> @enderror                    
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control" />
                            @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Status</label><br/>
                            <input type="checkbox" name="status" />
                            @error('status') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <button type="submit" class="btn  btn-primary">Save</button>
        
                        </div>
                        
                    </div>
                </form>
                
            </div>
        </div>
    </div>
   </div>

</div>
@endsection