<form>
    <input type="hidden" wire:model="user_id">
    <div class="form-group mb-3">
        <label for="userName">Name:</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name" wire:model="name">
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group mb-3">
        <label for="userEmail">email:</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" wire:model="email">
        @error('email') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group mb-3">
        <label for="userPassword">Password:</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter password" wire:model="password">        
        @error('password') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group mb-3">
        <label for="userRole">Role:</label>
        <select class="form-control" wire:model="role" name="role" id="role">
            <option value="">Select Role</option>
            <option value="Revisor">Revisor</option>
            <option value="Manager">Manager</option>
        </select>
        @error('role') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="d-grid gap-2">
        <button wire:click.prevent="update()" class="btn btn-success btn-block">Save</button>
        <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
    </div>
</form>