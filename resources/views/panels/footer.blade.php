<!-- BEGIN: Footer-->
<div class="progress reloader-wrapper d-none">
      <div class="indeterminate"></div>
    </div>

    
  <div class="preloader-wrapper active d-none">
    <div class="spinner-layer spinner-red-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
  </div>
<footer
  class="{{$configData['mainFooterClass']}} @if($configData['isFooterFixed']=== true){{'footer-fixed'}}@else {{'footer-static'}} @endif @if($configData['isFooterDark']=== true) {{'footer-dark'}} @elseif($configData['isFooterDark']=== false) {{'footer-light'}} @else {{$configData['mainFooterColor']}} @endif">
  <div class="footer-copyright">
    <div class="container">
      <span>&copy; 2021 <a href=""
          target="_blank"></a> All rights reserved.
      </span>
      <span class="right hide-on-small-only">
        <!-- Design and Developed by <a href="https://pixinvent.com/">PIXINVENT</a> -->
      </span>
    </div>
  </div>
</footer>

<!-- END: Footer-->