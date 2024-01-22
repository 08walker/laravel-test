@extends('layouts.appLayout')
@section('content')
  <div class="container">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Users List</h1>
              </div>
            </div>
          </div>
        </section>
        <div class="row justify-content-center mt-3">
            @livewire('users')
            {{-- <livewire:users/> --}}
        </div>
  </div>
@endsection