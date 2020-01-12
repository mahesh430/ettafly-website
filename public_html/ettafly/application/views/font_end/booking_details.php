<!DOCTYPE html>

  
  	<!-- Page Header
    ============================================= -->
    <section class="page-header page-header-text-light bg-secondary">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h1>Booking Details</h1>
          </div>
          <div class="col-md-4">
            <ul class="breadcrumb justify-content-start justify-content-md-end mb-0">
              <li><a href="index">Home</a></li>
              <li class="active">Booking Details</li>
            </ul>
          </div>
        </div>
      </div>
    </section><!-- Page Header end -->
    
  <!-- Content
  ============================================= -->
  <div id="content">
    <div class="container">
            <div class="col-md-12">
                <div class="bg-light shadow-md rounded p-4" style="text-align: center;">
                    <div class="row">
                        <div class="white-box">
                            <h3><b>INVOICE</b> </h3>
                            <hr>
                            <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                        $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ItineraryPricing']['EquiFare']['Amount'];
                                        
                                $departure_code = $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][0]['ReservationItem']['DepartureAirportLocationCode'];
                                $departure = strtotime($booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][0]['ReservationItem']['DepartureDateTime']);
                                $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][0]['ReservationItem']['JourneyDuration'];

                                if ($booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][8] != '') {
                                    $arrival_code = $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][8]['ReservationItem']['ArrivalAirportLocationCode'];
                                    $arrival = strtotime($booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][8]['ReservationItem']['ArrivalDateTime']);
                                    $journey_durat8 = $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][8]['ReservationItem']['JourneyDuration'];
                                    $stops = "Eight Stops";
                                } else if ($booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][7] != '') {
                                    $arrival_code = $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][7]['ReservationItem']['ArrivalAirportLocationCode'];
                                    $arrival = strtotime($booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][7]['ReservationItem']['ArrivalDateTime']);
                                    $journey_durat7 = $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][7]['ReservationItem']['JourneyDuration'];
                                    $stops = "Seven Stops";
                                } else if ($booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][6] != '') {
                                    $arrival_code = $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][6]['ReservationItem']['ArrivalAirportLocationCode'];
                                    $arrival = strtotime($booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][6]['ReservationItem']['ArrivalDateTime']);
                                    $journey_durat6 = $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][6]['ReservationItem']['JourneyDuration'];
                                    $stops = "Six Stops";
                                } else if ($booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][5] != '') {
                                    $arrival_code = $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][5]['ReservationItem']['ArrivalAirportLocationCode'];
                                    $arrival = strtotime($booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][5]['ReservationItem']['ArrivalDateTime']);
                                    $journey_durat5 = $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][5]['ReservationItem']['JourneyDuration'];
                                    $stops = "Five Stops";
                                } else if ($booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][4] != '') {
                                    $arrival_code = $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][4]['ReservationItem']['ArrivalAirportLocationCode'];
                                    $arrival = strtotime($booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][4]['ReservationItem']['ArrivalDateTime']);
                                    $journey_durat4 = $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][4]['ReservationItem']['JourneyDuration'];
                                    $stops = "Four Stops";
                                } else if ($booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][3] != '') {
                                    $arrival_code = $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][3]['ReservationItem']['ArrivalAirportLocationCode'];
                                    $arrival = strtotime($booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][3]['ReservationItem']['ArrivalDateTime']);
                                    $journey_durat3 = $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][3]['ReservationItem']['JourneyDuration'];
                                    $stops = "Three Stops";
                                } else if ($booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][2] != '') {
                                    $arrival_code = $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][2]['ReservationItem']['ArrivalAirportLocationCode'];
                                    $arrival = strtotime($booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][2]['ReservationItem']['ArrivalDateTime']);
                                    $journey_durat2 = $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][2]['ReservationItem']['JourneyDuration'];
                                    $stops = "Two Stops";
                                } else if ($booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][1] != '') {
                                    $arrival_code = $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][1]['ReservationItem']['ArrivalAirportLocationCode'];
                                    $arrival = strtotime($booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][1]['ReservationItem']['ArrivalDateTime']);
                                    $journey_durat1 = $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][1]['ReservationItem']['JourneyDuration'];
                                    $stops = "One Stop";
                                } else {
                                    $arrival_code = $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][0]['ReservationItem']['ArrivalAirportLocationCode'];
                                    $arrival = strtotime($booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][0]['ReservationItem']['ArrivalDateTime']);
                                    $journey_durat = $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][0]['ReservationItem']['JourneyDuration'];
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
                                $airline_cod = $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][0]['ReservationItem']['MarketingAirlineCode'];
                                 $airline_code = $airline_cod.".png";
                                foreach ($airlines_details as $airlines_details_view) {
                                    if ($airline_code == $airlines_details_view->thumbnail) {
                                        $airline_name = $airlines_details_view->name;
                                        $airline_image = $airlines_details_view->image;
                                    }
                                }
                                        ?>
                                        <p>Flight Booking from <?php echo $departure_airport ; $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ReservationItems'][0]['ReservationItem']['MarketingAirlineCode']; ?> to <?php echo $arrival_airport ;  ?> </p>
                                        <p>Airline:<?php echo $airline_name; ?> Flight:</p>
                                        </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive m-t-40">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-right">Name</th>
                                                        <th class="text-right">Dob</th>
                                                        <th class="text-right">Email</th>
                                                        <th class="text-right">Number</th>
                                                        <th class="text-right">E-Ticket</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no=1;
                                                    foreach($booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['CustomerInfos'] as $booking_details_mem){ ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $no; ?></td>
                                                        <td class="text-center"><?php echo $booking_details_mem['CustomerInfo']['PassengerTitle']; echo " "; echo $booking_details_mem['CustomerInfo']['PassengerFirstName']; echo " "; echo $booking_details_mem['CustomerInfo']['PassengerLastName']; ?></td>
                                                        <td class="text-center"><?php echo $booking_details_mem['CustomerInfo']['DateOfBirth']; ?></td>
                                                        <td class="text-center"><?php echo $booking_details_mem['CustomerInfo']['EmailAddress']; ?></td>
                                                        <td class="text-center"><?php echo $booking_details_mem['CustomerInfo']['PhoneNumber']; ?></td>
                                                        <td class="text-center"><?php echo $booking_details_mem['CustomerInfo']['eTicketNumber']; ?></td>
                                                    </tr>
                                                <?php $no++; } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="pull-right m-t-30 text-right">
                                            <p>Sub - Total amount: Rs:<?php echo $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ItineraryPricing']['EquiFare']['Amount']; ?></p>
                                            <p>Tax : Rs:<?php echo $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ItineraryPricing']['EquiFare']['Amount'] - $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ItineraryPricing']['TotalFare']['Amount']; ?> </p>
                                            <hr>
                                            <h3><b>Total :</b> Rs:<?php echo $booking_details['TripDetailsResponse']['TripDetailsResult']['TravelItinerary']['ItineraryInfo']['ItineraryPricing']['TotalFare']['Amount']; ?></h3> </div>
                                        <div class="clearfix"></div>
                                        <hr>
                                        <div class="text-right">
                                            <!--<a class="btn btn-info" value="Pay now" type="button"> Proceed to payment </a>-->
                                            <button onClick="javascript:window.print();" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

            </div>
    </div>

</div>

