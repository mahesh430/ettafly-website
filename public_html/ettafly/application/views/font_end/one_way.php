
<!DOCTYPE html>

<?php
//print_r($flight_details);
//die;
//foreach ($jsonData2 as $row22) {
//    foreach ($row22 as $row) {
//        foreach ($row['FareItineraries'] as $k1) {
//            foreach ($k1['FareItinerary'] as $k2) {
//                foreach ($k2['ItinTotalFares'] as $k3) {
////                    print_r($k3);
//                    echo $k3['Amount'];
//                    die;
//                    foreach ($k3['BaseFare'] as $k4) {
//                        
//                        $fair_code_white[] = $k2['FareSourceCode'];
//                        foreach ($k2['FareItineraries'] as $k3) {
//                            foreach ($k3['FareItinerary'] as $k4) {
//                                foreach ($k4['AirItineraryFareInfo'] as $k5) {
//                                    echo $k5['boards']['FareSourceCode'];
//                                    echo $k['boards']['price'];
//                                }
//                            }
//                        }
//                    }
//                }
//            }
//        }
//    }
//}
//die;
?>
<!-- Content
============================================= -->
<div id="content">
    <section class="container">
        <div class="row">
            <div class="col mb-2">
                <form id="bookingFlight" method="GET" action="home/search_flites">
                    <div class="mb-3">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input id="oneway" name="journey_type" value="OneWay" class="custom-control-input" checked="" required type="radio">
                            <label class="custom-control-label" for="oneway">One Way</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input id="roundtrip" name="journey_type" value="Circle" class="custom-control-input" required type="radio">
                            <label class="custom-control-label" for="roundtrip">Round Trip</label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 col-lg-2 form-group">
                            <input type="text" class="form-control search_sugession_name" name="airport_from_code" value="<?php echo $_GET['airport_from_code']; ?>"  required placeholder="From">
                            <span class="icon-inside"><i class="fas fa-map-marker-alt"></i></span> 
                            <?php
                            foreach ($flight_details as $airports_view) {
                                $search_name_array[] = $airports_view->name . "-" . $airports_view->city;
                            }
                            ?></div>
                        <div class="col-md-6 col-lg-2 form-group">
                            <input type="text" class="form-control search_sugession_name2" name="airport_to_code" id="flightTo1" value="<?php echo $_GET['airport_to_code']; ?>" required placeholder="To">
                            <span class="icon-inside"><i class="fas fa-map-marker-alt"></i></span> 
                            <?php
                            foreach ($flight_details as $airports_view) {
                                $search_name_array2[] = $airports_view->name . "-" . $airports_view->city;
                            }
                            ?>
                        </div>
                        <div class="col-md-6 col-lg-2 form-group">
                            <input id="flightDepart" type="text" name="departure_date" class="form-control" required placeholder="Depart Date">
                            <span class="icon-inside"><i class="far fa-calendar-alt"></i></span> </div>
                        <div class="col-md-6 col-lg-2 form-group">
                            <input id="flightReturn" type="text" name="return_date" class="form-control" placeholder="Return Date">
                            <span class="icon-inside"><i class="far fa-calendar-alt"></i></span> </div>
                        <div class="col-md-6 col-lg-2 travellers-class form-group">
                            <input type="text" id="flightTravellersClass" class="travellers-class-input form-control" name="flight-travellers-class" placeholder="Travellers, Class" readonly required onkeypress="return false;">
                            <span class="icon-inside"><i class="fas fa-caret-down"></i></span> 
                            <!-- Travellers & Class Dropdown -->
                            <div class="travellers-dropdown">
                                <div class="row align-items-center">
                                    <div class="col-sm-7">
                                        <p class="mb-sm-0">Adults <small class="text-muted">(12+ yrs)</small></p>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="qty input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn bg-light-4" data-value="decrease" data-target="#flightAdult-travellers" data-toggle="spinner">-</button>
                                            </div>
                                            <input type="text" name="adult_flight" data-ride="spinner" id="flightAdult-travellers" class="qty-spinner form-control" value="1" readonly>
                                            <div class="input-group-append">
                                                <button type="button" class="btn bg-light-4" data-value="increase" data-target="#flightAdult-travellers" data-toggle="spinner">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="row align-items-center">
                                    <div class="col-sm-7">
                                        <p class="mb-sm-0">Children <small class="text-muted">(2-12 yrs)</small></p>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="qty input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn bg-light-4" data-value="decrease" data-target="#flightChildren-travellers" data-toggle="spinner">-</button>
                                            </div>
                                            <input type="text" name="child_flight" name="adult_flight" data-ride="spinner" id="flightChildren-travellers" class="qty-spinner form-control" value="0" readonly>
                                            <div class="input-group-append">
                                                <button type="button" class="btn bg-light-4" data-value="increase" data-target="#flightChildren-travellers" data-toggle="spinner">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="row align-items-center">
                                    <div class="col-sm-7">
                                        <p class="mb-sm-0">Infants <small class="text-muted">(Below 2 yrs)</small></p>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="qty input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn bg-light-4" data-value="decrease" data-target="#flightInfants-travellers" data-toggle="spinner">-</button>
                                            </div>
                                            <input type="text" name="infant_flight" data-ride="spinner" id="flightInfants-travellers" class="qty-spinner form-control" value="0" readonly>
                                            <div class="input-group-append">
                                                <button type="button" class="btn bg-light-4" data-value="increase" data-target="#flightInfants-travellers" data-toggle="spinner">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mt-2">
                                <div class="mb-3">
                                    <div class="custom-control custom-radio">
                                        <input id="flightClassEconomic" name="class_type" value="Economy" class="flight-class custom-control-input" checked="" required type="radio">
                                        <label class="custom-control-label" for="flightClassEconomic">Economy</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="flightClassBusiness" name="class_type" value="Business" class="flight-class custom-control-input" required type="radio">
                                        <label class="custom-control-label" for="flightClassBusiness">Business</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="flightClassFirstClass" name="class_type" value="First" class="flight-class custom-control-input" required type="radio">
                                        <label class="custom-control-label" for="flightClassFirstClass">First Class</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-block submit-done" type="button">Done</button>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-2 form-group">
                            <button class="btn btn-primary btn-block" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <aside class="col-md-3">
                <div class="bg-light shadow-md rounded p-3">
                    <h3 class="text-5">Filter</h3>
                    <div class="accordion accordion-alternate style-2" id="toggleAlternate">
                        <div class="card">
                            <div class="card-header" id="stops">
                                <h5 class="mb-0"> <a href="#" data-toggle="collapse" data-target="#togglestops" aria-expanded="true" aria-controls="togglestops">No. of Stops</a> </h5>
                            </div>
                            <div id="togglestops" class="collapse show" aria-labelledby="stops">
                                <div class="card-body">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="nonstop" name="stop" class="custom-control-input">
                                        <label class="custom-control-label" for="nonstop">Non Stop</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="1stop" name="stop" class="custom-control-input">
                                        <label class="custom-control-label" for="1stop">1 Stop</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="2stop" name="stop" class="custom-control-input">
                                        <label class="custom-control-label" for="2stop">2+ Stop</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="departureTime">
                                <h5 class="mb-0"> <a href="#" class="collapse" data-toggle="collapse" data-target="#toggleDepartureTime" aria-expanded="true" aria-controls="toggleDepartureTime">Departure Time</a> </h5>
                            </div>
                            <div id="toggleDepartureTime" class="collapse show" aria-labelledby="departureTime">
                                <div class="card-body">
                                    <div class="custom-control custom-checkbox clearfix">
                                        <input type="checkbox" id="earlyMorning" name="departureTime" class="custom-control-input">
                                        <label class="custom-control-label" for="earlyMorning">Early Morning</label>
                                        <small class="text-muted float-right">12am - 8am</small> </div>
                                    <div class="custom-control custom-checkbox clearfix">
                                        <input type="checkbox" id="morning" name="departureTime" class="custom-control-input">
                                        <label class="custom-control-label" for="morning">Morning</label>
                                        <small class="text-muted float-right">8am - 12pm</small> </div>
                                    <div class="custom-control custom-checkbox clearfix">
                                        <input type="checkbox" id="midDay" name="departureTime" class="custom-control-input">
                                        <label class="custom-control-label" for="midDay">Mid-Day</label>
                                        <small class="text-muted float-right">12pm - 4pm</small> </div>
                                    <div class="custom-control custom-checkbox clearfix">
                                        <input type="checkbox" id="evening" name="departureTime" class="custom-control-input">
                                        <label class="custom-control-label" for="evening">Evening</label>
                                        <small class="text-muted float-right">4pm - 8pm</small> </div>
                                    <div class="custom-control custom-checkbox clearfix">
                                        <input type="checkbox" id="night" name="departureTime" class="custom-control-input">
                                        <label class="custom-control-label" for="night">Night</label>
                                        <small class="text-muted float-right">8pm - 12am</small> </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="price">
                                <h5 class="mb-0"> <a href="#" class="collapse" data-toggle="collapse" data-target="#togglePrice" aria-expanded="true" aria-controls="togglePrice">Price</a> </h5>
                            </div>
                            <div id="togglePrice" class="collapse show" aria-labelledby="price">
                                <div class="card-body">
                                    <p>
                                        <input id="amount" type="text" readonly class="form-control border-0 bg-transparent p-0">
                                    </p>
                                    <div id="slider-range"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="airlines">
                                <h5 class="mb-0"> <a href="#" class="collapse" data-toggle="collapse" data-target="#toggleAirlines" aria-expanded="true" aria-controls="toggleAirlines">Airlines</a> </h5>
                            </div>
                            <div id="toggleAirlines" class="collapse show" aria-labelledby="airlines">
                                <div class="card-body">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="asianaAir" name="airlines" class="custom-control-input">
                                        <label class="custom-control-label" for="asianaAir">Asiana Airlines</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="americanAir" name="airlines" class="custom-control-input">
                                        <label class="custom-control-label" for="americanAir">American Airlines</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="airCanada" name="airlines" class="custom-control-input">
                                        <label class="custom-control-label" for="airCanada">Air Canada</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="airIndia" name="airlines" class="custom-control-input">
                                        <label class="custom-control-label" for="airIndia">Air India</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="jetAirways" name="airlines" class="custom-control-input">
                                        <label class="custom-control-label" for="jetAirways">Jet Airways</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="spicejet" name="airlines" class="custom-control-input">
                                        <label class="custom-control-label" for="spicejet">Spicejet</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="indiGo" name="airlines" class="custom-control-input">
                                        <label class="custom-control-label" for="indiGo">IndiGo</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="multiple" name="airlines" class="custom-control-input">
                                        <label class="custom-control-label" for="multiple">Multiple Airlines</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <div class="col-md-9 mt-4 mt-md-0">
                <div class="bg-light shadow-md rounded py-4">
                    <div class="mx-3 mb-3 text-center">
                        <?php
                        $airport_from_name = explode('-', $_GET['airport_from_code']);
                        $airport_to_name = explode('-', $_GET['airport_to_code']);
                        ?>
                        <h2 class="text-6"><?php echo $airport_from_name[1]; ?> <small class="mx-2">to</small><?php echo $airport_to_name[1]; ?></h2>
                    </div>
                    <div class="text-1 bg-light-3 border border-right-0 border-left-0 py-2 px-3">
                        <div class="row">
                            <div class="col col-sm-2 text-center"><span class="d-none d-sm-block">Airline</span></div>
                            <div class="col col-sm-2 text-center">Departure</div>
                            <div class="col-sm-2 text-center d-none d-sm-block">Duration</div>
                            <div class="col col-sm-2 text-center">Arrival</div>
                            <div class="col col-sm-2 text-right">Price</div>
                        </div>
                    </div>
                    <?php
