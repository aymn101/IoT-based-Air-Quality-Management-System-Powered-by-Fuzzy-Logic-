@extends('layouts.app')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" />

<style>
    @import url(https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);
    @import url(https://fonts.googleapis.com/css?family=Concert+One);

    body {
        background-color: #557270;
    }

    .row {
        display: flex;
        margin: auto;
    }

    .sub-row {
        width: 50%;
    }

    .box {
        background: red;
        height: 25vh;
        margin: 14px 7px;
        background: cadetblue;
        padding: 20px;
    }

    h4 {
        margin: 0;
    }

    .box-a {
        background: rgba(41, 41, 41, 0.7);
        color: #ddd;
        padding: 20px 20px 20px 20px;
        position: relative;
    }

    .box-a:before,
    .box-b:before {
        content: "";
        position: absolute;
        top: 0%;
        left: 0%;
        width: 0px;
        height: 0px;
        border-bottom: 15px solid #191919;
        border-left: 15px solid #323232;
        /*Set to background color, not transparent!*/
        -webkit-box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.2);
        box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.2);
        /* Firefox 3.0 damage limitation */
        display: block;
        width: 0;
    }

    .box-a.rounded,
    .box-b.rounded {
        -moz-border-radius: 5px 0 5px 5px;
        border-radius: 5px 0 5px 5px;
    }

    .box-a.rounded:before,
    .box-b.rounded:before {
        border-width: 8px;
        border-color: #323232 #323232 transparent transparent;
        -moz-border-radius: 0 0 0 5px;
        border-radius: 0 0 0 5px;
    }

    .box-a h4 {
        position: relative;
        font-size: 25px;
        display: inline-block;
        padding: 0;
        text-align: left;
        padding-bottom: 10px;
        margin: 0;
        font-family: 'Concert One', cursive;
        color: cornsilk;

    }

    .box-a .p-temp {
        position: relative;
        left: 48%;
    }

    .box-a .p-hum {
        position: relative;
        left: 53%;
    }

    .box-flex {
        display: flex;
    }

    .text {
        padding: 16px;
    }

    .value {
        text-align: center;
    }

    .value p {
        font-size: 23px;
        margin: 0;
        font-weight: 600;
        position: relative;
        left: 17%;
    }

    .sun {
        width: 2.5em;
        height: 2.5em;
        margin: -1.25em;
        background: currentColor;
        border-radius: 50%;
        box-shadow: 0 0 0 0.375em orange;
        -webkit-animation: spin 12s infinite linear;
        animation: spin 12s infinite linear;
    }


    .rays {
        position: absolute;
        top: -2em;
        left: 50%;
        display: block;
        width: 0.375em;
        height: 1.125em;
        margin-left: -0.1875em;
        background: yellow;
        border-radius: 0.25em;
        box-shadow: 0 5.375em yellow;
    }

    .rays:before,
    .rays:after {
        content: '';
        position: absolute;
        top: 0em;
        left: 0em;
        display: block;
        width: 0.375em;
        height: 1.125em;
        -webkit-transform: rotate(60deg);
        transform: rotate(60deg);
        -webkit-transform-origin: 50% 3.25em;
        transform-origin: 50% 3.25em;
        background: yellow;
        border-radius: 0.25em;
        box-shadow: 0 5.375em yellow;
    }

    .rays:before {
        -webkit-transform: rotate(120deg);
        transform: rotate(120deg);
    }

    .sunny {
        position: absolute;
        top: 45%;
        left: 24%;
    }

    .cloudy {
        position: absolute;
        top: 45%;
        left: 24%;
    }

    .cloud {
        position: absolute;
        z-index: 1;
        width: 3.6875em;
        height: 3.6875em;
        margin: -1.84375em;
        background: currentColor;
        border-radius: 50%;
        box-shadow:
            -2.1875em 0.6875em 0 -0.6875em,
            2.0625em 0.9375em 0 -0.9375em,
            0 0 0 0.375em lightgray,
            -2.1875em 0.6875em 0 -0.3125em lightgray,
            2.0625em 0.9375em 0 -0.5625em lightgray;
    }

    .cloud:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: -0.5em;
        display: block;
        width: 4.5625em;
        height: 1em;
        background: currentColor;
        box-shadow: 0 0.4375em 0 -0.0625em lightgray;
    }

    .cloud:nth-child(2) {
        z-index: 0;
        background: #fff;
        box-shadow:
            -2.1875em 0.6875em 0 -0.6875em #fff,
            2.0625em 0.9375em 0 -0.9375em #fff,
            0 0 0 0.375em #fff,
            -2.1875em 0.6875em 0 -0.3125em #fff,
            2.0625em 0.9375em 0 -0.5625em #fff;
        opacity: 0.3;
        -webkit-transform: scale(0.5) translate(6em, -3em);
        transform: scale(0.5) translate(6em, -3em);
        -webkit-animation: cloud 4s linear infinite;
        animation: cloud 4s linear infinite;
    }

    .cloud:nth-child(2):after {
        background: #fff;
    }

    .flake:before,
    .flake:after {
        content: '\2745';
        position: absolute;
        top: 50%;
        left: 50%;
        margin: -1.025em 0 0 -1.0125em;
        color: #fff;
        opacity: 0.2;
        -webkit-animation: spin 8s linear infinite reverse;
        animation: spin 8s linear infinite reverse;
    }

    .flake:after {
        margin: 0.125em 0 0 -1em;
        font-size: 1.5em;
        opacity: 0.4;
        -webkit-animation: spin 14s linear infinite;
        animation: spin 14s linear infinite;
    }

    .flake:nth-child(2):before {
        margin: -0.5em 0 0 0.25em;
        font-size: 1.25em;
        opacity: 0.2;
        -webkit-animation: spin 10s linear infinite;
        animation: spin 10s linear infinite;
    }

    .flake:nth-child(2):after {
        margin: 0.375em 0 0 0.125em;
        font-size: 2em;
        opacity: 0.4;
        -webkit-animation: spin 16s linear infinite reverse;
        animation: spin 16s linear infinite reverse;
    }

    @-webkit-keyframes cloud {
        0% {
            opacity: 0;
        }

        50% {
            opacity: 0.3;
        }

        100% {
            opacity: 0;
            -webkit-transform: scale(0.5) translate(-200%, -3em);
            transform: scale(0.5) translate(-200%, -3em);
        }
    }

    @keyframes cloud {
        0% {
            opacity: 0;
        }

        50% {
            opacity: 0.3;
        }

        100% {
            opacity: 0;
            -webkit-transform: scale(0.5) translate(-200%, -3em);
            transform: scale(0.5) translate(-200%, -3em);
        }
    }

    .fa-home {
        &:after {
            animation: fa-home-smoke 2s infinite;
            background-color: rgba(0, 0, 0, 0.3);
            border-radius: 0.025em;
            content: '';
            display:block;
            font-size:500%;
            height:0.05em;
            left:0.7em;
            position:absolute;
            top:0.2em;
            width:0.05em;
        }

        &:before {
            font-size: 500%;
        }
    }

    @keyframes fa-home-smoke {
        0% {
            left: 0.68em;
            opacity: 1;
            top: 0.2em;
        }

        20% {
            border-radius: 0.05em;
            height: 0.1em;
            left: 0.68em;
            opacity: 0.8;
            top: 0.1em;
            width: 0.1em;
        }

        40% {
            left: 0.71em;
            top: 0em;
        }

        55% {
            left: 0.68em;
            top: -0.03em;
        }

        100% {
            left: 0.65em;
            opacity: 0;
            top: -0.2em;
        }
    }

