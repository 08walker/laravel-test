<div>
    @if(Auth::user()->role == 'Manager')
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

                    @if($updateProduct)
                        @include('livewire.updateProduct')
                    @else
                        @include('livewire.createProduct')
                    @endif
                </div>
            </div>
        </div>
    @endif

    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Price</th>
                                @if(Auth::user()->role == 'Manager')
                                    <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($products) > 0)
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <td> {{$key+1}} </td>
                                        <td> {{$product->title}} </td>
                                        <td>
                                            @if($product->id > 10)
                                                <img src="/productos/{{$product->image}}" alt="{{$product->title}}" width="100">
                                            @else
                                                <img src="/{{$product->image}}" alt="{{$product->title}}" width="100">
                                            @endif
                                        </td>
                                        <td> {{$product->description}} </td>
                                        <td> {{$product->price}} </td>
                                        @if(Auth::user()->role == 'Manager')
                                            <td>
                                                <button wire:click="edit({{$product->id}})" class="btn btn-primary btn-sm">Edit</button>
                                                <button onclick="deleteProduct({{$product->id}})" class="btn btn-danger btn-sm">Delete</button>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" align="center">
                                        No products Found.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteProduct(id){
            if(confirm("Are you sure to delete this record?"))
                window.livewire.emit('deleteProduct',id);
        }
    </script>
</div>