//                    foreach ($jsonData2 as $k3) {
//                    foreach ($k3['FareItineraries']['FareItinerary']['ItinTotalFares'] as $k2) {
                    foreach ($jsonData2 as $row22) {
                        foreach ($row22 as $row) {
                            $no = 1;
                            foreach ($row['FareItineraries'] as $k1) {

//                                $url3 = 'http://13.235.39.41:8080/ettafly/api/farerules';
//                                $ch3 = curl_init($url3);
//                                $jsonData3 = array(
//                                    "user_id" => "Ettafly_APITest2019",
//                                    "user_password" => "Ettafly_TestPswd2019",
//                                    "access" => "Test",
//                                    "ip_address" => "13.235.39.41",
//                                    "session_id" => $session->SessionId,
//                                    "fare_source_code" => $k1['FareItinerary']['AirItineraryFareInfo']['FareSourceCode']
//                                );
//
////                                print_r($jsonData3);
//
//                                $payload3 = json_encode($jsonData3);
//
//                                curl_setopt($ch3, CURLOPT_POSTFIELDS, $payload3);
//                                curl_setopt($ch3, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
//                                curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
//
//                                $result3 = curl_exec($ch3);
//
//                                $fare_source_code = json_decode($result3, true);
//                                foreach ($fare_source_code as $fare_source_code_view) {
//                                    $Arrival = $fare_source_code['FareRules1_1Response']['FareRules1_1Result']['BaggageInfos'][0]['BaggageInfo']['Arrival'];
//                                    $Baggage = $fare_source_code['FareRules1_1Response']['FareRules1_1Result']['BaggageInfos'][0]['BaggageInfo']['Baggage'];
//                                    $Departure = $fare_source_code['FareRules1_1Response']['FareRules1_1Result']['BaggageInfos'][0]['BaggageInfo']['Departure'];
//                                    $FlightNo = $fare_source_code['FareRules1_1Response']['FareRules1_1Result']['BaggageInfos'][0]['BaggageInfo']['FlightNo'];
//                                    $PENALTIES = $fare_source_code['FareRules1_1Response']['FareRules1_1Result']['FareRules'][10]['FareRule']['Rules'];
//                                }
                                $departure_code = $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][0]['FlightSegment']['DepartureAirportLocationCode'];
                                $departure = strtotime($k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][0]['FlightSegment']['DepartureDateTime']);
                                $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][0]['FlightSegment']['JourneyDuration'];

                                if ($k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][8] != '') {
                                    $arrival_code = $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][8]['FlightSegment']['ArrivalAirportLocationCode'];
                                    $arrival = strtotime($k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][8]['FlightSegment']['ArrivalDateTime']);
                                    $journey_durat8 = $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][8]['FlightSegment']['JourneyDuration'];
                                    $stops = "Eight Stops";
                                } else if ($k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][7] != '') {
                                    $arrival_code = $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][7]['FlightSegment']['ArrivalAirportLocationCode'];
                                    $arrival = strtotime($k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][7]['FlightSegment']['ArrivalDateTime']);
                                    $journey_durat7 = $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][7]['FlightSegment']['JourneyDuration'];
                                    $stops = "Seven Stops";
                                } else if ($k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][6] != '') {
                                    $arrival_code = $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][6]['FlightSegment']['ArrivalAirportLocationCode'];
                                    $arrival = strtotime($k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][6]['FlightSegment']['ArrivalDateTime']);
                                    $journey_durat6 = $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][6]['FlightSegment']['JourneyDuration'];
                                    $stops = "Six Stops";
                                } else if ($k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][5] != '') {
                                    $arrival_code = $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][5]['FlightSegment']['ArrivalAirportLocationCode'];
                                    $arrival = strtotime($k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][5]['FlightSegment']['ArrivalDateTime']);
                                    $journey_durat5 = $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][5]['FlightSegment']['JourneyDuration'];
                                    $stops = "Five Stops";
                                } else if ($k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][4] != '') {
                                    $arrival_code = $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][4]['FlightSegment']['ArrivalAirportLocationCode'];
                                    $arrival = strtotime($k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][4]['FlightSegment']['ArrivalDateTime']);
                                    $journey_durat4 = $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][4]['FlightSegment']['JourneyDuration'];
                                    $stops = "Four Stops";
                                } else if ($k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][3] != '') {
                                    $arrival_code = $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][3]['FlightSegment']['ArrivalAirportLocationCode'];
                                    $arrival = strtotime($k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][3]['FlightSegment']['ArrivalDateTime']);
                                    $journey_durat3 = $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][3]['FlightSegment']['JourneyDuration'];
                                    $stops = "Three Stops";
                                } else if ($k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][2] != '') {
                                    $arrival_code = $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][2]['FlightSegment']['ArrivalAirportLocationCode'];
                                    $arrival = strtotime($k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][2]['FlightSegment']['ArrivalDateTime']);
                                    $journey_durat2 = $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][2]['FlightSegment']['JourneyDuration'];
                                    $stops = "Two Stops";
                                } else if ($k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][1] != '') {
                                    $arrival_code = $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][1]['FlightSegment']['ArrivalAirportLocationCode'];
                                    $arrival = strtotime($k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][1]['FlightSegment']['ArrivalDateTime']);
                                    $journey_durat1 = $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][1]['FlightSegment']['JourneyDuration'];
                                    $stops = "One Stop";
                                } else {
                                    $arrival_code = $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][0]['FlightSegment']['ArrivalAirportLocationCode'];
                                    $arrival = strtotime($k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][0]['FlightSegment']['ArrivalDateTime']);
                                    $journey_durat = $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][0]['FlightSegment']['JourneyDuration'];
                                    $stops = "Non Stop";
                                }
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
                                $airline_cod = $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][0]['FlightSegment']['MarketingAirlineCode'];
                                 $airline_code = $airline_cod.".png";
                                foreach ($airlines_details as $airlines_details_view) {
                                    if ($airline_code == $airlines_details_view->thumbnail) {
                                        $airline_name = $airlines_details_view->name;
                                        $airline_image = $airlines_details_view->image;
                                    }
                                }
