
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
        <button class="btn btn-orange">Help</button>
    </div>
    
    <div class="col-lg-3">
    <form method="post" action="/index">
    @csrf
    <select class="form-control select2" id="locationSelect">
    <option value="">Select</option>
    @foreach($location as $l)
        <option value="{{ $l->id }}">{{ $l->name }}</option>
    @endforeach
</select>
</form>

    </div>
 


    <div class="card mt-3" >
        <div class="row">
            
        <table class="table table-responsive table-hover" id="sessionData">
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
  @if($sessions->isEmpty())
    <tr>
      <td class="text-center" colspan="5">Data Not Found</td>
    </tr>
    @else
    @foreach($sessions as $s)
    <tr>
      
      <td>{{$s->session_id}}</td>
      <td>Restorant Name<br>
       at {{$s->location}}</td>
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
   @endif
  </tbody>
 
</table>
<div class="d-flex justify-content-end">
    {!! $sessions->links() !!}
</div>
        </div>
    </div>
</div>


@endsection
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
        $('#locationSelect').on('change', function () {
            var locationId = $(this).val();

            $.ajax({
                type: 'GET', // Use GET request to fetch data
                url: '/session', // Replace with the actual route to fetch data
                data: {
                    loc_id: locationId
                },
                
                success: function (data) {
                    console.log(data);
                    $('#sessionData').html(data);
                }
                
            });
        });
    });
</script> -->