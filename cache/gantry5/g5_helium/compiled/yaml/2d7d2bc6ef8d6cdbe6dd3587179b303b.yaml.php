<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/home/guitars1/dev-test.gslib.ru/public_html/templates/g5_helium/custom/config/44/page/assets.yaml',
    'modified' => 1561541762,
    'data' => [
        'css' => [
            0 => [
                'location' => '',
                'inline' => '#login-top {
  border-radius: 1rem;
  position: absolute;
  top: 120%;
  right: 0.5%;
  z-index: 1;
  width: max-content;
  background: rgba(10, 10, 10, 0.8);
  display: block;
}

#main-menu > [id^="menu-"] {
  bottom: 0;
  position: absolute;
  margin: 0;
  width: 100%;
}
.g-menu-item-title,
.g-menu-item-container {
  color: black;
}

@media (min-width: 766px) {
  .g-toplevel {
    display: -webkit-flex;
    -webkit-justify-content: space-around;
    display: flex;
    justify-content: space-around;
  }
}
span.g-menu-item-title {
  font-weight: 300;
  font-style: normal;
  font-family: "Open Sans Condensed", sans-serif;
}
.g-main-nav .g-toplevel > li.g-parent .g-menu-parent-indicator:after {
  width: 1rem;
  padding: 0.1rem 0.25rem 0.25rem 0rem;
  height: 1rem;
  
}',
                'extra' => [
                    
                ],
                'priority' => '0',
                'name' => 'Menu Buttons'
            ],
            1 => [
                'location' => '',
                'inline' => '#g-page-surround {
background:transparent;
}
#g-sidebar, #g-mainbar, #g-aside{
    height: 100%;
}',
                'extra' => [
                    
                ],
                'priority' => '0',
                'name' => 'Body'
            ],
            2 => [
                'location' => '',
                'inline' => '@media only all and (max-width: 47.938rem) {
#login-bor {
    
}
#login-gold {
    display:none
}
#login-but {
border-radius:5px;
width: 100%;
    padding: 0;
    background: 0;
    box-shadow: inset 0 0 50px -10px black;
    font-family: 0;
    font-size: inherit;
    color: white;
    text-align: center;
    vertical-align: middle;
}
#login-top {
   
      top: 51px;
    left: 5px;
}
}
#login-form .input-prepend .input-small, #login-form .input-append .input-small {
width:max-content;
}',
                'extra' => [
                    
                ],
                'priority' => '0',
                'name' => 'mobile-login'
            ],
            3 => [
                'location' => '',
                'inline' => '/*sub-menu surroundings*/
#g-intro .g-main-nav .g-dropdown {
      margin: 0;
}
.g-main-nav .g-standard > .g-dropdown, .g-main-nav .g-fullwidth > .g-dropdown {
    margin: 0;
}

/*sub-menu border & background*/
#g-intro .g-main-nav .g-dropdown > .g-dropdown-column {
background:#f4f5f7;
}
ul.g-sublevel .g-menu-item-title {
    
}
/*sub-menu indicator*/
#g-intro .g-main-nav .g-toplevel > li > .g-menu-item-container {
}
#g-intro  .g-main-nav  .g-toplevel
  > li  > .g-menu-item-container  .g-menu-parent-indicator {
}
.g-main-nav .g-standard > .g-dropdown .g-dropdown, .g-main-nav .g-fullwidth > .g-dropdown .g-dropdown {
     top: 0;
}