//                                print_r($k1);
//                                foreach ($k1['FareItinerary'] as $k2) {
//                                        
                                ?>
                                <div class="flight-list">
                                    <div class="flight-item">
                                        <div class="row align-items-center flex-row pt-4 pb-2 px-3">
                                            <div class="col col-sm-2 text-center d-lg-flex company-info"> <span class="align-middle">
                                                    <img class="img-fluid" alt="" src="public/images/brands/airlines/<?php echo $airline_cod; ?>@2x.png"> 
                                                </span> <span class="align-middle ml-lg-2"> <span class="d-block text-1 text-dark"><?php echo $airline_name; ?></span>
                                                    <small class="text-muted d-block"><?php echo $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][0]['FlightSegment']['OperatingAirline']['Code']; ?>-<?php echo $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][0]['FlightSegment']['OperatingAirline']['Equipment']; ?></small> </span> 
                                            </div>
                                            <div class="col col-sm-2 text-center time-info"> <span class="text-4"><?php echo date("H:i", $departure); ?></span>
                                                <small class="text-muted d-none d-sm-block"><?php echo $departure_loc; ?></small> 
                                            </div>
                                            <div class="col-sm-2 text-center d-none d-sm-block time-info"> <span class="text-3"><?php echo $journey_duration; ?></span>
                                                <small class="text-muted d-none d-sm-block"><?php echo $stops; ?></small>
                                            </div>
                                            <div class="col col-sm-2 text-center time-info"> <span class="text-4"><?php echo date("H:i", $arrival); ?></span> 
                                                <small class="text-muted d-none d-sm-block"><?php echo $arrival_loc; ?></small> </div>
                                            <div class="col col-sm-2 text-right text-dark text-6 price"><?php echo $k1['FareItinerary']['AirItineraryFareInfo']['ItinTotalFares']['TotalFare']['Amount']; ?></div>
                                            <?php if ($k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][0]['SeatsRemaining']['Number'] != 0) { ?>
                                                <div class="col-12 col-sm-2 text-center ml-auto btn-book"> <a href="confirm_details/<?php echo $k1['FareItinerary']['AirItineraryFareInfo']['FareSourceCode']; ?>" class="btn btn-sm btn-primary"><i class="fas fa-shopping-cart d-block d-lg-none"></i> <span class="d-none d-lg-block">Book</span></a> </div>
                                            <?php } ?>
                                            <div class="col col-sm-auto col-lg-2 ml-auto mt-1 text-1 text-center"><a data-toggle="modal" data-target="#flight-<?php echo $no; ?>" href="">Flight Details</a></div>
                                        </div>
                                        <!-- Flight Details Modal Dialog
                                        ============================================= -->
                                        <div id="flight-<?php echo $no; ?>" class="modal fade" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Flight Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="flight-details">
                                                            <div class="row mb-4">
                                                                <div class="col-12 col-sm-9 col-lg-8">
                                                                    <div class="row align-items-center trip-title mb-3">
                                                                        <div class="col col-sm-auto text-center text-sm-left">
                                                                            <h5 class="m-0 trip-place"><?php echo $departure_loc; ?></h5>
                                                                        </div>
                                                                        <div class="col-auto text-10 text-black-50 text-center trip-arrow">➝</div>
                                                                        <div class="col col-sm-auto text-center text-sm-left">
                                                                            <h5 class="m-0 trip-place"><?php echo $arrival_loc; ?></h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row align-items-center">
                                                                        <div class="col col-sm-auto"><span class="text-4"><?php
                                                                                echo date("d M Y", $departure);
                                                                                echo " ";
                                                                                echo date("l", strtotime($departure));
                                                                                ?></span></div>
                                                                        <?php if ($k1['FareItinerary']['AirItineraryFareInfo']['IsRefundable'] == "Yes") { ?>
                                                                            <div class="col-auto"><span class="badge badge-success py-1 px-2 font-weight-normal text-1"> Refundable</span></div>
                                                                        <?php } else { ?>
                                                                            <div class="col-auto"><span class="badge badge-danger py-1 px-2 font-weight-normal text-1"> Not Refundable</span></div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-3 col-lg-2 text-center text-sm-right mt-3 mt-sm-0"> <span class="text-dark text-7"><?php echo $k1['FareItinerary']['AirItineraryFareInfo']['ItinTotalFares']['TotalFare']['Amount']; ?> </span> <span class="text-1 text-muted d-block">(Total Fare)</span> <span class="text-1 text-danger d-block"><?php echo $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][0]['SeatsRemaining']['Number']; ?> seat(s) left</span></div>
                                                                <?php if ($k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][0]['SeatsRemaining']['Number'] != 0) { ?>
                                                                    <div class="col-12 col-sm-3 col-lg-2 text-right ml-auto btn-book"> <a href="confirm_details/<?php echo $k1['FareItinerary']['AirItineraryFareInfo']['FareSourceCode']; ?>" class="btn btn-sm btn-primary"><i class="fas fa-shopping-cart d-block d-lg-none"></i> <span class="d-none d-lg-block">Book</span></a> </div>
                                                                <?php } ?>
                                                            </div>
                                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                                <li class="nav-item"> <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first<?php echo $no; ?>" role="tab" aria-controls="first" aria-selected="true">Itinerary</a> </li>
                                                                <li class="nav-item"> <a class="nav-link" id="second-tab" data-toggle="tab" href="#second<?php echo $no; ?>" role="tab" aria-controls="second" aria-selected="false">Fare Details</a> </li>
                                                                <li class="nav-item"> <a class="nav-link" id="third-tab" data-toggle="tab" href="#third<?php echo $no; ?>" role="tab" aria-controls="third" aria-selected="false">Baggage Details</a> </li>
                                                                <li class="nav-item"> <a class="nav-link" id="fourth-tab" data-toggle="tab" href="#fourth<?php echo $no; ?>" role="tab" aria-controls="fourth" aria-selected="false">Cancellation Fee</a> </li>
                                                            </ul>
                                                            <div class="tab-content my-3" id="myTabContent">
                                                                <div class="tab-pane fade show active" id="first<?php echo $no; ?>" role="tabpanel" aria-labelledby="first-tab">
                                                                    <div class="row flex-row pt-4 px-md-4">
                                                                        <div class="col-12 col-sm-3 text-center d-lg-flex company-info"> <span class="align-middle"><img class="img-fluid" alt="" src="images/brands/flights/indigo.png"> </span> 
                                                                            <span class="align-middle ml-lg-2"> <span class="d-block text-1 text-dark"><?php echo $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][0]['FlightSegment']['MarketingAirlineCode']; ?></span> 
                                                                                <small class="text-muted d-block"><?php echo $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][0]['FlightSegment']['MarketingAirlineCode']; ?>-<?php echo $k1['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][0]['FlightSegment']['OperatingAirline']['Equipment']; ?></small> </span> </div>
                                                                        <div class="col-12 col-sm-3 text-center time-info mt-3 mt-sm-0"> <span class="text-5 text-dark"><?php echo date("H:i", $departure); ?></span> 
                                                                            <small class="text-muted d-block"><?php echo $departure_airport; ?></small> </div>
                                                                        <div class="col-12 col-sm-3 text-center time-info mt-3 mt-sm-0"> <span class="text-3 text-dark"><?php echo $journey_duration; ?></span> <small class="text-muted d-block">Duration</small> </div>
                                                                        <div class="col-12 col-sm-3 text-center time-info mt-3 mt-sm-0"> <span class="text-5 text-dark"><?php echo date("H:i", $arrival); ?></span> 
                                                                            <small class="text-muted d-block"><?php echo $arrival_airport; ?></small> </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="second<?php echo $no; ?>" role="tabpanel" aria-labelledby="second-tab">
                                                                    <div class="table-responsive-md">
                                                                        <table class="table table-hover table-bordered bg-light">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>Base Fare</td>
                                                                                    <td class="text-right"><?php echo $k1['FareItinerary']['AirItineraryFareInfo']['ItinTotalFares']['BaseFare']['Amount']; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Fees &amp; Surcharge</td>
                                                                                    <td class="text-right"><?php echo $k1['FareItinerary']['AirItineraryFareInfo']['ItinTotalFares']['TotalTax']['Amount']; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Total</td>
                                                                                    <td class="text-right"><?php echo $k1['FareItinerary']['AirItineraryFareInfo']['ItinTotalFares']['TotalFare']['Amount']; ?></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="third<?php echo $no; ?>" role="tabpanel" aria-labelledby="third-tab">
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
                                                                                    <td class="text-center"><?php echo $Baggage; ?> Kg</td>
                                                                                </tr>
            <!--                                                                                <tr>
                                                                                    <td>Child</td>
                                                                                    <td class="text-center">7 Kg</td>
                                                                                    <td class="text-center">15 Kg</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Infant</td>
                                                                                    <td class="text-center">0 Kg</td>
                                                                                    <td class="text-center">0 Kg</td>
                                                                                </tr>-->
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="fourth<?php echo $no; ?>" role="tabpanel" aria-labelledby="fourth-tab">
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
                                                                    <ul style="text-transform: capitalize"><?php echo $PENALTIES; ?>
                                                                        <!--                                                                        <li>The penalty is subject to 4 hrs before departure. No Changes are allowed after that.</li>
                                                                                                                                                <li>The charges are per passenger per sector.</li>
                                                                                                                                                <li>Partial cancellation is not allowed on tickets booked under special discounted fares.</li>
                                                                                                                                                <li>In case of no-show or ticket not cancelled within the stipulated time, only statutory taxes are refundable subject to Service Fee.</li>
                                                                                                                                                <li>No Baggage Allowance for Infants</li>
                                                                                                                                                <li>Airline penalty needs to be reconfirmed prior to any amendments or cancellation.</li>-->
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- Flight Details Modal Dialog end -->
                                    </div>
                                </div>
                                <?php
                                $no++;
                            }
                        }
                    }
//                        }
//                    }
                    ?>
                    <!-- Pagination
                    ============================================= -->
                    <!--                                <ul class="pagination justify-content-center mt-4 mb-0">
                                                        <li class="page-item disabled"> <a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a> </li>
                                                        <li class="page-item active"> <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a> </li>
                                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                        <li class="page-item"> <a class="page-link" href="#"><i class="fas fa-angle-right"></i></a> </li>
                                                    </ul> Pagination end -->

                </div>
            </div>
        </div>
    </section>
</div><!-- Content end -->
<script type="text/javascript">

    $(function () {
        var availableTags =<?php echo json_encode($search_name_array); ?>;
        $(".search_sugession_name").autocomplete({
            minLength: 3,
            source: availableTags
        });
    });

</script>
<script type="text/javascript">

    $(function () {
        var availableTags =<?php echo json_encode($search_name_array2); ?>;
        $(".search_sugession_name2").autocomplete({
            minLength: 3,
            source: availableTags
        });
    });

</script>