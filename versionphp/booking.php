<!DOCTYPE html>
<html>
<head>
	<title>Book now</title>
	<?php include('links.php'); ?>
</head>
<body>
<?php include('navigation.php'); ?>
    <div class="container">
	
            <!-- Banner | START -->

            <div class="section section-full banner">
                <div class="back" data-background="Hotel/1240x450-6.jpg"></div>
                <div class="center">
                    <h1>Book Accommodation</h1>
                    <h5>Stay at Jasper Hotel</h5>
                </div>
            </div>

            <!-- Banner | END -->

            <!-- Content | START -->

            <div class="copy">
                <div class="center center-main">

                    <!-- Sidebar | START -->

                    <aside class="order-first">
                        <div id="sidebar">

                            <img src="Hotel/500x300-2.jpg" alt="">

                            <!-- Sidebar Content | START -->

                            <div class="sidebar-section sidebar-text">
                                <h3>Jasper Hotel Bookings</h3>
                                <p>Please submit the online reservation form, and we will get back to you as soon as possible to confirm your booking with us.<br><br>
                                <strong>Phone:</strong> +61 3 1234 5678<br>
                                <strong>Email:</strong> <a href="mailto:contact@jasper.com.au">contact@jasper.com.au</a></p>
                            </div>

                            <!-- Sidebar Content | END -->

                        </div>
                    </aside>

                    <!-- Sidebar | END -->

                    <div class="copy-main">

                        <!-- Form | START -->

                        
                        <div class="section form">
                            <form name="book" action="/jasper-hotel/book.php" method="post">
                                <div class="row">
                                    <label>Your Dates <span class="required">*</span></label>
                                    <div class="fields">
                                        
                                            <input class="col-2" type="date" name="contact-arrival" placeholder="Check-in" required>
                                        
                                        
                                            <input class="col-2" type="date" name="contact-departure" placeholder="Check-out" required>
                                       
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Your Guests <span class="required">*</span></label>
                                    <div class="fields">
                                        <select class="col-2" name="contact-adults" required>
                                            <option value="">Adults</option>
                                            <option value="1">1 Adult</option>
                                            <option value="2">2 Adults</option>
                                            <option value="3">3 Adults</option>
                                            <option value="4">4 Adults</option>
                                            <option value="5">5 Adults</option>
                                            <option value="6">6 Adults</option>
                                            <option value="7">7 Adults</option>
                                            <option value="8">8 Adults</option>
                                            <option value="9">9 Adults</option>
                                            <option value="10">10 Adults</option>
                                        </select>
                                        <select class="col-2" name="contact-children">
                                            <option value="">Children</option>
                                            <option value="0">0 Children</option>
                                            <option value="1">1 Child</option>
                                            <option value="2">2 Children</option>
                                            <option value="3">3 Children</option>
                                            <option value="4">4 Children</option>
                                            <option value="5">5 Children</option>
                                            <option value="6">6 Children</option>
                                            <option value="7">7 Children</option>
                                            <option value="8">8 Children</option>
                                            <option value="9">9 Children</option>
                                            <option value="10">10 Children</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Room Type</label>
                                    <div class="fields">
                                        <select name="contact-room">
                                            <option value="">Room Type</option>
                                            <option value="Standard Room">Standard Room</option>
                                            <option value="Deluxe Room">Deluxe Room</option>
                                            <option value="Penthouse Suite">Penthouse Suite</option>
                                        </select>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <label>Your Name <span class="required">*</span></label>
                                    <div class="fields">
                                        <input class="col-2" type="text" name="contact-firstname" placeholder="First Name" required>
                                        <input class="col-2" type="text" name="contact-lastname" placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Email Address <span class="required">*</span></label>
                                    <div class="fields">
                                        <input type="text" name="contact-email" placeholder="Email Address" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Phone Number <span class="required">*</span></label>
                                    <div class="fields">
                                        <input type="text" name="contact-phone" placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Special Requests</label>
                                    <div class="fields">
                                        <textarea name="contact-requests" rows="5" placeholder="Special Requests"></textarea>
                                        <p class="small"><strong>Please write your requests here.</strong> Special requests cannot be guaranteed, however we will do our best to meet your needs. You can always make a special request after your booking is complete.</p>
                                    </div>
                                </div>

                                <hr>
                                <h3>Enhance your stay with our booking extras</h3>

                                <div class="extras">
                                    <div class="row">
                                        <div class="col name"><i class="icon ion-ios-information-outline"></i> Baby Highchair</div>
                                        <div class="col price">$40.00 <span>Per Stay</span></div>
                                        <div class="col quantity">
                                            <select name="extra-1">
                                                <option value="0" selected="selected">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        <div class="details"><span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit phasellus hendrerit.</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col name"><i class="icon ion-ios-information-outline"></i> Theme Park Tickets</div>
                                        <div class="col price">$89.00 <span>Per Person</span></div>
                                        <div class="col quantity">
                                            <select name="extra-2">
                                                <option value="0" selected="selected">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        <div class="details"><span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit phasellus hendrerit.</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col name"><i class="icon ion-ios-information-outline"></i> Spa Relaxation</div>
                                        <div class="col price">$120.00 <span>Per Person</span></div>
                                        <div class="col quantity">
                                            <select name="extra-3">
                                                <option value="0" selected="selected">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        <div class="details"><span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit phasellus hendrerit.</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col name"><i class="icon ion-ios-information-outline"></i> Ocean Upgrade</div>
                                        <div class="col price">$20.00 <span>Per Night</span></div>
                                        <div class="col quantity">
                                            <select name="extra-4">
                                                <option value="0" selected="selected">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        <div class="details"><span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit phasellus hendrerit.</span></div>
                                    </div>
                                </div>

                                <div class="form-button">
                                    <!-- Honeypot (for bot spam) --><input name="contact-email2" type="text" placeholder="Email Address" autocomplete="false" class="honeypot" value="" />
                                    <button name="send-book" class="button" type="submit">Book Your Room <i class="icon ion-ios-arrow-forward"></i></button>
                                </div>
                            </form>
                        </div>

                        <!-- Form | END -->

                    </div>

                </div>
            </div>


<?php include('footer.php'); ?>
</body>
</html>