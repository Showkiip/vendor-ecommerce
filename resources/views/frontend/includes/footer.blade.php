<footer id="puls-footer" class="puls-footer">
  <div class="puls-footer-container">
    <div class="links-container">
      <div class="col footer-items">
        <input type="checkbox" id="company-footer-toggle" style="display:none">
        <div class="footer-links" id="company-footer-links">
          <a class="soft-body" href="">About Us</a>
            
          <a class="soft-body" href="{{route('faq')}}" target="">FAQs</a>

         
        </div>
        <label class="col-label h3-headline" for="company-footer-toggle">Company<img class="arrow-toggle" src="https://d7gh5vrfihrl.cloudfront.net/website/arrow.svg"></label></div>
        {{-- <div class="col footer-items"><input type="checkbox" id="resources-footer-toggle" style="display:none"><div class="footer-links" id="resources-footer-links">
          <a class="soft-body" href="https://info.puls.com/resources/tv-mounting">TV Mounting</a>
          <a class="soft-body" href="https://info.puls.com/resources/garage-doors">Garage Doors</a>
          <a class="soft-body" href="https://info.puls.com/resources/appliances">Appliances</a>
          <a class="soft-body" href="https://info.puls.com/resources/refrigerator">Refrigerators</a>
          <a class="soft-body" href="https://info.puls.com/resources/dishwasher">Dishwashers</a>
          <a class="soft-body" href="https://info.puls.com/resources/oven-and-stove">Ovens &amp; Stoves</a><a class="soft-body" href="https://info.puls.com/resources/washing-machine">Washing Machines</a><a class="soft-body" href="https://info.puls.com/resources/dryer">Dryers</a></div><label class="col-label h3-headline" for="resources-footer-toggle">Resources<img class="arrow-toggle" src="https://d7gh5vrfihrl.cloudfront.net/website/arrow.svg"></label>
        </div> --}}
          {{-- <div class="col footer-items"><input type="checkbox" id="partnerships-footer-toggle" style="display:none"><div class="footer-links" id="partnerships-footer-links"><a class="soft-body" href="/tcl">TCL</a><a class="soft-body" href="/simplisafe">SimpliSafe</a><a class="soft-body" href="/hisense">Hisense</a><a class="soft-body" href="/business">Puls for business</a></div><label class="col-label h3-headline" for="partnerships-footer-toggle">Partnerships<img class="arrow-toggle" src="https://d7gh5vrfihrl.cloudfront.net/website/arrow.svg"></label>
        </div> --}}
        <div class="col footer-items">
          <input type="checkbox" id="legals-footer-toggle" style="display:none">
          <div class="footer-links" id="legals-footer-links"><a class="soft-body" href="/privacy-policy" target="">
          Privacy</a><a class="soft-body" href="/terms" target="">Terms</a><a class="soft-body" href="/guarantee" target="">Return Policy and Repair Guarantee</a></div>
          <label class="col-label h3-headline" for="legals-footer-toggle">Legals<img class="arrow-toggle" src="https://d7gh5vrfihrl.cloudfront.net/website/arrow.svg"></label></div></div><div class="stay-in-touch"><p class="subscribe-label">Stay Connected</p>
          <div class="hs-signup-container">
  <form class="subscribe_form" action="{{ route('subcribe.store') }}" method="POST">
    @csrf
  
            <div class="input-group">
               <input type="text" class="form-control" name="email" required placeholder="Enter your email">
               
               <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">subscribe</button>
               </span>
            </div>
           
          </form>
</div>
<div class="icon-container">
  <a class="footer-icon" style="background-image:url('https://d7gh5vrfihrl.cloudfront.net/website/badges/footer-icons/facebook.png')" href="https://www.facebook.com/pulsdotcom/" target="_blank"></a>
  <a class="footer-icon" style="background-image:url('https://d7gh5vrfihrl.cloudfront.net/website/badges/footer-icons/twitter.png')" href="https://twitter.com/pulscom" target="_blank"></a>
  <a class="footer-icon" style="background-image:url('https://d7gh5vrfihrl.cloudfront.net/website/badges/footer-icons/youtube.png')" href="https://www.youtube.com/channel/UCpXjcgaFLHsfrYSSFoi0vLw" target="_blank"></a>

