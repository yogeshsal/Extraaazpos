
@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')



<!------ Include the above in your HEAD tag ---------->

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<style>
    .select2-container .select2-selection--single{
    height:34px !important;
}
.select2-container--default .select2-selection--single{
         border: 1px solid #ccc !important; 
     border-radius: 0px !important; 
}


</style>


<br>
<div class="row card shadow p-3">
<h3>Register Sessions</h3>
<div class="row">
    <div class="col-lg-8">
        <h6>Register sessions for outlet</h6>
    </div>
    <div class="col-lg-1 float-right">
        <button class="btn btn-secondary">Help</button>
    </div>
    <div class="col-lg-3">
    <form >
	        
	        <select class="form-control select2">
	           <option>Select</option> 
	           <option>location 1</option> 
	           <option>location 2</option> 
	           <option>Sclocation 3</option> 
	           <option>location 4</option> 
	           <option>Holocation 5</option> 
	        </select>
	    </form>
    </div>
</div>

    <div class="card">
        <div class="row">
        <table class="table table-responsive table-hover">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">REGISTER</th>
      <th scope="col">CREATED</th>
      <th scope="col">CLOSED</th>
      <th scope="col">OPEN DURATION</th>
    </tr>
  </thead>
  <tbody>
    @foreach($session as $s)
    <tr>
      
      <td>{{$s->session_id}}</td>
      <td>location Name</td>
      <td>{{$s->created_at}}
        <br>
        by {{$s->name}}
      </td>
      <td>{{$s->updated_at}}
      <br>
        by {{$s->name}}
      </td>
      <td><?php 
             $createdAt = $s->created_at;
             $updatedAt = $s->updated_at;
             $difference = $createdAt->diff($updatedAt);
             $differenceString = $difference->format('%d days,%h hours, %i minutes');
                // Format the difference as a string for display
                if ($difference->days > 0 ) {
                    // Display days and hours if they are greater than 0
                    $differenceString = $difference->format('%d days');
                } elseif($difference->h > 0)
                {
                    $differenceString = $difference->format('%h hours');
                }
                elseif ($difference->i > 0) {
                    // Display minutes if they are greater than 0
                    $differenceString = $difference->format('%i minutes');
                } else {
                    // If there are no days, hours, or minutes, display seconds
                    $differenceString = $difference->format('%s seconds');
                }
             echo $differenceString;
      
      ?>
      </td>
    </tr>
   @endforeach
  </tbody>
 
</table>
<div class="d-flex justify-content-end">
    {!! $session->links() !!}
</div>
        </div>
    </div>
</div>


@endsection

<script>
    $('.select2').select2();
</script>