/*sub-manu buttons*/
.g-main-nav .g-sublevel > li {
  text-align: center;
margin:0;
  padding: 0 0 0.2345rem 0;
}
.g-main-nav .g-sublevel > li.active,
.g-main-nav .g-sublevel > li:hover {
  background: #504f63;
color:white !important;
}
.g-main-nav .g-sublevel > li[class^="g-menu-item-user-area"].active,
.g-main-nav .g-sublevel > li[class^="g-menu-item-user-area"]:hover, .g-sublevel .usermenu > ul > li:hover, .g-sublevel .usermenu > ul > li.active{
  background: #504f63;
color:white !important;
}
.g-main-nav .g-sublevel > li[class*="g-menu-item-user-area"].active, .g-main-nav .g-sublevel > li[class*="g-menu-item-user-area"]:hover {
    background: #504f6300 !important;
}
/*sub-menu title*/
.g-main-nav .g-sublevel > li > .g-menu-item-container > .g-menu-item-content {
  word-break: normal;
  text-transform: uppercase;
  vertical-align: top;
}

/*sub-sub arrow&cross*/
.g-main-nav .g-sublevel > li.g-parent .g-menu-parent-indicator:after {
  
}
.g-main-nav .g-sublevel > li.g-parent .g-menu-parent-indicator {
  
}
.g-main-nav .g-standard .g-sublevel > li.g-selected > a >  span > .g-menu-item-title {
    color: white;
}
.g-main-nav .g-sublevel > li > .g-menu-item-container {
    font-weight: inherit;
}
.g-sublevel .usermenu > ul {
    width: 100%;
}
.g-sublevel .usermenu > ul > li {
    padding: 5% !important;
    text-align: left;
margin:0 !important;
width: 100%;
}
.g-sublevel .usermenu > ul {
    padding: 0 !important;
}
.g-sublevel .usermenu > ul > li:hover > a, .g-sublevel .usermenu > ul > li.active > a{
color:white;
}
',
                'extra' => [
                    
                ],
                'priority' => '0',
                'name' => 'sub-menu'
            ],
            4 => [
                'location' => '',
                'inline' => '@media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
#g-intro div[id^="logo-"] svg {
    max-height: 50px;
}
#group33 label.radio input[type="radio"] + span img, #group34 label.radio input[type="radio"] + span img
{
position: relative; 
z-index: 1; 
pointer-events: none;
}
	}

/*@supports (-ms-ime-align:auto) {
  div:after{
    content:\'\';
    background:transparentize(darken(blue, 8), .5);
    position: absolute;
    top:0;
    bottom:0;
    width:100%;
z-index:-100;
  }
}*/
',
                'extra' => [
                    
                ],
                'priority' => '0',
                'name' => 'IE fix'
            ],
            5 => [
                'location' => '',
                'inline' => '/*Picture not to move over the eages
.fabrik_list_28_group_41 > div,
#list_33_com_fabrik_33 #GSLPic {
  transform: rotate(-45deg);
}*/
/*Remove Add/import/ clear buttons*/
#listform_33_com_fabrik_33 ul.nav.nav-pills.pull-left {
  display: none;
}
/*Lean brand&model to bottom*/
*[ID^="list_"] *[class*="BrandAndModel"] {
  display: flex;
  justify-content: space-between;
  padding: 5%;
  position: absolute;
  width: 100%;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  color: white;
  z-index: 20;
  left: 0;
  border-bottom-left-radius: 4px;
  border-bottom-right-radius: 4px;
}
/*no lines between elements*/
.row-striped .row-fluid:not(:last-child) {
  border-bottom: 0px solid #e0e0e5;
}
.well {
  padding: 0 0 3%;
}
/*Place CreatedBy next to butons*/
#list_28_com_fabrik_28 .gsl_product___AddRecCon {
  position: absolute;
  top: 2.25rem;
  left: 8.1rem;
  width: 40%;
  text-transform: capitalize;
}
',
                'extra' => [
                    
                ],
                'priority' => '0',
                'name' => 'List GSL_Product'
            ],
            6 => [
                'location' => '',
                'inline' => '*[class^="fabrikGroup"] {
  position: relative;
}
#tile-body-center li, div[id^="gsl_recordconditions___Pickup_highlight"] li {
  display: inline;
}
div[id*="gsl_recordconditions___Pickup_highlight"] input.fabrikinput {
  display: none;
}
div[class*="fb_el_gsl_recordconditions___Pickup_highlight"] {
  position: absolute;
width:100%;
}

