<!--footer -->
<footer style="  position: absolute;
bottom: 0;
width: 100%;
height: 13rem;"><br>
<div class="container-fluid " style='background-color: rgb(4, 25, 41);'>
<div class="container ">
<div class="row">



<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12   vl">
<div class="" >
  <div class="card-body">

  <div class="row"  >
    <div class="my-3 mx-auto"> 
      <a href="#"><img src="{{URL::asset('assets/images/hrlogo1.png')}}" height="70vw" width="120vw" alt=""/></a>
    </div>
  </div>

  <div class="row"  >
    <div class='footer mx-auto'  style='direction:;' align="">
     &nbsp;&nbsp;&nbsp;<a href="https://www.facebook.com/worktimeym/" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook"hh style='font-size:1.2em;color:white'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="https://instagram.com/work_timeym?igshid=caft2w76jz6l" target="_blank" rel="noopener noreferrer" > <i class="fab fa-instagram" style='font-size:1.2em;color:white'></i></a> &nbsp;&nbsp;
                              <a href="https://twitter.com/worktim43494692?s=09" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter" style='font-size:1.2em;color:white'></i></a> &nbsp;&nbsp;
     </div>    
  </div>

  </div>
</div>
</div>




<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12   my-auto">
<div class="" >
  <div class="card-body" style='text-align:center'>
  <a class=" menu btn btn-md" style='color:white'   href="contacthr">{{__('fields_web.Footer.contact_us')}}</a><br>
  <a class=" menu btn btn-md " style='color:white'  href="abouthr">{{__('fields_web.Footer.about_us')}} </a>    
  </div>
</div>
</div>






</div>
</div>
</div>


<button class="shadow-lg  sm-white" onclick="topFunction()" id="myBtn" title="Go to top"><i class=" fa fa-angle-double-up"></i></button>

<div class="container-fluid ">
<div class="row">
     <div class='col-12 my-2' align="center">
       <span style=""> {{__('fields_web.Footer.allrights')}}   </span>
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
<script>
  window.onscroll = function() {myFunction()};
  
  var header = document.getElementById("myHeader");
  var sticky = header.offsetTop;
  var logo = document.getElementById("logo");
  var navbar = document.getElementById("navbar");
  var nav = document.getElementsByClassName("nav-link")
  function myFunction() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
      header.style.borderBottomStyle = "solid";
      navbar.style.marginLeft = "100px";
      logo.style.display = "block";
    } else {
      header.classList.remove("sticky");
      navbar.style.marginLeft = "500px";
      logo.style.display = "none";
    }
  }
  </script>

