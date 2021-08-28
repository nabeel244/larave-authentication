@extends('admin.layouts.app')
@section('content')
<div class="col-md-12">
    @if (session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
    <div class="card">
      <div class="card-header card-header-primary">
       <a href="{{route('product.create')}}">
        <button class="btn btn-primary">Add Product</button>
    </a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>
                ID
              </th>
              <th>
                Name
              </th>
              <th>
                Price
              </th>
              <th>
                Image
              </th>
              <th>Action</th>
            </thead>
            <tbody>
             
           @php
               $i = 1;
           @endphp
              @foreach ($products as $product)
              
              <tr>
                <td>
                   {{$i++}}
                   </td>
                <td>
                 {{$product->name}}
                </td>
                <td>
                    {{$product->price}}
                </td>
                <td>
                    <img src="{{ url('picture/' . $product->image) }}"
                    class="img-responsive img-fluid" style="width: 100px; height:70px" />
                </td>
                <td>
                    <a href="{{ route('product.edit', $product->id) }}"> <button
                        type="submit" class="btn btn-success"
                        ><i class="fa fa-edit"
                            ></i></button></a>
                            <form method="post" action="{{ route('product.destroy', $product->id) }}">
                                @csrf
                                @method('DELETE')
                            <button
                                type="submit" class="btn btn-danger"
                               ><i class="fa fa-trash"
                                    ></i></button>
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
@endsection