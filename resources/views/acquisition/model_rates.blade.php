@extends('management')

@section('title','Model')
@section('content')
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card mb-2">
			<div class="card-body">
				<span>
				<h1 class="mb-0 card-title">Model</h1>
				<p class="mt-0 card-text"><small>Add the vehicle's model and their rental rates here</small></p>
				</span>
				
			</div>
			<div class="card-footer">
				<button id="showForm" class="btn">Add New</button>
				<form id="addForm">
					@csrf
					<h3 class="mt-3">Add a Model</h3>
					<small>Make sure details are correct before saving</small>
					<hr>
					<div class="form-row mt-3">

						<div class="col-md-3">
							<label for="category">Category</label>
							<select id="category" class="form-control" name="category">
								<option value="0">Select category</option>
								@foreach($categories as $category)
								<option value="{{$category->id}}">{{$category->title}}</option>
								@endforeach
							</select>
						</div>

						<div class="col-md-3">
							<label for="brand">Make</label>
							<select id="brand" class="form-control" name="brand">
								<option value="0">Select make</option>
								@foreach($makes as $make)
								<option value="{{$make->id}}">{{$make->brand}}</option>
								@endforeach
							</select>
						</div>

						<div class="col-md-3">
							<label for="name">Model name</label>
							<input id="name" type="" name="name" class="form-control">
						</div>

						<div class="col-md-3">
							<label for="year">Year</label>
							<input id="year" type="number" name="year" class="form-control">
						</div>
					</div>

					<div class="form-row mt-3">
						<div class="col-md-4">
							<label for="trim">Trim</label>
							<input id="trim" type="text" name="trim" class="form-control">
						</div>

						<div class="col-md-4">
							<label for="body">Body Type</label>
							<input id="body" type="text" name="body" class="form-control">
						</div>
						
						<div class="col-md-4">
							<label for="rate">Rental Rate</label>
							<input id="rate" type="" name="rate" class="form-control">
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
				<h3 class="card-title mt-3">Current Models</h3>
				<p class="mt-0 card-text"><small>List of current models we have</small></p>
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
							<th scope="col">Model name</th>
							<th scope="col">Year</th>
							<th scope="col">Trim</th>
							<th scope="col">Body</th>
							<th scope="col">Make</th>
							<th scope="col">Category</th>
							<th scope="col">Rental Rate</th>
							<th scope="col" class="text-right">Manage</th>
						</tr>
					</thead>
					<tbody id="table-result">
						{{-- {{dd($makes ?? '')}} --}}
						@foreach($models as $model)
						<div id="tr-container">
							<tr class="item{{$model->id}} tr-data">
								<td>
									<span id="name{{$model->id}}"class="editSpan{{$model->id}}">{{$model->model}}</span>
									<input type="text" id="nameInput{{$model->id}}" class="form-control editInput editItem{{$model->id}}">
								</td>
								<td>
									<span id="year{{$model->id}}" class="editSpan{{$model->id}}">{{$model->year}}</span>
									<input type="text" id="yearInput{{$model->id}}" class="form-control editInput editItem{{$model->id}}">
								</td>
								<td>
									<span id="trim{{$model->id}}" class="editSpan{{$model->id}}">{{$model->trim}}</span>
									<input type="text" id="trimInput{{$model->id}}" class="form-control editInput editItem{{$model->id}}">
								</td>
								<td>
									<span id="body{{$model->id}}" class="editSpan{{$model->id}}">{{$model->body}}</span>
									<input type="text" id="bodyInput{{$model->id}}" class="form-control editInput editItem{{$model->id}}">
								</td>
								<td>
									@foreach($makes as $make)
										@if($model->make_id == $make->id)
										<span id="brand{{$model->id}}" class="editSpan{{$model->id}}">{{$make->brand}}</span>
										@endif
									@endforeach
									
									<select id="brandInput{{$model->id}}" class="form-control editInput editItem{{$model->id}}">
										@foreach($makes as $make)
										<option value="{{$make->id}}" @if($model->make_id == $make->id) selected @endif>{{$make->brand}}</option>
										@endforeach
									</select>

									{{-- <input type="text" id="brandInput{{$model->id}}" class="form-control editInput editItem{{$model->id}}"> --}}
									
								</td>
								<td>
									@foreach($categories as $category)
										@if($model->category_id == $category->id)
										<span id="category{{$model->id}}" class="editSpan{{$model->id}}">{{$category->title}}</span>
										@endif
									@endforeach
									
									<select id="categoryInput{{$model->id}}" class="form-control editInput editItem{{$model->id}}">
										@foreach($categories as $category)
										<option value="{{$category->id}}" @if($model->model_id == $category->id) selected @endif>{{$category->title}}</option>
										@endforeach
									</select>

									{{-- <input type="text" id="brandInput{{$model->id}}" class="form-control editInput editItem{{$model->id}}"> --}}
									
								</td>
								<td>
									<span id="rate{{$model->id}}" class="editSpan{{$model->id}}">{{$model->rates}}</span>
									<input type="text" id="rateInput{{$model->id}}" class="form-control editInput editItem{{$model->id}}">
								</td>

								<td class="text-right">
									
									<button type="button" class="btn btn-md btnTools edit editBtn{{$model->id}}" data-id={{$model->id}}><i class="fas fa-edit"></i></button>
									<button type="button" class="btn btn-md btnTools partial-delete deleteItem{{$model->id}}" data-id={{$model->id}}><i class="fas fa-trash-alt"></i></button>


									<button type="button" class="btn btn-md btnTools partial-save saveItem{{$model->id}}" data-id={{$model->id}}><i class="fas fa-save"></i></button>
									<button type="button" class="btn btn-md btnTools cancel cancelEdit{{$model->id}}" data-id={{$model->id}}><i class="fas fa-backspace"></i></button>
									
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
	<script type="text/javascript" src="{{asset('/js/model.js')}}"></script>
@endsection