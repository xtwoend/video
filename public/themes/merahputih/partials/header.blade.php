<header>
      <div class="container">
        <div class="row">

          <div id="logo" class="col-xs-6 col-sm-12 col-md-3 text-center-sm text-left-xs">
            <a href="#">{{ HTML::image('assets/img/logo.png', 'logo', array( 'class'=>'img-responsive logo','alt'=>'logo')) }}</a>
          </div> <!-- /logo -->

          <div id="menu" class="col-xs-6 col-sm-12 col-md-9">
            <nav class="navbar main-menu" role="navigation">
              <!-- Menu button for mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">menu</button>
              </div>
          
              <!-- Navigation links -->
              <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-right navbar-nav">
                  <li class="active"><a class="smoothScroll" href="#highlighted">Home</a></li>
                  <li><a class="smoothScroll" href="#about">TV</a></li>
                  <li><a class="smoothScroll" href="#services">Movies</a></li>
                  <li><a class="smoothScroll" href="#portfolio">Channel</a></li>
                  <li><a class="smoothScroll" href="#team">Competition</a></li>
                  @if(!$auth)  
                  <li class="dropdown">
                      <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown"> 
                        login
                      <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('login') }}">login</a></li>
                      </ul>
                  </li>

                  @else
                    <li class="dropdown">
                      <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown"> 
                        {{ $auth->fisrt_name }} {{ $auth->last_name }}
                      <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('upload') }}">Upload</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="">Settings</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="">Help</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="">Report</a></li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="">Logout</a></li>
                      </ul>
                    </li>
                  @endif
                </ul>
              </div> <!-- /navbar-collapse -->
            </nav>
          </div> <!-- /menu -->

        </div> <!-- /row -->
      </div> <!-- container -->
    </header>