@media only all {
  *[id*="gsl_recordconditions___Pickup_highlight"] > div > [class*="span"],
  *[id*="gsl_recordconditions___Pickup_highlight"]
    > .row-fluid
    [class*="span"] {
    display: initial;
    float: left;
    width: auto;
    margin-left: 0;
  }
}

*[class*="obj_"] {
  position: absolute;
  top: 0;
  left: -15%;
  border-radius: 55% / 15%;
}

.obj_instr1.obj_instrtype1.obj_picpos1.obj_pictype21 {
  margin-left: 43.6%;
}
.obj_numstr1 {
    padding: 3.63% 0.53%;
    margin-top: 18.4%;
    border-radius: 30% / 5%;
}
.obj_numstr6 {
  padding: 3.7% 0.7%;
  margin-top: 17.9%;
  border-radius: 65% / 14%;
}
.obj_numstr12,
.obj_numstr7 {
  padding: 2.6% 0.7%;
  margin-top: 19%;
}
.obj_picpos1.obj_pictype22 {
  margin-left: 45%;
}
.obj_instr1.obj_instrtype1.obj_picpos2.obj_pictype13 {
  margin-left: 48.7%;
}
.obj_instr1.obj_instrtype1.obj_picpos3.obj_pictype13 {
  margin-left: 53.1%;
}
.obj_picpos1.obj_pictype13 {
  margin-left: 44.4%;
}
.obj_picpos2.obj_pictype22 {
  margin-left: 49.4%;
}
.obj_picpos2.obj_pictype21 {
  margin-left: 48%;
}
.obj_picpos3.obj_pictype21 {
  margin-left: 52.4%;
}
.obj_picpos3.obj_pictype22 {
  margin-left: 53.8%;
}
input[type="checkbox"] + span > *[class*="obj_"]:hover {
  background: #ffff0066;
}
input[type="checkbox"]:checked + span > *[class*="obj_"],
li > *[class*="obj_"],
div[id$="_ro"] > *[class*="obj_"] {
  box-shadow: 0 0 3px 3px greenyellow;
}
input[type="checkbox"]:checked + span > .obj_pictype21,
li > .obj_pictype21,
div[id$="_ro"] > .obj_pictype21 {
  box-shadow: -2px 0 2px 2px greenyellow !important;
  border-top-right-radius: 0 !important;
  border-bottom-right-radius: 0 !important;
}
input[type="checkbox"]:checked + span > .obj_pictype22,
li > .obj_pictype22,
div[id$="_ro"] > .obj_pictype22 {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
  box-shadow: 2px 0 2px 2px greenyellow;
}
.obj_numstr4 {
  margin-top: 18.5%;
  padding: 3% 0.7%;
}

.obj_numstr5 {
  padding: 3.5% 0.7%;
  margin-top: 18.1% !important;
  border-radius: 50% / 12%;
}

