<!DOCTYPE html>
<html>
<head>
	<title>Book now</title>
	<?php include('links.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<?php include('navigation.php'); ?>
    <div class="container">
	
            <!-- Banner | START -->
            <div class="section section-full banner">
                <div class="back" data-background="Hotel/1240x450-6.jpg"></div>
                <div class="center">
                    <h1>Book Accommodation</h1>
                </div>
            </div>
            <!-- Banner | END -->

            <!-- Content | START -->

            <div class="copy">
                <div class="center center-main">

                    <!-- Sidebar | START -->

                    <aside class="order-first">
                        <div id="sidebar">

                            <img src="Hotel/500x300-2.jpg" alt=""><br><br>

                            <!-- Sidebar Content | START -->
                            
                            <div class="sidebar-section sidebar-text">
                                <h3>Jasper Hotel Bookings</h3>
                                <p>Please submit the online reservation form, and we will get back to you as soon as possible to confirm your booking with us.</p>
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
                            <form name="book" action="bookinkController.php" method="post">
                                <div class="row">
                                    <label>Your Dates <span class="required">*</span></label>
                                    <div class="fields">
                                        
                                            <input class="col-2" type="date" name="txtCheckIn" placeholder="Check-in" required>

                                            <input class="col-2" type="date" name="txtCheckOut" placeholder="Check-out" required>
                                       
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Room Type</label>
                                    <div class="fields">
                                        <select name="txtRoomType" id="rooms" onchange="calculateTotalRooms();">
                                            <option value="">Room Type</option>
                                            <option value="5000">Deluxe Room</option>
                                            <option value="10000">Executive Room</option>
                                            <option value="15000">Premium Room</option>
                                            <option value="25000">Superior Room</option>
                                        </select> 
                                        <div class="row">
                                            <div class="fields"><label>Availability: <span id="indicator" style="color: #6bf442;"></span></label></div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <label>Your Name <span class="required">*</span></label>
                                    <div class="fields">
                                        <input class="col-2" type="text" name="txtFname" placeholder="First Name" required>
                                        <input class="col-2" type="text" name="txtLname" placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Email Address <span class="required">*</span></label>
                                    <div class="fields">
                                        <input type="text" name="txtEmail" placeholder="Email Address" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Phone Number <span class="required">*</span></label>
                                    <div class="fields">
                                        <input type="text" name="txtTelephone" placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Special Requests</label>
                                    <div class="fields">
                                        <textarea name="txtReqs" rows="5" placeholder="Special Requests"></textarea>
                                        <p class="small"><strong>Please write your requests here.</strong> Special requests cannot be guaranteed, however we will do our best to meet your needs. You can always make a special request after your booking is complete.</p>
                                    </div>
                                </div>

                                <hr>
                                <div class="value">
                                <div class="row">
                                    <label>Total: <span>Rs/=</span></label>
                                    <div class="fields"><input type="text" id="txtTotal" name="txtValue" disabled></div>
                                </div>
                                </div>
                                <div class="form-button">
                                    <!-- Honeypot (for bot spam) --><input name="contact-email2" type="text" placeholder="Email Address" autocomplete="false" class="honeypot" value="" />
                                    <button name="send-book" class="button" type="submit" id="btnSubmit">Book Your Room <i class="icon ion-ios-arrow-forward"></i></button>
                                </div>
                            </form>
                        </div>

                        <!-- Form | END -->

                    </div>

                </div>
            </div>


<?php include('footer.php'); ?>
<script type="text/javascript">
    //total valu calculation script
    var total;
    function calculateTotalRooms(){

        var name=document.getElementById('rooms');
        var amount=name.options[name.selectedIndex].value;
        total=amount;
        total=parseInt(total);
        document.getElementById('txtTotal').value=total;


        //ajax req for getting the avalibilyt of a room
      
        var  a=document.getElementById("rooms").selectedIndex;
       
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var n= parseInt(this.responseText);
                if(n==0){
                    document.getElementById("indicator").style.color="red";
                    document.getElementById("indicator").innerHTML ="N/A";
                    document.getElementById("btnSubmit").disabled=true;
                    document.getElementById("txtTotal").value="";

                }
                else
                {
                    document.getElementById("indicator").style.color="#6bf442";
                    document.getElementById("indicator").innerHTML ="Available";
                    document.getElementById("btnSubmit").disabled=false;
                }
                
            }
        };
        xmlhttp.open("GET","ajaxGetAv.php?id="+a,true);
        xmlhttp.send();

    }
</script>
</body>
</html>