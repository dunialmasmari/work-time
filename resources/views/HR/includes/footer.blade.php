<style>
    .col_white_amrc {
        color: #FFF;
    }

    footer {
        width: 100%;
        background-color: rgb(4, 25, 41);
        min-height: 250px;
        padding: 5px 0px 15px 0px;
        /* position: absolute;
bottom: 0;
width: 100%;
min-height: 13rem; */
    }

    .pt2 {
        padding-top: 20px;
        margin-bottom: 10px;
    }

    footer p {
        font-size: 13px;
        color: #CCC;
        padding-bottom: 0px;
        margin-bottom: 8px;
    }

    .mb10 {
        padding-bottom: 5px;
    }

    .footer_ul_amrc {
        margin: 0px;
        list-style-type: none;
        font-size: 14px;
        padding: 0px 0px 10px 0px;
    }

    .footer_ul_amrc li {
        padding: 0px 0px 5px 0px;
    }

    .footer_ul_amrc li a {
        color: #CCC;
    }

    .footer_ul_amrc li a:hover {
        color: #fff;
        text-decoration: none;
    }

    .fleft {
        float: left;
    }

    .padding-right {
        padding-right: 10px;
    }

    .footer_ul2_amrc {
        margin: 0px;
        list-style-type: none;
        padding: 0px;
    }

    .footer_ul2_amrc li p {
        display: flex;
        flex-wrap: wrap;
    }

    .footer_ul2_amrc li a:hover {
        text-decoration: none;
    }

    .footer_ul2_amrc li i {
        margin-top: 5px;
    }

    .bottom_border {
        border-bottom: 1px solid rgb(4, 25, 41);
        padding-bottom: 5px;
    }

    .foote_bottom_ul_amrc {
        list-style-type: none;
        padding: 0px;
        display: table;
        margin-top: 10px;
        margin-right: auto;
        margin-bottom: 10px;
        margin-left: auto;
    }

    .foote_bottom_ul_amrc li {
        display: inline-flex;
    }

    .foote_bottom_ul_amrc li a {
        color: #999;
        margin: 0 12px;
    }

    .social_footer_ul {
        display: table;
        margin: 15px auto 0 auto;
        list-style-type: none;
    }

    .social_footer_ul li {
        padding-left: 20px;
        padding-top: 10px;
        float: left;
    }

    .social_footer_ul li a {
        color: #CCC;
        border: 1px solid #CCC;
        padding: 8px;
        border-radius: 50%;
    }

    .social_footer_ul li i {
        width: 20px;
        height: 20px;
        text-align: center;
    }

