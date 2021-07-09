<!DOCTYPE html>
<html lang="en">

<head>
    <title>REGISTER</title>
    <link rel="stylesheet" href="main.css">
   
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Prompt&family=Roboto:wght@500&display=swap');
    </style>


<!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
    
    </script>
	<script src="page.js"></script>

</head>

<body>
   
    <div class="container" id="section-1gradient">
        <div class="row">
       
            <div class="col-4" id="mid">
            <div class="otp_msg"></div> 
                <form method="post">
                   <div class="form-group" id="sendOTP">
                        <h1 class="large">REGISTER</h1>
                    
                        <b><label for="Name">Name</label></b><br>
                        <input type="text" id="Name" name="Name"><br><br>
                        <b><label for="Lastname">Last name</label></b><br>
                        <input type="text" id="Lastname" lastname="Lastname"><br><br>
                        <b><label for="email">Email</label></b><br>
                        <input type="text" id="email" email="email"><br><br>
                        <b><label for="number">Contact No.</label></b><br>
                        <input type="text" class="form-control" id="mob" required=""><br><br>
                    </div>
                        <div class="form-group" id="otpdiv">
                        <h1 class="large">Mobile phone verification</h1><br>
                        <h2>Enter the code we just send on your mobile phone</h2><b><h2 class="phone"></h2></b>
                        <b><label for="otp verification">Enter OTP</label></b><br>
			            <input type="text" class="form-control" id="otp"><br><br>
                        <div class="countdown"></div>
				        <a href="#" id="resend_otp" type="button">Resend</a>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>

    </div>

    
    


    <footer class="footsy">
        <div class="col-4" id="next">
        <form>
            <button type="button" id="sendotp"  class="btn btn-primary" type="submit">Send OTP</button>
			<button type="button" id="verifyotp"   class="btn btn-primary" >Verify OTP</button>
			<button type="button" id="start" onclick="submit(); gfg_Run()" value="1"  class="btn btn-primary">START</button>
			<!-- <input type="none" id="GFG_DOWN"> -->
			<p id ="GFG_DOWN" style = 
        	"font-size: 15px; font-weight: bold;">
    		</p>
              </form>
        </div>
    </footer>


<!-- ############## Responsive part ################ -->
    <script>
		
        function dropdownMenu() {
            var x = document.getElementById("dropdownClick");
            if (x.className === "topnav") {
                x.className += " responsive";
                //  change topnav to topnav.responsive
            } else {
                x.className = "topnav"
            }
        }
    </script>


	<!-- ################ date ############ --> 
    <script>

	function gfg_Run() {
		var inputF = document.getElementById("GFG_DOWN");
        inputF.value = new Date().toLocaleString(undefined, {timeZone: 'Asia/Kolkata'}).toString();;
		document.getElementById("GFG_DOWN").innerHTML= new Date().toLocaleString(undefined, {timeZone: 'Asia/Kolkata'}).toString();
		
	}
			
    </script> 
	
<!-- </body>  -->
  


