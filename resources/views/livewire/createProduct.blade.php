<form>
    <div class="form-group mb-3">
        <label for="productTitle">Title:</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title" wire:model="title">
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group mb-3">
        <label for="productImage">Image:</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" accept="image/*" wire:model="image">
        @error('image') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group mb-3">
        <label for="productDescription">Description:</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" wire:model="description" placeholder="Enter Description"></textarea>
        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group mb-3">
        <label for="productPrice">Price:</label>
        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Enter price" wire:model="price">
        @error('price') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="d-grid gap-2">
        <button wire:click.prevent="store()" class="btn btn-success btn-block">Save</button>
    </div>
</form>