.obj_instr1.obj_instrtype2.obj_pictype13 {
  padding: 2.8% 1.1%;
}
.obj_instr2.obj_instrtype1.obj_pictype13 {
    padding: 3.63% 0.73%;
}
.obj_numstr13 {
  margin-top: 19%;
}
.obj_numstr15, .obj_numstr13 {
    padding: 2.9% 0.7%;
    margin-top: 18.87%;
}
.obj_instr1.obj_instrtype2.obj_picpos1.obj_pictype13 {
  margin-left: 42%;
}
.obj_instr1.obj_instrtype2.obj_picpos2.obj_pictype13 {
  margin-left: 47%;
}
.obj_instr1.obj_instrtype2.obj_picpos3.obj_pictype13 {
  margin-left: 51.8%;
}
.obj_instr1.obj_instrtype2.obj_picpos2.obj_pictype21 {
    margin-left: 46.7%;
}
.obj_instr1.obj_instrtype2.obj_picpos1.obj_pictype22 {
    margin-left: 43.2%;
}
.obj_instr1.obj_instrtype2.obj_picpos1.obj_pictype21 {
    margin-left: 41.8%;
}
.obj_instr1.obj_instrtype2.obj_picpos2.obj_pictype22 {
    margin-left: 48.1%;
}
.obj_instr1.obj_instrtype2.obj_picpos3.obj_pictype21 {
    margin-left: 51.6%;
}
.obj_instr1.obj_instrtype2.obj_picpos3.obj_pictype22 {
    margin-left: 53%;
}
.obj_instr2.obj_instrtype1.obj_picpos1.obj_pictype21 {
    margin-left: 34.9%;
}
.obj_instr2.obj_instrtype1.obj_picpos1.obj_pictype22 {
    margin-left: 35.98%;
}
.obj_instr2.obj_instrtype1.obj_picpos3.obj_pictype21 {
    margin-left: 41.15%;
}
.obj_instr2.obj_instrtype1.obj_picpos3.obj_pictype22 {
    margin-left: 42.23%;
}
.obj_instr2.obj_instrtype1.obj_picpos1.obj_pictype13 {
    margin-left: 35.3%;
}
.obj_instr2.obj_instrtype1.obj_picpos3.obj_pictype13 {
    margin-left: 41.4%;
}',
                'extra' => [
                    
                ],
                'priority' => '0',
                'name' => 'Hieghlight'
            ],
            7 => [
                'location' => '',
                'inline' => '.range-field {
  width: 100%;
}

/*.slider {
  -webkit-appearance: none;
  height: 20px;
  border-radius: 15px;
  background: linear-gradient(0deg, black, dimgray, black);
  outline: none;

  border: 0.5rem solid gold;
  border-bottom-color: darkgoldenrod;
  border-right-color: darkgoldenrod;
  border-radius: 14% / 90%;
}

.slider::-webkit-slider-runnable-track {
  margin: 0 -20%;
}
.slider::-webkit-slider-thumb {
  color: green;
  -webkit-appearance: none;
  appearance: none;
  width: 50px;
  height: 50px;
  border-radius: 80% 50% 80% 80%;
  transform: rotate(45deg);
  background: radial-gradient(
      closest-side at 30% 30%,
      rgba(255, 255, 255, 0.95),
      rgba(0, 0, 0, 0.95)
    ),
    rgba(10, 10, 10, 0.95);
  box-shadow: inset -5px -5px 20px -5px rgba(255, 255, 255, 0.7);
  cursor: pointer;
  
}
.slider1::-webkit-slider-thumb {
  border-radius: 80% 30% 80% 80%;
  transform: rotate(45deg);
  background: radial-gradient(
      closest-side at 30% 30%,
      rgba(255, 255, 255, 0.95),
      rgba(0, 0, 0, 0.95)
    ),
    rgba(10, 10, 10, 0.95);
  box-shadow: inset -5px -5px 20px -5px rgba(255, 255, 255, 0.7);
}
.slider2::-webkit-slider-thumb {
  border-radius: 80% 50% 80% 80%;
  transform: rotate(45deg);
  background: radial-gradient(
      closest-side at 30% 30%,
      rgba(255, 255, 255, 0.95),
      rgba(0, 0, 0, 0.95)
    ),
    rgba(10, 10, 10, 0.95);
  box-shadow: inset -5px -5px 20px -5px rgba(255, 255, 255, 0.7);
}
.slider3::-webkit-slider-thumb {
  border-radius: 80% 80% 80% 80%;
  background: radial-gradient(
      closest-side at 30% 30%,
      rgba(255, 255, 255, 0.95),
      rgba(0, 0, 0, 0.95)
    ),
    rgba(10, 10, 10, 0.95);
  box-shadow: inset -5px -5px 20px -5px rgba(255, 255, 255, 0.7);
}
.slider4::-webkit-slider-thumb {
  border-radius: 80% 80% 80% 50%;
  transform: rotate(45deg);
  background: radial-gradient(
      closest-side at 30% 30%,
      rgba(255, 255, 255, 0.95),
      rgba(0, 0, 0, 0.95)
    ),
    rgba(10, 10, 10, 0.95);
  box-shadow: inset -5px -5px 20px -5px rgba(255, 255, 255, 0.7);
}
.slider5::-webkit-slider-thumb {
  border-radius: 80% 80% 80% 30%;
  transform: rotate(45deg);
  background: radial-gradient(
      closest-side at 30% 30%,
      rgba(255, 255, 255, 0.95),
      rgba(0, 0, 0, 0.95)
    ),
    rgba(10, 10, 10, 0.95);
  box-shadow: inset -5px -5px 20px -5px rgba(255, 255, 255, 0.7);
}
.slider::-webkit-slider-thumb:after {
  color: white;
  content: "num";
}
.slider::-moz-range-thumb {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: radial-gradient(
      closest-side at 42% 30%,
      rgba(255, 255, 255, 1)5%,
      rgba(0, 0, 0, 0.95)90%
    ),
    rgba(10, 10, 10, 0.95);
  box-shadow: inset -1px -5px 20px -5px rgba(255, 255, 255, 0.7);
  cursor: pointer;
}*/',
                'extra' => [
                    
                ],
                'priority' => '0',
                'name' => 'Switch-pos'
            ],
            8 => [
                'location' => '',
                'inline' => '#group33 label.radio input[type="radio"]:checked + span img,
#group34 label.radio input[type="radio"]:checked + span img {
  background: #00b3ff;
  border-radius: 30px;
}

