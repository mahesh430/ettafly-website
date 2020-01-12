<div id="content">
    <div class="hero-wrap py-2 py-md-3 py-lg-5">
        <div class="hero-mask opacity-3 bg-dark"></div>
        <div class="hero-bg" style="background-image:url('public/images/banner1.jpg');"></div>
        <div class="hero-content py-3 py-lg-5 my-3 my-md-5">
            <div class="container">
                <!-- Tabs --> 
                <!--          <ul class="nav nav-tabs style-2" id="myTab" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" id="flights-tab" data-toggle="tab" href="#flights" role="tab" aria-controls="flights" aria-selected="true">Flights</a> </li>
                          </ul>-->
                <div class="tab-content bg-light shadow-md rounded rounded-top-0 px-4 pt-4 pb-2" id="myTabContent"> 


                    <!-- Search Flight -->
                    <div class="tab-pane fade show active" id="flights" role="tabpanel" aria-labelledby="flights-tab">
                        <h2 class="text-4 mb-3">Book Domestic and International Flights</h2>
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
                                    <input type="text" class="form-control search_sugession_name" name="airport_from_code"  required placeholder="From">
                                    <span class="icon-inside"><i class="fas fa-map-marker-alt"></i></span> 
                                    <?php
                                    foreach ($airports as $airports_view) {
                                        $search_name_array[] = $airports_view->name . "-" . $airports_view->city;
                                    }
                                    ?></div>
                                <div class="col-md-6 col-lg-2 form-group">
                                    <input type="text" class="form-control search_sugession_name2" name="airport_to_code" id="flightTo1" required placeholder="To">
                                    <span class="icon-inside"><i class="fas fa-map-marker-alt"></i></span> 
                                    <?php
                                    foreach ($airports as $airports_view) {
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
                                                <input id="flightClassEconomic" name="class_type" value="Economy" class="flight-class custom-control-input" value="0" checked="" required type="radio">
                                                <label class="custom-control-label" for="flightClassEconomic">Economy</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input id="flightClassBusiness" name="class_type" value="Business" class="flight-class custom-control-input" value="2" required type="radio">
                                                <label class="custom-control-label" for="flightClassBusiness">Business</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input id="flightClassFirstClass" name="class_type" value="First" class="flight-class custom-control-input" value="3" required type="radio">
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

                </div><!-- Tabs End --> 
            </div>
        </div>
    </div>

    <!-- Welcome Text
    ============================================= -->
    <section class="section bg-light-3">
        <div class="container text-center">
            <h2 class="text-9 font-weight-400">Online Booking. Save Time and Money!</h2>
            <p class="lead text-dark">Book your tickets online through Ettafly and save on every transaction. Be sure for a memorable & secure journey with great services and exclusive discounts! </p>
            <a class="btn btn-secondary" data-toggle="modal" data-target="#login-signup" href="#" title="Sign Up">Login / Sign Up</a> </div>
    </section>
    <!-- Welcome Text end --> 

    <!-- Banner
    ============================================= -->
    <section class="bg-light shadow-md">
        <div class="row no-gutters banner ">
            <div class="col-sm-6 col-lg-3">
                <div class="item"> <a href="#">
                        <div class="caption">
                            <h2>10% OFF</h2>
                            <p>On Metro Booking</p>
                        </div>
                        <div class="banner-mask"></div>
                        <img class="img-fluid" src="public/images/slider/small-banner-13-600x320.jpg" alt="banner"> </a> </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="item"> <a href="#">
                        <div class="caption">
                            <h2>15% OFF</h2>
                            <p>On electricity Bill Payment</p>
                        </div>
                        <div class="banner-mask"></div>
                        <img class="img-fluid" src="public/images/slider/small-banner-14-600x320.jpg" alt="banner"> </a> </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="item"> <a href="#">
                        <div class="caption">
                            <h2>10% OFF</h2>
                            <p>On Metro Booking</p>
                        </div>
                        <div class="banner-mask"></div>
                        <img class="img-fluid" src="public/images/slider/small-banner-13-600x320.jpg" alt="banner"> </a> </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="item"> <a href="#">
                        <div class="caption">
                            <h2>10% OFF</h2>
                            <p>On DTH Recharge</p>
                        </div>
                        <div class="banner-mask"></div>
                        <img class="img-fluid" src="public/images/slider/small-banner-15-600x320.jpg" alt="banner"> </a> </div>
            </div>
        </div>
    </section>
    <!-- Banner end -->

    <!-- Popular Routes
    ============================================= -->
    <section class="section bg-light shadow-md rounded">
        <div class="container"> 
            <h2 class="text-9 font-weight-500 text-center">Start your travel planning here</h2>
            <p class="lead text-center mb-5">Search Hotels, Flights, Trains & Bus</p>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                </div>

            </div>
        </div>
    </section><!-- Popular Routes end --> 



    <!-- Mobile App
    ============================================= -->
    <section class="section shadow-md bg-light pb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center"> <img class="img-fluid" alt="" src="public/images/app-mobile-2.png"> </div>
                <div class="col-lg-6 text-center text-lg-left">
                    <h2 class="text-9 font-weight-500 my-4">Download Our Ettafly<br class="d-none d-lg-inline-block">
                        Mobile App Now</h2>
                    <p class="lead">Download our app for the fastest, most convenient way to Recharge & Bill Payment, Booking and more....</p>
                    <div class="pt-3"> <a class="mr-4" href=""><img alt="" src="public/images/app-store.png"></a><a href=""><img alt="" src="public/images/google-play-store.png"></a> </div>
                </div>
            </div>
        </div>
    </section><!-- Mobile App end -->

</div>
<!-- Content end --> 

<!--<script>
    $('#flightFrom1').on('change', function () {
        var flightFrom1 = $(this).val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>cmoon/ajax/get_flights",
            data: {
                flightFrom1: flightFrom1
            },
            success: function (response) {
                if (response !== '') {
                    $('#receiver_id').html(response);
                }
            },
            error: function () {
                alert('Error occured');
            }
        });
    });

</script>-->

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
