@extends('management')

@section('title','Fleets')
@section('content')
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card mb-2">
			<div class="card-body">
				<span>
				<h1 class="mb-0 card-title">Fleets</h1>
				<p class="mt-0 card-text"><small>Add the vehicle's information here</small></p>
				</span>
				
			</div>
			<div class="card-footer">
				<button id="showForm" class="btn">Add New</button>
				<form id="addForm">
					@csrf
					<h3 class="mt-3">Add a Vehicle</h3>
					<small>Make sure details are correct before saving</small>
					<hr>
					<div class="form-row mt-3">

						<div class="col-md-4">
							<label for="asset">Model</label>
							<select id="model" class="form-control" name="model">
								<option value="0">Select model</option>
								@foreach($models as $model)
								<option value="{{$model->id}}">{{$model->model." ". $model->year." ". $model->trim." ". $model->body}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-md-4">
							<label for="vin">Vehicle Identication Number</label>
							<input id="vin" type="text" name="vin" class="form-control">
						</div>
						
						<div class="col-md-4">
							<label for="plate">Plate Number</label>
							<input id="plate" type="text" name="plate" class="form-control">
						</div>
					</div>

					<div class="form-row mt-3">

						<div class="col-md-6">
							<label for="garage">Garage</label>
							<select id="garage" class="form-control" name="garage">
								<option value="0">Select garage</option>
								@foreach($garages as $garage)
								<option value="{{$garage->id}}">{{$garage->name}}</option>
								@endforeach
							</select>
						</div>
						

						<div class="col-md-6">
							<label for="phase">Phase</label>
							<select id="phase" class="form-control" name="phase">
								<option value="0">Select phase</option>
								@foreach($phases as $phase)
								<option value="{{$phase->id}}">{{$phase->title}}</option>
								@endforeach
							</select>
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
				<h3 class="card-title mt-3">Fleet Vehicles</h3>
				<p class="mt-0 card-text"><small>List of current fleets we have</small></p>
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
							<input id="searchTable" class=" form-control" type="search" placeholder="Search a vehicle" aria-label="Search">
						</div>
					</div>
				</div>
				
			
			<div id="table-container" class="table-responsive-xl">
			  	
				<table id="make-table" class="table table-hover">
					<thead>
						<tr>
							<th scope="col">VIN</th>
							<th scope="col">Plate No</th>
							<th scope="col">Model</th>
							<th scope="col">Garage</th>
							<th scope="col">Phase</th>
							<th scope="col" class="text-right">Manage</th>
						</tr>
					</thead>
					<tbody id="table-result">
						{{-- {{dd($makes ?? '')}} --}}
						@foreach($assets as $asset)
						<div id="tr-container">
							<tr class="item{{$asset->id}} tr-data">
								<td>
									<span id="vin{{$asset->id}}"class="editSpan{{$asset->id}}">{{$asset->vin}}</span>
									<input type="text" id="vinInput{{$asset->id}}" class="form-control editInput editItem{{$asset->id}}">
								</td>
								<td>
									<span id="plate{{$asset->id}}"class="editSpan{{$asset->id}}">{{$asset->plate_no}}</span>
									<input type="text" id="plateInput{{$asset->id}}" class="form-control editInput editItem{{$asset->id}}">
								</td>
								<td>
									@foreach($models as $model)
										@if($asset->model_id == $model->id)
										<span id="model{{$asset->id}}" class="editSpan{{$asset->id}}">{{$model->model." ". $model->year." ". $model->trim." ". $model->body}}</span>
										@endif
									@endforeach
									
									<select id="modelInput{{$asset->id}}" class="form-control editInput editItem{{$asset->id}}">
										@foreach($models as $model)
										<option value="{{$model->id}}" @if($asset->model_id == $model->id) selected @endif>{{$model->model." ". $model->year." ". $model->trim." ". $model->body}}</option>
										@endforeach
									</select>

									{{-- <input type="text" id="brandInput{{$asset->id}}" class="form-control editInput editItem{{$asset->id}}"> --}}
									
								</td>
								<td>
									@foreach($garages as $garage)
										@if($asset->garage_id == $garage->id)
										<span id="garage{{$asset->id}}" class="editSpan{{$asset->id}}">{{$garage->name}}</span>
										@endif
									@endforeach
									
									<select id="garageInput{{$asset->id}}" class="form-control editInput editItem{{$asset->id}}">
										@foreach($garages as $garage)
										<option value="{{$garage->id}}" @if($asset->garage_id == $garage->id) selected @endif>{{$garage->name}}</option>
										@endforeach
									</select>

									{{-- <input type="text" id="brandInput{{$asset->id}}" class="form-control editInput editItem{{$asset->id}}"> --}}
									
								</td>
								
								<td>
									@foreach($phases as $phase)
										@if($asset->phase_id == $phase->id)
										<span id="phase{{$asset->id}}" class="editSpan{{$asset->id}}">{{$phase->title}}</span>
										@endif
									@endforeach
									
									<select id="phaseInput{{$asset->id}}" class="form-control editInput editItem{{$asset->id}}">
										@foreach($phases as $phase)
										<option value="{{$phase->id}}" @if($asset->phase_id == $phase->id) selected @endif>{{$phase->title}}</option>
										@endforeach
									</select>

									{{-- <input type="text" id="brandInput{{$asset->id}}" class="form-control editInput editItem{{$asset->id}}"> --}}
									
								</td>
								<td class="text-right">
									
									<button type="button" class="btn btn-md btnTools edit editBtn{{$asset->id}}" data-id={{$asset->id}}><i class="fas fa-edit"></i></button>
									<button type="button" class="btn btn-md btnTools partial-delete deleteItem{{$asset->id}}" data-id={{$asset->id}}><i class="fas fa-trash-alt"></i></button>


									<button type="button" class="btn btn-md btnTools partial-save saveItem{{$asset->id}}" data-id={{$asset->id}}><i class="fas fa-save"></i></button>
									<button type="button" class="btn btn-md btnTools cancel cancelEdit{{$asset->id}}" data-id={{$asset->id}}><i class="fas fa-backspace"></i></button>
									
									
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
	<script type="text/javascript" src="{{asset('/js/fleet.js')}}"></script>
@endsection