<?php include 'includes/header.php'; ?>

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
              <li><a href="index.php">Home</a></li>
              <li><a href="booking-flights.php">Flights</a></li>
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
        <div class="row">
          <div class="col-lg-8">
            <div class="bg-light shadow-md rounded p-3 p-sm-4 confirm-details">
              <h2 class="text-6 mb-3">Confirm Flight Details</h2>
              <!-- Departure Flight Detail
              ============================================= -->
              <div class="card">
                <div class="card-header">
                  <div class="row align-items-center trip-title">
                    <div class="col-5 col-sm-auto text-center text-sm-left">
                      <h5 class="m-0 trip-place">New Delhi</h5>
                    </div>
                    <div class="col-2 col-sm-auto text-8 text-black-50 text-center trip-arrow">➝</div>
                    <div class="col-5 col-sm-auto text-center text-sm-left">
                      <h5 class="m-0 trip-place">Sydney</h5>
                    </div>
                    <div class="col-12 mt-1 d-block d-md-none"></div>
                    <div class="col-6 col-sm col-md-auto text-3 date">15 Jun 18, Sat</div>
                    <div class="col-6 col-sm col-md-auto text-right order-sm-1"><a class="text-1" data-toggle="modal" data-target="#fare-rules" href="">Fare Rules</a></div>
                    <div class="col col-md-auto text-center ml-auto order-sm-0"><span class="badge badge-danger py-1 px-2 font-weight-normal text-1">Non Refundable</span></div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 col-sm-3 text-center text-md-left d-lg-flex company-info"> <span class="align-middle"><img class="img-fluid" alt="" src="images/brands/flights/indigo.png"> </span> <span class="align-middle ml-lg-2"> <span class="d-block text-2 text-dark mt-1 mt-lg-0">IndiGo</span> <small class="text-muted d-block">6E-2726</small> </span> </div>
                    <div class="col-12 col-sm-3 text-center time-info mt-3 mt-sm-0"> <span class="text-5 text-dark">01:50</span> <small class="text-muted d-block">Indira Gandhi Intl, New Delhi</small> </div>
                    <div class="col-12 col-sm-3 text-center time-info mt-3 mt-sm-0"> <span class="text-3 text-dark">26h 18m</span> <small class="text-muted d-block">Duration</small> </div>
                    <div class="col-12 col-sm-3 text-center time-info mt-3 mt-sm-0"> <span class="text-5 text-dark">19:38</span> <small class="text-muted d-block">Kingsford Smith Airport, Sydney</small> </div>
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
              
              <!-- Return Flight Detail
              ============================================= -->
              <div class="card mt-4">
                <div class="card-header">
                  <div class="row align-items-center trip-title">
                    <div class="col-5 col-sm-auto text-center text-sm-left">
                      <h5 class="m-0 trip-place">Sydney</h5>
                    </div>
                    <div class="col-2 col-sm-auto text-8 text-black-50 text-center trip-arrow">➝</div>
                    <div class="col-5 col-sm-auto text-center text-sm-left">
                      <h5 class="m-0 trip-place">New Delhi</h5>
                    </div>
                    <div class="col-12 mt-1 d-block d-md-none"></div>
                    <div class="col-6 col-sm col-md-auto text-3 date">24 Jun 18, Sun</div>
                    <div class="col-6 col-sm col-md-auto text-right order-sm-1"><a class="text-1" data-toggle="modal" data-target="#fare-rules-2"  href="">Fare Rules</a></div>
                    <div class="col col-md-auto text-center ml-auto order-sm-0"><span class="badge badge-success py-1 px-2 font-weight-normal text-1">Refundable</span></div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 col-sm-3 text-center text-md-left d-lg-flex company-info"> <span class="align-middle"><img class="img-fluid" alt="" src="images/brands/flights/indigo.png"> </span> <span class="align-middle ml-lg-2"> <span class="d-block text-2 text-dark mt-1 mt-lg-0">IndiGo</span> <small class="text-muted d-block">6E-2726</small> </span> </div>
                    <div class="col-12 col-sm-3 text-center time-info mt-3 mt-sm-0"> <span class="text-5 text-dark">12:00</span> <small class="text-muted d-block">Kingsford Smith Airport, Sydney</small> </div>
                    <div class="col-12 col-sm-3 text-center time-info mt-3 mt-sm-0"> <span class="text-3 text-dark">26h 55m</span> <small class="text-muted d-block">Duration</small> </div>
                    <div class="col-12 col-sm-3 text-center time-info mt-3 mt-sm-0"> <span class="text-5 text-dark">23:50</span> <small class="text-muted d-block">Indira Gandhi Intl, New Delhi</small> </div>
                  </div>
                  <!-- Fare Rules (Modal Dialog)
                  ============================================= -->
                  <div id="fare-rules-2" class="modal fade" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Fare Rules</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                        </div>
                        <div class="modal-body">
                          <ul class="nav nav-tabs" id="returnTab" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab" aria-controls="first" aria-selected="false">Baggage Details</a> </li>
                            <li class="nav-item"> <a class="nav-link" id="second-tab" data-toggle="tab" href="#second" role="tab" aria-controls="second" aria-selected="false">Cancellation Fee</a> </li>
                          </ul>
                          <div class="tab-content my-3" id="returnContent">
                            <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">
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
                            <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
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
              
              <div class="alert alert-info mt-4"> <span class="badge badge-info">NOTE:</span> This is a special fare given by the airline. Airlines cancellation charges do apply. </div>
              <h2 class="text-6 mb-3 mt-5">Traveller Details - <span class="text-3"><a data-toggle="modal" data-target="#login-signup" href="#" title="Login / Sign up">Login</a> to book faster</span></h2>
              <p class="font-weight-600">Contact Details</p>
              <div class="form-row">
                <div class="col-sm-6 form-group">
                  <input class="form-control" id="email" required placeholder="Enter Email" type="text">
                </div>
                <div class="col-sm-6 form-group">
                  <input class="form-control" data-bv-field="number" id="mobileNumber" required placeholder="Enter Mobile Number" type="text">
                </div>
              </div>
              <p class="text-info">Your booking details will be sent to this email address and mobile number.</p>
              <p class="font-weight-600">Adult 1</p>
              <div class="form-row">
                <div class="col-sm-2 form-group">
                  <select class="custom-select" id="title" required="">
                    <option value="">Title</option>
                    <option>Mr</option>
                    <option>Ms</option>
                    <option>Mrs</option>
                  </select>
                </div>
                <div class="col-sm-5 form-group">
                  <input class="form-control" id="firstName" required placeholder="Enter First Name" type="text">
                </div>
                <div class="col-sm-5 form-group">
                  <input class="form-control" data-bv-field="number" id="lastName" required placeholder="Enter Last Name" type="text">
                </div>
              </div>
            </div>
          </div>
          
          <!-- Side Panel (Fare Details)
          ============================================= -->
          <aside class="col-lg-4 mt-4 mt-lg-0">
            <div class="bg-light shadow-md rounded p-3">
              <h3 class="text-5 mb-3">Fare Details</h3>
              <ul class="list-unstyled">
                <li class="mb-2">Base Fare <span class="float-right text-4 font-weight-500 text-dark">$980</span><br>
                  <small class="text-muted">Adult : 1, Child : 0, Infant : 0</small></li>
                <li class="mb-2">Taxes & Fees <span class="float-right text-4 font-weight-500 text-dark">$215</span></li>
                <li class="mb-2">Insurance <span class="float-right text-4 font-weight-500 text-dark">$95</span></li>
              </ul>
              <div class="text-dark bg-light-4 text-4 font-weight-600 p-3"> Total Amount <span class="float-right text-6">$1290</span> </div>
              <h3 class="text-4 mb-3 mt-4">Promo Code</h3>
              <div class="input-group form-group">
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
              </ul>
              <button class="btn btn-primary btn-block" onclick="location.href='payment.php';" type="submit">Proceed To Payment</button>
            </div>
          </aside><!-- Side Panel End -->
          
        </div>
    </section>
  </div><!-- Content end -->
    <?php include 'includes/footer.php'; ?>