</style>
<footer class="footer">
    <div class="container bottom_border">
        <div class="row">
            <div class=" col-sm-4 col-md col-sm-4  col-12 col">
                <div class=" my-uto">

                    <div class="row">
                        <div class="my-3 mx-auto">
                            <a href="#"><img src="{{ URL::asset('assets/images/hrlogo1.png') }}" height="70vw"
                                    width="120vw" alt="" /></a>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class='footer mx-auto' style='direction:;' align="">
                            &nbsp;&nbsp;&nbsp;<a href="https://www.facebook.com/worktimeym/" target="_blank"
                                rel="noopener noreferrer"><i class="fab fa-facebook" hh
                                    style='font-size:1.2em;color:white'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="https://instagram.com/work_timeym?igshid=caft2w76jz6l" target="_blank"
                                rel="noopener noreferrer"> <i class="fab fa-instagram"
                                    style='font-size:1.2em;color:white'></i></a> &nbsp;&nbsp;
                            <a href="https://twitter.com/worktim43494692?s=09" target="_blank"
                                rel="noopener noreferrer"><i class="fab fa-twitter"
                                    style='font-size:1.2em;color:white'></i></a> &nbsp;&nbsp;
                        </div>
                    </div> --}}

                </div>


            </div>

            {{-- <div class=" col-sm-4 col-md  col-6 col">
              <h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>
              <!--headin5_amrc-->
              <ul class="footer_ul_amrc">
                  <li><a href="http://webenlance.com">Image Rectoucing</a></li>
                  <li><a href="http://webenlance.com">Clipping Path</a></li>
                  <li><a href="http://webenlance.com">Image Cropping</a></li>
              </ul>
              <!--footer_ul_amrc ends here-->
          </div> --}}

            {{-- <div class=" col-sm-4 col-md  col-6 col">
              <h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>
              <!--headin5_amrc-->
              <ul class="footer_ul_amrc">
                  <li><a href="http://webenlance.com">Remove Background</a></li>
                  <li><a href="http://webenlance.com">Shadows & Mirror Reflection</a></li>
                  <li><a href="http://webenlance.com">Logo Design</a></li>
              </ul>
              <!--footer_ul_amrc ends here-->
          </div> --}}


            {{-- <div class=" col-sm-4 col-md  col-12 col">
              <h5 class="headin5_amrc col_white_amrc pt2">Follow us</h5>
              <!--headin5_amrc ends here-->

              <ul class="footer_ul2_amrc">
                  <li><a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a>
                      <p>Lorem Ipsum is simply dummy text of the printing...<a href="#">https://www.lipsum.com/</a>
                      </p>
                  </li>
                  </ul>
              <!--footer_ul2_amrc ends here-->
          </div> --}}
        </div>
    </div>


    <div class="container">
        <ul class="foote_bottom_ul_amrc">
            <li><a href="{{ route('homehr') }}">{{ __('fields_web.Navbar.Home') }}</a></li>
            <li><a href="{{ route('tenders') }}">{{ __('fields_web.Navbar.tenders') }}</a></li>
            <li><a href="{{ route('jobs') }}">{{ __('fields_web.Jobs.Title') }}</a></li>
            <li><a href="{{ route('services') }}">{{ __('fields_web.Navbar.service') }}</a></li>
            <li><a href="{{ route('abouthr') }}">{{ __('fields_web.Navbar.about_us') }}</a></li>
            <li><a href="{{ route('contacthr') }}">{{ __('fields_web.Navbar.contact_us') }}</a></li>
        </ul>
        <!--foote_bottom_ul_amrc ends here-->

        <ul class="social_footer_ul">
            <li><a href="https://www.facebook.com/worktimeym/"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="https://twitter.com/worktim43494692?s=09"><i class="fab fa-twitter"></i></a></li>
            <li><a href="https://instagram.com/work_timeym?igshid=caft2w76jz6l"><i class="fab fa-instagram"></i></a></li>
        </ul>
        <!--social_footer_ul ends here-->
    </div>

    <button class="shadow-lg  sm-white" onclick="topFunction()" id="myBtn" title="Go to top"><i
            class=" fa fa-angle-double-up"></i></button>
</footer>

<div class="container-fluid ">
    <div class="row">
        <div class='col-12 my-2' align="center">
            <span style=""> {{ __('fields_web.Footer.allrights') }} </span>
        </div>
    </div>
</div>



<!--footer -->
{{-- <footer style="  position: absolute;
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
</footer> --}}

<script>
    //Get the button
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

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
    window.onscroll = function() {
        myFunction()
    };

    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;
    var logo = document.getElementById("logo");
    var logo2 = document.getElementById("logo2");
    var navbar = document.getElementById("navbar");
    var nav = document.getElementsByClassName("nav-link")

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
            navbar.classList.add("navbar-light");
            navbar.classList.remove("navbar-dark");
            // header.style.borderBottomStyle = "solid";
            //  navbar.style.marginLeft = "100px";
            logo.style.display = "block";
            logo2.style.display = "none";
        } else {
            header.classList.remove("sticky");
            navbar.classList.add("navbar-dark");
            navbar.classList.remove("navbar-light");
            //  navbar.style.marginLeft = "500px";
            logo.style.display = "none";
            logo2.style.display = "block";
        }
    }

</script>
