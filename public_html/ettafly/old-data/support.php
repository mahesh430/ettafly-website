<?php include 'includes/header.php'; ?>

  	<!-- Page Header
    ============================================= -->
    <section class="page-header page-header-text-light bg-secondary">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h1>Support</h1>
          </div>
          <div class="col-md-4">
            <ul class="breadcrumb justify-content-start justify-content-md-end mb-0">
              <li><a href="index.php">Home</a></li>
              <li class="active">Support</li>
            </ul>
          </div>
        </div>
      </div>
    </section><!-- Page Header end -->
    
  <!-- Content
  ============================================= -->
  <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="bg-light shadow-md rounded p-4">
            <h2 class="text-6">Send a Request</h2>
            <p>Please fill out the form below and we promise you to get back to you within a couple of hours.</p>
            <form id="recharge-bill" method="post">
              <div class="form-group">
			  <label for="subject">Subject</label>
                <select class="custom-select" id="subject" required="">
                  <option value="">Select Your Subject</option>
                  <option>Recharge & Bill</option>
                  <option>Booking</option>
                  <option>Account</option>
                  <option>Payment</option>
                  <option>Other</option>
                </select>
              </div>
              <div class="form-group">
			  <label for="yourName">Your Name</label>
                <input type="text" class="form-control" id="yourName" required placeholder="Enter Your Name">
              </div>
              <div class="form-group">
			  <label for="yourEmail">Your Email</label>
                <input type="email" class="form-control" id="yourEmail" required placeholder="Enter Email Id">
              </div>
              <div class="form-group">
			  <label for="mobileNumber">Mobile Number</label>
                <input type="text" class="form-control" data-bv-field="number" id="mobileNumber" required placeholder="Enter Mobile Number">
              </div>
              <div class="form-group">
			  <label for="yourProblem">Your Query</label>
                <textarea class="form-control" rows="5" id="yourProblem" required placeholder="Specify your query"></textarea>
              </div>
              <button class="btn btn-primary" type="submit">Submit</button>
            </form>
          </div>
        </div>
        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="bg-light shadow-md rounded p-4">
            <h2 class="text-6">FAQ</h2>
            <div class="accordion accordion-alternate" id="accordion">
              <div class="card">
                <div class="card-header" id="heading1">
                  <h5 class="mb-0"> <a href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">How can I make a account?</a> </h5>
                </div>
                <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordion">
                  <div class="card-body"> Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Mutat tacimates id sit. Ridens mediocritatem ius an, eu nec magna imperdiet. </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="heading2">
                  <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">Is there any registration fee?</a> </h5>
                </div>
                <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion">
                  <div class="card-body"> Iisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Mutat tacimates id sit. Ridens mediocritatem ius an, eu nec magna imperdiet. </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="heading3">
                  <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Is my account information safe?</a> </h5>
                </div>
                <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
                  <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="heading4">
                  <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">How does it work?</a> </h5>
                </div>
                <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
                  <div class="card-body"> Iisque Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="heading5">
                  <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">I did not receive the cashback</a> </h5>
                </div>
                <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion">
                  <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="heading6">
                  <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">Forgot my password! What next?</a> </h5>
                </div>
                <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordion">
                  <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="heading7">
                  <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">Closing Your Account</a> </h5>
                </div>
                <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordion">
                  <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                </div>
              </div>
            </div>
            <a href="faq.php" class="btn btn-link btn-block btn-sm"><u>Click Here for more FAQ</u></a> </div>
        </div>
      </div>
    </div>
  </div><!-- Content end -->
  <?php include 'includes/footer.php'; ?>