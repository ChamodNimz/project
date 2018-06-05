<!DOCTYPE html>
<html>
<head>
	<title>Book now</title>
	<?php include('links.php'); ?>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/toast.css">
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
                                <h3>Jasper Hotel Booking</h3>
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
                            <h1>Room prices</h1>
                                    <ul>
                                        <li>Deluxe Room -5000 </li>
                                        <li>Executive Room -10000 </li>
                                        <li>Premium Room -15000 </li>
                                        <li>Superior Room -25000 </li>
                                    </ul>
                            <form name="book" action="bookingController.php" method="post">
                                <div class="row">
                                    <label>Your Dates </label>
                                    <div class="fields">
                                        <label for="chekin">check in Date</label>
                                            <input class="col-2" type="date" id="chekin" onchange="" name="txtCheckIn" placeholder="Check-in" required>
                                        <label for="chekout">check out Date</label>
                                            <input class="col-2" type="date" id="chekout" onchange="validateDate()" name="txtCheckOut" placeholder="Check-out" required>
                                       
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
                                        <input class="col-2" type="text" name="txtFname" placeholder="First Name" id="fname" required onchange="validateName('fname');">
                                        <input class="col-2" type="text" name="txtLname" id="lname" placeholder="Last Name" required onchange="validateName('lname');">
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Email Address <span class="required">*</span></label>
                                    <div class="fields">
                                        <input type="text" name="txtEmail" placeholder="Email Address" id="email" required onchange="validateEmail('email');">
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Phone Number <span class="required">*</span></label>
                                    <div class="fields">
                                        <input type="text" name="txtTelephone" id="tele" placeholder="Phone Number" required onchange="allNumeric('tele');">
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

    //total value calculation script
    var total;
    var dateSpan;
    function calculateTotalRooms(){
                   
        var chekout=document.getElementById('chekout').value;
        var chekin=document.getElementById('chekin').value;
        
        //chekout.substring();
        chekoutDate = new Date(chekout);
        chekinDate = new Date(chekin);

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

//----------------validation codes --------------------//
    function validateDate(){
            // to get today
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();

            if(dd<10) {
                dd = '0'+dd
            } 

            if(mm<10) {
                mm = '0'+mm
            } 

            //today = mm + '/' + dd + '/' + yyyy;
            today= yyyy + '-' + mm + '-' + dd; 
            //alert("today"+today);

                               
                    var chekout=document.getElementById('chekout').value;
                    var chekin=document.getElementById('chekin').value;
        
                    dateSpan = parseInt(chekout.substring(8,10))-parseInt(chekin.substring(8,10));   
                    if(today<=chekin && today<chekout && chekin<chekout ){
                        
                        calculateTotalRooms();
                    }
                    else{
                         M.toast({html: "When choosing date, don't use an older date to Check in or Same date twise or older day to check out !", classes: 'rounded'});
                         document.getElementById('chekout').value="";
                         document.getElementById('chekin').value="";
                    }

        }

        function validateName(id){

            var letters = /^[A-Za-z]+$/;
            if(document.getElementById(id).value.match(letters))
            {
                
                document.getElementById('btnSubmit').disabled=false;
                return true;
            }
            else
            {
                M.toast({html: "Username must have alphabet characters only !", classes: 'rounded'});
                document.getElementById('btnSubmit').disabled=true;
                return false;
            }
        }

            function validateEmail(id)
            {
                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if(document.getElementById(id).value.match(mailformat))
                {
                    document.getElementById('btnSubmit').disabled=false;
                    return true;
                }
                else
                {
                    
                    M.toast({html: "You have entered an invalid email address !", classes: 'rounded'});
                    document.getElementById('btnSubmit').disabled=true;
                    return false;
                }
            }

            function allNumeric(id)
               {
                  var numbers = /^[-+]?[0-9]+$/;
                  if(document.getElementById(id).value.match(numbers))
                  {
                        document.getElementById('btnSubmit').disabled=false;
                        
                    return true;
                  }
                  else
                  {
                        
                        M.toast({html: "Please input correct telephone number format !", classes: 'rounded'});
                        document.getElementById('btnSubmit').disabled=true;
                    return false;
                  }
               }
</script>
</body>
</html>