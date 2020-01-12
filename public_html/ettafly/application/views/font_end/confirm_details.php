

<!-- Page Header
============================================= -->
<section class="page-header page-header-text-light bg-secondary">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1>Flights - Confirm Details</h1>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb justify-content-start justify-content-md-end mb-0">
                    <li><a href="index">Home</a></li>
                    <li><a href="booking-flights">Flights</a></li>
                    <li class="active">Flights Confirm Details</li>
                </ul>
            </div>
        </div>
    </div>
</section><!-- Page Header end -->

<!-- Content
============================================= -->
<div id="content">
    <section class="container">
        <?php
//        echo "<pre>";
        foreach ($booking_details as $booking_details_view) {
            //            1
//            print_r($booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption']);
//            die;
//            foreach ($booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'] as $booking_details_view22) {
//            print_r($booking_details_view22);
//            die;
//            print_r($booking_details_view22['FlightSegment']['ArrivalAirportLocationCode']);
//        }
//die;
//            print_r($booking_details_view['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption']);
//         foreach($booking_details_view['AirRevalidateResult'] as $booking_details_view){ 
//        print_r($booking_details_view);

            $departure_code = $booking_details_view['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][0]['FlightSegment']['DepartureAirportLocationCode'];
            $departure = strtotime($booking_details_view['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][0]['FlightSegment']['DepartureDateTime']);
            $booking_details_view['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][0]['FlightSegment']['JourneyDuration'];


            $journey_duratio = $journey_durat + $journey_durat1 + $journey_durat2 + $journey_durat3 + $journey_durat4 + $journey_durat5 + $journey_durat6 + $journey_durat7 + $journey_durat8;
            $journey_duration = intdiv($journey_duratio, 60) . 'h:' . ($journey_duratio % 60) . 'm';
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
            ?>
            <form method="post" action="user/make_payment" enctype='multipart/form-data'>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="bg-light shadow-md rounded p-3 p-sm-4 confirm-details">
                            <h2 class="text-6 mb-3">Confirm Flight Details</h2>
                            <!-- Departure Flight Detail
                            ============================================= -->
                            <?php
                            foreach ($booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'] as $booking_details_view22) {
//                                print_r($booking_details_view22);
//                                die;
                                $arrival_air = $booking_details_view22['FlightSegment']['ArrivalAirportLocationCode'];
                                foreach ($flight_details as $flight_details_view) {
                                    if ($arrival_air == $flight_details_view->code) {
                                        $arrival_loc = $flight_details_view->city;
                                        $arrival_airport = $flight_details_view->name;
                                        $arrival_country = $flight_details_view->country;
                                    }
                                }
                                $defature_air = $booking_details_view22['FlightSegment']['DepartureAirportLocationCode'];
                                foreach ($flight_details as $flight_details_view) {
                                    if ($defature_air == $flight_details_view->code) {
                                        $departure_loc = $flight_details_view->city;
                                        $departure_airport = $flight_details_view->name;
                                        $departure_country = $flight_details_view->country;
                                    }
                                }
                                ?>
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center trip-title">
                                            <div class="col-5 col-sm-auto text-center text-sm-left">
                                                <h5 class="m-0 trip-place"><?php echo $departure_loc; ?></h5>
                                            </div>
                                            <div class="col-2 col-sm-auto text-8 text-black-50 text-center trip-arrow">➝</div>
                                            <div class="col-5 col-sm-auto text-center text-sm-left">
                                                <h5 class="m-0 trip-place"><?php echo $arrival_loc; ?></h5>
                                            </div>
                                            <div class="col-12 mt-1 d-block d-md-none"></div>
                                            <div class="col-6 col-sm col-md-auto text-3 date"><?php
                                                $departure_time = strtotime($booking_details_view22['FlightSegment']['DepartureDateTime']);
                                                $arrival_time = strtotime($booking_details_view22['FlightSegment']['ArrivalDateTime']);
                                                echo date("d M Y", $departure_time);
                                                echo ", ";
                                                echo date("l", strtotime($departure_time));
                                                ?></div>
                                            <div class="col-6 col-sm col-md-auto text-right order-sm-1"><a class="text-1" data-toggle="modal" data-target="#fare-rules" href="">Fare Rules</a></div>
                                            <?php
                                            $refund = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['IsRefundable'];
                                            if ($refund == "Yes") {
                                                ?>
                                                <div class="col col-md-auto text-center ml-auto order-sm-0"><span class="badge badge-success py-1 px-2 font-weight-normal text-1">Refundable</span></div>
                                            <?php } else { ?>
                                                <div class="col col-md-auto text-center ml-auto order-sm-0"><span class="badge badge-danger py-1 px-2 font-weight-normal text-1">Non Refundable</span></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php
                                            $code = $booking_details_view22['FlightSegment']['OperatingAirline']['Code'];
                                            $equipment = $booking_details_view22['FlightSegment']['OperatingAirline']['Equipment'];
                                            $flight_no = $booking_details_view22['FlightSegment']['OperatingAirline']['FlightNumber'];
//                                            $flight_no = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['IsPassportMandatory'];
                                            ?>
                                            <div class="col-12 col-sm-3 text-center text-md-left d-lg-flex company-info"> <span class="align-middle"><img class="img-fluid" alt="" src="images/brands/flights/indigo.png"> </span> <span class="align-middle ml-lg-2"> 
                                                    <span class="d-block text-2 text-dark mt-1 mt-lg-0"><?php echo $code; ?></span>
                                                    <small class="text-muted d-block"><?php echo $equipment; ?>-<?php echo $flight_no; ?></small> </span> </div>

                                            <div class="col-12 col-sm-3 text-center time-info mt-3 mt-sm-0"> <span class="text-5 text-dark"><?php echo date("H:i", $departure_time); ?></span> <small class="text-muted d-block"><?php echo $departure_airport; ?></small> </div>
                                            <div class="col-12 col-sm-3 text-center time-info mt-3 mt-sm-0"> <span class="text-3 text-dark"><?php echo $journey_duration = intdiv($booking_details_view22['FlightSegment']['JourneyDuration'], 60) . 'h:' . ( $booking_details_view22['FlightSegment']['JourneyDuration'] % 60) . 'm'; ?></span> <small class="text-muted d-block">Duration</small> </div>
                                            <div class="col-12 col-sm-3 text-center time-info mt-3 mt-sm-0"> <span class="text-5 text-dark"><?php echo date("H:i", $arrival_time); ?></span> <small class="text-muted d-block"><?php echo $arrival_airport; ?></small> </div>
                                        </div>
                                        <!-- Fare Rules (Modal Dialog)
                                        ============================================= -->
                                        <div id="fare-rules" class="modal fade" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Fare Rules</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul class="nav nav-tabs" id="departureTab" role="tablist">
                                                            <li class="nav-item"> <a class="nav-link active" id="third-tab" data-toggle="tab" href="#third" role="tab" aria-controls="third" aria-selected="false">Baggage Details</a> </li>
                                                            <li class="nav-item"> <a class="nav-link" id="fourth-tab" data-toggle="tab" href="#fourth" role="tab" aria-controls="fourth" aria-selected="false">Cancellation Fee</a> </li>
                                                        </ul>
                                                        <div class="tab-content my-3" id="departureContent">
                                                            <div class="tab-pane fade show active" id="third" role="tabpanel" aria-labelledby="third-tab">
                                                                <div class="table-responsive-md">
                                                                    <table class="table table-hover table-bordered bg-light">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>&nbsp;</th>
                                                                                <td class="text-center">Cabin</td>
                                                                                <td class="text-center">Check-In</td>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Adult</td>
                                                                                <td class="text-center">7 Kg</td>
                                                                                <td class="text-center">15 Kg</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Child</td>
                                                                                <td class="text-center">7 Kg</td>
                                                                                <td class="text-center">15 Kg</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Infant</td>
                                                                                <td class="text-center">0 Kg</td>
                                                                                <td class="text-center">0 Kg</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="fourth" role="tabpanel" aria-labelledby="fourth-tab">
                                                                <table class="table table-hover table-bordered bg-light">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>&nbsp;</th>
                                                                            <td class="text-center">Per Passenger Fee</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>24 hrs - 365 days</td>
                                                                            <td class="text-center">$250 + $50</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>2-24 hours</td>
                                                                            <td class="text-center">$350 + $50</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>0-2 hours</td>
                                                                            <td class="text-center">$550 + $50</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <p class="font-weight-bold">Terms & Conditions</p>
                                                                <ul>
                                                                    <li>The penalty is subject to 4 hrs before departure. No Changes are allowed after that.</li>
                                                                    <li>The charges are per passenger per sector.</li>
                                                                    <li>Partial cancellation is not allowed on tickets booked under special discounted fares.</li>
                                                                    <li>In case of no-show or ticket not cancelled within the stipulated time, only statutory taxes are refundable subject to Service Fee.</li>
                                                                    <li>No Baggage Allowance for Infants</li>
                                                                    <li>Airline penalty needs to be reconfirmed prior to any amendments or cancellation.</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- Fare Rules end -->

                                    </div>
                                </div><!-- Departure Flight Detail end -->
                                <br>
                            <?php } ?>
                            <!-- Return Flight Detail
                            ============================================= -->
                            <?php
                            $adult_quantity = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['FareBreakdown'][0]['PassengerTypeQuantity']['Quantity'];
                            $adult_code = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['FareBreakdown'][0]['PassengerTypeQuantity']['Code'];
                            $child_quantity = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['FareBreakdown'][1]['PassengerTypeQuantity']['Quantity'];
                            $child_code = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['FareBreakdown'][1]['PassengerTypeQuantity']['Code'];
                            $infant_quantity = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['FareBreakdown'][2]['PassengerTypeQuantity']['Quantity'];
                            $infant_code = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['FareBreakdown'][2]['PassengerTypeQuantity']['Code'];
                            $total_quantity = $adult_quantity + $child_quantity + $infant_quantity;
                            if ($total_quantity != 0) {
                                ?>
                                <div class="alert alert-info mt-4"> <span class="badge badge-info">NOTE:</span> This is a special fare given by the airline. Airlines cancellation charges do apply. </div>
                                <h2 class="text-6 mb-3 mt-5">Traveller Details - <span class="text-3"><a data-toggle="modal" data-target="#login-signup" href="#" title="Login / Sign up">Login</a> to book faster</span></h2>
                                <p class="font-weight-600">Contact Details</p>
                                <div class="form-row">
                                    <div class="col-sm-6 form-group">
                                        <input class="form-control" id="email" required name="email" required placeholder="Enter Email" type="text">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <input class="form-control" required data-bv-field="number" name="mobile" id="mobileNumber" required placeholder="Enter Mobile Number" type="text">
                                    </div>
                                </div>
                                <?php
                            }
                            if ($adult_quantity != 0) {
                                for ($i = 1; $i <= $adult_quantity; $i++) {
                                    ?>
                                    <h5 class="font-weight-600">Adult <?php echo $i; ?> Details</h5>

                                    <p class="text-info">Your booking details will be sent to this email address and mobile number.</p>
                                    <div class="form-row">
                                        <div class="col-sm-2 form-group">
                                            <select class="custom-select" id="title<?php echo $i; ?>" name="adult_title[]" required="">
                                                <option value="">Title</option>
                                                <option value="Mr">Mr</option>
                                                <option value="Ms">Ms</option>
                                                <option value="Mrs">Mrs</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-5 form-group">
                                            <input class="form-control" id="firstName<?php echo $i; ?>" name="adult_firstname[]" required placeholder="Enter First Name" type="text">
                                        </div>
                                        <div class="col-sm-5 form-group">
                                            <input class="form-control" id="lastName<?php echo $i; ?>" name="adult_lastname[]" required placeholder="Enter Last Name" type="text">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <input class="form-control booking_dob1" name="adult_dob[]" id="departure_date<?php echo $i; ?>" required placeholder="Enter Date of Birth" type="date">
                                        </div>
                                        <div class="col-sm-6 form-group row" id="gender<?php echo $i; ?>">
                                            <div class="col-sm-6">
                                                <label><input id="adult_gender_m<?php echo $i; ?>" name="adult_gender[]" value="M" class="form-control a_gender<?php echo $i; ?>" type="checkbox">Male</label>
                                                <!--<label class="form-control" for="oneway">One Way</label>-->
                                            </div>
                                            <div class="col-sm-6">
                                                <label><input id="adult_gender_f<?php echo $i; ?>" name="adult_gender[]" value="F" class="form-control a_gender<?php echo $i; ?>" type="checkbox">Female</label>
                                                <!--<label class="form-control" for="roundtrip">Round Trip</label>-->
                                            </div>
                                        </div>
                                        <!--                                        <div class="col-sm-6 form-group">
                                                                                    <input class="form-control" data-bv-field="number" name="adult_number<?php echo $i; ?>" id="mobileNumber" required placeholder="Enter Mobile Number" type="text">
                                                                                </div>-->
                                    </div>
                                    <?php
                                }
                            }
                            if ($child_quantity != 0) {
                                for ($j = 1; $j <= $child_quantity; $j++) {
                                    ?>
                                    <h5 class="font-weight-600">Child <?php echo $j; ?> Details</h5>

                                    <div class="form-row">
                                        <div class="col-sm-2 form-group">
                                            <select class="custom-select" id="title<?php echo $j; ?>" name="child_title[]" required="">
                                                <option value="">Title</option>
                                                <option value="Mr">Mr</option>
                                                <option value="Ms">Ms</option>
                                                <option value="Mrs">Mrs</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-5 form-group">
                                            <input class="form-control" id="firstName<?php echo $j; ?>" name="child_firstname[]" required placeholder="Enter First Name" type="text">
                                        </div>
                                        <div class="col-sm-5 form-group">
                                            <input class="form-control" id="lastName<?php echo $j; ?>" name="child_lastname[]" required placeholder="Enter Last Name" type="text">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <input class="form-control" name="child_dob[]" id="mobileNumber<?php echo $j; ?>" required placeholder="Enter Date of Birth" type="date">
                                        </div>
                                        <div class="col-sm-6 form-group row">
                                            <div class="col-sm-6">
                                                <label id="child_gender_m<?php echo $j; ?>"><input id="child_gender_m<?php echo $j; ?>" name="child_gender[]" value="M" class="form-control" type="radio">Male</label>
                                                <!--<label class="form-control" for="oneway">One Way</label>-->
                                            </div>
                                            <div class="col-sm-6">
                                                <label id="child_gender_f<?php echo $j; ?>"><input id="child_gender_f<?php echo $j; ?>" name="child_gender[]" value="F" class="form-control" type="radio">Female</label>
                                                <!--<label class="form-control" for="roundtrip">Round Trip</label>-->
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            if ($infant_quantity != 0) {
                                for ($k = 1; $k <= $infant_quantity; $k++) {
                                    ?>
                                    <h5 class="font-weight-600">Infant <?php echo $k; ?> Details</h5>

                                    <div class="form-row">
                                        <div class="col-sm-2 form-group">
                                            <select class="custom-select" id="title<?php echo $k; ?>" name="infant_title" required="">
                                                <option value="">Title</option>
                                                <option value="Mr">Mr</option>
                                                <option value="Ms">Ms</option>
                                                <option value="Mrs">Mrs</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-5 form-group">
                                            <input class="form-control" id="firstName<?php echo $k; ?>" name="infant_firstname[]" required placeholder="Enter First Name" type="text">
                                        </div>
                                        <div class="col-sm-5 form-group">
                                            <input class="form-control" id="lastName<?php echo $k; ?>" name="infant_lastname[]" required placeholder="Enter Last Name" type="text">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <input class="form-control" data-bv-field="number" name="infant_dob[]" id="mobileNumber<?php echo $k; ?>" required placeholder="Enter Date of Birth" type="text">
                                        </div>
                                        <div class="col-sm-6 form-group row">
                                            <div class="col-sm-6">
                                                <label><input id="infant_gender_m<?php echo $k; ?>" name="infant_gender[]" value="M" class="form-control" type="radio">Male</label>
                                                <!--<label class="form-control" for="oneway">One Way</label>-->
                                            </div>
                                            <div class="col-sm-6">
                                                <label><input id="infant_gender_f<?php echo $k; ?>" name="infant_gender[]" value="F" class="form-control" type="radio">Female</label>
                                                <!--<label class="form-control" for="roundtrip">Round Trip</label>-->
                                            </div>
                                        </div>

                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <input class="form-control" id="lastName" hidden name="fare_source_code" type="text" value="<?php echo $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['FareSourceCode']; ?>">
                    <!-- Side Panel (Fare Details)
                    ============================================= -->
                    <aside class="col-lg-4 mt-4 mt-lg-0">
                        <div class="bg-light shadow-md rounded p-3">
                            <h3 class="text-5 mb-3">Fare Details</h3>
                            <ul class="list-unstyled">
                                <?php
                                $basefare = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['ItinTotalFares']['BaseFare']['Amount'];
                                $totaltax = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['ItinTotalFares']['TotalTax']['Amount'];
                                $totalfare = $booking_details_view['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['ItinTotalFares']['TotalFare']['Amount'];
                                ?>
                                <li class="mb-2">Base Fare <span class="float-right text-4 font-weight-500 text-dark"><?php echo $basefare; ?></span><br>
                                    <small class="text-muted">Adult : 1, Child : 0, Infant : 0</small></li>
                                <li class="mb-2">Taxes & Fees <span class="float-right text-4 font-weight-500 text-dark"><?php echo $totaltax; ?></span></li>
    <!--                            <li class="mb-2">Insurance <span class="float-right text-4 font-weight-500 text-dark"><?php echo $totalfare; ?></span></li>-->
                            </ul>
                            <div class="text-dark bg-light-4 text-4 font-weight-600 p-3"> Total Amount <span class="float-right text-6"><?php echo $totalfare; ?></span> </div>
                            <!--<h3 class="text-4 mb-3 mt-4">Promo Code</h3>-->
                            <!--                        <div class="input-group form-group">
                                                        <input class="form-control" placeholder="Promo Code" aria-label="Promo Code" type="text">
                                                        <span class="input-group-append">
                                                            <button class="btn btn-secondary" type="submit">APPLY</button>
                                                        </span> </div>
                                                    <ul class="promo-code pre-scrollable">
                                                        <li><span class="d-block text-3 font-weight-600">FLTOFFER</span>Up to $500 Off on your booking. Hurry! Limited period offer. <a class="text-1" href="">Terms & Conditions</a></li>
                                                        <li><span class="d-block text-3 font-weight-600">HOTOFFER</span>Up to $500 Off on your booking. Hurry! Limited period offer. <a class="text-1" href="">Terms & Conditions</a></li>
                                                        <li><span class="d-block text-3 font-weight-600">SUMMEROFFER</span>Up to $500 Off on your booking. Hurry! Limited period offer. <a class="text-1" href="">Terms & Conditions</a></li>
                                                        <li><span class="d-block text-3 font-weight-600">BIGOFFER</span>Up to $500 Off on your booking. Hurry! Limited period offer. <a class="text-1" href="">Terms & Conditions</a></li>
                                                        <li><span class="d-block text-3 font-weight-600">FLTOFFER</span>Up to $500 Off on your booking. Hurry! Limited period offer. <a class="text-1" href="">Terms & Conditions</a></li>
                                                        <li><span class="d-block text-3 font-weight-600">FLTOFFER</span>Up to $500 Off on your booking. Hurry! Limited period offer. <a class="text-1" href="">Terms & Conditions</a></li>
                                                    </ul>-->
                            <?php
                            if ($total_quantity != 0) {
                                if ($this->session->userdata('user_id') != "") {
                                    ?>
                                    <button class="btn btn-primary btn-block" type="submit">Proceed To Payment</button>
                                <?php } else { ?>
                                    <!--<li class="login-signup ml-lg-2">-->
                                    <a class="btn btn-primary btn-block" data-toggle="modal" data-target="#login-signup" href="#" title="Login / Sign up">Please Login to pay ticket </a>
                                    <!--</li>-->
                                    <!--                                <a class="btn btn-primary btn-block" disabled>Please Login to pay ticket</a>-->
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </aside><!-- Side Panel End -->
                <?php } ?>
            </div>
        </form>
    </section>
</div><!-- Content end -->
<br>
<?php for ($i = 1; $i <= $adult_quantity; $i++) { ?>
<script>
    $(".a_gender<?php echo $i; ?>").change(function () {
        $(".a_gender<?php echo $i; ?>").prop('checked', false);
        $(this).prop('checked', true);
    });
</script>
<?php } ?>