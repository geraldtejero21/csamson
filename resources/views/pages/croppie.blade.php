
{{-- layout extend --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','App Invoice List')
{{-- vendor style --}}
@section('css-style')
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/custom/custom.css')); ?>">
@endsection
{{-- vendor styles --}}
@section('vendor-style')

  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/croppie/croppie.min.css')); ?>">
  <script src="{{asset('js/croppie/jquery.min.js')}}"></script>
  <script src="{{asset('js/croppie/croppie.js')}}"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">



</head>
<div id="main">
  <div class="container page-upload-profile-pic">
    <div class="panel panel-info">
      <div class="panel-body">
        <div class="row">
         
          <div class="col m4 xl4 s12" style="padding:5%;">
          <strong>Select image to crop:</strong>
          <input type="file" id="image" accept="image/*" required>
         
          </div>
           <div class="col m8 xl4 s12 text-center">
          <div id="upload-demo"></div>
          <button class="btn btn-primary btn-block upload-image" style="margin-top:2%">Save</button>
          </div>
          <!-- <div class="col m12 xl4">
           <div id="preview-crop-image" class="d-none" style="background:red;width:300px;padding:50px 50px;height:300px;background: white;"></div>
          </div> -->
        </div>

      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
$( document ).ready(function() {
  var isiPad = navigator.userAgent.indexOf('iPad') != -1;
  var ua = navigator.userAgent;
  var isiPad = /iPad/i.test(ua);
  if (isiPad) {
  $(window).on('load orientationchange', function(event) {
      if(window.innerHeight > window.innerWidth){
        $(".leftside-navigation").css("overflow", "scroll");
        $(".leftside-navigation").css("transform", " translateX(-105%)");
        $(".leftside-navigation").css("-webkit-transform", " translateX(-105%)");
      } else {
        $(".leftside-navigation").css("overflow", "scroll");
        $(".leftside-navigation").css("transform", " translateX(0%)");
        $(".leftside-navigation").css("-webkit-transform", " translateX(0%)");
      }
  });
  }
  $("body").addClass("mh-250");
    $(".content-wrapper-before").addClass("d-none");

});

var resize = $('#upload-demo').croppie({
    enableExif: true,
    enableOrientation: true,    
    viewport: { // Default { width: 100, height: 100, type: 'square' } 
        width: 400,
        height: 400,
        type: 'circle' //square
    },
    boundary: {
        width: 400,
        height: 400
    }
});


$('#image').on('change', function () { 
  var reader = new FileReader();
    reader.onload = function (e) {
      resize.croppie('bind',{
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
});


$('.upload-image').on('click', function (ev) {
  resize.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (img) {
    var pathArray = window.location.pathname.split('/');
    var patient_id = pathArray[3];
    $.ajax({
      url: "{{route('upload-image')}}",
      type: "POST",
      data: { "_token": "{{ csrf_token() }}","image":img,"patient_id":patient_id},
      success: function (data) {
        html = '<img src="' + img + '" />';
        $("#preview-crop-image").html(html);
        $("#preview-crop-image").removeClass("d-none");
        var backLocation = document.referrer;
          if (backLocation) {
              if (backLocation.indexOf("?") > -1) {
                  backLocation += "?upload_pic_status=1";
              } else {
                  backLocation += "?upload_pic_status=1";
              }
              window.location.assign(backLocation);
          }
      
      }
    });
  });
});


</script>


</body>
</html>