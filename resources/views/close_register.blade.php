@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')


<style>
.flex-container {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}

.flex-column {
    display: flex;
    flex-direction: column;
}
</style>

<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-sm-8">
                <div class="card shadow mt-5">
                    <!-- <div class="card-header">
    Featured
  </div> -->
                    <div class="card-body">

                        <div class="flex-container">
                            <div class="flex-column">
                                <h2>Session {{$id}}</h2>
                                <h6>Register : <?php echo $locationname   ?></h6>
                            </div>
                            <div class="flex-column">
                                @php $formattedTime = '';

                                @endphp
                                @php
                                // Calculate the time difference
                                $currentTime = now();
                                $updatedAt = $opened_at;
                                $diff = $currentTime->diff($updatedAt);

                                // Determine the appropriate format based on the time elapsed


                                if ($diff->y > 0) {
                                $formattedTime = $diff->y . ' year' . ($diff->y > 1 ? 's' : '') . ' ago';
                                } elseif ($diff->m > 0) {
                                $formattedTime = $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . ' ago';
                                } elseif ($diff->d > 0) {
                                $formattedTime = $diff->d . ' day' . ($diff->d > 1 ? 's' : '') . ' ago';
                                } elseif ($diff->h > 0) {
                                $formattedTime = $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' ago';
                                } elseif ($diff->i > 0) {
                                $formattedTime = $diff->i . ' minute' . ($diff->i > 1 ? 's' : '') . ' ago';
                                } else {
                                $formattedTime = 'just now';
                                }
                                @endphp
                                <h6><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp; Calculated
                                    {{ $formattedTime }}
                                    &nbsp;
                                    <a href="/closeregister"><button class="btn btn-orange">Close Register</button></a>
                            </div>
                        </div>

                        <table class="table table-hover table-bordered mt-5">
                            <thead>
                                <tr>
                                    <th scope="col">TYPE</th>
                                    <th scope="col">OPENING</th>
                                    <th scope="col">RECEIVED</th>
                                    <th scope="col">ADJUSTMENTS</th>
                                    <th scope="col">EXPECTED</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Cash</td>
                                    <td>{{number_format($opening_cash, 2, '.', ',') }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>{{number_format($opening_cash, 2, '.', ',') }}</td>
                                </tr>
                                <tr>
                                    <td>Card</td>
                                    <td>{{number_format($opening_card, 2, '.', ',') }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>{{number_format($opening_card, 2, '.', ',') }}</td>
                                </tr>
                                <tr>
                                    <td>Credit</td>
                                    <td>{{number_format($opening_credit, 2, '.', ',') }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>{{number_format($opening_credit, 2, '.', ',') }}</td>
                                </tr>
                                <tr>
                                    <td>Upi</td>
                                    <td>{{number_format($opening_upi, 2, '.', ',') }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>{{number_format($opening_upi, 2, '.', ',') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card shadow mt-5">
                    <div class="card-body">
                        <div class="alert alert-primary" role="alert">
                            <p>Register is open</p>

                            @php $formattedTime = '';

                            @endphp
                            @php
                            // Calculate the time difference
                            $currentTime = now();
                            $updatedAt = $opened_at;
                            $diff = $currentTime->diff($updatedAt);

                            // Determine the appropriate format based on the time elapsed


                            if ($diff->y > 0) {
                            $formattedTime = $diff->y . ' year' . ($diff->y > 1 ? 's' : '') . ' ago';
                            } elseif ($diff->m > 0) {
                            $formattedTime = $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . ' ago';
                            } elseif ($diff->d > 0) {
                            $formattedTime = $diff->d . ' day' . ($diff->d > 1 ? 's' : '') . ' ago';
                            } elseif ($diff->h > 0) {
                            $formattedTime = $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' ago';
                            } elseif ($diff->i > 0) {
                            $formattedTime = $diff->i . ' minute' . ($diff->i > 1 ? 's' : '') . ' ago';
                            } else {
                            $formattedTime = 'just now';
                            }
                            @endphp
                            Register was opened {{ $formattedTime }} by {{$user_name}}

                        </div>


                        <table class="table table-borderless table-responsive">
                            <tbody>
                                <tr>
                                    <td>Opened:</td>
                                    <td><?php echo  date("d M, Y - h:i A", strtotime($opened_at)); ?></td>
                                </tr>
                                <tr>
                                    <td>Closed:</td>
                                    @if($status == 1)
                                    <td>Register Open</td>
                                    @else
                                    <td>{{ $closed_at }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Duration:</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mt-5">
            <!-- <div class="card-header">
    Featured
  </div> -->
            <div class="card-body">
                <h3>Payments</h3>
                <table id="myTable" class="table table-hover table-bordered mt-5">
                    <thead>
                        <tr>

                            <th scope="col">No</th>
                            <th scope="col">Payment Type</th>
                            <th scope="col">Bill</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Credit</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>e</td>
                            <td>d</td>
                            <td>c</td>
                            <td>s</td>
                            <td>w</td>
                        </tr>
                        <tr>

                    </tbody>
                </table>






            </div>
        </div>

    </div>
</div>


@endsection





<script>
$(document).ready(function() {
    $('#myTable').DataTable();
});
</script>