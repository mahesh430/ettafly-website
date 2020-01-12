  	<!-- Page Header
    ============================================= -->
    <section class="page-header page-header-text-light bg-secondary">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h1>My Profile</h1>
          </div>
          <div class="col-md-4">
            <ul class="breadcrumb justify-content-start justify-content-md-end mb-0">
              <li><a href="index">Home</a></li>
              <li class="active">My Profile</li>
            </ul>
          </div>
        </div>
      </div>
    </section><!-- Page Header end -->
    
  <!-- Content
  ============================================= -->
  <div id="content">
    <div class="container">
      <div class="bg-light shadow-md rounded p-4">
        <div class="row">
          <div class="col-md-3">
            <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
              <li class="nav-item"> <a class="nav-link active" id="first-tab" data-toggle="tab" href="#firstTab" role="tab" aria-controls="firstTab" aria-selected="true">Personal Information</a> </li>
              <li class="nav-item"> <a class="nav-link" id="second-tab" data-toggle="tab" href="#secondTab" role="tab" aria-controls="secondTab" aria-selected="false">Change Password</a> </li>
              <li class="nav-item"> <a class="nav-link" id="third-tab" data-toggle="tab" href="#thirdTab" role="tab" aria-controls="thirdTab" aria-selected="false">Favourites</a> </li>
              <li class="nav-item"> <a class="nav-link" id="fourth-tab" data-toggle="tab" href="#fourthTab" role="tab" aria-controls="fourthTab" aria-selected="false">Cards</a> </li>
              <li class="nav-item"> <a class="nav-link" href="logout">Logout</a> </li>
            </ul>
          </div>
          <div class="col-md-9">
            <div class="tab-content my-3" id="myTabContentVertical">
              <div class="tab-pane fade show active" id="firstTab" role="tabpanel" aria-labelledby="first-tab">
                <div class="row">
                  <div class="col-lg-8">
                    <h4 class="mb-4">Personal Information</h4>
                    <form id="personalInformation" method="post">
                      <div class="mb-3">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input id="male" name="gender" value="Male" class="custom-control-input" <?php if($users->gender == 'Male'){ ?> checked="" <?php } ?> required type="radio">
                          <label class="custom-control-label" for="male">Male</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input id="female" name="gender" value="Female" class="custom-control-input" <?php if($users->gender == 'Female'){ ?> checked="" <?php } ?> required type="radio">
                          <label class="custom-control-label" for="female">Female</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" name="name" value="<?php echo $users->name; ?>" class="form-control" data-bv-field="fullName" id="fullName" required placeholder="Full Name">
                      </div>
                      <div class="form-group">
                        <label for="mobileNumber">Mobile Number</label>
                        <input type="text" value="<?php echo $users->mobile; ?>" class="form-control" data-bv-field="mobilenumber" id="mobileNumber" required placeholder="Mobile Number">
                      </div>
                      <div class="form-group">
                        <label for="emailID">Email ID</label>
                        <input type="text" value="<?php echo $users->email; ?>" class="form-control" data-bv-field="emailid" id="emailID" required placeholder="Email ID">
                      </div>
                      <div class="form-group">
                        <label for="birthDate">Date of Birth</label>
                        <input id="birthDate" value="06-09-2002" type="text" class="form-control" required placeholder="Date of Birth">
                      </div>
                      <div class="form-group">
                        <label for="inputCountry">Country</label>
                        <select class="custom-select" id="inputCountry" name="country">
                          <option value=""> --- Please Select --- </option>
                          
                          
                      </div>
                      <button class="btn btn-primary" type="submit">Update Now</button>
                    </form>
                  </div>
                  <div class="col-lg-4 mt-4 mt-lg-0 ">
                    <div class="card bg-light-3 p-3">
                      <p class="mb-2">We value your Privacy.</p>
                      <p class="text-1 mb-0">We will not sell or distribute your contact information. Read our <a href="#">Privacy Policy</a>.</p>
                      <hr>
                      <p class="mb-2">Billing Enquiries</p>
                      <p class="text-1 mb-0">Do not hesitate to reach our <a href="#">support team</a> if you have any queries.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="secondTab" role="tabpanel" aria-labelledby="second-tab">
                <div class="row">
                  <div class="col-lg-8">
                    <h4 class="mb-4">Change Password</h4>
                    <form id="changePassword" method="post">
                      <div class="form-group">
                        <input type="text" class="form-control" data-bv-field="existingpassword" id="existingPassword" required placeholder="Existing Password">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" data-bv-field="newpassword" id="newPassword" required placeholder="New Password">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" data-bv-field="confirmgpassword" id="confirmPassword" required placeholder="Confirm Password">
                      </div>
                      <button class="btn btn-primary" type="submit">Update Password</button>
                    </form>
                  </div>
                  <div class="col-lg-4 mt-4 mt-lg-0 ">
                    <div class="card bg-light-3 p-3">
                      <p class="mb-2">We value your Privacy.</p>
                      <p class="text-1 mb-0">We will not sell or distribute your contact information. Read our <a href="#">Privacy Policy</a>.</p>
                      <hr>
                      <p class="mb-2">Billing Enquiries</p>
                      <p class="text-1 mb-0">Do not hesitate to reach our <a href="#">support team</a> if you have any queries.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="thirdTab" role="tabpanel" aria-labelledby="third-tab">
                <h4 class="mb-4">Your Saved Connections</h4>
                <div class="table-responsive-lg">
                  <table class="table table-hover border">
                    <tbody>
                      <tr>
                        <td class="text-center align-middle"><img class="border p-1 rounded bg-light" src="images/brands/operator/vodafone.jpg" alt=""></td>
                        <td class="text-center align-middle">9898989898</td>
                        <td class="text-center align-middle">Vodafone</td>
                        <td class="align-middle">
                        <div class="d-flex justify-content-end">
                        <button class="btn btn-sm btn-outline-primary shadow-none text-nowrap" type="submit">Recharge Now</button>
                          <button class="btn btn-sm btn-outline-secondary shadow-none ml-1" type="submit" data-toggle="tooltip" data-original-title="Edit"><i class="fas fa-edit"></i></button></div></td>
                      </tr>
                      <tr>
                        <td class="text-center align-middle"><img class="border p-1 rounded bg-light" alt="" src="images/brands/operator/vodafone.jpg"></td>
                        <td class="text-center align-middle">9696969696</td>
                        <td class="text-center align-middle">Vodafone</td>
                        <td class="align-middle">
                        <div class="d-flex justify-content-end">
                        <button class="btn btn-sm btn-outline-primary shadow-none text-nowrap" type="submit">Recharge Now</button>
                          <button class="btn btn-sm btn-outline-secondary shadow-none ml-1" type="submit" data-toggle="tooltip" data-original-title="Edit"><i class="fas fa-edit"></i></button></div></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="fourthTab" role="tabpanel" aria-labelledby="fourth-tab">
                <div class="row">
                  <div class="col-lg-5">
                    <h4 class="mb-4">Your Saved Cards</h4>
                    <div id="savedCard" class="bg-light-4 rounded p-3 mb-4 mb-lg-0">
                      <h4 class="mb-3">XXXX-XXXX-XXXX-7248</h4>
                      <p>Expiry Date<br>
                        <small>07/2029</small></p>
                      <p class="d-flex m-0"> 
                      <a class="mr-2" href="#"><i class="fas fa-edit"></i> Edit</a> 
                      <a href="#"><i class="fas fa-minus-circle"></i> Remove</a>
                      <img class="ml-auto" src="images/payment/visa.png" alt="visa" title="">
                      </p>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <h4>Add New Credit/Debit Card</h4>
                    <p>For experience a faster checkout experience</p>
                    <form id="payment" method="post">
                      <div class="form-group">
                        <input type="text" class="form-control" data-bv-field="cardnumber" id="cardNumber" required placeholder="Card Number">
                      </div>
                      <div class="form-row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <select class="custom-select" required="">
                              <option value="">Expiry Month</option>
                              <option>January</option>
                              <option>February</option>
                              <option>March</option>
                              <option>April</option>
                              <option>May</option>
                              <option>June</option>
                              <option>July</option>
                              <option>August</option>
                              <option>September</option>
                              <option>October</option>
                              <option>November</option>
                              <option>December</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <select class="custom-select" required="">
                              <option value="">Expiry Year</option>
                              <option>2018</option>
                              <option>2019</option>
                              <option>2020</option>
                              <option>2021</option>
                              <option>2022</option>
                              <option>2023</option>
                              <option>2024</option>
                              <option>2025</option>
                              <option>2026</option>
                              <option>2027</option>
                              <option>2028</option>
                              <option>2029</option>
                              <option>2030</option>
                              <option>2031</option>
                              <option>2032</option>
                              <option>2033</option>
                              <option>2034</option>
                              <option>2035</option>
                              <option>2036</option>
                              <option>2037</option>
                              <option>2038</option>
                              <option>2039</option>
                              <option>2040</option>
                              <option>2041</option>
                              <option>2042</option>
                              <option>2043</option>
                              <option>2044</option>
                              <option>2045</option>
                              <option>2046</option>
                              <option>2047</option>
                              <option>2048</option>
                              <option>2049</option>
                              <option>2050</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <input type="text" class="form-control" data-bv-field="cvvnumber" id="cvvNumber" required placeholder="CVV Number">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" data-bv-field="cardholdername" id="cardHolderName" required placeholder="Card Holder Name">
                      </div>
                      <button class="btn btn-primary" type="submit">Add Card</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- Content end -->