<!-- ############## OTP CODE  ################ -->
    <script type="text/javascript">
			
			$(document).ready(function(){


				function validate_mobile(mob){

					var pattern =  /^[6-9]\d{9}$/;

					if (mob == '') {

						return false;
					}else if (!pattern.test(mob)) {

						return false;
					}else{

						return true;
					}
				}


				//send otp function
				function send_otp(mob){

						var ch = "send_otp";
							
							$.ajax({

							url: "otp_process.php",
							method: "post",
							data: {mob:mob,ch:ch},
							dataType: "text",
							success: function(data){

								if (data == 'success') {
                                    $('#sendOTP').css("display","none");
									$('#otpdiv').css("display","block");
									$('#sendotp').css("display","none");
									$('#verifyotp').css("display","block");
									
									
										timer();
									$('.otp_msg').html('<div class="alert alert-success">OTP sent successfully</div>').fadeIn();
										
										window.setTimeout(function(){
										$('.otp_msg').fadeOut();
									},1000)
                                    $('.phone').html(":  <b class='text-primary'>" + mob + "</b>");
										

								}else{

									$('.otp_msg').html('<div class="alert alert-danger">Error in sending OTP</div>').fadeIn();
										
										window.setTimeout(function(){
										$('.otp_msg').fadeOut();
									},1000)
								
								}
							}

						});
				}
				//end of send otp function


				//send otp function

				$('#sendotp').click(function(){

					var mob = $('#mob').val();

					

						if (validate_mobile(mob) == false) $('.otp_msg').html('<div class="alert alert-danger" style="position:absolute">Enter Valid mobile number</div>').fadeIn(); else 	send_otp(mob);

						window.setTimeout(function(){
							$('.otp_msg').fadeOut();
						},1000)
						
				
					    	
		

					});

				//end of send otp function


				//resend otp function
				$('#resend_otp').click(function(){

					var mob = $('#mob').val();
					
					send_otp(mob);
						$(this).hide();
				});
				//end of resend otp function


			//verify otp function starts

			$('#verifyotp').click(function(){

						
						var ch = "verify_otp";
						var otp = $('#otp').val();

						$.ajax({

							url: "otp_process.php",
							method: "post",
							data: {otp:otp,ch:ch},
							dataType: "text",
							success: function(data){

									if (data == "success") {

										$('#otpdiv').css("display","none");
										$('#verifyotp').css("display","none");
										$('#start').css("display","block");

										$('.otp_msg').html('<div class="alert alert-success">OTP Verified successfully</div>').show().fadeOut(4000);
																				
									}else{

										$('.otp_msg').html('<div class="alert alert-danger">OTP did not match</div>').show().fadeOut(4000);
									}
							}
						});
								

				});

			//end of verify otp function


			//start of timer function

			function timer(){

					var timer2 = "00:31";
					var interval = setInterval(function() {


					  var timer = timer2.split(':');
					  //by parsing integer, I avoid all extra string processing
					  var minutes = parseInt(timer[0], 10);
					  var seconds = parseInt(timer[1], 10);
					  --seconds;
					  minutes = (seconds < 0) ? --minutes : minutes;
					  
					  seconds = (seconds < 0) ? 59 : seconds;
					  seconds = (seconds < 10) ? '0' + seconds : seconds;
					  //minutes = (minutes < 10) ?  minutes : minutes;
					  $('.countdown').html("Resend otp in:  <b class='text-primary'>"+ minutes + ':' + seconds + " seconds </b>");
					  //if (minutes < 0) clearInterval(interval);
					  if ((seconds <= 0) && (minutes <= 0)){
					  	clearInterval(interval);
					  	$('.countdown').html('');
					  	$('#resend_otp').css("display","block");
					  } 
					  timer2 = minutes + ':' + seconds;
					}, 1000);

				}

				//end of timer


			});
		</script>


 

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.7.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.7.0/firebase-database.js"></script>


<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.7.0/firebase-analytics.js"></script>

<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyC1HqEnGUqr_jSajSQdvNLZQI3uEBgIQdg",
    authDomain: "page-ff92f.firebaseapp.com",
    databaseURL: "https://page-ff92f-default-rtdb.firebaseio.com",
    projectId: "page-ff92f",
    storageBucket: "page-ff92f.appspot.com",
    messagingSenderId: "682816138612",
    appId: "1:682816138612:web:d2478ddedfc1451b169021",
    measurementId: "G-5MLPT0P9TS"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>

<script src="main.js"></script>




<!-- ############# code for table check ######## -->
<script>

('#mob').live('input', function(e)
{
    var _thisVal = $(this).val();
    //trigger event on 3 or more characters
    if(_thisVal.length >= 3)
    {
        console.log('searching for '+_thisVal);
    }
});
 


function setName() {
   var mob = document.getElementById('mob').value;
   localStorage.setItem('mob', mob);
}

</script>

</body>

</html>