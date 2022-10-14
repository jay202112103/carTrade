<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{asset('styleside.css')}}">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <style>
      body
      {
        overflow-x: hidden;
      }
        * {
          box-sizing: border-box;
          
        }
        .myButton{
          border-radius:7px;
          background-color:#094d85;
          color:white;
          width:180px;
          height:40px;
          margin-left:auto;
          margin-right:auto;
          display:block;

        }
        
        /* Float four columns side by side */
        .column {
          float: left;
          width: 33.33% ;
          padding: 0 10px;
        }
        
        /* Remove extra left and right margins, due to padding */
        .row {margin: 0 -5px;}
        
        /* Clear floats after the columns */
        .row:after {
          content: "";
          display: table;
          clear: both;
        }
        
        /* Responsive columns */
        @media screen and (max-width: 600px) {
          .column {
            width: 100%;
            display: block;
            margin-bottom: 20px;
          }
        }
        
        /* Style the counter cards */
        .card {
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
          padding: 16px;
          text-align: center;
          background-color: #f1f1f1;
        }
        </style>
</head>

<body>
    @include('users.check')
    <div class="container">
        {{-- Hello,  {{Session::get('user_id')}} --}}
    <div align="right">
      <form id="form" method = "GET" action = {{route('searchCar')}}> 
        <table>
          <tr>
            <td><input type="search"  style="width:350px;height:45px;" name="search" class="form-control" placeholder="Search...">
          </td>
          <td><button style="height:43px;width:45px;border-radius:5px;"><i class="fa fa-search"></i></button></td>
          </tr>
        </table>
      
      
    </form>
    </div>
        <br>
        <div class="row">
          @if(count($cars) > 0)

            @foreach ($cars as $c)
             
            
            <div class="column">
              <div class="card">
                <img src="{{asset('uploads/cars/'.$c->img)}}" height="250px" width="300px">
                <h6 style="margin-top: 10px;">
                {{strtoupper($c->brand_name)}}
                {{strtoupper($c->model_name)}}</h6>
                <h6>Ownership : {{strtoupper($c->ownership)}}</h6>
                <table>
                <tr><td><a href="{{route('viewCarsDetails',$c->car_details_id)}}"><button class="myButton">View</button></a></td>
                </tr>
                </table>

              </div><br>
            </div>
            <br>
            @endforeach


           
            
          </div>
          @endif
    </div>
    

</div>
        

    </div>
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
</html>