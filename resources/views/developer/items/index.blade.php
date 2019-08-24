@extends('developer.layouts.base')
@section('body')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<h3 align="center">Items</h3>
<form accept-charset="UTF-8" role="form" class="form-inline">
  <table class="table table-bordered">
    <tbody>
      <tr>
        <td>
            <div class="col-md-12 text-center">
              Price : <input type="text" placeholder="Max Price" class="form-control" id="price" name="price" />

              Aisle : 
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
					<option value="{{$key}}">{{$value}}</option>
             	@endforeach
              </select>
              
              
              <a class="btn btn-md btn-success" onclick="itemSearch()"><i class="fa fa-search"></i> Search</a>
            </div>
        </td>
      </tr>
    </tbody>
  </table>
        </form>
<table class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <th>SL</th>                    
      <th>Name</th>                    
      <th>Price</th>                    
      <th>Category</th>                    
      <th>Aisle</th>                  
      <th>Actions</th>                  
  	</tr>
  </thead>
  <tbody id="itemSearch">

    @if(isset($items))
      @foreach ($items as $key => $item)
	  	<tr id="tr-{{$item->id}}">
	  	  <td>{{$key + 1}}</td>
	      <td>{{$item->name}}</td>
	      <td>{{$item->price}}</td>
	      <td>{{$item->category}}</td>
	      <td>
	      @if($item->aisle == 0)
	      Shops
	      @elseif($item->aisle == 1)
		  Warehouse
		  @elseif($item->aisle == 2)
		  Passage
		  @elseif($item->aisle == 3)
		  Wedding
		  @elseif($item->aisle == 4)
		  Vehicle
	      @endif
	  	  </td>
	      
	      <td class="text-center">	        
	        <a href="{{url('items')}}/{{$item->id}}/edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
	        <a class="btn btn-sm btn-danger" onclick="Delete('{{$item->id}}')"><i class="fa fa-trash"></i></a>
	      </td>

	  	</tr>
 		@endforeach
  	@endif
  </tbody>
</table>
{{ $items->links() }}


<script type="text/javascript">   

    function Delete(id) {
    $.confirm({
        title: 'Confirm!',
        content: '<hr><strong class="text-danger">Are you sure to delete ?</strong><hr>',
        columnClass:"col-md-4 col-md-offset-3",
        buttons: {
            confirm: function () {
                $.ajax({
                  headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
                  url: "{{url('items')}}/"+id,
                  type: 'DELETE',
                  dataType: 'json',
                  data: {},
                  success:function(response) {
                    if(response.success){
                      $('#tr-'+id).fadeOut();
                    }else{
                      $.alert({
                        title:"Whoops!",
                        content:"<hr><strong class='text-danger'>Something Went Wrong!</strong><hr>",
                        type:"red"
                      });
                    }
                  }
                });
            },
            cancel: function () {

            }
        }
    });   
  }

  function itemSearch(){
    var price = $('#price').val();
    if(price == ""){
      price = 0;
    }
    var aisle = $('#aisle').val();
    if(aisle == ""){
      aisle = 0;
    }
    
    $.ajax({
        url: "{{url('items')}}/"+price+"&"+aisle+"/itemSearch",
        type: 'GET',
        data: {},
      })
      .done(function(response) {
        if(response){         
          $('#itemSearch').html(response);
        }
        else{
          $('#itemSearch').html('');
        }
      });
  }
</script>
@endsection
