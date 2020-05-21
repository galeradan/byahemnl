@extends('management')

@section('title','Garage')
@section('content')
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card mb-2">
			<div class="card-body">
				<span>
				<h1 class="mb-0 card-title">Garages</h1>
				<p class="mt-0 card-text"><small>Add the garage a where we can store our vehicles</small></p>
				</span>
				
			</div>
			<div class="card-footer">
				<button id="showForm" class="btn">Add New</button>
				<form id="addForm">
					@csrf
					<h3 class="mt-3">Add a Garage</h3>
					<small>Make sure details are correct before saving</small>
					<hr>
					<div class="form-row mt-3">

						<div class="col-md-6">
							<label for="name">Garage name</label>
							<input id="name" type="" name="name" class="form-control">
						</div>

						<div class="col-md-6">
							<label for="city">City</label>
							<input id="city" type="" city="city" class="form-control">
						</div>
					</div>
					<div class="form-row mt-3">
						<div class="col-md-12">
							<label for="address">Address</label>
							<textarea id="address" type="" name="address" class="form-control"></textarea>
						</div>
					</div>
					{{-- <hr class="mb-1 mt-2"> --}}
					<div class="mt-3 d-flex justify-content-end">
				
					<span>
						<button id="btnSave" type="button" class="btn btn-md btn-primary">Save</button>
						<button id="btnCancel" type="button" class="btn btn-md btn-warning">Cancel</button>
					</span>
					</div>
				</form>
			</div>
		</div>
		
	</div>

	<div class="col-md-12">
		<div id="alert-add" class="alert alert-success mt-2 " role="alert">
		  <strong>Successfully added!</strong> Please check it in the list below.
		</div>
	</div>

	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title mt-3">Current Garages</h3>
				<p class="mt-0 card-text"><small>List of current garage we have</small></p>
			</div>
			
				<div class="row">
					<div class="col-md-12">
						<div class="input-group">
							<span>
							<select id="filterBy" class="form-inline form-control">
								<option value="asc">Ascending</option>
								<option value="desc">Descending</option>
							</select>
							</span>
							<input id="searchTable" class=" form-control" type="search" placeholder="Search a model" aria-label="Search">
						</div>
					</div>
				</div>
				
			
			<div id="table-container" class="table-responsive-xl">
				<table id="make-table" class="table">
					<thead>
						<tr>
							<th scope="col">Garage</th>
							<th scope="col">City</th>
							<th scope="col">Address</th>
							<th scope="col" class="text-right">Manage</th>
						</tr>
					</thead>
					<tbody id="table-result">
						{{-- {{dd($makes ?? '')}} --}}
						@foreach($garages as $garage)
						<div id="tr-container">
							<tr class="item{{$garage->id}} tr-data">
								<td>
									<span id="name{{$garage->id}}"class="editSpan{{$garage->id}}">{{$garage->name}}</span>
									<input type="text" id="nameInput{{$garage->id}}" class="form-control editInput editItem{{$garage->id}}">
								</td>
								<td>
									
									<span id="city{{$garage->id}}" class="editSpan{{$garage->id}}">{{$garage->city}}</span>
									<input type="text" id="cityInput{{$garage->id}}" class="form-control editInput editItem{{$garage->id}}">
									
								</td>
								<td>
									<span id="address{{$garage->id}}" class="editSpan{{$garage->id}}">{{$garage->address}}</span>
									<textarea type="text" id="addressInput{{$garage->id}}" class="form-control editInput editItem{{$garage->id}}"></textarea>
								</td>
								<td class="text-right">
									
									<button type="button" class="btn btn-md btnTools edit editBtn{{$garage->id}}" data-id={{$garage->id}}><i class="fas fa-edit"></i></button>
									<button type="button" class="btn btn-md btnTools partial-delete deleteItem{{$garage->id}}" data-id={{$garage->id}}><i class="fas fa-trash-alt"></i></button>


									<button type="button" class="btn btn-md btnTools partial-save saveItem{{$garage->id}}" data-id={{$garage->id}}><i class="fas fa-save"></i></button>
									<button type="button" class="btn btn-md btnTools cancel cancelEdit{{$garage->id}}" data-id={{$garage->id}}><i class="fas fa-backspace"></i></button>
									
								</td>
							</tr>
						</div>
						@endforeach
						
					</tbody>
				</table>

			</div>

			<div class="card-footer text-center">
				<small class="mb-0 text-muted">End of Table</small>
			</div>
		</div>
	</div>

</div>


<!-- Modal -->
<div id="confirmModal" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="alert alert-warning">This action could affect all associated data. Please proceed with caution</div>
         <p class="modal-text"></p>
      </div>
      <div class="modal-footer">
        <button id="modalSave" type="button" class="btn btn-primary save">Save Changes</button>
        <button id="modalDelete" type="button" class="btn btn-danger delete">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@stop

@section('specificJS')
	<script type="text/javascript" src="{{asset('/js/garage.js')}}"></script>
@endsection