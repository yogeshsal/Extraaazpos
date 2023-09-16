@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')




    
    <div class="row">
      <div class="card" style="width: 100%;">
        <div class="row">
            <div class="col-12">
            <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
            
           
        
    </div>

        
    

    
      
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are in ADMIN Dashboard!
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection