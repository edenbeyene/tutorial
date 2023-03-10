<div>
    <div  wire:ignore.self class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Model Delete</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyBrand">
                <div class="modal-body">
                <h6>Are you sure you want to delete this data?</h6>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                <button type="submit" class="btn btn-primary">Yes, Delete</button>
                </div>
            </form>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}} </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Brand List
                        <a href ="{{url('admin/brand/create')}}" class="btn btn-primary btn-sm  float-end"> Add Brand </a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>  
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)       
                                <tr>
                                    <td>{{$brand->id}} </td>
                                    <td>{{$brand->name}}  </td>
                                    <td>{{$brand->slug}} </td>
                                    <td>{{$brand->status == '1' ? 'Hidden' : 'Visible'}} </td>
                                    <td>
                                        <a href= "{{url('admin/brand/edit/' . $brand->id)}}" class="btn btn-success">Edit</a>
                                        <a href= "#" wire:click="deleteBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger" >Delete  </a>
                                    </td>
                                
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
                    <div> 
                        {{$brands->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
</div>
    @push('script')

        <script>
            window.addEventListener('close-modal', event => {
                $('#deleteModal').modal('hide');
            });
        
        </script>

    @endpush
