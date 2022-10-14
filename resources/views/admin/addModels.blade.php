<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="{{asset('styleside.css')}}">
    
        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
        
        <title>Add Models</title>
    </head>
<body>
    @include('admin.sidenav.check')
    <div>
        
        <div>
            <div>
            <h3 style="margin-left: 10px;">Add Models</h3>
            <hr style="border-top: 1px solid black;">
            <form method="post" action="{{route('admin.addCarModels')}}">
                @csrf
                <div>
                  <label>Brand name</label><br/>
                  <select name="brand" class="form-control form-control-lg" style="margin-top:7px;">
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="catname">Model</label><br/>
                    <input type="text" required class="form-control"  placeholder="Enter Model name" name="model" pattern="[A-Za-z\s]+">
                  </div>       
                <div class="form-group form-check">
                    
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
              </form>
            </div>
        </div>
    </div>
    @if (Session::has('ModelsAdded')) 
      <div>
         <span style="color: green;">{{ Session::get('ModelsAdded') }}</span> 
      </div>
     @endif 
</body>
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>

</html>