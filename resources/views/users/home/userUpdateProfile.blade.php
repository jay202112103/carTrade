<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Update Profile</title>
  
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{asset('styleside.css')}}">
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    
</head>
<body>
  @include('users.home.sideNav')
  <div class="container">
    <h2>Update Profile</h2><br>
    <form class="form-horizontal" action="{{route('updateUserDetails')}}" method="POST"  id="myform" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">First name:</label>
        <div class="col-sm-10">
          <input type="text" id="fname" class="form-control"  placeholder="" value="{{$user->fname}}"  name="fname" required > 
          
        </div>
      </div>
  
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Last name</label>
        <div class="col-sm-10">
            <input type="text" id="lname" class="form-control"  placeholder="" value="{{$user->lname}}"  name="lname" 
          required > 
          
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10">
            <input type="email" id="passwordagain" class="form-control"  placeholder="Enter new email" value="{{$user->email}}" name="email" 
          required > 
        </div>
      </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Contact:</label>
          <div class="col-sm-10">
              <input type="text" id="contact" minlength="10" maxlength="10" class="form-control"  placeholder="" value="{{$user->contact}}" name="contact" 
            required > 
           </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="email">State</label>
          {{-- <input type="text" name="contact" id="your-contact" class="input-text" minlength = "10" maxlength="10" placeholder="Your Phone number" required> --}}
          <select name="state_id" id="state" class="form-control" style="margin-left:12px;margin-top:3px; width:845px;" required autofocus data-dependent="city">
            <option value="">Please select a state</option>
            @foreach($states as $state)
            <option value="{{ $state->id }}">{{ $state->name }}</option>
            @endforeach
            </select>
    
           </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="email">City</label>
            {{-- <input type="text" name="contact" id="your-contact" class="input-text" minlength = "10" maxlength="10" placeholder="Your Phone number" required> --}}
            <select name="city_id"  id="city" class="form-control" style="margin-left:12px;margin-top:3px; width:845px;" required >
              {{-- <option value="">Please select a city</option> --}}
              </select>
            {{-- <i class="fas fa-envelope"></i> --}}
          </div>

          <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10" align="center">
              <button type="submit" id="submit" class="btn btn-default" style="color: black;" name="btnsubmit">Update</button>
            </div>
          </div>
          
        </form>
  

    </div>

  
</body>

<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
  $(document).ready(function(){
      $('#state').change(function(){
          let state = $('#state option:selected').val();
          if(state !== '') {
            let _token = $('input[name=_token]').val();
            let dependent = $(this).data('dependent');
            $.ajax({
                url : "{{route('updateProfile.getCity')}}",
                method : 'post',
                data : {state:state,_token:_token},
                success: function(data) {
                    $('#city').html(data);
                }
            });
          }
      });
  });
</script>

</html>