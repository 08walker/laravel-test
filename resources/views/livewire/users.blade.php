<div>
    <div class="col-md-10 mb-2 mx-auto">
        <div class="card">
            <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('error') }}
                    </div>
                @endif

                @if($updateUser)
                    @include('livewire.updateUser')
                @else
                    @include('livewire.createUser')
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
						  <thead>
							  <tr>
							    <th>No.</th>
							    <th>Name</th>
							    <th>Email</th>
							    <th>Actions</th>
							  </tr>
						  </thead>
						  <tbody>
							    @foreach($users as $key => $data)
								    <tr>
										<td> {{ $data->id }} </td>
										<td> {{ $data->name }} </td>
										  <td> {{ $data->email }} </td>
										  <td> {{ $data->role }} </td>
										<td>		      
										 <button wire:click="edit({{$data->id}})" class="btn btn-primary btn-sm">Edit</button>
                                            <button onclick="deleteUser({{$data->id}})" class="btn btn-danger btn-sm">Delete</button>
										</td>
								    </tr>
							    @endforeach                  
						  </tbody>
					</table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteUser(id){
            if(confirm("Are you sure to delete this record?"))
                window.livewire.emit('deleteUser',id);
        }
    </script>
</div>