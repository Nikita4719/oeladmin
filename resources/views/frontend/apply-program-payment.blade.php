@extends('frontend.layouts.main')
@section('title', 'Check Eligibility')
@section('content')
<style>
    .payment_wrapper {
    padding-top: 30px;
    max-width: 800px;
    margin: auto;
}
</style>
<style type="text/css">
    .center{
    display: flex;
    justify-content: center;
    }
    .program_apply_form{
    border-radius: 4px;
    border: 1px solid #eee;
    padding: 20px;
    }
    .radio input{
    margin-right: 20px;
    }
    .question_label{
    font-weight: bold;
    }
    .program_details{
    padding: 20px;
    box-shadow: 0px 0px 8px 2px #ccc;
    background: #fff;
    }
    .info{
    font-size: 15px;
    }
    .card_title{
    font-size: 20px;
    padding-bottom: 15px;
    text-align: left;
    color: #000;
    }
    .card_item{
    margin-bottom: 10px;
    margin-top: 10px;
    }
    .program_name{
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 20px;
    }
    .payment_table{
    border: 1px solid #eee;
    }
    .payment_table tr th:first-child, .payment_table tr td:first-child{
    border-right: 1px solid #eee;
    }
    .table_column_heading{
    background: #f7f6f6;
    }
    .university_label{
    font-size: 13px;
    font-weight: normal;
    }
 </style>
<div class="payment_wrapper">
    <div class="text-center">
       <div>
          <h3>Proceed to Payment</h3>
       </div>
       <div class="info">
          You are going to make a payment for the following program
       </div>
    </div>

    <div class="payment_container">
       <div class="program_details card_item">
          <div class="card_title">Selected Course/Program</div>
          <div class="program_name">
             <div><a href="{{route('course-details',[$program_data->id])}}">{{$program_data->name}}</a></div>
             <div class="university_label">
                <a href="">{{$program_data->university_name->university_name}}</a>
             </div>
          </div>
          <table class="table payment_table">
             <tbody>
                <tr>
                   <th class="table_column_heading">Fee Type</th>
                   <td>Program Application Fee</td>
                </tr>
                <tr>
                   <th class="table_column_heading">Amount</th>
                   <td>
                      {{$program_data->application_fee}}
                      {{$program_data->currency}}
                   </td>
                </tr>
             </tbody>
          </table>
       </div>
       <!-- <div class="program_details card_item">
          <div class="card_title">Method of Apply</div>
          <div>Do you want to apply to OEL directly? (Fees would be INR 7k)</div>
       </div> -->
       <div class="program_details card_item">
          <table class="table payment_table">
             <tbody>
                <tr>
                   <th class="table_column_heading">Fee Type</th>
                   <th class="table_column_heading">Amount</th>
                </tr>
                <tr>
                   <td>Program Application Fee</td>
                   <td>
                    {{$program_data->application_fee}}
                    {{$program_data->currency}}
                   </td>
                </tr>
                <tr>
                   <th class="table_column_heading">Total Amount</th>
                   <th class="table_column_heading">
                    {{$program_data->application_fee}}
                    {{$program_data->currency}}
                   </th>
                </tr>
             </tbody>
          </table>
       </div>
    </div>
    <style type="text/css">
       .payment_buttons{
       display: flex;
       padding: 20px;
       }
    </style>
    @php
        $user=Auth::user();
    @endphp
    @if ($user->hasRole('student'))
    <div class="center payment_buttons">
       <div style="display: flex; justify-content: center;">
          @php
              $payment_details = DB::table('payments_link')->where('user_id', $user->id)->where('program_id', $program_data->id)->first();
          @endphp
          @if ($payment_details)
                @php
                    $payments = DB::table('payments')->where('fallowp_unique_id', $payment_details->fallowp_unique_id)->first();
                @endphp
                @if (empty($payments) || $payments->payment_status != 'success' && $payments->payment_status != 'free')
                    @if($program_data->application_fee != 0)
                    <button type="button"  class="btn btn-primary mr-5 m-l-15 razorpay-payment-button" id="pay_later">
                        <a href="{{route('pay-later',[$student_id, $program_data->id,Crypt::encrypt($program_data->application_fee),$intake_month,$intake_year])}}" class="text-light">
                            Pay Later
                        </a>
                    </button>
                    <button type="button" id="paybtn" class="btn btn-primary mr-4 m-l-15 razorpay-payment-button loading_button">
                        <span style="display: none;" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span><a href="{{ route('pay-amount', [$student_id, $program_data->id, Crypt::encrypt($program_data->application_fee),$intake_month,$intake_year]) }}" class="text-light">Pay and Continue</a></span>
                    </button>
                    @else
                        <button type="button" id="paybtn" class="btn btn-primary mr-4 m-l-15 razorpay-payment-button loading_button">
                            <span style="display: none;" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span><a href="{{ route('continue-course', [$student_id, $program_data->id, Crypt::encrypt($program_data->application_fee), $intake_month,$intake_year]) }}" class="text-light">Continue</a></span>
                        </button>
                    @endif
                @endif
            @else
            @if($program_data->application_fee != 0)
            <button type="button"  class="btn btn-primary mr-4 m-l-15 razorpay-payment-button" id="pay_later">
                <a href="{{route('pay-later',[$student_id, $program_data->id, Crypt::encrypt($program_data->application_fee), $intake_month,$intake_year])}}" class="text-light">
                    Pay Later
                </a>
            </button>
            <button type="button" id="paybtn" class="btn btn-primary m-l-15 razorpay-payment-button loading_button">
                <span style="display: none;" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span><a href="{{ route('pay-amount', [$student_id, $program_data->id, Crypt::encrypt($program_data->application_fee), $intake_month,$intake_year]) }}" class="text-light">Pay and Continue</a></span>
            </button>
            @else
                <button type="button" id="paybtn" class="btn btn-primary mr-4 m-l-15 razorpay-payment-button loading_button">
                    <span style="display: none;" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span><a href="{{ route('continue-course', [$student_id, $program_data->id, Crypt::encrypt($program_data->application_fee),$intake_month,$intake_year]) }}" class="text-light">Continue</a></span>
                </button>
            @endif
          @endif
       </div>
    </div>
    @endif
 </div>
@endsection
