
    @extends('layouts.app')

    @section('content')
    <body class="bg-light">

		<table class="table">
			<thead class="grey lighten-2">
				<tr>
					<!-- <th scope="col">#</th> -->
					<th scope="col">product name</th>
					<th scope="col">price</th>
					<th scope="col">category</th>
					<th scope="col">seller</th>
					<th scope="col">status</th>
					<th scope="col">operation</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($data as $p)
					<tr>
						<!-- <th scope="row">id</th> -->
						<td>{{$p['prd_name']}}</td>
						<td>{{$p['prd_price']}}</td>
						<td>{{$p['cat_name']}}</td>
						<td>{{$p['seller_name']}}</td>
						<td>
						@if($p['prd_status']==1)
							<a href="{{route('status',['id'=>$p['id'],'operation'=>'deactivate'] )}}">Active</a>
						
						@else
							<a href="{{route('status',['id'=>$p['id'],'operation'=>'activate'] )}}">Deactive</a>
						
						@endif
						</td>
	
						<td>
							
								<a class='bg-info text-warning' href="{{route('manage',['id'=>$p['id']] )}}">Edit</a>&nbsp;
								 <a class='bg-warning text-danger' href="{{route('manage/delete',['id'=>$p['id']] )}}">Delete</a>&nbsp;
							
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div>{{ $data->links()}}</div>
			<h4 class='text-center'><a href="{{route('manage')}}">Add Product</a></h4>
	
	
	</body>
    @endsection


