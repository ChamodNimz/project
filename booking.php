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
                                <h3>Jasper Hotel Booki id="chek"ngs</h3>
                                <p>Please submit the online reservation form, and we will get back to you as soon as possible to confirm your booking with us.</p>
                                <strong>Phone:</strong> +61 3 1234 5678<br>
                                <strong>Email:</strong> <a href="mailto:contact@jasper.com.au">contact@jasper.com.au</a></p>
                                <p>
                                    <h1>Room prices</h1>
                                    <ul>
                                        <li>Deluxe Room -5000 </li>
                                        <li>Executive Room -10000 </li>
                                        <li>Premium Room -15000 </li>
                                        <li>Superior Room -25000 </li>
                                    </ul>
                                </p>
                            </div>

                            <!-- Sidebar Content | END -->

                        </div>
                    </aside>

                    <!-- Sidebar | END -->

                    <div class="copy-main">

                        <!-- Form | START -->

                        
                        <div class="section form">
                            <form name="book" action="bookingController.php" method="post">
                                <div class="row">
                                    <label>Your Dates </label>
                                    <div class="fields">
                                        <label for="chekin">check in Date</label>
                                            <input class="col-2" type="date" id="chekin" onchange="calculateTotalRooms();" name="txtCheckIn" placeholder="Check-in" required>
                                        <label for="chekout">check out Date</label>
                                            <input class="col-2" type="date" id="chekout" onchange="calculateTotalRooms();" name="txtCheckOut" placeholder="Check-out" required>
                                       
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Room Type<span class="required">*</span></label>
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
                                    <label>Select No of rooms<span class="required">*</span></label>
                                    <div class="fields">
                                        <select name="txtRoomAmount" id="roomAmnt" onchange="calculateTotalRooms();">
                                            <option value="">Not selected</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select> 
                                    </div>
                                </div>
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
                                    <div class="fields"><input type="text" id="txtTotal" name="txtTotal" readonly></div>
                                </div>
                                </div>
                                <div class="form-button">
                                    <!-- Honeypot (for bot spam) -->
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

        var chekout=document.getElementById('chekout').value;
        chekoutDate = new Date(chekout);
        var chekin=document.getElementById('chekin').value;
        chekinDate = new Date(chekin);
        var dateSpan=chekoutDate.getDate()-chekinDate.getDate();
        dateSpan=parseInt(dateSpan);

        var name=document.getElementById('rooms');
        var amount=name.options[name.selectedIndex].value;
        var rmAmnt=document.getElementById('roomAmnt');
        var rms=rmAmnt.options[rmAmnt.selectedIndex].value;
        total=amount;
        total=total*rms*dateSpan;
        total=parseInt(total);
        document.getElementById('txtTotal').value=total;


        //ajax req for getting the avalibility of a room
      
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
                if(n==0 || n<rms){
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