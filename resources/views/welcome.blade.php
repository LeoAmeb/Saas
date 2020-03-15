

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>
            Nutri Saludable
         </title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            
  
            html, body {
                background: url('../imagenes/vegetable-salad-in-whit-plate-on-wooden-table.jpg') no-repeat center center fixed;
                width:100%;
                height: 600px;
                color: #fff;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                text-transform: uppercase

            }

            .full-height {
                height: 100vh;

            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                font: 14.5em/1 Open Sans, Impact;
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }


                        /* Main styles */
            @import url(https://fonts.googleapis.com/css?family=Open+Sans:800);

            .text--transparent {
              fill: transparent;
            }

            .anim-shape {
              -webkit-transform-origin: 0x 150px;
              -ms-transform-origin: 0x 150px;
              transform-origin: 0x 150px;
              -webkit-transform: scale(0, 1) translate(0, 0);
              -ms-transform: scale(0, 1) translate(0, 0);
              transform: scale(0, 1) translate(0, 0);
              -webkit-animation: moving-panel 3s infinite alternate;
              animation: moving-panel 40s infinite alternate;
            }

            .colortext .anim-shape:nth-child(1) {
              fill: #fff;
            }

            .colortext .anim-shape:nth-child(2) {
              fill: #fff;
            }

            .colortext .anim-shape:nth-child(3) {
              fill: #fff;
            }

            .colortext .anim-shape:nth-child(4) {
              fill: #fff;
            }

            .colortext .anim-shape:nth-child(5) {
              fill: #fff;
            }

            .shadow {
              -webkit-transform: translate(10px, 10px);
              -ms-transform: translate(10px, 10px);
              transform: translate(10px, 10px);
            }

            .anim-shape--shadow {
              fill: #000;
              fill-opacity: .2;
            }

            @-webkit-keyframes moving-panel {
              100% {
                -webkit-transform: scale(1, 1) translate(20px, 0);
                transform: scale(1, 1) translate(20px, 0);
              }
            }

            @keyframes moving-panel {
              100% {
                -webkit-transform: scale(1, 1) translate(20px, 0);
                transform: scale(1, 1) translate(20px, 0);
              }
            }







    </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <!--<a href="{{ route('register') }}">Register</a>-->
                    @endauth
                </div>
            @endif

            

            <div class="content">
                <div class="title m-b-md">
                   <svg viewBox="0 0 800 300">

                 <symbol id="s-text">
                    <text text-anchor="middle"
                          x="50%"
                          y="50%"
                          dy=".35em"
                          class="text--line"
                          >
                      Text
                    </text>    
                  </symbol>

              <!-- Clippath  with text -->
              <clippath id="cp-text" >
                <text text-anchor="middle"
                      x="50%"
                      y="50%"
                      dy=".35em"
                      class="text--line"

                      >
                  Nutri Saludable
                </text>
              </clippath>

              <!-- Group for shadow -->
              <g clip-path="url(#cp-text)" class="shadow">
                <rect
                      width="100%"
                      height="100%"         
                      class="anim-shape anim-shape--shadow"
                      ></rect>
              </g>

              <!-- Group with clippath for text-->
              <g clip-path="url(#cp-text)" class="colortext">
                <!-- Animated shapes inside text -->
                <rect
                      width="100%"
                      height="100%"         
                      class="anim-shape"
                      ></rect>
                <rect
                      width="80%"
                      height="100%"         
                      class="anim-shape"
                      ></rect>
                <rect
                      width="60%"
                      height="100%"         
                      class="anim-shape"
                      ></rect>
                <rect
                      width="40%"
                      height="100%"         
                      class="anim-shape"
                      ></rect>
                <rect
                      width="20%"
                      height="100%"         
                      class="anim-shape"
                      ></rect>
              </g>

              

            </svg>
                </div>

            </div>
        </div>
    </body>
</html>
