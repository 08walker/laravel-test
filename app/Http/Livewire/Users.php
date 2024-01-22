<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $name, $user_id, $email, $role, $password, $updateUser = false;

    protected $listeners = [
        'deleteUser'=>'destroy'
    ];

    // Validation Rules
    protected $rules = [
        'name'=>'required',
        'email'=>'required',
        'password'=>'required',
        'role'=>'required',
    ];

    public function render()
    {
        $users = User::all();
        return view('livewire.users',compact('users'));
    }

    public function resetFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role = '';
    }

    public function store(){
        // Validate Form Request
        $this->validate();

        try{
            // Create user
            User::create([
                'name'=>$this->name,
                'email'=>$this->email,
                'password'=>bcrypt($this->password),
                'role'=>$this->role,
            ]);
    
            // Set Flash Message
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"User Created Successfully!!"
            ]);

            // Reset Form Fields After Creating user
            $this->resetFields();
        }catch(\Exception $e){
            // Set Flash Message
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong while creating user!!"
            ]);

            // Reset Form Fields After Creating user
            $this->resetFields();
        }
    }
    public function edit($id){
        $user = User::findOrFail($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = '';
        $this->user_id = $user->id;
        $this->role = $user->role;
        $this->updateUser = true;
    }

    public function update(){

        // Validate request
        $this->validate([
            'name'=>'required',
            'email'=>'required',
            'role'=>'required',
        ]);

        try{
            // Update category
            if ($this->password) {
                User::find($this->user_id)->fill([
                    'name'=>$this->name,
                    'email'=>$this->email,
                    'password'=>bcrypt($this->password),
                    'role'=>$this->role,
                ])->save();        
            } else {
                User::find($this->user_id)->fill([
                    'name'=>$this->name,
                    'email'=>$this->email,
                    'role'=>$this->role,
                ])->save();
            }

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"User Updated Successfully!!"
            ]);
    
            $this->cancel();
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong while updating user!!"
            ]);
            $this->cancel();
        }
    }

    public function cancel()
    {
        $this->updateUser = false;
        $this->resetFields();
    }

    public function destroy($id)
    {
        if ($id) {
            $record = User::where('id', $id);
            $record->delete();
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"User Deleted Successfully!!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong while deleting user!!"
            ]);
        }
    }
}