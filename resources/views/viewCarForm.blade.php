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
    <h2> Car Details</h2><br>
    @if($message=Session::get('UploadedSuccessfully'))
      <span style="color:green;">{{$message}}</span>
    @endif
    <form class="form-horizontal" action="{{route('uploadCar')}}" method="POST"  id="myform" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Brand: </label>
      <select name="brand_id" id="brand" class="form-control" style="margin-top:3px;" required autofocus data-dependent="model">
        <option value="">Please select a brand</option>
        
        @foreach($brands as $brand)
        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
        @endforeach
        </select>

       </div>

       <div class="form-group">
        <label class="control-label col-sm-2" for="email">Model:</label>
        <select name="model_id"  id="model" class="form-control" style="margin-top:3px;" required >
          

          </select>
        {{-- <i class="fas fa-envelope"></i> --}}
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Year:</label>
        <input type="text" class="form-control" maxlength="4" minlength="4"  name="year"  
        onkeydown="return ( event.ctrlKey || event.altKey 
        || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
        || (95<event.keyCode && event.keyCode<106)
        || (event.keyCode==8) || (event.keyCode==9) 
        || (event.keyCode>34 && event.keyCode<40) 
        || (event.keyCode==46) )">
        {{-- <i class="fas fa-envelope"></i> --}}
      </div>
      
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Color:</label>
        <div class="col-sm-10">
            <input type="text" id="color" class="form-control"  placeholder=""  name="color" 
          required > 
        </div>
        </div>

  
      
     
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Registration Number:</label>
          <div class="col-sm-10">
           <input type="text" style="" id="reg_no" class="form-control" maxlength="13" name="reg_no" 
                required >
           </div>
            <span id="error-reg-no"></span>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Approx. Kms Driven:</label>
            <div class="col-sm-10">
                <input type="number" step=".10" id="kms_driven" class="form-control" min="1"  placeholder=""  name="kms_driven" 
              required > 
             </div>
              <span id="error-km"></span>
            </div>
          <div class="form-group">
              <label class="control-label col-sm-2" for="email">Ownership:</label>
              <select name="ownership"  id="ownership" class="form-control" style="margin-top:3px;" required >
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                
                </select>
                
              
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Image:</label>
            <div class="col-sm-10">
                <input type="file" id="img" class="form-control"  placeholder=""  name="img" 
              required > 
             </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Capacity:</label>
              <div class="col-sm-10">
                  <input type="number" id="capacity" minlength="4"  class="form-control"  placeholder=""  name="capacity" 
                required > 
               </div>
               <span id="error-cap"></span>
              </div>

          <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10" align="center">
              <button type="submit" id="submit" class="btn btn-default" style="color: black;" name="btnsubmit">Upload</button>
            </div>
          </div>
          
        </form>
  

    </div>

  
</body>
{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
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
      $('#kms_driven').keyup(function(){
            let value = $('#kms_driven').val();
            if(value > 500000) {
                $('#error-km').html('Maximum limit for KMs is 500000').css('color','red');
                $('#submit').attr('disabled',true).css('cursor','not-allowed');
              } else if(value < 0){
                $('#error-km').html('Value cannot be less than 0').css('color','red');
                $('#submit').attr('disabled',true).css('cursor','not-allowed');
                
              }else {
                $('#error-km').html('');
                $('#submit').attr('disabled',false).css('cursor','pointer');
            }
      });
      $('#capacity').keyup(function(){
            let value = $('#capacity').val();
            if(value > 10) {
                $('#error-cap').html('Maximum limit is 10').css('color','red');
                $('#submit').attr('disabled',true).css('cursor','not-allowed');
              }else if(value < 4){
                $('#error-cap').html('Minimum limit is 4').css('color','red');
                $('#submit').attr('disabled',true).css('cursor','not-allowed'); 
              }
               else {
                $('#error-cap').html('');
                $('#submit').attr('disabled',false).css('cursor','pointer');
            }
      });
      $('#reg_no').keyup(function(){
            let pattern=/^([a-zA-Z]){2}\s([0-9]){2}\s([A-Za-z]){2}\s([0-9]){4}$/;
            let reg =$('#reg_no').val();
            if(reg != '') {
              if(pattern.test(reg) == false) {
                $('#error-reg-no').html('PLease enter a valid registration number').css('color','red');
                $('#submit').attr('disabled',true).css('cursor','not-allowed');
              }
              else {
                $('#error-reg-no').html("Valid registration number").css('color','green');
                $('#submit').attr('disabled',false).css('cursor','pointer');
              }
            }
      });
  });
</script>
<script>
	$(document).ready(function(){
			$('#brand').change(function(){
					let brand = $('#brand option:selected').val();
					if(brand !== '') {
						let _token = $('input[name=_token]').val();
						// let dependent = $(this).data('dependent');
						$.ajax({
								url : "{{route('uploadCar.getModel')}}",
								method : 'post',
								data : {brand:brand,_token:_token},
								success: function(data) {
                  // console.log(data);
										$('#model').html(data);

								}
						});
					}
			});
	});
</script>
</html>