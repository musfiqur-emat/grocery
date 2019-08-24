@extends('developer.layouts.base')
@section('body')
	<center>
		<h3>Update Items</h3>
	</center>
	<form class="form-horizontal" method="post" action="{{route('items.update', $item->id)}}">

		{{ method_field('PUT') }}
		{{ csrf_field() }}

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="name">Name:</label>
	    <div class="col-sm-6">
	      <input type="text" value="{{old('name', $item->name)}}" class="form-control" name="name" id="name" placeholder="Enter name">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="price">Price:</label>
	    <div class="col-sm-6">
	      <input type="number" value="{{old('price', $item->price)}}" class="form-control" name="price" id="price" placeholder="Enter price">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="category">Category:</label>
	    <div class="col-sm-6">
	      <input type="text" value="{{old('category', $item->category)}}" class="form-control" name="category" id="category" placeholder="Enter category">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="aisle">Aisle:</label>
	    <div class="col-sm-6">
              @php
              $aisle = array(		
					'0' => "Shops",
					'1' => "Warehouse",
					'2' => "Passage",
					'3' => "Wedding",
					'4' => "Vehicle",
				);
              @endphp
              <select class="form-control chosen" id="aisle" name="aisle" >
              	@foreach($aisle as $key => $value)
					<option value="{{$key}}" @if($key==$item->aisle) selected @endif>{{$value}}</option>
             	@endforeach
              </select>
	    </div>
	  </div>
	  
	  <div class="form-group"> 
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-primary">Update</button>
	    </div>
	  </div>
</form>
@endsection