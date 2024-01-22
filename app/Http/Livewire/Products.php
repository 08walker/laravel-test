<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Products extends Component
{
    use WithFileUploads;
    public $title, $product_id, $description, $price, $image, $updateProduct = false;

    protected $listeners = [
        'deleteProduct'=>'destroy'
    ];

    // Validation Rules
    protected $rules = [
        'title'=>'required',
        'image'=>'required|image',
        'price'=>'required|numeric|min:1',
        'description'=>'required'
    ];

    public function render()
    {
    	$products = Producto::all();
        return view('livewire.products',compact('products'));
    }

    public function resetFields(){
        $this->title = '';
        $this->description = '';
        $this->image = '';
        $this->price = '';
    }

    public function store(){
        // Validate Form Request
        $this->validate();

        try{
            // Create Product
            $imagen = $this->image;                        
            $number = Producto::count() + 1;
            $filename = 'product-'.time().'-'.$number.'.'.$this->image->extension();
            $ruta = public_path("productos/");
            copy($imagen->getRealPath(),$ruta.$filename);

            $product = Producto::create([
                'title'=>$this->title,
                'description'=>$this->description,
                'image'=>$filename,
                'price'=>$this->price,
            ]);

            // Set Flash Message
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Product Created Successfully!!"
            ]);

            // Reset Form Fields After Creating Category
            $this->resetFields();
        }catch(\Exception $e){
            // Set Flash Message
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong while creating product!!"
            ]);

            // Reset Form Fields After Creating Category
            $this->resetFields();
        }
    }
    public function edit($id){
        $product = Producto::findOrFail($id);
        $this->title = $product->title;
        $this->description = $product->description;
        // $this->image = $product->image;
        $this->product_id = $product->id;
        $this->price = $product->price;
        $this->updateProduct = true;
    }

    public function update(){

        // Validate request
        $this->validate([
            'title'=>'required',
            'price'=>'required|numeric|min:1',
            'description'=>'required'
        ]);

        try{
            // Update category
            if ($this->image) {
                $imagen = $this->image;                        
                $number = $this->product_id;
                $filename = 'product-'.time().'-'.$number.'.'.$this->image->getClientOriginalExtension();
                $ruta = public_path("productos/");
                copy($imagen->getRealPath(),$ruta.$filename);

                Producto::find($this->product_id)->fill([
                    'title'=>$this->title,
                    'description'=>$this->description,
                    'image'=>$filename,
                    'price'=>$this->price,
                ])->save();
            }else{
                Producto::find($this->product_id)->fill([
                    'title'=>$this->title,
                    'description'=>$this->description,
                    'price'=>$this->price,
                ])->save();
            }

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Product Updated Successfully!!"
            ]);
    
            $this->cancel();
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong while updating product!!"
            ]);
            $this->cancel();
        }
    }

    public function cancel()
    {
        $this->updateProduct = false;
        $this->resetFields();
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Producto::where('id', $id);
            $record->delete();
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Product Deleted Successfully!!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong while deleting product!!"
            ]);
        }
    }
}