@extends('layouts.appLayout')
@section('content')
  <div class="container">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Products List</h1>
              </div>
            </div>
          </div>
        </section>
        <div class="row justify-content-center mt-3">
            @livewire('products')
            {{-- <livewire:products/> --}}
        </div>
  </div>
@endsection