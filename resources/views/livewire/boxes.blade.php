<div class="content-wrapper">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12" style="padding-bottom: 20px">
              <h1>Resumen</h1>
          </div>
        </div>
      </div>
    </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row" style="display: flex;justify-content: center">
              @if(Auth::user()->role == 'Manager')
                  <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h2 class="card-title">Users</h2>
                      <p class="card-text">{{$users}}</p>
                      <a href="{{route('users')}}" class="card-link">See All</a>
                    </div>
                  </div>
              @endif
              @if(Auth::user()->role == 'Manager'|| Auth::user()->role == 'Revisor')
                  
                  <div class="card" style="width: 18rem;margin-rigth: 30px">
                    <div class="card-body">
                      <h2 class="card-title">Products</h2>
                      <p class="card-text">{{$products}}</p>
                      <a href="{{route('products')}}" class="card-link">See All</a>
                    </div>
                  </div>
              @endif
          </div>
        </div>
      </section>
</div>