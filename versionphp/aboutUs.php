<!DOCTYPE html>
<html>
<head>
    <title>About us</title>
    <?php include('links.php'); ?>
</head>
<body>
<?php include('navigation.php'); ?>
<div class="container">

            <!-- Banner | START -->

            <div class="section section-full banner has-bar">
                <div class="back" data-background="Hotel/1240x450-2.jpg"></div>
                <div class="center">
                    <h1>About Our Hotel</h1>
                </div></div>
       <!-- Banner | END -->          
     <!-- Slideshow | START -->

            <div class="section slideshow slideshow-side">
                <div class="center">
                    <div class="map">
                        <div id="map-side"></div>
                        <div class="address">
                            <h3>Jasper Hotel</h3>
                            <p>120 Passover Street,<br />
                            Perth, WA Australia 6107</p>
                            <a class="button button-shortcode small " href="location.html">See Location</a>
                        </div>
                    </div>
                    <div class="images">
                        <div class="slider">
                            <div class="item"><img src="Hotel/1240x450-1.jpg" alt="" width="1240" height="650"></div>
                            <div class="item"><img src="Hotel/1240x450-9.jpg" alt="" width="1240" height="650"></div>
                            <div class="item"><img src="Hotel/1240x450-6.jpg" alt="" width="1240" height="650"></div>
                            <div class="item"><img src="Hotel/1240x450-4.jpg" alt="" width="1240" height="650"></div>
                            <div class="item"><img src="Hotel/1240x450-5.jpg" alt="" width="1240" height="650"></div>
                            <div class="item"><img src="Hotel/1240x450-7.jpg" alt="" width="1240" height="650"></div>
                        </div>
                        <a class="nav prev nolink"><i class="icon fa fa-angle-left"></i></a>
                        <a class="nav next nolink"><i class="icon fa fa-angle-right"></i></a>
                        <div class="pagination"></div>
                    </div>
                    <ul class="navgrid">
                        <li><a class="nolink" data-background="Hotel/1240x450-1.jpg"></a></li>
                        <li><a class="nolink" data-background="Hotel/1240x450-9.jpg"></a></li>
                        <li><a class="nolink" data-background="Hotel/1240x450-6.jpg"></a></li>
                        <li><a class="nolink" data-background="Hotel/1240x450-4.jpg"></a></li>
                        <li><a class="nolink" data-background="Hotel/1240x450-5.jpg"></a></li>
                        <li><a class="nolink" data-background="Hotel/1240x450-7.jpg"></a></li>
                    </ul>
                </div>
            </div>

            <script>
            'use strict';

            function map_initialize() {

                var styles = [{
                    featureType: "all",
                    stylers: [{
                        lightness: 20
                    }]
                }];

                /* ---------- Slideshow Map | START ---------- */

                var latlng_side = new google.maps.LatLng(-31.962185, 115.882641);
                var myOptions_side = {
                    zoom: 15,
                    center: latlng_side,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    scrollwheel: false,
                    draggable: false,
                    zoomControl: false,
                    streetViewControl: false,
                    mapTypeControl: false,
                    clickableIcons: false,
                    styles: styles
                };
                var map_side = new google.maps.Map(document.getElementById('map-side'), myOptions_side);
                var marker_side = new google.maps.Marker({
                    position: latlng_side,
                    map: map_side,
                    icon: "system/images/point.png"
                });
                var center;

                function calculateCenter() {
                    center = map_side.getCenter();
                }
                google.maps.event.addDomListener(map_side, 'idle', function() {
                    calculateCenter();
                });
                google.maps.event.addDomListener(window, 'resize', function() {
                    map_side.setCenter(center);
                });

                /* ---------- Slideshow Map | END ---------- */

            }

            function map_loadscript() {
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBrvuO5KC1V57c2v25WcgOD0_peX0MyJsc&callback=map_initialize';
                document.body.appendChild(script);
            }

            window.onload = map_loadscript;
            </script>

            <!-- Slideshow | END -->

            <!-- Content | START -->

            <div class="section content content-center">
                <div class="center">
                    <h2>Experience Jasper Hotel</h2>
                    <h5>Lorem ipsum dolor sit amet, consectetuer adipiscing</h5>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti. Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. Lorem ipsum dolor sit amet, consectetuer.</p>
                    <ul class="tags">
                        <li>On-site Restaurant</li>
                        <li>24 Hour Concierge</li>
                        <li>50m Lap Pool</li>
                        <li>Day Spa & Sauna</li>
                        <li>Tennis Court</li>
                        <li>Tour Desk</li>
                    </ul>

                </div>
            </div>

            <!-- Content | END -->

            <!-- Carousel | START -->

            <div class="section carousel carousel-nav">
                <div class="slider">

                    <div class="item">
                        <a href="rooms-list.html">
                            <img src="Hotel/1240x450-8.jpg" alt="" class="thumb" />
                            <div class="details"><div class="button">Accommodation</div></div>
                        </a>
                    </div>

                    <div class="item">
                        <a href="photo-gallery.html">
                            <img src="Hotel/1240x450-9.jpg" alt="" class="thumb" />
                            <div class="details"><div class="button">Photo Gallery</div></div>
                        </a>
                    </div>

                    <div class="item">
                        <a href="restaurant.html">
                            <img src="Hotel/1240x450-1.jpg" alt="" class="thumb" />
                            <div class="details"><div class="button">Poolside Dining</div></div>
                        </a>
                    </div>

                    <div class="item">
                        <a href="location.html">
                            <img src="Hotel/1240x450-6.jpg" alt="" class="thumb" />
                            <div class="details"><div class="button">Our Location</div></div>
                        </a>
                    </div>

                </div>

                <a class="nav prev"><i class="icon fa fa-angle-left"></i></a>
                <a class="nav next"><i class="icon fa fa-angle-right"></i></a>
                <div class="pagination"></div>
            </div>

            <!-- Carousel | END -->

            <!-- Content | START -->

            <div class="section content content-center">
                <div class="center">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti. Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. Lorem ipsum dolor sit amet, consectetuer.</p>
                    <div class="usp">
                        <div class="item">
                            <i class="icon fa fa-star"></i>
                            <h3>#1 on TripAdvisor</h3>
                            <p>Morbi interdum mollis sapien. Sed ac risus. Lorem phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero dolor a purus. Sed vel lacus. Lorem ipsum dolor.</p>
                        </div>
                        <div class="item">
                            <i class="icon fa fa-eye"></i>
                            <h3>Award-Winning Chef</h3>
                            <p>Morbi interdum mollis sapien. Sed ac risus. Lorem phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero dolor a purus. Sed vel lacus. Lorem ipsum dolor.</p>
                        </div>
                        <div class="item">
                            <i class="icon fa fa-check-circle"></i>
                            <h3>24 Hour Concierge</h3>
                            <p>Morbi interdum mollis sapien. Sed ac risus. Lorem phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero dolor a purus. Sed vel lacus. Lorem ipsum dolor.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content | END -->

            <!-- Stats | START -->

            <div class="section stats">
                <div class="center">
                    <div class="stats-container">
                        <h2>Last month at Jasper Hotel</h2>

                        <div class="col-4">
                            <div class="number">225</div>
                            <p>Guests Stayed</p>
                        </div>
                        <div class="col-4">
                            <div class="number">198</div>
                            <p>Meals Served</p>
                        </div>
                        <div class="col-4">
                            <div class="number">75</div>
                            <p>Tours Booked</p>
                        </div>
                        <div class="col-4">
                            <div class="number">112</div>
                            <p>Spa Treatments</p>
                        </div>

                        <span class="back" data-background="Hotel/1240x450-2.jpg"></span>
                    </div>
                </div>
            </div>

            <!-- Stats | END -->
           
    
    
    
    
    
    

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
            <!-- footer -->
    <?php include('footer.php');?><!-- footer end-->
</body>
</html>