@extends('layouts.apanel')
@section('content')
<div class="container">
  <h2>Payments</h2>
  <hr>
    <div class="table-responsive">    
        <table class="table table-sm table-light table-hover">
          <thead>
            <tr>
              <th>User ID</th>
              <th>Payment Status</th>
              <th>Month Name</th>
              <th>Total Payment</th>
              <th>House Rent</th>
              <th>Water Bill</th>
              <th>Electric Bill</th>
              <th>Service Charge</th>
              <th>If Others</th>
              <th>If Due</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          @if(count($payments)>0)
          @foreach($payments as $payment)
          <tbody>
            <tr>
                <td>{{ $payment->user_id }}</td>
                <td>{{ $payment->status }}</td>
                <td>{{ $payment->month }}</td>
                <td>{{ $payment->total }}</td>
                <td>{{ $payment->rent }}</td>
                <td>{{ $payment->waterbill }}</td>
                <td>{{ $payment->electbill }}</td>
                <td>{{ $payment->services }}</td>
                <td>{{ $payment->others }}</td>
                <td>{{ $payment->due }}</td>

                @if(Auth::user()->role_id=='1')
                <td><a href="{{url('/payment/'.$payment->id.'/edit')}}" class="btn btn-outline-info btn-sm">Edit</a></td>
                <td>
                    {!! Form::open(['action'=> ['PaymentController@destroy', $payment->id], 'method'=> 'POST']) !!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class'=>'btn btn-outline-danger float-right btn-sm'])}}
                    {!! Form::close() !!}
                </td>
                @endif
            </tr>
          </tbody>
          @endforeach
        </table>
        <hr>
            {{$payments->links()}}
            <hr>
            @if(Auth::user()->role_id=='1')
            <a href="{{url('/payment/create')}}" class="btn btn-outline-primary btn-sm">Add Payment</a>
            @endif
      </div>
</div>   
          @endif

@endsection