#group33 label.radio input[type="radio"],
#group34 label.radio input[type="radio"] {
  display: none;
}

#group33 .row-fluid,
#group34 .row-fluid {
  display: flex;
  justify-content: center;
}
form[id^="form_28"] .dbjoin-description {
    justify-content: space-around;
    margin: auto;
    display: flex;
    width: 90%;
    flex-wrap: wrap;
}

form[id^="form_28"] .dbjoin-description > div {
  display: inline-block !important;
  margin: auto;
  padding: 0;
  width: 100px;
}

.dropChacked {
  background: #00b3ff;
  border-radius: 30px;
}
#gsl_product___FormFactor, #gsl_product___Bridge, #gsl_product___Headstock
{
display:none;
}
#ajax_links .page-header, #ajax_links form .row-fluid.nav {
    display: none;
}
#gsl_product___FF_family {
    overflow-x: auto;
    overflow-y: hidden;
    display: block;
}


#gsl_product___FF_family > option {
    display: inline-block;
    padding: 0.5% 1%;
    border-radius: 5px;
}',
                'extra' => [
                    
                ],
                'priority' => '3',
                'name' => 'Product form styling'
            ],
            9 => [
                'location' => '',
                'inline' => '.gallery-front .nav, .gallery-front > p {
    display: none;
}
.gsl_recordconditions___view_button {
    width: 100%;
    position: absolute;
    top: 45%;
    text-align: center;
    margin: 0 0 0 -0.75rem;
}

