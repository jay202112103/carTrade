
 <div class="wrapper">
     <!-- Sidebar  -->
     <nav id="sidebar">
         
<img src="{{asset('logo1.png')}}" width="250px" height="120px" alt="logo"><br><br><br><br>
         <ul class="list-unstyled components" style="height: 500px">
             <!-- <li class="">
                 <a href="#"  aria-expanded="false" 	>Add Profile</a>
             </li> -->
             <li>
                <a href="{{route('admin.adminhome')}}">Home</a>
            </li>
              <li>
                 <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Manage Cars</a>
                 <ul class="collapse list-unstyled" id="pageSubmenu">
             <li>
                 <a href="{{route('admin.addBrands')}}">Add Brand</a>
             </li>
             <li>
                <a href="{{route('admin.addModels')}}">Add Model</a>
            </li>
             <li>
                 <a href="#">Delete car Details</a>
             </li>
                 </ul>
             </li>
             <br>
             <li>
                         <a href="{{route('approveRequest')}}">Verify Selling Request</a>
                     </li>
                    <br>
             
             <li>
                 <a href="#">View Feedbacks</a>
             </li>
                <br>
            <li>
                <a href="#">Generate Reports</a>
          </li>
                   <br>
     
              <li>
                 <a href="{{route('logout')}}">Logout</a>
             </li> 
            
         </ul>

     </nav>
     <div id="content">

         <nav class="navbar navbar-expand-lg navbar-light bg-light">
             <div class="container-fluid">

                 <button type="button" id="sidebarCollapse" class="btn btn-info">
                     <i class="fas fa-align-left"></i>
                     
                 </button>
                 <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <i class="fas fa-align-justify"></i>
                 </button>

                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="nav navbar-nav ml-auto">
                          <?php
                          
         
                 
         ?>
          
                        <!--  <li class="nav-item">
                             <a class="nav-link" href="home.php">Home</a>
                         </li>
                         
                         <li class="nav-item">
                             <a class="nav-link" href="registration.php">Registration</a>
                         </li> -->
                        
                     </ul>


                

</div>
             </div>
         </nav>
         <?php
     
     
     ?>