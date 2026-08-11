<div class="navbar @if(($configData['isNavbarFixed'])=== true){{'navbar-fixed'}} @endif">
  <nav
    class="{{$configData['navbarMainClass']}} @if($configData['isNavbarDark']=== true) {{'navbar-dark'}} @elseif($configData['isNavbarDark']=== false) {{'navbar-light'}} @elseif(!empty($configData['navbarBgColor'])) {{$configData['navbarBgColor']}} @else {{$configData['navbarMainColor']}} @endif">
    <div class="nav-wrapper">
      <div class="header-search-wrapper hide-on-med-and-down">
        <i class="material-icons">search</i>

        <input class="header-search-input z-depth-2" id="main-search" type="text" name="Search" placeholder="Search"
          data-search="template-list" autocomplete="false" >

        <ul class="search-list collection search-result display-none" style="color: transparent;">
        </ul>
        <!-- search ul  -->
        <ul class="display-none" id="default-search-main">
            <!-- <li class="auto-suggestion search-result" id="search">

            </li> -->
        </ul>
        <ul class="display-none" id="page-search-title">
          <li class="auto-suggestion search-result" id="search2">
          </li>
        </ul>
      </div>
      <ul class="navbar-list right">
        <li class="dropdown-language">
          <a class="waves-effect waves-block waves-light translation-button" href="#"
            data-target="translation-dropdown">
            <span class="flag-icon flag-icon-gb">ffffffff</span>
          </a>
        </li>
        <li class="hide-on-med-and-down">
          <a class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);">
            <i class="material-icons">settings_overscan</i>
          </a>
        </li>
        <li class="hide-on-large-only search-input-wrapper">
          <a class="waves-effect waves-block waves-light search-button" href="javascript:void(0);">
            <i class="material-icons">search</i>
          </a>
        </li>
        <!-- <li>
          <a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);"
            data-target="notifications-dropdown">
            <i class="material-icons">notifications_none<small class="notification-badge">5</small></i>
          </a>
        </li> -->
        <li>
          <a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);"
            data-target="profile-dropdown">
            <span class="avatar-status avatar-online">
              <span class="material-icons">format_indent_increase</span>
            </span>
          </a>
        </li>
        <!-- <li>
          <a class="waves-effect waves-block waves-light sidenav-trigger" href="#" data-target="slide-out-right">
            <i class="material-icons">format_indent_increase</i>
          </a>
        </li> -->
      </ul>
      <!-- translation-button-->
      <ul class="dropdown-content" id="translation-dropdown">
        <li class="dropdown-item">
          <a class="grey-text text-darken-1" href="{{url('lang/en')}}" data-language="en">
            <i class="flag-icon flag-icon-gb"></i>
            English
          </a>
        </li>
        <li class="dropdown-item">
          <a class="grey-text text-darken-1" href="{{url('lang/fr')}}" data-language="fr">
            <i class="flag-icon flag-icon-fr"></i>
            French
          </a>
        </li>
        <li class="dropdown-item">
          <a class="grey-text text-darken-1" href="{{url('lang/pt')}}" data-language="pt">
            <i class="flag-icon flag-icon-pt"></i>
            Portuguese
          </a>
        </li>
        <li class="dropdown-item">
          <a class="grey-text text-darken-1" href="{{url('lang/de')}}" data-language="de">
            <i class="flag-icon flag-icon-de"></i>
            German
          </a>
        </li>
      </ul>
      <!-- notifications-dropdown-->
      <ul class="dropdown-content" id="notifications-dropdown">
        <li>
          <h6>NOTIFICATIONS<span class="new badge">5</span></h6>
        </li>
        <li class="divider"></li>
        <li>
          <a class="black-text" href="javascript:void(0)">
            <span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span>
            A new order has been placed!
          </a>
          <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
        </li>
        <li>
          <a class="black-text" href="javascript:void(0)">
            <span class="material-icons icon-bg-circle red small">stars</span>
            Completed the task
          </a>
          <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
        </li>
        <li>
          <a class="black-text" href="javascript:void(0)">
            <span class="material-icons icon-bg-circle teal small">settings</span>
            Settings updated
          </a>
          <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
        </li>
        <li>
          <a class="black-text" href="javascript:void(0)">
            <span class="material-icons icon-bg-circle deep-orange small">today</span>
            Director meeting started
          </a>
          <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
        </li>
        <li>
          <a class="black-text" href="javascript:void(0)">
            <span class="material-icons icon-bg-circle amber small">trending_up</span>
            Generate monthly report
          </a>
          <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
        </li>
      </ul>
      <!-- profile-dropdown-->
      <ul class="dropdown-content" id="profile-dropdown">
        <li class="<?php echo ((Auth::user()->type == 1)? '':'hide'); ?>">
          <a class="grey-text text-darken-1" href="{{asset('page-users-list')}}">
            <i class="material-icons">person_outline</i>
            Users
          </a>
        </li>
        <!-- <li>
          <a class="grey-text text-darken-1" href="{{asset('app-chat')}}">
            <i class="material-icons">chat_bubble_outline</i>
            Chat
          </a>
        </li>
        <li>
          <a class="grey-text text-darken-1" href="{{asset('page-faq')}}">
            <i class="material-icons">help_outline</i>
            Help
          </a>
        </li>
        <li class="divider"></li>
        <li>
          <a class="grey-text text-darken-1" href="{{asset('user-lock-screen')}}">
            <i class="material-icons">lock_outline</i>
            Lock
          </a>
        </li> -->
        <li>
          <a class="grey-text text-darken-1" href="{{asset('logout')}}">
            <i class="material-icons">keyboard_tab</i>
            Logout 
          </a>
        </li>
      </ul>
    </div>
    <nav class="display-none search-sm">
      <div class="nav-wrapper">
        <form id="navbarForm">
          <div class="input-field search-input-sm">
            <input class="search-box-sm mb-0" type="search" required="" placeholder='Search' id="main-search-mobile" 
              data-search="template-list">
            <label class="label-icon" for="search">
              <i class="material-icons search-sm-icon">search</i>
            </label>
            <i class="material-icons search-sm-close">close</i>
            <!-- <ul class="search-list collection search-list-sm display-none"></ul> -->
            <!-- <ul class="search-list collection search-result-mobile display-none">
            </ul> -->
            <!-- search ul  -->
            <!-- <ul class="search-list collection search-result-mobile display-none">
                </ul> -->
                <!-- search ul  -->
                <div class="" id="default-search-main">
                    <ul class=" search-result-mobile" id="search">

                    </ul>
              </div>
                <ul class="display-none" id="page-search-title">
                </ul>
          </div>
        </form>
      </div>
    </nav>
  </nav>
</div>

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
  $("#main-search").keyup(function(){
    var key_word = document.getElementById("main-search").value; 
    $.ajax({
    type: "get",
    url: '/search/'+ key_word,
    // data:  $("#add-treatment-record-form").serialize(),
    success: function (data) {
      $(".auto-suggestion.search-result").html(data.search_html);
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data.success);

    },
    });
  });
});
</script> -->