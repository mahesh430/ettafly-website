<!DOCTYPE html>


<!-- Page Header
============================================= -->
<section class="page-header page-header-text-light bg-secondary">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1>About Us</h1>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb justify-content-start justify-content-md-end mb-0">
                    <li><a href="index">Home</a></li>
                    <li class="active">About Us</li>
                </ul>
            </div>
        </div>
    </div>
</section><!-- Page Header end -->

<!-- Content
============================================= -->
<div id="content">
    <div class="container">
        <div class="col-md-3"></div>
        <center>
            <div class="col-md-9">
                <div class="bg-light shadow-md rounded p-4">
                    <div class="row">
                        <div class="white-box">
                            <h3><b>INVOICE</b> <span class="pull-right">#<?php echo $order->order_id; ?></span></h3>
                            <hr>
                            <?php foreach ($booking_details as $booking_details_view) { ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive m-t-40">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>Description</th>
                                                        <th class="text-right">Quantity</th>
                                                        <!--<th class="text-right">Unit Cost</th>-->
                                                        <th class="text-right">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <?php
//                                                        foreach ($booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'] as $booking_details_view22) {
                                                        if ($booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][8] != '') {
                                                            $arrival_code = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][8]['FlightSegment']['ArrivalAirportLocationCode'];
                                                            $arrival = strtotime($booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][8]['FlightSegment']['ArrivalDateTime']);
                                                            $journey_durat8 = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][8]['FlightSegment']['JourneyDuration'];
                                                            $stops = "Eight Stops";
                                                        } else if ($booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][7] != '') {
                                                            $arrival_code = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][7]['FlightSegment']['ArrivalAirportLocationCode'];
                                                            $arrival = strtotime($booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][7]['FlightSegment']['ArrivalDateTime']);
                                                            $journey_durat7 = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][7]['FlightSegment']['JourneyDuration'];
                                                            $stops = "Seven Stops";
                                                        } else if ($booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][6] != '') {
                                                            $arrival_code = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][6]['FlightSegment']['ArrivalAirportLocationCode'];
                                                            $arrival = strtotime($booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][6]['FlightSegment']['ArrivalDateTime']);
                                                            $journey_durat6 = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][6]['FlightSegment']['JourneyDuration'];
                                                            $stops = "Six Stops";
                                                        } else if ($booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][5] != '') {
                                                            $arrival_code = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][5]['FlightSegment']['ArrivalAirportLocationCode'];
                                                            $arrival = strtotime($booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][5]['FlightSegment']['ArrivalDateTime']);
                                                            $journey_durat5 = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][5]['FlightSegment']['JourneyDuration'];
                                                            $stops = "Five Stops";
                                                        } else if ($booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][4] != '') {
                                                            $arrival_code = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][4]['FlightSegment']['ArrivalAirportLocationCode'];
                                                            $arrival = strtotime($booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][4]['FlightSegment']['ArrivalDateTime']);
                                                            $journey_durat4 = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][4]['FlightSegment']['JourneyDuration'];
                                                            $stops = "Four Stops";
                                                        } else if ($booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][3] != '') {
                                                            $arrival_code = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][3]['FlightSegment']['ArrivalAirportLocationCode'];
                                                            $arrival = strtotime($booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][3]['FlightSegment']['ArrivalDateTime']);
                                                            $journey_durat3 = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][3]['FlightSegment']['JourneyDuration'];
                                                            $stops = "Three Stops";
                                                        } else if ($booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][2] != '') {
                                                            $arrival_code = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][2]['FlightSegment']['ArrivalAirportLocationCode'];
                                                            $arrival = strtotime($booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][2]['FlightSegment']['ArrivalDateTime']);
                                                            $journey_durat2 = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][2]['FlightSegment']['JourneyDuration'];
                                                            $stops = "Two Stops";
                                                        } else if ($booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][1] != '') {
                                                            $arrival_code = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][1]['FlightSegment']['ArrivalAirportLocationCode'];
                                                            $arrival = strtotime($booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][1]['FlightSegment']['ArrivalDateTime']);
                                                            $journey_durat1 = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][1]['FlightSegment']['JourneyDuration'];
                                                            $stops = "One Stop";
                                                        } else {
                                                            $arrival_code = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][0]['FlightSegment']['ArrivalAirportLocationCode'];
                                                            $arrival = strtotime($booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][0]['FlightSegment']['ArrivalDateTime']);
                                                            $journey_durat = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][0]['FlightSegment']['JourneyDuration'];
                                                            $stops = "Non Stop";
                                                        }
                                                        $departure_code = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][0]['FlightSegment']['DepartureAirportLocationCode'];
                                                        foreach ($flight_details as $flight_details_view) {
                                                            if ($departure_code == $flight_details_view->code) {
                                                                $departure_loc = $flight_details_view->city;
                                                                $departure_airport = $flight_details_view->name;
                                                            }
                                                        }
                                                        foreach ($flight_details as $flight_details_view) {
                                                            if ($arrival_code == $flight_details_view->code) {
                                                                $arrival_loc = $flight_details_view->city;
                                                                $arrival_airport = $flight_details_view->name;
                                                            }
                                                        }
                                                        $adult_quantity = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['FareBreakdown'][0]['PassengerTypeQuantity']['Quantity'];
                                                        $adult_code = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['FareBreakdown'][0]['PassengerTypeQuantity']['Code'];
                                                        $child_quantity = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['FareBreakdown'][1]['PassengerTypeQuantity']['Quantity'];
                                                        $child_code = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['FareBreakdown'][1]['PassengerTypeQuantity']['Code'];
                                                        $infant_quantity = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['FareBreakdown'][2]['PassengerTypeQuantity']['Quantity'];
                                                        $infant_code = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['FareBreakdown'][2]['PassengerTypeQuantity']['Code'];
                                                        $total_quantity = $adult_quantity + $child_quantity + $infant_quantity;

                                                        $basefare = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['ItinTotalFares']['BaseFare']['Amount'];
                                                        $totaltax = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['ItinTotalFares']['TotalTax']['Amount'];
                                                        $totalfare = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['ItinTotalFares']['TotalFare']['Amount'];
                                                        ?>

                                                        <?php // } ?>
                                                        <td>Flight Booking from <?php echo $departure_airport; ?> to <?php echo $arrival_airport; ?></td>
                                                        <td class="text-right"><?php echo $total_quantity; ?> </td>
                                                        <!--<td class="text-right"> $24 </td>-->
                                                        <td class="text-right"> Rs:<?php echo $totalfare; ?> </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="pull-right m-t-30 text-right">
                                            <p>Sub - Total amount: Rs:<?php echo $basefare ?></p>
                                            <p>Tax : Rs:<?php echo $totaltax ?> </p>
                                            <hr>
                                            <h3><b>Total :</b> Rs:<?php echo $totalfare ?></h3> </div>
                                        <div class="clearfix"></div>
                                        <hr>
                                        <div class="text-right">
                                            <form action="https://15.206.77.144/ettafly/payment_sucess/<?php echo $order->order_id; ?>" method="POST">
                                                <script
                                                    src="https://checkout.razorpay.com/v1/checkout.js"
                                                    data-key="rzp_test_ZFUHmQCRXyqd0s"
                                                    data-amount="<?php echo ($totalfare * 100) ?>"
                                                    data-buttontext="Pay now"
                                                    data-name="Payment"
                                                    data-description="Flight Booking"
                                                    data-image="https://15.206.77.144/ettafly/public/images/admin/20190725165446199_ettafly_loga.png"
                                                    data-prefill.name="Ettafly Flight Booking"
                                                    data-prefill.contact="<?php echo $order->mobile; ?>"
                                                    data-prefill.email="<?php echo $order->email; ?>"
                                                    data-theme.color="#7ae1af"
                                                ></script>
                                                <input type="text" value="<?php echo $paymentid; ?>" name="id" hidden>
                                            </form>
                                            <!--<a class="btn btn-info" value="Pay now" type="button"> Proceed to payment </a>-->
                                            <button onClick="javascript:window.print();" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>
        </center>
    </div>

</div><!-- Content end -->
<!-- Footer end -->

</div><!-- Document Wrapper end -->

<style>
    .razorpay-payment-button
    {
        text-align: center;
        color: white;
        border: 2px solid #0e0e0e;
        width: 150px;
        height: 35px;
        display: inline-block;
        font-weight: 400;
        color: #fff;
        background-color: #17a2b8;
        border-color: #17a2b8;

    }
</style>