</div>
<div class="clear-both"></div>
<label class="support-me">
  <a href="mailto:contact@cellcity.us?Subject=Help%20me" target="_top">contact@cellcity.us</a>
</label>
</div>
{{-- <div class="download-links">
  <div class="consumer-download-links">
    <a href="https://apps.apple.com/us/app/id1530724750">
      <img src="https://d7gh5vrfihrl.cloudfront.net/website/consumer/ios.png" alt="ios"></a>
      <a href="https://play.google.com/store/apps/details?id=com.puls.consumers">
        <img src="https://d7gh5vrfihrl.cloudfront.net/website/consumer/android.png" alt="ios">
      </a>
    </div>
  </div>
  <div id="footer-end-separetor"></div>
  <span id="copy-right-puls"></span><span id="copy-left-puls">© cellcity 2021</span> --}}
</div>
</footer>


<!--Mian footer-->
<!-- <section class="main-footer">
 <div class="auto-container">
   <div class="row clearfix">

     <div class="big-column col-md-6 col-sm-12 col-xs-12">
       <div class="row clearfix">

        <div class="footer-column col-md-6 col-sm-6 col-xs-12">
          <div class="footer-widget links-widget nav-widget">
            <h2>Navigation</h2>
            <ul>
             <li><a href="index-2.html">Home</a></li>
             <li><a href="about-us.html">About Us</a></li>
             <li><a href="services.html">Services</a></li>
             <li><a href="gallery.html">Gallery</a></li>
             <li><a href="blog.html">Blog</a></li>
             <li><a href="contact.html">Contact</a></li>
           </ul>
         </div>
       </div>
      <div class="footer-column col-md-6 col-sm-6 col-xs-12">
       <div class="footer-widget links-widget">
        <h2>OUR SERVICES</h2>
        <ul>
         <li><a href="blog-single.html">Phone Diagnosis</a></li>
         <li><a href="blog-single.html">Water Damaged Phone</a></li>
         <li><a href="blog-single.html">LCD Display Replacement</a></li>
         <li><a href="blog-single.html">Battery Replacement</a></li>
         <li><a href="blog-single.html">Data Recovery</a></li>
         <li><a href="blog-single.html">Ear Phone Jack Malfunction</a></li>
       </ul>
     </div>
   </div>
     </div>
   </div>

   <div class="big-column col-md-6 col-sm-12 col-xs-12">
     <div class="row clearfix">

   <div class="footer-column col-md-6 col-sm-6 col-xs-12">

    <div class="footer-widget get-touch-widget">
      <h2>GET IN TOUCH</h2>
      <ul>
        <li><span class="icon fa fa-map-marker"></span>123 Western Street, Sydney, Australia</li>
        <li><span class="icon fa fa-envelope-o"></span>info@cellcity.com</li>
        <li><span class="icon fa fa-phone"></span>+456 789 0321</li>
        <li><span class="icon fa fa-clock-o"></span>All Days 9:00 to 18:00</li>
       </ul>
     </div>
   </div>
   <div class="footer-column col-md-6 col-sm-6 col-xs-12">

      <div class="footer-widget logo-widget">
        <h2>STAY Connected</h2>

        <form class="subscribe_form">
            <div class="input-group">
               <input type="text" class="form-control" name="email" placeholder="Enter your email">
               <span class="input-group-btn">
                    <button class="btn btn-default" type="button">subscribe</button>
               </span>
            </div>
          </form>
        <ul class="social-links-one">
          <li><a class="fa fa-facebook" href="#"></a></li>
          <li><a class="fa fa-twitter" href="#"></a></li>
          <li><a class="fa fa-google-plus" href="#"></a></li>
          <li><a class="fa fa-pinterest-p" href="#"></a></li>
          <li><a class="fa fa-rss" href="#"></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

</div>

<div class="footer-bottom">
 <div class="auto-container text-left">

   <div class="copyright">Copyright &copy;; 2021 Cell City Phone Repair. All Rights Reserved</div>
 </div>
</div>

</div>
</section> -->

