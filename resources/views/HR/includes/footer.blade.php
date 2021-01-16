<!--footer -->
<footer><br>
<div class="container-fluid " style='background-color:black;'>
<div class="container ">
<div class="row">



<div class="col-lg-6 col-md-6 col-sm-6 col-6 vl">
<div class="" >
  <div class="card-body">

  <div class="row"  >
    <div class="col-lg-4 col-md-4 col-sm-4 "></div>
    <div class="col-lg-4 col-md-4 col-sm-4 "> 
      <a href="#"><img src="{{URL::asset('assets/images/hrlogo.jpg')}}" height="50vw" width="90vw" alt=""/></a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 "></div>
  </div>

  <div class="row"  >
    <div class="col-lg-4 col-md-4 col-sm-4 "></div>
    <div class=" "> <br>
    <div class='footer'  style='direction:;' align="">
     &nbsp;&nbsp;&nbsp;<a href="https://www.facebook.com/work.time.35728" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook"hh style='font-size:1.2em;color:white'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="https://www.instagram.com/worktime66/" target="_blank" rel="noopener noreferrer" > <i class="fab fa-instagram" style='font-size:1.2em;color:white'></i></a> &nbsp;&nbsp;
                              <a href="https://twitter.com/worktim1231?s=08" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter" style='font-size:1.2em;color:white'></i></a> &nbsp;&nbsp;
                                    
                                </div>    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 "></div>
  </div>

  </div>
</div>
</div>




<div class="col-lg-6 col-md-6 col-sm-6 col-6">
<div class="" >
  <div class="card-body" style='text-align:center'><br>
  <a class=" menu btn btn-md" style='color:white'   href="contacthr">{{__('fields_web.Footer.contact_us')}}</a><br>
  <a class=" menu btn btn-md " style='color:white'  href="abouthr">{{__('fields_web.Footer.about_us')}} </a>    
  </div>
</div>
</div>






</div>
</div>
</div>


<button class="shadow-lg  sm-white" onclick="topFunction()" id="myBtn" title="Go to top"><i class=" fa fa-angle-double-up" style="font-size:.75em"></i></button>

<br>
<div class="container-fluid ">
<div class="row">
     <div class='col-12' align="center">
       <h4 style=""> {{__('fields_web.Footer.allrights')}}   </h4>
   </div>
</div> 
</div>
</footer>

<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

