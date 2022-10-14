<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title></title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{asset('styleside.css')}}">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
@include('users.home.sideNav')

        <!-- Page Content  -->
        

<div class="container">
  <h2>Change Password</h2><br>
  <form class="form-horizontal" action="{{route('updatePassword')}}" method="POST"  id="myform" enctype="multipart/form-data">
    @csrf
    @if (Session::has('passwordChanged'))
      <div>
        <span style="color: green;">{{ Session::get('passwordChanged') }}</span>
      </div>
    @endif
  <div class="form-group">
      <label class="control-label col-sm-2" for="email">Password:</label>
      <div class="col-sm-10">
        <input type="password" id="currentpassword" class="form-control"  placeholder="Enter password"  name="currentpassword" 
        required > 
         <input type="checkbox" onclick="myFunction('currentpassword')" >Show Password
        <span id='currpasserror'> </span><br><br>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">New Password:</label>
      <div class="col-sm-10">
          <input type="password" id="newpassword" class="form-control"  placeholder="Enter new password"  name="newpassword" 
        required > 
         <input type="checkbox" onclick="myFunction('newpassword')" >Show Password
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-2" for="email">Confirm Password:</label>
      <div class="col-sm-10">
          <input type="password" id="passwordagain" class="form-control"  placeholder="Enter new password"  name="repeatpassword" 
        required > 
         <input type="checkbox" onclick="myFunction('passwordagain')" >Show Password
          <span id='matchpwd'></span><br>
 <span id='alphaerror'></span><br>
      </div>
    </div>

     <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10" align="center">
        <button type="submit" id="submit" class="btn btn-default" style="color: black;" name="btnsubmit">Submit</button>
      </div>
    </div>
    
  </form>
</div>
         
        </div>
    </div>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script type="text/javascript">
         $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
      function myFunction(id) {
  var x = document.getElementById(id);

  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

$('#currentpassword').change(function(){
  if($(this).val() != '')
  {
    var curr_pass = $("#currentpassword").val(); 
   
    let _token = $('input[name=_token]').val();
   $.ajax({
    url:"{{route('getcurrentpassword')}}",
    method:"POST",
    data:{curr_pass:curr_pass,_token:_token},
    success:function(result)
    {      
        if (result == 0) {
          $('#currpasserror').html("Current password is incorrect").css('color','red');
          $('#submit').attr('disabled',true).css('cursor','not-allowed');;

          
        }
        else{
          $('#currpasserror').html("Current password is valid").css('color','green');
          $('#submit').attr('disabled',false).css('cursor','pointer');
        }
    }

   })
  }
 });


$(function () {
        $("#submit").click(function () {
            var password = $("#newpassword").val();
            var confirmPassword = $("#passwordagain").val();
            var current= $('#currentpassword').val();
            if (password !== confirmPassword) 
            {
                $('#matchpwd').html("<br><font color='red'>Password does not match with your new password</font>");
                return false;
            }
            else if(password.length == 0  || confirmPassword.length == 0 || current.length == 0)
            {
                    
            }
            else
            {
                var passw=  /^[A-Za-z]\w{7,14}$/;
                if(password.match(passw)) 
                { 
                    $('#matchpwd').html("");
                    
                    return true;
                }
                else
                { 
                    $('#matchpwd').html("");
                    $('#alphaerror').html("<br><font color='red'> New password must be [7 to 16 characters which contain only characters, numeric digits, underscore and first character must be a letter]</font>");
                    return false;
                }
            }

            return true;
        });
    });


    </script>
</body>

</html>