#listform_33_mod_fabrik_list_192 .full-icon-search:before {
    color: hsla(0, 0%, 0%, 0.5);
    content: "\\53";
    font-family: \'IcoMoon\';
    font-style: normal;
    font-size: 8vw;
    speak: none;
}
.fb_el_gsl_recordconditions___view_button_ro, #listform_33_mod_fabrik_list_192 .btn-group {
    display: none;
}',
                'extra' => [
                    
                ],
                'priority' => '0',
                'name' => 'Gallery-aside'
            ],
            10 => [
                'location' => '',
                'inline' => '@media (max-width: 47.938rem){
#g-intro .g-logo {
    margin: 0 !important;
    padding-left: 0 !important;
}
}',
                'extra' => [
                    
                ],
                'priority' => '0',
                'name' => 'logo-mob-fix'
            ],
            11 => [
                'location' => '',
                'inline' => '.usermenu > ul {
    border: 0 !important;
    padding: 1% !important;
}
.usermenu > ul > li {
     border: 0 !important;
    padding: 0 10% !important;
    word-break: normal;
}',
                'extra' => [
                    
                ],
                'priority' => '0',
                'name' => 'usermenu'
            ],
            12 => [
                'location' => 'gantry-assets://custom/css/bootstrap.min.css',
                'inline' => '',
                'extra' => [
                    
                ],
                'priority' => '0',
                'name' => 'Bootstrap 4'
            ],
            13 => [
                'location' => '',
                'inline' => '  #tile, #tile_def {
    background: radial-gradient(circle, #f4f5f7, #504f63 35%); 
}

  }

  #tile-body-center {
    position: relative;
    padding: 0;
    margin: 0;
  }

  #tile-body-center div,
  #tile-body-center ul {
    padding: 0;
    margin: 0;
  }

  .params>div {

    width: 100%;
    border: 0px solid #f4f5f7;
    padding: 1% 10%;
    margin: 2% 0;
    background: rgba(255, 255, 255, 0.33);
    border-radius: 7px;
    color: white;
  }

  #tile-header {
    color: #7abaff;
  }

  #tile {
    color: black;
    background: radial-gradient(circle, #f4f5f7, #504f63 35%);
  }

  #tile-body-center {
    position: relative;
    padding: 0;
    margin: 0;
  }

  #tile-body-center div,
  #tile-body-center ul {
    padding: 0;
    margin: 0;
  }

  .params>div {

    width: 100%;
    border: 0px solid #f4f5f7;
    padding: 1% 10%;
    margin: 2% 0;
    background: rgba(255, 255, 255, 0.33);
    border-radius: 7px;
    color: white;
  }

  #tile-header {
    color: #7abaff;
  }

  #tile-model {
    text-align: right;
    position: absolute;
    color: black;
    font-size: calc(1rem + 1.5vw);
  }

  #tile-model-name {
    margin: -4% 0 0;
  }
  #tile-model-brend {
    margin:0 4% 0 0;
  }

 #tile-footer-player audio {
    width: 100px;
  }

  #tile-footer-player audio::-webkit-media-controls-current-time-display,
  #tile-footer-player audio::-webkit-media-controls-time-remaining-display,
  #tile-footer-player audio::-webkit-media-controls-timeline-container,
  #tile-footer-player audio::-webkit-media-controls-timeline,
  #tile-footer-player audio::-webkit-media-controls-toggle-closed-captions-button,
  #tile-footer-player audio::-webkit-media-controls-mute-button {
    display: none;
  }',
                'extra' => [
                    
                ],
                'priority' => '0',
                'name' => 'Tile'
            ],
            14 => [
                'location' => '',
                'inline' => '.zygo_content_field.zygo_content_field_id_1.zygo-ava {
    position: absolute;
    right: -9%;
    top: -3%;
}
.zygo_avatar img {
    height: 10vh;
    min-height: 200px;
}
.page-header {
    position: absolute;
    top: -3%;
    color: black;
    width: 90%;
    text-align: center;
}',
                'extra' => [
                    
                ],
                'priority' => '0',
                'name' => 'article'
            ],
            15 => [
                'location' => '',
                'inline' => '#tile-body-right div {
    background-image: linear-gradient( 100deg, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.5) 50%, rgba(255, 255, 255, 0) 80% );
    background-repeat: no-repeat;
    animation: shine 1s infinite;
}
	@keyframes shine {
from {
			background-position:
				-50px 0;
		}
		to {
			background-position:
				250px 0;
		}
	}',
                'extra' => [
                    
                ],
                'priority' => '0',
                'name' => 'New item'
            ]
        ]
    ]
];
