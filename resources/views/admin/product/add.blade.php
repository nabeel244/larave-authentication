@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
     
        @if (session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Product</h4>
          <p class="card-category">Add Product</p>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('product.store')}}"  enctype="multipart/form-data">
                @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Product Name</label>
                  <input type="text" value="{{ old('name') }}" name="name" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Product Price</label>
                  <input type="number" value="{{ old('price') }}" name="price" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label >Product Image</label>
                 
                </div>
                <input style="margin-left: 5px" type="file" class="form-control" name="image">
              </div>
            
            </div>
            <button type="submit" class="btn btn-primary pull-right">Add Product</button>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>
    
  </div>
@endsection