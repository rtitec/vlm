<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">

<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>VLM 2.0 alpha</title>
      <meta http-equiv="X-UA-Compatible" content="IE=8">
      <link rel="stylesheet" type="text/css" href="jvlm.css"/>
      <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.conversejs.org/css/converse.css">
      <link rel="stylesheet/less" type="text/css" href="jvlm.less">
      <!--<link rel="stylesheet" type="text/css" href="external/bootstrap-colorpicker-master/css/bootstrap-colorpicker.css" >-->
      <link rel="stylesheet" type="text/css" href="external/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.css" >
      <!--[if IE]>
      <script src="excanvas.js"></script><![endif]-->
      <!--<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.2.min.js"> </script>
      <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
      -->
      <!--<script src="http://jsconsole.com/js/remote.js?584f0017-f757-49de-88db-b87c30802ee9"></script>-->
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.js"></script>
      <script src="jquery-ui.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.js"></script>
      <!--<script src="http://maps.google.com/maps/api/js?v=3&amp;key=AIzaSyDnbDR01f8MheuxCMxth7w30A2OHtSv73U"></script>-->
      
      <script src="external/jquery.csv.js"></script>
      <!--<script src="external/bootstrap-colorpicker-master/js/bootstrap-colorpicker.min.js"></script>
      -->
      <script src="external/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.js"></script>
      <script src="external/bootstrap-datetimepicker-master/js/locales/bootstrap-datetimepicker.fr.js"></script>
	  <!--<script type="text/javascript" src="external/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>-->
      <script src="external/bootstrap-colorpicker-master/js/bootstrap-colorpicker.js"></script>
      <script src="OpenLayers/OpenLayers.debug.js"></script>
      
      <!--<script src="https://cdn.conversejs.org/dist/converse.min.js"></script>-->

      <script src="config.js"></script>
      <script src="localize.js"></script>
      <script src="GUI.js"></script>
      <script src='ControlSwitch.js' type='text/javascript'></script>
      <script src='gribmap.js' type='text/javascript'></script>
      <script src='vlmboats.js' type='text/javascript'></script>
      <script src='geomath.js' type='text/javascript'></script>
      <script src='position.js' type='text/javascript'></script>
      <script src="user.js"  type='text/javascript'></script>
      <script src='polar.js' type='text/javascript'></script>
      <script src='xmpp.js' type='text/javascript'></script>
      <script src='autopilot.js' type='text/javascript'></script>
      
      
  </head>
  <body >

    <!-- OpenLayer Map Div -->
    <div class="container-fluid">
      <div class="row main-row">
        <div id="jVlmControl" class="col-xs-12"></div>
        </div>
      <div class="row main-row">
        <div id="jVlmMap" class="col-xs-12"></div>
      </div>
    </div>
    
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span> 
            <span class="icon-bar"></span>             
          </button>
          <a class="navbar-brand" href="#"><img src="/images/logos/logovlmnew.png"/></a>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
          <ul  class="nav navbar-nav"  LoggedInNav="true" style="display:none">
            <li  class="active" ><a class="player" id="PlayerId">Not Logged in </a></li>
            <li  class="BoatSelector">
              <select id="BoatSelector" >
              </select> 
            </li>
            <li class="nav hidden" RacingBtn="false">
              <div class="BtnGroup" >
                <div class="BtnRaceList" >
                  <a data-toggle="collapse" data-target="#RacesListForm"><img class="TDB-Icon" src="images/races-list.png" alt=""/></a>
                </div>
              </div>
            </li>
            <li class="nav hidden" RacingBtn="true">
              <div class="BtnGroup " >
                <div class="BtnTDBPanel" >
                  <a data-toggle="collapse" data-target="#TDB-Panel"><img class="TDB-Icon" src="images/TdB-Icon-1.png" alt=""/></a>
                </div>
                <div class="BtnCtrlPanel" >
                  <a data-toggle="collapse" data-target="#Boat-Panel"><img class="TDB-Icon" src="images/TdB-Icon-2.png" alt=""/></a><span class="PilotOrdersBadge pilot btnbadge badge">...</span>
                </div>
              </div>
            </li>
            <li class="nav hidden" RacingBtn="true" style="float: left;">
              <!--<div class="BtnGroup1" >-->
                <div class="BtnRankingPanel" >
                  <a data-toggle="collapse" data-target="#Ranking-Panel"><img id="RankingButton" class="TDB-Icon" src="images/ranking.png"/></a><span id="RankingBadge" class="ranking btnbadge badge">...</span>
                </div>
            </li>
            <li class="nav" style="float: left;">
              <div id="BtnSetting" class="BtnGroup1 button hidden" style="float: left;">
                <a ><img class="TDB-Icon" src=images/setting.png></img></a>
              </div>
            </li>
            <li class="nav hidden" RacingBtn="true" style="padding-top: 4px;float:left">
             <!-- <div class="BtnGroup1" >-->
                <div class="BtnRaceInstruction" >
                  <a ><img id="ICSButton" class="TDB-Icon" src=images/raceinstructions.png></img></a>
                </div>
            </li>
            <li class="nav hidden" RacingBtn="true" style="padding-top: 4px;margin-left: 150px;">
                <div class="RaceInfoDiv">
                  <div class="NavRaceName">
                    <Span id="RaceName">  </Span>
                  </div>
                  <div class="NavRaceClock">
                    <Span id="RaceChrono"> </Span>
                  </div>                                    
                </div>
            </li>
          </ul>
          <ul class="nav navbar-nav" >
            <li class="active">
              <div id="PbLoginProgress" class="progress" >
                <div class="progress-bar progress-bar-striped active" role="progressbar"
                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%" I18n="PbLogin">Processing Login...
                </div>
              </div>
              <div id="PbGetBoatProgress" class="progress" >
                <div class="progress-bar progress-bar-striped active" role="progressbar"
                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%" I18n="PbBoat">Loading Boat Information...
                </div>
              </div>
              <div id="PbGribLoginProgress" class="progress" >
                <div class="progress-bar progress-bar-striped active" role="progressbar"
                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%" I18n="PbGribs">loading gribs...
                </div>
              </div>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right" LoggedInNav="false" style="display:none">
            <li>
              <div class="dropdown">
                <button id="SelectionLanguageDropDown" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><img class="LngFlag" lang="en" src="images/lng-en.png" title="English Version" alt="English Version"></li>
                  <li><img class="LngFlag" lang="fr" src="images/lng-fr.png" title="Version Française" alt="Version Française"></li>
                  <li><img class="LngFlag" lang="it" src="images/lng-it.png" title="Italian Version" alt="Italian Version"></li>
                  <li><img class="LngFlag" lang="es" src="images/lng-es.png" title="Spanish Version" alt="Spanish Version"></li>
                  <li><img class="LngFlag" lang="de" src="images/lng-de.png" title="Deutsche Fassung" alt="Deutsche Fassung"></li>
                  <li><img class="LngFlag" lang="pt" src="images/lng-pt.png" title="Portugese Version" alt="Portugese Version"></li>        
                </ul>
              </div>
            </li>
            <li>
              <span class="glyphicon glyphicon-log-in"><button id="logindlgButton" type="button" class="btn btn-default"  I18n="login">Login</button></span> 
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right" LoggedInNav="true" style="display:none">
            <li>
              <span class="glyphicon glyphicon-log-out"><button id="logOutButton" type="button" class="btn btn-default"  I18n="logout">Logout</button></span> 
            </li>
          </ul>
        </div>
      </div>
      <!-- Collapsable Boat Controler panel -->
      <div Id="Boat-Panel" class="collapse">
        <div class="Controler-Panel Container-fluid" style="padding-left:85px">
                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                <li class="BCPane BearingMode"><a href="#BearingMode" data-toggle="tab" >
                  <img class="PMActiveMode ActiveMode_Heading" src="images/PMActiveMode.png"></img>
                  <span I18n="autopilotengaged">Cap</span></a>
                </li>
                <li class="BCPane AngleMode"><a href="#AngleMode" data-toggle="tab">
                  <img class="PMActiveMode ActiveMode_Angle" src="images/PMActiveMode.png"></img>
                  <span I18n="constantengaged">Angle</span></a>
                </li>
                <li class="BCPane WP_PM_Mode OrthoMode "><a href="#OrthoMode" data-toggle="tab">
                  <img class="PMActiveMode ActiveMode_Ortho" src="images/PMActiveMode.png"></img>
                  <span I18n="orthodromic">Ortho</span></a>
                </li>
                <li class="BCPane WP_PM_Mode VMGMode"><a href="#VMGMode" data-toggle="tab">
                  <img class="PMActiveMode ActiveMode_VMG" src="images/PMActiveMode.png"></img>
                  <span>VMG</span></a>
                </li>
                <li class="BCPane WP_PM_Mode VBVMGMode"><a href="#VBVMGMode" data-toggle="tab">
                  <img class="PMActiveMode ActiveMode_VBVMG" src="images/PMActiveMode.png"></img>
                  <span>VBVMG</span></a>
                </li>
                      <li class="BCPane AutoPilot"><a href="#AutoPilotTab" data-toggle="tab"><img src="images/autopilot.png" style="width:21px;"></img><span I18N="pilototoengaged">AutoPilot</span>
                        <span class="PilotOrdersBadge pilottab btnbadge badge">...</span></a></li>
            </ul>
				<!-- Fin de la barre d'onglet-->

            <div id="my-tab-content" class="tab-content">
              <div class="BCPane tab-pane" id="BearingMode">
                <div class="BoatControllerRow row">
                    <div class="col-sm-2" > <span  i18n="heading">Cap à suivre</span>
                    </div>
                    <div class="col-sm-2">
                      <input class="input Boat_SimpleInput" id="PM_Heading">
                    </div>
                    <div class="col-sm-4">Entrer le cap à suivre en °
                    </div>
                </div>
                <div class="BoatControllerRow row">
                  <div class="col-xs-12">
                    <button class="button-black" id="BtnPM_Heading">
                      <span I18n="autopilot">Do Heading</span>
                    </button>
                  </div>
                </div>
              </div>
              <!-- Fin HDG debut TWA-->
              <div class="BCPane tab-pane" id="AngleMode">
                 <div class="BoatControllerRow row">
                    <div class="col-sm-2"> <span I18n="WindAngle"> Angle du vent</span>
                    </div>
                    <div class="col-sm-2">
                      <input class="input Boat_SimpleInput" id="PM_Angle">
                      </input>
                    </div>
                    <div class="col-sm-4">Entrer l'angle +/- par rapport au vent
                    </div>                </div>
                <div class="BoatControllerRow row">
                    <div class="col-sm-2">
                    <button class="button-black" id="BtnPM_Tack" I18n="tack">Virer / Empanner</button>
                    </div>
                    <div class="col-sm-2">
                    <button class="button-black" id="BtnPM_Angle" I18n="constant">Regler l'allure</button>
                  </div>
                </div>
              </div>
              <!-- Fin TWA debut Ortho-->
              <div class="BCPane tab-pane" id="OrthoMode">
                <div id="PM_WPMode_Div">
                  <div class="BoatControllerRow row">
                      <div class="col-sm-2">
                      <span I18n="mytargetpoint"> CurDest</span>
                      </div>
                      <div class="col-sm-2">
                        <img id="SetWPOnClick" class="ClickWPPos_Off" src="images/clickwp_pos.png"></img>
                        <img id="SetWPOffClick" class="ClickWPPos_On" src="images/clickwp_pos_on.png"></img>
                      </div>
                      <div class="col-sm-8">Cliquez sur la main puis sur la map pour positionner votre WP
                      </div>
                  </div>
                  <div class="BoatControllerRow row">
                      <div class="col-sm-2"> Latitude</div>
                      <div class="col-sm-2">
                      <input class="input Boat_SimpleInput" id="PM_Lat" size="100">
                      </input>
                      </div>
                      <div class="col-sm-4"> <span class="input Boat_SimpleInput" id="PM_CurWPLat">Latitude du WP</span> 
                    </div>
                   </div>
                  <div class="BoatControllerRow row">
                      <div class="col-sm-2" > Longitude</div>
                      <div class="col-sm-2">
                        <input class="input Boat_SimpleInput" id="PM_Lon">
                        </input>
                      </div>
                      <div class="col-sm-4">
                      <span class="input Boat_SimpleInput" id="PM_CurWPLon">Longitude du WP</span> 
                      </div>
                  </div>
                  <div class="BoatControllerRow row">
                    <div class="col-sm-2">
                        <div class="checkbox "> 
                          <label>
                            <input type="checkbox" id="PM_WithWPHeading"></input>
                            @WPH
                          </label>
                        </div>
                   </div>
                   <div class="col-sm-2">
                        <input class="input Boat_SimpleInput" id="PM_WPHeading"></input>
                   </div>
                   <div class="col-sm-2">
                        <span class="input Boat_SimpleInput" id="PM_CurWPheading">@WPH</span>
                   </div>
                </div>                  
                </div>
                <div class="BoatControllerRow row">
                  <div class="col-sm-4">
                    <button class="button-black" id="BtnPM_Ortho" I18n="orthodromic">Do Angle</button>
                  </div>
                </div>
              </div>
              <!-- Fin Ortho debut VMG-->
              <div class="BCPane tab-pane" id="VMGMode">
                <div class="BoatControllerRow row">
                  <div class="col-sm-4">
                    <button class="button-black" id="BtnPM_VMG" I18n="bestvmgengaged">VMG</button>
                  </div>
                </div> 
              </div>
              <!-- Fin VMG debut VBVMG-->
              <div class="BCPane tab-pane" id="VBVMGMode">
                <div class="BoatControllerRow row">
                  <div class="col-sm-4">
                    <button class="button-black" id="BtnPM_VBVMG" I18n="vbvmgengaged">VBVMG</button>
                  </div>
                </div>    
              </div>
              <!-- Fin VBVMG debut Pilot-->
              <div class="BCPane tab-pane" id="AutoPilotTab">
                <div class="BoatControllerRow row">
                  <div class="container-fluid">
                    <div id='PIL_HEADER' class='row'>
                      <div class='PAHeader col-xs-4'>
                        <span I18N="Human Readable date">..HD</span>
                      </div>
                      <div class='PAHeader col-xs-2'>
                        <span >PIM</span>
                      </div>
                      <div class='PAHeader col-xs-2'>
                        <span >PIP</span>
                      </div>
                      <div class='PAHeader col-xs-4'>
                        <span >Status</span>
                      </div>
                    </div>
                    <div id='PIL1' class='row'>
                      <div class='col-xs-4'>
                        <img src="/externals/jscalendar/img.gif" id="trigger_jscal_1" class="calendarbutton" title="Date selector" onmouseover="this.style.background='red';" onmouseout="this.style.background=''">
                        <span id='PIL_DATE' >10 Oct 2016 22:06</span>
                      </div>
                      <div class='col-xs-2'>
                        <span id='PIL_PIM'></span>
                      </div>
                      <div class='col-xs-2'>
                        <span id='PIL_PIP' >PIP</span>
                      </div>
                      <div class='col-xs-4'>
                        <span id='PIL_STATUS'>Status</span>
                        <img class='PIL_EDIT' src="images/edit.png"></img>
                        <img class='PIL_DELETE' src="images/delete.png"></img>
                      </div>
                      
                    </div>
                    <div class="BoatControllerRow row">
                      <div class="col-sm-4">
                        <button id="AutoPilotAddButton" class="button-black"  data-toggle="modal" data-target="#AutoPilotSettingForm" I18n="pilototo_prog_add">AddOrder</button>
                      </div>
                    </div>
                  </div>   
                  </div>
                </div>    <!--Fin du pilot-->
              </div>  <!--Fin de la table-->
            </div>
          </div>
       <!-- Collapsable Boat Dashboard (view only display) -->
      <div id="TDB-Panel" class="TDB-Panel collapse">
        <div class="container">
          <div class="row">
            <div class="TDB-EmptyCol col-xs-3"> 
            </div>
            <div class="TDB-Panel col-xs-3">            
              <div  class="TDB-Panel" style="background-image: url('images/VLM100-Nav-Center.png');">
                <div class="VLM100_Pos" id="BoatLon"></div>
                <div class="VLM100_Pos" id="BoatLat"></div>
                <div class="VLM100_PosSmall" id="StatSpeed">Speed</div>
                <div class="VLM100_PosSmall" id="StatAvg">Avg</div>
                <div class="VLM100_PosSmall" id="StatHeading">Heading</div>
                <div class="VLM100_PosSmall" id="BoatSpeed"></div>
                <div class="VLM100_PosSmall" id="BoatAvg"></div>
                <div class="VLM100_PosSmall" id="BoatHeading"></div>
                <div class="VLM100_PosSmall" id="StatDNM">DNM</div>
                <div class="VLM100_PosSmall" id="StatLoch">Loch</div>
                <div class="VLM100_PosSmall" id="StatOrtho">Ortho</div>
                <div class="VLM100_PosSmall" id="StatLoxo">Loxo</div>
                <div class="VLM100_PosSmall" id="StatVMG">VMG</div>
                <div class="VLM100_PosSmall" id="BoatDNM"></div>
                <div class="VLM100_PosSmall" id="BoatLoch"></div>
                <div class="VLM100_PosSmall" id="BoatOrtho"></div>
                <div class="VLM100_PosSmall" id="BoatLoxo"></div>
                <div class="VLM100_PosSmall" id="BoatVMG"></div>
                </div>
                  </div>
            <div class="TDB-Panel col-xs-3">
              <div  class="TDB-Panel" style="background-image: url('images/VLM100-Wind-Angle.png');">
                  <div class="WindAnglePanel">
                    <img id="BearingRing" src="images/compass-small-complete.png"></img>
                  </div>
                  <div class="WindAnglePanel">
                    <img id="DeckImage" src="images/deck-small.png"></img>
                  </div>
                  <div class="WindAnglePanel">
                    <img id="ImgWindAngle"></img>
                  </div>
                  </div>
                  </div>
            <div class="TDB-Panel col-xs-3">
              <div  class="TDB-Panel" style="background-image: url('images/VLM100-Windstation.png');">
                <div class="VLM100_Label" id="StatWindSpeed">Wind Speed</div>
                <div class="VLM100_Label" id="StatWindDirection">Wind Direction</div>
                <div class="VLM100_Label" id="StatWindAngle">Wind Angle</div>
                <div class="VLM100_Unit" id="StatSpeedUnit">kts</div>
                <div class="VLM100_Unit" id="StatDirUnit">°</div>
                <div class="VLM100_Unit" id="StatAngleUnit">°</div>
                <div class="VLM100_Value" id="BoatWindSpeed" ></div>
                <div class="VLM100_Value" id="BoatWindDirection" ></div>
                <div class="VLM100_Value" id="BoatWindAngle"></div>
                </div>
            </div>
          </div>
                  </div>
                  </div>
      <!-- COllapsable Race ranking -->
      <div id="Ranking-Panel" class="TDB-Panel collapse">
        <div class="container">
          
        </div>
      </div>
    <!-- COllapsable Pilototo -->
    <div id="Pilot-Panel" class="TDB-Panel collapse">
      <div class="container">
        
      </div>
    </div>
      </div>
    </nav>
    
    <!-- Modal login form -->
    <div id="LoginForm" class="modal fade" role="dialog">
      <div class="modal-dialog">
  
        <!-- Modal content-->
        <div id="LoginPanel" class="modal-content">
               
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 I18n="Identification" class="modal-title" style="text-align:center">Identification</h4>
            <!-- Language bar -->
            <div class="container-fluid">
                  <div class="col-xs-2"><img class=" LngFlag" lang="en" src="images/lng-en.png" title="English Version" alt="English Version"></div>
                  <div class="col-xs-2"><img class="LngFlag" lang="fr" src="images/lng-fr.png" title="Version Française" alt="Version Française"></div>
                  <div class="col-xs-2"><img class="LngFlag" lang="it" src="images/lng-it.png" title="Italian Version" alt="Italian Version"></div>
                  <div class="col-xs-2"><img class="LngFlag" lang="es" src="images/lng-es.png" title="Spanish Version" alt="Spanish Version"></div>
                  <div class="col-xs-2"><img class="LngFlag" lang="de" src="images/lng-de.png" title="Deutsche Fassung" alt="Deutsche Fassung"></div>
                  <div class="col-xs-2"><img class="LngFlag" lang="pt" src="images/lng-pt.png" title="Portugese Version" alt="Portugese Version"></div>
                
            </div>
          </div>
          <div class="modal-body">
            <div class="row container-fluid">
              <div class="col-xs-12">
                <div class="row">
                  <div class="col-xs-6" align="center">
                    <span I18n="email">Adresse mail :</span>
                  </div>
                  <div class="col-xs-6">
                    <input  class="UserName " size="15" maxlength="64" name="pseudo" />
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-6" align="center">
                    <span I18n="password">Mot de passe :</span>
                  </div>
                  <div class="col-xs-6">
                    <input class="UserPassword" size="15" maxlength="15" type="password" name="password"/> 
                  </div>
                </div>
              </div>    
             </div>          
            <div class="row container-fluid" style="padding-top:20px">
              <span I18n="PleaseCreateDlg">plsc</span>
              <button id="BtnCreateAccount" class="button" I18n="CreateAcctBtn">cre</button>
            </div> </div>
          <div class="modal-footer">
            <button id="LoginButton" I18n="login" type="button" class="button" data-dismiss="modal">login</button>
          </div>
        </div>
  
      </div>
    </div>
    <!-- Modal Settings form -->
    <div id="SettingsForm" class="modal fade" role="dialog">
      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content" id="SettingsPanel">              
            <div class="modal-header">
              <div class="col-xs-8">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 align="center" I18n="change" class="modal-title">Préférences</h4>
              </div>
              <div class="col-xs-2">
                <label for="success" class="btn btn-success">BS <input type="checkbox" id="success" class="badgebox"></label>
              </div>
              <div class="col-xs-2">
                <label for="warning" class="btn btn-warning">VLM <input type="checkbox" id="warning" class="badgebox"></label>
              </div>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="TabModal">
                        <li><a href="#PrefJoueur" data-toggle="tab">Joueur</a></li>
                        <li><a href="#PrefBoat" data-toggle="tab">Bateau</a></li>
                        <li><a href="#PrefAutre" data-toggle="tab">Autre</a></li>
                </ul>
                <div id="TabModalContent" class="tab-content modal-pref">
                  <div class="tab-pane fade in active" id="PrefJoueur">
                    <!--Langue-->
                    <div class="row">
                     <fieldset class="fieldset row-fluid">
                        <div class="col-xs-5">
                          <span I18n="pref_helper_lang_ihm">Langue</span>
                        </div>
                        <div class="col-xs-5">
                          <select name="pref_lang_ihm" class="input form-control selectpref" id="inputpref-lang_ihm">
                              <option value="en">English Version</option>
                              <option value="fr" selected>Version Française</option>
                              <option value="it">Italian Version</option>
                              <option value="es">Spanish Version</option>
                              <option value="de">Deutsche Fassung</option>
                              <option value="pt">Portugese Version</option>
                          </select> 
                        </div>
                          <div class="col-xs-2">
                         <div class="btn-group" data-toggle="buttons">
                                
                                <label class="btn btn-pref btn-success ">
                                  <input type="checkbox" autocomplete="off" checked>
                                  <span class="glyphicon glyphicon-ok"></span>
                                </label>

                                <label class="btn btn-pref btn-warning">
                                  <input type="checkbox" autocomplete="off">
                                  <span class="glyphicon glyphicon-ok"></span>
                                </label>			
                              
                              </div>
                          </div>
                      </fieldset>
                    </div>
                    <!--Langue parlées-->
                    <div class="row">
                     <fieldset class="fieldset row-fluid">
                        <div class="col-xs-5">
                          <span I18n="pref_lang_communication">Langue</span>
                        </div>
                        <div class="col-xs-5">
                          <select title="Sélectionnez les langues que vous parlez. Vous pouvez en sélectionner plusieurs." name="pref_lang_communication[]" multiple class="input form-control selectpref" id="inputpref-lang_communication">
                              <option value="﻿aar">Afar</option>
                              <option value="abk">Abkhazian</option>
                              <option value="afr">Afrikaans</option>
                              <option value="aka">Akan</option>
                              <option value="alb">Albanian</option>
                              <option value="amh">Amharic</option>
                              <option value="ara">Arabic</option>
                              <option value="arg">Aragonese</option>
                              <option value="arm">Armenian</option>
                              <option value="asm">Assamese</option>
                              <option value="ava">Avaric</option>
                              <option value="ave">Avestan</option>
                              <option value="aym">Aymara</option>
                              <option value="aze">Azerbaijani</option>
                              <option value="bak">Bashkir</option>
                              <option value="bam">Bambara</option>
                              <option value="baq">Basque</option>
                              <option value="bel">Belarusian</option>
                              <option value="ben">Bengali</option>
                              <option value="bih">Bihari languages</option>
                              <option value="bis">Bislama</option>
                              <option value="bos">Bosnian</option>
                              <option value="bre">Breton</option>
                              <option value="bul">Bulgarian</option>
                              <option value="bur">Burmese</option>
                              <option value="cat">Catalan; Valencian</option>
                              <option value="cha">Chamorro</option>
                              <option value="che">Chechen</option>
                              <option value="chi">Chinese</option>
                              <option value="chu">Church Slavic; Old Slavonic; Church Slavonic; Old Bulgarian; Old Church Slavonic</option>
                              <option value="chv">Chuvash</option>
                              <option value="cor">Cornish</option>
                              <option value="cos">Corsican</option>
                              <option value="cre">Cree</option>
                              <option value="cze">Czech</option>
                              <option value="dan">Danish</option>
                              <option value="div">Divehi; Dhivehi; Maldivian</option>
                              <option value="dut">Dutch; Flemish</option>
                              <option value="dzo">Dzongkha</option>
                              <option value="eng">English</option>
                              <option value="epo">Esperanto</option>
                              <option value="est">Estonian</option>
                              <option value="ewe">Ewe</option>
                              <option value="fao">Faroese</option>
                              <option value="fij">Fijian</option>
                              <option value="fin">Finnish</option>
                              <option value="fre">French</option>
                              <option value="fry">Western Frisian</option>
                              <option value="ful">Fulah</option>
                              <option value="geo">Georgian</option>
                              <option value="ger">German</option>
                              <option value="gla">Gaelic; Scottish Gaelic</option>
                              <option value="gle">Irish</option>
                              <option value="glg">Galician</option>
                              <option value="glv">Manx</option>
                              <option value="gre">Greek, Modern (1453-)</option>
                              <option value="grn">Guarani</option>
                              <option value="guj">Gujarati</option>
                              <option value="hat">Haitian; Haitian Creole</option>
                              <option value="hau">Hausa</option>
                              <option value="heb">Hebrew</option>
                              <option value="her">Herero</option>
                              <option value="hin">Hindi</option>
                              <option value="hmo">Hiri Motu</option>
                              <option value="hrv">Croatian</option>
                              <option value="hun">Hungarian</option>
                              <option value="ibo">Igbo</option>
                              <option value="ice">Icelandic</option>
                              <option value="ido">Ido</option>
                              <option value="iii">Sichuan Yi; Nuosu</option>
                              <option value="iku">Inuktitut</option>
                              <option value="ile">Interlingue; Occidental</option>
                              <option value="ina">Interlingua (International Auxiliary Language Association)</option>
                              <option value="ind">Indonesian</option>
                              <option value="ipk">Inupiaq</option>
                              <option value="ita">Italian</option>
                              <option value="jav">Javanese</option>
                              <option value="jpn">Japanese</option>
                              <option value="kal">Kalaallisut; Greenlandic</option>
                              <option value="kan">Kannada</option>
                              <option value="kas">Kashmiri</option>
                              <option value="kau">Kanuri</option>
                              <option value="kaz">Kazakh</option>
                              <option value="khm">Central Khmer</option>
                              <option value="kik">Kikuyu; Gikuyu</option>
                              <option value="kin">Kinyarwanda</option>
                              <option value="kir">Kirghiz; Kyrgyz</option>
                              <option value="kom">Komi</option>
                              <option value="kon">Kongo</option>
                              <option value="kor">Korean</option>
                              <option value="kua">Kuanyama; Kwanyama</option>
                              <option value="kur">Kurdish</option>
                              <option value="lao">Lao</option>
                              <option value="lat">Latin</option>
                              <option value="lav">Latvian</option>
                              <option value="lim">Limburgan; Limburger; Limburgish</option>
                              <option value="lin">Lingala</option>
                              <option value="lit">Lithuanian</option>
                              <option value="ltz">Luxembourgish; Letzeburgesch</option>
                              <option value="lub">Luba-Katanga</option>
                              <option value="lug">Ganda</option>
                              <option value="mac">Macedonian</option>
                              <option value="mah">Marshallese</option>
                              <option value="mal">Malayalam</option>
                              <option value="mao">Maori</option>
                              <option value="mar">Marathi</option>
                              <option value="may">Malay</option>
                              <option value="mlg">Malagasy</option>
                              <option value="mlt">Maltese</option>
                              <option value="mon">Mongolian</option>
                              <option value="nau">Nauru</option>
                              <option value="nav">Navajo; Navaho</option>
                              <option value="nbl">Ndebele, South; South Ndebele</option>
                              <option value="nde">Ndebele, North; North Ndebele</option>
                              <option value="ndo">Ndonga</option>
                              <option value="nep">Nepali</option>
                              <option value="nno">Norwegian Nynorsk; Nynorsk, Norwegian</option>
                              <option value="nob">Bokmål, Norwegian; Norwegian Bokmål</option>
                              <option value="nor">Norwegian</option>
                              <option value="nya">Chichewa; Chewa; Nyanja</option>
                              <option value="oci">Occitan (post 1500); Provençal</option>
                              <option value="oji">Ojibwa</option>
                              <option value="ori">Oriya</option>
                              <option value="orm">Oromo</option>
                              <option value="oss">Ossetian; Ossetic</option>
                              <option value="pan">Panjabi; Punjabi</option>
                              <option value="per">Persian</option>
                              <option value="pli">Pali</option>
                              <option value="pol">Polish</option>
                              <option value="por">Portuguese</option>
                              <option value="pus">Pushto; Pashto</option>
                              <option value="que">Quechua</option>
                              <option value="roh">Romansh</option>
                              <option value="rum">Romanian; Moldavian; Moldovan</option>
                              <option value="run">Rundi</option>
                              <option value="rus">Russian</option>
                              <option value="sag">Sango</option>
                              <option value="san">Sanskrit</option>
                              <option value="sin">Sinhala; Sinhalese</option>
                              <option value="slo">Slovak</option>
                              <option value="slv">Slovenian</option>
                              <option value="sme">Northern Sami</option>
                              <option value="smo">Samoan</option>
                              <option value="sna">Shona</option>
                              <option value="snd">Sindhi</option>
                              <option value="som">Somali</option>
                              <option value="sot">Sotho, Southern</option>
                              <option value="spa">Spanish; Castilian</option>
                              <option value="srd">Sardinian</option>
                              <option value="srp">Serbian</option>
                              <option value="ssw">Swati</option>
                              <option value="sun">Sundanese</option>
                              <option value="swa">Swahili</option>
                              <option value="swe">Swedish</option>
                              <option value="tah">Tahitian</option>
                              <option value="tam">Tamil</option>
                              <option value="tat">Tatar</option>
                              <option value="tel">Telugu</option>
                              <option value="tgk">Tajik</option>
                              <option value="tgl">Tagalog</option>
                              <option value="tha">Thai</option>
                              <option value="tib">Tibetan</option>
                              <option value="tir">Tigrinya</option>
                              <option value="ton">Tonga (Tonga Islands)</option>
                              <option value="tsn">Tswana</option>
                              <option value="tso">Tsonga</option>
                              <option value="tuk">Turkmen</option>
                              <option value="tur">Turkish</option>
                              <option value="twi">Twi</option>
                              <option value="uig">Uighur; Uyghur</option>
                              <option value="ukr">Ukrainian</option>
                              <option value="urd">Urdu</option>
                              <option value="uzb">Uzbek</option>
                              <option value="ven">Venda</option>
                              <option value="vie">Vietnamese</option>
                              <option value="vol">Volapük</option>
                              <option value="wel">Welsh</option>
                              <option value="wln">Walloon</option>
                              <option value="wol">Wolof</option>
                              <option value="xho">Xhosa</option>
                              <option value="yid">Yiddish</option>
                              <option value="yor">Yoruba</option>
                              <option value="zha">Zhuang; Chuang</option>
                              <option value="zul">Zulu</option>
                          </select>    
                        </div>
                          <div class="col-xs-2">
                         <div class="btn-group" data-toggle="buttons">
                                
                                <label class="btn btn-pref btn-success ">
                                  <input type="checkbox" autocomplete="off" checked>
                                  <span class="glyphicon glyphicon-ok"></span>
                                </label>

                                <label class="btn btn-pref btn-warning">
                                  <input type="checkbox" autocomplete="off">
                                  <span class="glyphicon glyphicon-ok"></span>
                                </label>			
                              
                              </div>
                          </div>
                      </fieldset>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-xs-12">
                          <h4 ><span I18n="prefsgroup_contact">Information de connexion</span></h4>
                        </div>
                    </div>
                    <!--Mail-->
                    <div class="row">
                     <fieldset class="fieldset row-fluid">
                        <div class="col-xs-4" align="center">
                          <img src="images/mail.svg" alt="mail"/>
                        </div>
                        <div class="col-xs-6">
                          <input class="input form-control " id="pref_Id" value="Mail" style="margin-top:5px;"></input>    
                        </div>
                        <div class="col-xs-2">
                            
                            <div class="btn-group" data-toggle="buttons">
                              
                              <label class="btn btn-pref btn-success ">
                                <input type="checkbox" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                              </label>

                              <label class="btn btn-pref btn-warning">
                                <input type="checkbox" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                              </label>			
                            
                            </div>

                          </div>
                      </fieldset>
                    </div>
                    <!--Twiter-->
                    <div class="row">
                     <fieldset class="fieldset row-fluid">
                        <div class="col-xs-4" align="center" >
                          <img src="images/twiter.svg" alt="mail"/>
                        </div>
                        <div class="col-xs-6">
                          <input class="input form-control " id="pref-twiter" value="twiter" style="margin-top:5px;"></input>    
                        </div>
                        <div class="col-xs-2">
                       <div class="btn-group" data-toggle="buttons">
                              
                              <label class="btn btn-pref btn-success ">
                                <input type="checkbox" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                              </label>

                              <label class="btn btn-pref btn-warning">
                                <input type="checkbox" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                              </label>			
                            
                            </div>
                        </div>
                      </fieldset>
                    </div>
                    <!--Facebook-->
                    <div class="row">
                     <fieldset class="fieldset row-fluid">
                        <div class="col-xs-4" align="center" >
                          <img src="images/facebook.svg" alt="mail"/>
                        </div>
                        <div class="col-xs-6">
                          <input class="input form-control " id="pref-facebook" value="facebook" style="margin-top:5px;"></input>    
                        </div>
                        <div class="col-xs-2">
                       <div class="btn-group" data-toggle="buttons">
                              
                              <label class="btn btn-pref btn-success ">
                                <input type="checkbox" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                              </label>

                              <label class="btn btn-pref btn-warning">
                                <input type="checkbox" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                              </label>			
                            
                            </div>
                        </div>
                      </fieldset>
                    </div>
                    <!--MSN-->
                    <div class="row">
                     <fieldset class="fieldset row-fluid">
                        <div class="col-xs-4" align="center" >
                          <img src="images/msn.svg" alt="msn"/>
                        </div>
                        <div class="col-xs-6">
                          <input class="input form-control " id="pref-msn" value="msn" style="margin-top:5px;"></input>    
                        </div>
                        <div class="col-xs-2">
                       <div class="btn-group" data-toggle="buttons">
                              
                              <label class="btn btn-pref btn-success ">
                                <input type="checkbox" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                              </label>

                              <label class="btn btn-pref btn-warning">
                                <input type="checkbox" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                              </label>			
                            
                            </div>
                        </div>
                      </fieldset>
                    </div>
                    <!--Jabber-->
                    <div class="row">
                     <fieldset class="fieldset row-fluid">
                        <div class="col-xs-4" align="center" >
                          <img src="images/jabber.svg" alt="jabber"/>
                        </div>
                        <div class="col-xs-6">
                          <input class="input form-control " id="pref-jabber" value="jabber" style="margin-top:5px;"></input>    
                        </div>
                        <div class="col-xs-2">
                       <div class="btn-group" data-toggle="buttons">
                              
                              <label class="btn btn-pref btn-success ">
                                <input type="checkbox" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                              </label>

                              <label class="btn btn-pref btn-warning">
                                <input type="checkbox" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                              </label>			
                            
                            </div>
                        </div>
                      </fieldset>
                    </div>
                    <!--google-->
                     <div class="row">
                       <fieldset class="fieldset row-fluid">
                          <div class="col-xs-4" align="center" >
                            <img src="images/google.svg" alt="google"/>
                          </div>
                          <div class="col-xs-6">
                            <input class="input form-control " id="pref-goolge" value="google" style="margin-top:5px;"></input>    
                          </div>
                          <div class="col-xs-2">
                         <div class="btn-group" data-toggle="buttons">
                                
                                <label class="btn btn-pref btn-success ">
                                  <input type="checkbox" autocomplete="off" checked>
                                  <span class="glyphicon glyphicon-ok"></span>
                                </label>

                                <label class="btn btn-pref btn-warning">
                                  <input type="checkbox" autocomplete="off">
                                  <span class="glyphicon glyphicon-ok"></span>
                                </label>			
                              
                              </div>
                          </div>
                        </fieldset>
                      </div>
                  <hr/>
                    <div class="row">
                        <div class="col-xs-12">
                          <h4 ><span I18n="forums">Forums voileux</span></h4>
                        </div>
                    </div>
                     <div class="row">
                       <fieldset class="fieldset row-fluid">
                          <div class="col-xs-5" >
                            <span I18n="pref_contact_taverne">forum</span>
                          </div>
                          <div class="col-xs-5">
                            <input class="input form-control " id="pref-taverne" value="taverne" style="margin-top:5px;"></input>    
                          </div>
                          <div class="col-xs-2">
                         <div class="btn-group" data-toggle="buttons">
                                
                                <label class="btn btn-pref btn-success">
                                  <input type="checkbox" autocomplete="off" checked>
                                  <span class="glyphicon glyphicon-ok"></span>
                                </label>

                                <label class="btn btn-pref btn-warning">
                                  <input type="checkbox" autocomplete="off">
                                  <span class="glyphicon glyphicon-ok"></span>
                                </label>			
                              
                              </div>
                          </div>
                        </fieldset>
                      </div>
                     <div class="row">
                       <fieldset class="fieldset row-fluid">
                          <div class="col-xs-5" >
                            <span I18n="pref_contact_revatua">forum</span>
                          </div>
                          <div class="col-xs-5">
                            <input class="input form-control " id="pref-revatua" value="revatua" style="margin-top:5px;"></input>    
                          </div>
                          <div class="col-xs-2">
                         <div class="btn-group" data-toggle="buttons">
                                
                                <label class="btn btn-pref btn-success ">
                                  <input type="checkbox" autocomplete="off" checked>
                                  <span class="glyphicon glyphicon-ok"></span>
                                </label>

                                <label class="btn btn-pref btn-warning">
                                  <input type="checkbox" autocomplete="off">
                                  <span class="glyphicon glyphicon-ok"></span>
                                </label>			
                              
                              </div>
                          </div>
                        </fieldset>
                      </div>
                     <div class="row">
                       <fieldset class="fieldset row-fluid">
                          <div class="col-xs-5" >
                            <span I18n="pref_contact_fmv">forum</span>
                          </div>
                          <div class="col-xs-5">
                            <input class="input form-control " id="pref-fmv" value="fmv" style="margin-top:5px;"></input>    
                          </div>
                          <div class="col-xs-2">
                         <div class="btn-group" data-toggle="buttons">
                                
                                <label class="btn btn-pref btn-success ">
                                  <input type="checkbox" autocomplete="off" checked>
                                  <span class="glyphicon glyphicon-ok"></span>
                                </label>

                                <label class="btn btn-pref btn-warning">
                                  <input type="checkbox" autocomplete="off">
                                  <span class="glyphicon glyphicon-ok"></span>
                                </label>			
                              
                              </div>
                          </div>
                        </fieldset>
                      </div>
                    
                    </div>
                  <div class="tab-pane fade" id="PrefBoat">
                    <div class="row">
                      <fieldset class="fieldset row-fluid">
                        <div class="col-xs-6">
                          <span I18n="boatname">boatname</span>
                        </div>
                        <div class="col-xs-6">
                          <input class="input form-control " id="pref_boatname" value="fill it here"></input>    
                        </div>
                      </fieldset>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                          <span I18n="choose_your_country" >Choisir son drapeau</span>
                        </div>
                        <div class="col-xs-6 dropdown">
                          <div id="CountryDropDown" class="dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                          </div>
                          <ul id="CountryDropDownList" class="dropdown-menu  scrollable-menu" style="padding-left:15px; width:300px">
                          </ul>
                        </div>
                      </div>
                      <div class="row">
                         <fieldset class="fieldset row-fluid">
                            <div class="col-xs-6">
                              <span I18n="color" >Couleur du bateau</span>
                            </div>
                            <div class="col-xs-6">
                              <div id="cp11" class="input-group colorpicker-component"> 
                                <input id="pref_boatcolor" type="text" value="#123456" class="form-control input-" />					
                                <span class="input-group-addon"><i></i></span>
                              </div> 
                            </div> 
                         </fieldset>
                      </div>  
                     </div>
                  <div class="tab-pane fade" id="PrefAutre">
                    <div class="row">
                      <p> <a class="pref" href="/playerlogs.php"> Action récentes</a></p>
                      <p> <a class="pref" href="/create_boat.php">  Créer votre bateau.</a><br/><a class="pref" href="/attach_owner.php"> Vous pouvez aussi rattacher un ancien bateau.</a></p>
                      <p> <a class="pref" href="/modify_password.php">Changez votre mot de passe</a></p>
                      <p> <a class="pref" href="/manage_skippers.php">Gestion du boat-sitting</a></p>
                      <p> <a class="pref" href="/manage_profil.php">Gestion du profil</a></p>
                      </div>
                    </div>
                 </div>
                 </div>
                  <div class="modal-footer">
                    <div class="row container-fluid">
                      <div class="col-xs-12">
                         <div class="row">
                          <div class="col-xs-6" align="center">
                            <button id="SettingCancelButton" I18n="cancel" type="button" class="button-black" data-dismiss="modal">Annuler</button>          
                          </div>
                          <div class="col-xs-6" align="center">
                            <button id="SettingValidateButton"  type="button" class="button-black" data-dismiss="modal">Valider</button>
                          </div>
                         </div>
                      </div>
                  </div>
                </div>
            </div>
          </div>
      </div>
      <!-- Modal addpilote order -->
    <div id="AutoPilotSettingForm" class="modal fade" role="dialog">
      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content" id="AutoPilotSettingDlg">              
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 align="center" I18n="pilototo_prog_title" class="modal-title">Pilot</h4>
            </div>
            <div class="modal-body">
              <div class="row container-fluid">
                <div class="col-xs-12">
                  <div class="form-group">
                    <div class="row">
                      <label for="dtp_input2" class="col-md-4 control-label">Date Picking</label>
                      <div class="input-group date form_date col-md-8" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                        <input id="AP_Date" class="form-control" size="12" type="text" value="1/1/1970" >
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                      </div>
				              <input type="hidden" id="dtp_input2" value="13:37" /><br/>
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <label for="dtp_input3" class="col-md-4 control-label">Time Picking</label>
                        <div class="input-group date form_time col-md-8" data-date="" data-date-format="hh:ii:ss" data-link-field="dtp_input3" data-link-format="hh:ii:ss">
                          <input id="AP_Time" class="form-control" size="12" type="text" value="" >
					                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                        </div>
				                <input type="hidden" id="dtp_input3" value="" /><br/>
                      </div>
                    </div>
              </div>
        

            <div class="modal-footer">
              <div class="row container-fluid">
              <div class="col-xs-12">
                 <div class="row">
                  <div class="col-xs-6" align="center">
              <button id="SettingCancelButton" I18n="cancel" type="button" class="button-black" data-dismiss="modal">Annuler</button>          
                  </div>
                  <div class="col-xs-6" align="center">
              <button id="SettingValidateButton"  type="button" class="button-black" data-dismiss="modal">Valider</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
          </div>
          </div>
        </div>
      </div>
    <!-- Modal Races List -->
    <div id="RacesListForm" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div id="RacesListPanel" class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" I18n="current_races" style="text-align:center">racelist</h4>
          </div>
          <div id="RaceListBody" class="modal-body" >
            <div id="RaceListPanel" class="panel group">
            </div>            
          </div>
          <div class="modal-footer">
            <button type="button" class="button-black" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

  </body>
  
</html>

