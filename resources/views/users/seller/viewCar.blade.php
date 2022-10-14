<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>View Car Details</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{asset('styleside.css')}}">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>
<body>
  @include('users.check')
  @foreach ($car as $d)
  <br><br><hr>
  <table>
    <tr>
      <td rowspan="9"><img src="{{asset('uploads/cars/'.$d->img)}}" height="400" width="450"></td>
      <td style="width:90%;padding-left:200px;">Brand Name: {{strtoupper($d->brand_name)}}</td>
    </tr>
    <tr>
      <td style="width:90%;padding-left:200px;">Model Name: {{strtoupper($d->model_name)}}</td>
    </tr>
    <tr>
      <td style="width:90%;padding-left:200px;">Year: {{strtoupper($d->year)}}</td>
    </tr>
    <tr>
      <td style="width:90%;padding-left:200px;">Color: {{strtoupper($d->color)}}</td>
    </tr>
    <tr>
      <td style="width:90%;padding-left:200px;">KMs Driven: {{strtoupper($d->kms_driven)}}</td>
    </tr>
    <tr>
      <td style="width:90%;padding-left:200px;">Capacity: {{strtoupper($d->capacity)}}</td>
    </tr>
    <tr>
      <td style="width:90%;padding-left:200px;">Ownership: {{strtoupper($d->ownership)}}</td>
    </tr>
    <tr>
      <td style="width:90%;padding-left:200px;">Registration Number: {{strtoupper($d->reg_no)}}</td>

    </tr>
    <tr>
    @if($d->status == 0)
    <td style="width:90%;padding-left:200px;"> Not approved yet </td>
@else
    <td style="width:90%;padding-left:200px;"> Approved </td>
@endif

    </tr>

    

    <tr><td></td><td style="width:90%;padding-left:200px;"><br><button onclick="deleteCar()" style= 'border-radius:5px;background-color:#D22B2B;color:white;width:180px;height:40px;'>Remove Car</button></td>
    </tr>
  </table>
  
  
  @endforeach
  

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });

</script>
<script>
  function deleteCar() {
    let text = "Are you sure you want to delete this car?";
    if (confirm(text) == true) {
      text = "Car deleted";
    } else {
      text = "You canceled!";
    }
    document.getElementById("demo").innerHTML = text;
  }
  </script>
</html>