<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<?php include('links.php');?>
</head>
<body>
<?php include('navigation.php'); ?>
<div class="container">
	 <!-- Banner | START -->

            <div class="section section-full banner has-bar">
                <div class="back" data-background="Hotel/2000x850-3.jpg"></div>
                <div class="center">
                    <h1>Contact Jasper Hotel</h1>
                </div></div>
    <!-- Banner | END -->
       <!-- Content | START -->

            <div class="copy">
                <div class="center center-main">

                    <!-- Sidebar | START -->

                    <aside class="order-first">
                        <div id="sidebar">

                            <img src="Hotel/500x300-9.jpg" alt="">

                            <!-- Sidebar Content | START -->

                            <div class="sidebar-section sidebar-text">
                                <h3>Get in touch with us</h3>
                                <p>Jasper Hotel - 120 Passover Street,<br>
                                Perth, WA Australia 6107<br><br>
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
                            <form name="contact" method="post">
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
                                    <label>Enquiry Subject</label>
                                    <div class="fields">
                                        <input type="text" name="contact-subject" placeholder="Enquiry Subject">
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Your Message</label>
                                    <div class="fields">
                                        <textarea rows="5" name="contact-message" placeholder="Your Message"></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-button">
                                    <!-- Honeypot (for bot spam) --><input name="contact-email2" type="text" placeholder="Email Address" autocomplete="false" class="honeypot" value="" />
                                    <button name="send-contact" class="button" type="submit">Send Enquiry <i class="icon ion-ios-arrow-forward"></i></button>
                                </div>
                            </form>
                        </div>

                        <!-- Form | END -->

                    </div>

                </div>
            </div>

            <!-- Content | END -->

            <!-- Map | START -->

            <script>
            'use strict';

            function map_initialize() {

                var styles = [{
                    featureType: "all",
                    stylers: [{
                        lightness: 20
                    }]
                }];

                /* ---------- Single Marker | START ---------- */

                var latlng = new google.maps.LatLng(-31.962185, 115.882641);
                var myOptions = {
                    zoom: 15,
                    center: latlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    scrollwheel: false,
                    clickableIcons: false,
                    mapTypeControl: false,
                    styles: styles
                };
                var map = new google.maps.Map(document.getElementById('map'), myOptions);
                var marker = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    icon: "system/images/point.png"
                });
                var center;

                function calculateCenter() {
                    center = map.getCenter();
                }
                google.maps.event.addDomListener(map, 'idle', function() {
                    calculateCenter();
                });
                google.maps.event.addDomListener(window, 'resize', function() {
                    map.setCenter(center);
                });

                /* ---------- Single Marker | END ---------- */

            }

            function map_loadscript() {
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBrvuO5KC1V57c2v25WcgOD0_peX0MyJsc&callback=map_initialize';
                document.body.appendChild(script);
            }

            window.onload = map_loadscript;
            </script>

            <script src="https://maps.googleapis.com/maps/api/js?key=&callback=myMap"></script>

            <!-- Map | END -->

            <!-- Subscribe | START -->

            <div class="section section-full subscribe">
                <div class="back" data-background="Hotel/2000x850-5.jpg"></div>
                <div class="subscribe-form">
                    <form name="subscribe">
                        <div class="title">Subscribe</div>
                        <div class="sub-title">For Our Specials</div>
                        <div class="fields">
                            <input type="text" name="subscribe-name" placeholder="Your Name" required>
                            <input type="email" name="subscribe-email" placeholder="Email Address" required>
                        </div>
                        <button type="submit"><span>Sign Up <i class="icon fa fa-envelope"></i></span></button>
                    </form>
                </div>
            </div>

            <!-- Subscribe | END -->
<?php include('footer.php'); ?>
</body>
</html>