</style>
<style>
    body {
        position: relative;
        overflow-x: hidden;
    }

    body,
    html {
        height: 100%;
    }

    .nav .open>a,
    .nav .open>a:hover,
    .nav .open>a:focus {
        background-color: transparent;
    }

    /*-------------------------------*/
    /*           Wrappers            */
    /*-------------------------------*/

    #wrapper {
        padding-left: 0;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    #wrapper.toggled {
        padding-left: 220px;
    }

    #sidebar-wrapper {
        z-index: 1000;
        left: 220px;
        width: 0;
        height: 100%;
        margin-left: -220px;
        overflow-y: auto;
        overflow-x: hidden;
        background: #1a1a1a;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    #sidebar-wrapper::-webkit-scrollbar {
        display: none;
    }

    #wrapper.toggled #sidebar-wrapper {
        width: 220px;
    }

    #page-content-wrapper {
        width: 100%;
        padding-top: 70px;
    }

    #wrapper.toggled #page-content-wrapper {
        position: absolute;
        margin-right: -220px;
    }

    /*-------------------------------*/
    /*     Sidebar nav styles        */
    /*-------------------------------*/
    .navbar {
        padding: 0;
    }

    .sidebar-nav {
        position: absolute;
        top: 0;
        width: 220px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .sidebar-nav li {
        position: relative;
        line-height: 20px;
        display: inline-block;
        width: 100%;
    }

    .sidebar-nav li:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        height: 100%;
        width: 3px;
        background-color: #1c1c1c;
        -webkit-transition: width .2s ease-in;
        -moz-transition: width .2s ease-in;
        -ms-transition: width .2s ease-in;
        transition: width .2s ease-in;

    }

    .sidebar-nav li:hover {
        background: skyblue !important;
        border-radius: 10px;
        margin-left: 10px;
        margin-right: 10px;
    }

    .sidebar-nav li:hover:before,
    .sidebar-nav li.open:hover:before {
        width: 100%;
        -webkit-transition: width .2s ease-in;
        -moz-transition: width .2s ease-in;
        -ms-transition: width .2s ease-in;
        transition: width .2s ease-in;

    }

    .sidebar-nav li a {
        display: block;
        color: #ddd;
        text-decoration: none;
        padding: 10px 15px 10px 30px;
    }

    .sidebar-nav li a:hover,
    .sidebar-nav li a:active,
    .sidebar-nav li a:focus,
    .sidebar-nav li.open a:hover,
    .sidebar-nav li.open a:active,
    .sidebar-nav li.open a:focus {
        color: #fff;
        text-decoration: none;
        background-color: transparent;
    }

    .sidebar-header {
        text-align: center;
        font-size: 20px;
        position: relative;
        width: 100%;
        display: inline-block;
    }

    .sidebar-brand {
        height: 65px;
        position: relative;
        background: #212531;
        background: linear-gradient(to right bottom, #2f3441 50%, #212531 50%);
        padding-top: 1em;
    }

    .sidebar-brand a {
        color: #ddd;
    }

    .sidebar-brand a:hover {
        color: #fff;
        text-decoration: none;
    }

    .dropdown-header {
        text-align: center;
        font-size: 1em;
        color: #ddd;
        background: #212531;
        background: linear-gradient(to right bottom, #2f3441 50%, #212531 50%);
    }

    .sidebar-nav .dropdown-menu {
        position: relative;
        width: 100%;
        padding: 0;
        margin: 0;
        border-radius: 0;
        border: none;
        background-color: #222;
        box-shadow: none;
    }

    .dropdown-menu.show {
        top: 0;
    }

    /*Fontawesome icons*/
    .nav.sidebar-nav li a::before {
        font-family: fontawesome;
        content: "\f12e";
        vertical-align: baseline;
        display: inline-block;
        padding-right: 5px;
    }

    a[href*="#home"]::before {
        content: "\f015" !important;
    }

    a[href*="#about"]::before {
        content: "\f129" !important;
    }

    a[href*="#events"]::before {
        content: "\f073" !important;
    }

    a[href*="#events"]::before {
        content: "\f073" !important;
    }

    a[href*="#team"]::before {
        content: "\f0c0" !important;
    }

    a[href*="#works"]::before {
        content: "\f0b1" !important;
    }

    a[href*="#pictures"]::before {
        content: "\f03e" !important;
    }

    a[href*="#videos"]::before {
        content: "\f03d" !important;
    }

    a[href*="#books"]::before {
        content: "\f02d" !important;
    }

    a[href*="#art"]::before {
        content: "\f1fc" !important;
    }

    a[href*="#awards"]::before {
        content: "\f02e" !important;
    }

    a[href*="#services"]::before {
        content: "\f013" !important;
    }

    a[href*="#contact"]::before {
        content: "\f086" !important;
    }

    a[href*="#followme"]::before {
        content: "\f099" !important;
        color: #0084b4;
    }

    /*-------------------------------*/
    /*       Hamburger-Cross         */
    /*-------------------------------*/

    .hamburger {
        position: fixed;
        top: 4px;
        z-index: 999;
        display: block;
        width: 32px;
        height: 32px;
        margin-left: 15px;
        background: transparent;
        border: none;
    }

    .hamburger:hover,
    .hamburger:focus,
    .hamburger:active {
        outline: none;
    }

    .hamburger.is-closed:before {
        content: '';
        display: block;
        width: 100px;
        font-size: 14px;
        color: #fff;
        line-height: 32px;
        text-align: center;
        opacity: 0;
        -webkit-transform: translate3d(0, 0, 0);
        -webkit-transition: all .35s ease-in-out;
    }

    .hamburger.is-closed:hover:before {
        opacity: 1;
        display: block;
        -webkit-transform: translate3d(-100px, 0, 0);
        -webkit-transition: all .35s ease-in-out;
    }

    .hamburger.is-closed .hamb-top,
    .hamburger.is-closed .hamb-middle,
    .hamburger.is-closed .hamb-bottom,
    .hamburger.is-open .hamb-top,
    .hamburger.is-open .hamb-middle,
    .hamburger.is-open .hamb-bottom {
        position: absolute;
        left: 0;
        height: 4px;
        width: 100%;
    }

    .hamburger.is-closed .hamb-top,
    .hamburger.is-closed .hamb-middle,
    .hamburger.is-closed .hamb-bottom {
        background-color: #1a1a1a;
    }

    .hamburger.is-closed .hamb-top {
        top: 5px;
        -webkit-transition: all .35s ease-in-out;
    }

    .hamburger.is-closed .hamb-middle {
        top: 50%;
        margin-top: -2px;
    }

    .hamburger.is-closed .hamb-bottom {
        bottom: 5px;
        -webkit-transition: all .35s ease-in-out;
    }

    .hamburger.is-closed:hover .hamb-top {
        top: 0;
        -webkit-transition: all .35s ease-in-out;
    }

    .hamburger.is-closed:hover .hamb-bottom {
        bottom: 0;
        -webkit-transition: all .35s ease-in-out;
    }

    .hamburger.is-open .hamb-top,
    .hamburger.is-open .hamb-middle,
    .hamburger.is-open .hamb-bottom {
        background-color: #1a1a1a;
    }

    .hamburger.is-open .hamb-top,
    .hamburger.is-open .hamb-bottom {
        top: 50%;
        margin-top: -2px;
    }

    .hamburger.is-open .hamb-top {
        -webkit-transform: rotate(45deg);
        -webkit-transition: -webkit-transform .2s cubic-bezier(.73, 1, .28, .08);
    }

    .hamburger.is-open .hamb-middle {
        display: none;
    }

    .hamburger.is-open .hamb-bottom {
        -webkit-transform: rotate(-45deg);
        -webkit-transition: -webkit-transform .2s cubic-bezier(.73, 1, .28, .08);
    }

    .hamburger.is-open:before {
        content: '';
        display: block;
        width: 100px;
        font-size: 14px;
        color: #fff;
        line-height: 32px;
        text-align: center;
        opacity: 0;
        -webkit-transform: translate3d(0, 0, 0);
        -webkit-transition: all .35s ease-in-out;
    }

    .hamburger.is-open:hover:before {
        opacity: 1;
        display: block;
        -webkit-transform: translate3d(-100px, 0, 0);
        -webkit-transition: all .35s ease-in-out;
    }

    /*-------------------------------*/
    /*            Overlay            */
    /*-------------------------------*/
    .row-1 {
        display: flex;
    }
    
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
.alarm-flex {
    display: flex;
    justify-content: space-around;
}
.water-card-1 {
    width: 47%;
    margin: 0 18px;
    padding: 20px 20px 20px 20px;
    text-align: center;
    font-family: 'Concert One';
}
.table {
    height: 46vh;
    overflow-y: auto;
    text-align: center;
}
.head-table, .table-head, .table {
    text-align: center;
}
.card-header, .table-width, .alarm-flex{
    text-align: center;
}
.table-head {
    background: #fff;
    margin: auto;
    width: 100%;
}
.table{
    width: 100%;
    margin: auto;
}
#tableTemp {
    width: 100%;
    background: #eaffea;
}
.box-shadow-1 {
    width: 70%;
    margin: auto;
    border: 1px solid;
    border-radius: 2px;
    box-shadow: 0 0 7px 1px #fbfbfb;
}
.card-header {
    font-size: 40px;
    font-family: cursive;
    font-weight: bold;
    text-shadow: 2px 2px #fafafa;
    margin-bottom: 26px;
    margin-top: 16px;
}
.on-off {
    width: 47%;
    margin: 0 18px;
    padding: 20px 20px 20px 20px;
    text-align: center;
    font-family: 'Concert One';
    background: #fff;
    border-radius: 4px;
}
.on-off-flex {
    display: flex;
}
</style>

                                              <div id="wrapper">
                                                <div class="overlay">
                                                  <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
                                                    <ul class="nav sidebar-nav">
                                                        <div class="sidebar-header">
                                                            <div class="sidebar-brand">
                                                                <img src="{{URL('images/Air.png')}}" style="width: 122px;">
                                                                <li><a href="test">Home</a></li>
                                                                <li><a href="GraphTemp">Tamperature Graph</a></li>
                                                                <li><a href="GraphHum">Humidity Graph</a></li>
                                                                <li><a href="GraphCO">CO Graph</a></li>
                                                                <li><a href="GraphCO2">CO2 Graph</a></li>

                                                            </div>
                                                        </div>
                                                    </ul>
                                                  </nav>
              
                                                  <div id="page-content-wrapper">
                                                      <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                                                          <span class="hamb-top"></span>
                                                          <span class="hamb-middle"></span>
                                                          <span class="hamb-bottom"></span>
                                                      </button>
                                                  </div>


                                                </div>
                                              </div>

                                              <div class="container">
                                                                      <div class="row">
                                                                          <div class="sub-row sub-row1">
                                                                            <div class="box temp box-a">
                                                                                <div class="icon cloudy">
                                                                                    <div class="cloud"></div>
                                                                                    <div class="cloud"></div>
                                                                                </div>
                                                                                <div class="text">
                                                                                    <h4 class="p-temp">Temperature</h4>
                                                                                    <div class="value">
                                                                                        <p><span class="temp_data" id="temp_data"></span></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="box hum box-a">
                                                                                <div class="icon sunny">
                                                                                    <div class="sun">
                                                                                        <div class="rays"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="text">
                                                                                    <h4 class="p-hum">Humidity</h4>
                                                                                    <div class="value">
                                                                                        <p><span class="" id="hum_data"></span></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                          </div>
                                                                        <div class="sub-row sub-row2">
                                                                          <div class="box co1 box-a box-flex">
                                                                              <div style="width: 37%;">
                                                                                  <i class="fa fa-fw fa-home"></i>
                                                                              </div>
                                                                              <div class="text">
                                                                                  <h4 class="p-temp">CO</h4>
                                                                                  <div class="value">
                                                                                      <p><span class="CO1_data" id="CO1_data"></span></p>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                          <div class="box co1 box-a box-flex">
                                                                            <div style="width: 37%;">
                                                                              <i class="fa fa-fw fa-home"></i>
                                                                           </div>
                                                                            <div class="text">
                                                                                <h4 class="p-temp">CO2</h4>
                                                                                <div class="value">
                                                                                    <p><span class="CO1_data" id="CO2_data"></span></p>
                                                                                </div>
                                                                            </div>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                      <div style="display: flex;">
                                                                      <div class="card water-card-1" >
        <div class="card-body">
            <div class="margin">
            <h4 class="card-title">Air Quality Condition</h4>
            Value = <span class="badge badge-info float-right" id="fuzzyFan"></span>
            </div>
        </div>
    </div>
    <div class="on-off">
    <p style="font-size: 23px;">Fan Control</p>
    <div class="on-off-flex">
    <div class="card-body d-flex justify-content-center align-items-center ">
        
        <form action="offfan" method="post">
            <input type="submit" value="SWITCH ON" class="btn btn-success">{{csrf_field()}}</form>
    </div>

    <div class="card-body d-flex justify-content-center align-items-center">
        <form action="onfan" method="post">
            <input type="submit" value="SWITCH OFF" class="btn btn-danger">{{csrf_field()}}</form>
    </div>
    </dvi>
  </div>
    </div>
                                                                      </div>
                                                                  </div>

              <div class="">
    <!--OPEN: Card 5-->
                      <div class="" style="">
        <!--TABLE OF ALERT-->
                            <div class="head-table">
                            <div class="card-header">Table of Alert<span class="badge badge-info float-right"></span></div>
                            </div>
                                <div class="">
                                            <div class="box-shadow-1" style="">
                  
                                                  <div class="table-head">
                                                        <div class="alarm-flex">
                                                            <p>Alarm Status</p>
                                                            <p>Date</p>
                                                        </div>
                                                    </div>
                                                  
                                                  <div class="table">
                                                        <table class="" id="tableTemp" style="">
                                                        
                                                        <tr  >
                                                        <td ></td>
                                                            <td></td>
                                                        </tr>
                                        

                                            
                                            
                                                    
                                                    </table>
                                            </div>
                                        

                                            
                                          
                                                    
                                        
                                    

                                    </div>
                                  </div>
                              </div>
                              
</div>
                        </div>
                    








<script>
    setInterval(ajaxCall, 500);

    function ajaxCall() {
        $.getJSON('/route/MQ135_route', function (blocksall) {
            var datas = blocksall.blocks.map(Number);
            datas = datas.reverse();
            // console.log(datas);

            var datasx = blocksall.blocks2.map(String);
            datasx = datasx.reverse();
            //console.log(datasx);

            var CO2_Value = datas[datas.length - 1].toFixed(2);
            document.getElementById("CO2_data").innerHTML = CO2_Value+ "ppm";
            //document.getElementById("CO2_data").style.color = "#8f0b24";

        });

        $.getJSON('/route/MQ7_route', function (blocksall) {
            var datas = blocksall.blocks.map(Number);
            datas = datas.reverse();
            // console.log(datas);

            var datasx = blocksall.blocks2.map(String);
            datasx = datasx.reverse();
            // console.log(datasx);

            var CO_Value = datas[datas.length - 1].toFixed(2);
            document.getElementById("CO1_data").innerHTML = CO_Value + "ppm";
           // document.getElementById("CO1_data").style.color = "#8f0b24";

        });

        $.getJSON('/route/Temp_route', function (blocksall) {
            var datas = blocksall.blocks.map(Number);
            datas = datas.reverse();
            //console.log(datas);

            var datasx = blocksall.blocks2.map(String);
            datasx = datasx.reverse();
            //console.log(datasx);

            var CO2_Value = datas[datas.length - 1].toFixed(2);
            document.getElementById("temp_data"). innerHTML = CO2_Value + "C";
           // document.getElementById("temp_data").style.color = "#8f0b24";

        });

        $.getJSON('/route/hum_route', function (blocksall) {
            var datas = blocksall.blocks.map(Number);
            datas = datas.reverse();
            // console.log(datas);

            var datasx = blocksall.blocks2.map(String);
            datasx = datasx.reverse();
            //console.log(datasx);

            var CO2_Value = datas[datas.length - 1].toFixed(2);
            document.getElementById("hum_data").innerHTML = CO2_Value;
           // document.getElementById("hum_data").style.color = "#8f0b24";

        });
    }

</script>
<script>
    $(document).ready(function () {
        var trigger = $('.hamburger'),
            overlay = $('.overlay'),
            isClosed = false;

        trigger.click(function () {
            hamburger_cross();
        });

        function hamburger_cross() {

            if (isClosed == true) {
                overlay.show();
                trigger.removeClass('is-open');
                trigger.addClass('is-closed');
                isClosed = false;
            } else {
                overlay.show();
                trigger.removeClass('is-closed');
                trigger.addClass('is-open');
                isClosed = true;
            }

        }

        $('[data-toggle="offcanvas"]').click(function () {
            $('#wrapper').toggleClass('toggled');
        });
    });

</script>


<script>
    console.log('here')

    Echo.channel('myapicontroller').listen('AimanM', (e) => {
        console.log('here2')
        console.log(e['Pred0']);

        let fuzzyResultElement = document.getElementById("fuzzyFan");
        let fuzzyStatus = "";
        let fuzzyColor = "";

        if (e['Pred0'] >= "ON") {
            fuzzyStatus = "Poor";
            fuzzyColor = "#FF0000"; // Red
        } else {
            fuzzyStatus = "Normal";
            fuzzyColor = "#00FF00"; // Green
        }

        fuzzyResultElement.innerHTML = fuzzyStatus;
        fuzzyResultElement.style.color = fuzzyColor;
    });

</script>



<script>
    //FOR TABLE OF ALARM
    //TABLE ALARM FORMATION
    $.getJSON('/route/alarm_route', function (blocksall) {
        console.log(1);
        //console.log(blocksall.blocks)
        var datas = blocksall.blocks.map(String);
        datas = datas.reverse();
        // console.log(datas)
        var datasx = blocksall.blocks2.map(String);
        datasx = datasx.reverse();


        var table = document.getElementById("tableTemp"); //data in card body

        for (let step = 0; step < datas.length; step++) {
            // console.log(datas[step]);
            var row = table.insertRow(0);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            cell1.innerHTML = datas[step];
            cell2.innerHTML = datasx[step];
        }
    });

    //RETRIEVE ALERT DATA FOR SOIL
    Echo.channel('TempAlarmAir').listen('TempStatusAir', (e) => {
        var table = document.getElementById("tableTemp");
        var row = table.insertRow(0);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        cell1.innerHTML = e['value'];
        cell2.innerHTML = new Date().toLocaleString('en-CA', {
            hour12: false,
        });
    });

</script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

@endsection
