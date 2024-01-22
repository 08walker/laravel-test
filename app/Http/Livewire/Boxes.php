<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use App\Models\User;
use Livewire\Component;

class Boxes extends Component
{

    public function render()
    {
    	$users = User::count();
    	$products = Producto::count();
        return view('livewire.boxes',compact('users','products'));
    }
}
