@extends('master')
 
@section('content')
 
<div class="container">  
	<h2 align="center">ADD NEW TRANSACTION</h2>  
	<div class="form-group">  
		<form action={{ url('salestransaction/add') }} name="add_transaction" id="add_transaction" method="post">
			{{ csrf_field() }}
			<div class="table-responsive">  
				<table class="table table-bordered" id="dynamic_field">  
					<tr>  
						<td>
							<select class="form-control" name="product[]">
								<option value="" selected>select product</option>
							@foreach ($product as $key => $p)
								<option value="{{ $p->id }}">{{ $p->name }}</option>
							@endforeach
							</select>
						</td>
						<td><input type="number" name="qty[]" placeholder="Quantity" class="form-control name_list" /></td>
						<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
					</tr>
				</table>  
				<input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
			</div>  
		</form>  
	</div>  
</div>  
<script>  
$(document).ready(function(){  
	var i=1;  
	$('#add').click(function(){  
		 i++;  
		 $('#dynamic_field').append('<tr id="row'+i+'">' +
										'<td>' +
											'<select class="form-control" name="product[]">' +
												'<option value="" selected>select product</option>' +
											'@foreach ($product as $key => $p)' +
												'<option value="{{ $p->id }}">{{ $p->name }}</option>' +
											'@endforeach' +
											'</select>' +
										'</td>' +
										'<td><input type="number" name="qty[]" placeholder="Quantity" class="form-control name_list" /></td>' +
										'<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>' +
									'</tr>');  
	});  
	$(document).on('click', '.btn_remove', function(){  
		 var button_id = $(this).attr("id");   
		 $('#row'+button_id+'').remove();  
	});
	$('#submit').click(function(){            
		 $.ajax({  
			  url:"../test",  
			  method:"POST",  
			  data:$('#add_transaction').serialize(),  
			  success:function(data)  
			  {  
				   alert(data);  
				   $('#add_transaction')[0].reset();  
			  }  
		 });  
	});  
});  
</script>

 
@endsection