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