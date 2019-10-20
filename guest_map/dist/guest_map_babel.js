"use strict";function _typeof(t){return(_typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(t)}var webhost=window.location.hostname,baseurl="//v-l-m.org";baseurl="https:"===location.protocol?"https:"+baseurl:"http:"+baseurl;var map_lat,map_lon,idr,today=new Date,secs=today.getSeconds(),mns=today.getMinutes(),hrs=today.getHours(),dday=today.getDate(),dmonth=today.getMonth()+1,dyear=today.getFullYear(),current_date=dday+"/"+dmonth+"/"+dyear+" "+hrs+":"+mns+":"+secs,cur_tsp=Math.ceil((new Date).getTime()/1e3),starttime=cur_tsp-86400,endtime=cur_tsp,LMap=null,boat_idu=[],boat_rank=[],boat_color=[],boat_pos=[],boat_mark=[],boat_texte=[],boat_win=[],boat_info=[],boat_track=[],boats=[];function start(){void 0===(idr=$.getUrlVar("idr"))?display_races_list():(boats=refresh_ranking(idr),display_race())}function refresh_all(){if(boat_mark){for(var t in boat_mark)boat_mark[t]&&boat_mark[t].removeFrom(LMap);boat_mark.length=0}boats=refresh_ranking(idr),draw_all_boats()}function display_races_list(){$.ajax({async:!1,url:"/ws/raceinfo/list.php",dataType:"json",cache:!1,success:function(t){var a="",e="",o="",r="",n="";for(var s in t)t[s].started>0?(e="Commenc&eacute;e",r="TxtRaceRun"):(e="En attente",r="TxtRaceOpen"),t[s].closetime<cur_tsp?(o="Ferm&eacute;e",n="TxtRaceClosed"):(o="Ouverte",n="TxtRaceOpen"),a=a+"<tr bgcolor='#ffffff'><td class='txtbold1'>"+t[s].idraces+"</td><td align='center' class='txtbold1'><a href='index.html?idr="+t[s].idraces+"' align='center'>"+t[s].racename+"</a></td><td class='"+r+"' align='center'>"+e+"</td><td class='"+n+"' align='center'>"+o+"</td><td><a href='index.html?idr="+t[s].idraces+"'><img src='"+baseurl+"/images/site/cartemarine.png' border='0'><a/></tr>\n";document.getElementById("tab_listrace").innerHTML="<div align='center'><h2>Courses en cours ou courses dont le d&eacute;part est &agrave; venir</h2><br/><br/><table bgcolor='#000000'><tr class='STxtRank'><td></td><td>Course</td><td>Etat</td><td>Inscription</td><td>Carte</td></tr>"+a+"</table></div><br/><br/><br/><br/><br/><br/>"},error:function(){alert("erreur => display_races_list()!")}})}function display_race(){var t=new L.map("map_canvas",{zoom:9});if(!LMap){LMap=t;new L.TileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",{minZoom:1,maxZoom:18,attribution:'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'}).addTo(LMap),new L.TileLayer("https://t1.openseamap.org/seamark//{z}/{x}/{y}.png",{minZoom:1,maxZoom:18,attribution:'Map data © <a href="http://openSeamap.org">OpenSeaMap</a> contributors'}).addTo(LMap)}return get_raceinfo(t,idr),draw_all_boats(),t}function refresh_race(t){boats=liste_boats(t),refresh_ranking(t);for(var a=1;a<boats.length;a++)carte.removeOverlay(bateau[a]);bateau=[];for(var e=1;e<boats.length;e++)label=one_boat_label(boats,e),bateau[e]=icon_boat(carte,boats[e].latitude,boats[e].longitude,boats[e].rank,label)}function get_raceinfo(t,a){$.ajax({async:!1,url:"/ws/raceinfo/desc.php?idrace="+a,dataType:"json",cache:!1,success:function(t){var a=t.racename,e="<span class='txtbold2'>&nbsp;&nbsp;&nbsp;Course : "+a+"</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class='txtbold1'>Situation des 500 premiers bateaux en course - "+current_date+"</span>&nbsp;&nbsp;&nbsp;&nbsp;<input type='button' name='retour' value='Liste des courses' class='bouton1' onclick=\"document.location.href='index.html';\" />&nbsp;&nbsp;&nbsp;&nbsp;<input type='button' name='refresh' value='Actualiser' class='bouton1'  onclick=\"refresh_all();\" />";document.getElementById("titre_carte").innerHTML=e;var o=t.startlong/1e3,r=t.startlat/1e3;(void 0===map_lat||void 0===map_lon||"0"==map_lat&&"0"==map_lon)&&(map_lat=r,map_lon=o),LMap.setView([map_lat,map_lon]);var n=L.icon({iconUrl:"img/beachflag.png",shadowUrl:"img/beachflag_shadow.png",iconSize:[20,32],shadowSize:[20,32],iconAnchor:[0,32],shadowAnchor:[0,32],popupAnchor:[-3,-76]}),s="<b>START</b><br/><h3>"+a+"</h3>";L.marker([r,o],{icon:n}).bindPopup(s).addTo(LMap);var i=t.races_waypoints,c=0,d=[],l=[[r,o]];for(var p in i){var b=i[p].wporder,u=i[p].wptype,g=i[p].latitude1/1e3,h=i[p].longitude1/1e3;if(l.push([g,h]),d[c]="<span class='txtbold2'>"+i[p].libelle+"</span><hr><strong>Latitude : </strong>"+g+", <strong>Longitude : </strong>"+h+"<br> <strong>Ordre : </strong>"+b+"<br><strong>Type WP : </strong>"+u,race_wps(LMap,[g,h],u,d[c],c),c+=1,i[p].latitude2){var f=i[p].latitude2/1e3,_=i[p].longitude2/1e3;d[c]="<span class='txtbold2'>"+i[p].libelle+"</span><hr><strong>Latitude : </strong>"+f+", <strong>Longitude : </strong>"+_+"<br> <strong>Ordre : </strong>"+b+"<br><strong>Type WP : </strong>"+u,race_wps(LMap,[f,_],u,d[c],c)}}L.polyline(l,{color:"#006699",opacity:.2}).addTo(LMap)}})}function race_wps(t,a,e,o,r){if("Finish"==e){var n=L.icon({iconUrl:"img/beachflag.png",shadowUrl:"img/beachflag_shadow.png",iconSize:[20,32],shadowSize:[20,32],iconAnchor:[0,32],shadowAnchor:[0,32],popupAnchor:[0,-32]});L.marker(a,{icon:n}).bindPopup(o).addTo(LMap)}else{var s=L.icon({iconUrl:"img/placemark_circle.png",iconSize:[32,32],shadowSize:[32,32],iconAnchor:[16,16],shadowAnchor:[16,16],popupAnchor:[0,-4]});L.marker(a,{icon:s}).bindPopup(o).addTo(LMap)}}function draw_all_boats(){if(void 0!==boats&&"object"===_typeof(boats)){var t=0;for(var a in boats)if(boats[a]){boat_idu[a]=boats[a].idusers,boat_rank[a]=boats[a].rank,boat_color[a]=boats[a].color,boat_pos[a]={Lat:boats[a].latitude,Lon:boats[a].longitude},boat_texte[a]=make_boat_texte(boats[a].idusers);var e=void 0;e="1"==boat_rank[a]?"img/boat.php?idu="+boat_idu[a]+"&rank=1":"img/boat.php?idu="+boat_idu[a]+"&rank=n";var o=L.icon({iconUrl:e,iconSize:[40,32],iconAnchor:[20,16],shadowAnchor:[16,16],popupAnchor:[-4,-15]});if(boat_mark[a]=L.marker([boats[a].latitude,boats[a].longitude],{icon:o}).bindPopup(boat_texte[a]).addTo(LMap),++t>500)return}}}function draw_one_boat(t){get_track(t,boats[t].color),boat_texte[t]=make_boat_texte(boats[t].idusers),boat_pos[t]=[boats[t].latitude,boats[t].longitude];var a="n";"1"==boats[t].rank&&(a="1");var e="img/boat.php?idu="+t+"&rank="+a,o=L.icon({iconUrl:e,iconSize:[40,32],iconAnchor:[20,16],shadowAnchor:[16,16],popupAnchor:[-4,-15]});boat_mark[t]=L.marker([boats[t].latitude,boats[t].longitude],{icon:o}).bindPopup(boat_texte[t]).addTo(LMap)}function get_track(t,a){$.ajax({async:!0,url:"/ws/boatinfo/tracks.php?idu="+t+"&starttime="+starttime,dataType:"json",cache:!1,success:function(e){boat_track[t]&&boat_track[t].removeFrom(LMap);var o=e.tracks,r=[];for(var n in o){var s=o[n][1]/1e3,i=[o[n][2]/1e3,s];r.push(i)}boat_track[t]=L.polyline(r,{color:"#"+a,opacity:.4,weigth:2}).addTo(LMap)},error:function(){alert("erreur => get_track ! ")}})}function refresh_ranking(t){var a;return document.getElementById("tab_ranking").innerHTML="<div class='loading' align='center' style='width:210px;'><br/><br/><img src='img/ajax-loader.gif'/></div>",$.ajax({async:!1,type:"GET",url:"/ws/raceinfo/ranking.php?idr="+t,dataType:"json",cache:!1,success:function(t){if(null!=t)if("0"===(a=t.nb_engaged))map_lat=0,map_lon=0,tab_ranking="<table bgcolor='#ffffff' height='100'><tr class='txtbold2'><td>Pas de bateaux engag&eacute;s dans cette course pour le moment</td></tr></table>",document.getElementById("tab_ranking").innerHTML=tab_ranking;else{var e=$("<TABLE/>",{id:"tbranking"}).appendTo($("DIV#tab_ranking"));$("<THEAD/>").appendTo(e),$("<TR/>").appendTo($("thead",e)),$("<TH/>",{"data-placeholder":">2",scope:"col",html:"&nbsp;"}).css({width:"20px"}).addClass("STxtRank").appendTo($("thead>tr",e)),$("<TH/>",{"data-placeholder":">2",scope:"col",html:"#"}).css({width:"20px"}).addClass("STxtRank").appendTo($("thead>tr",e)),$("<TH/>",{"data-placeholder":"",scope:"col",html:"navigateur"}).css({width:"160px"}).addClass("STxtRank").appendTo($("thead>tr",e));var o,r,n=$("<TH/>",{scope:"col",html:""}).css({width:"20px"}).addClass("STxtRank").appendTo($("thead>tr",e)),s=$("<A/>",{href:"#"}).addClass("reset").appendTo(n);$("<IMG/>",{src:"./img/reset.gif",alt:"RAZ des filtres"}).appendTo(s),$("<TBODY/>").appendTo(e);var i=t.ranking;for(var c in boats=[],i){var d=i[c].idusers;boats[d]=i[c],"1"===boats[d].rank&&(map_lat=boats[d].latitude,map_lon=boats[d].longitude);var l="ffffff",p=i[c].status,b=i[c].color;"on_coast"==p&&(l="999999"),"locked"==p&&(l="ff6600"),"ffffff"==b&&(b="cccccc"),o=$("<TR/>",{scope:"col"}).addClass("txt1").css({"background-color":"#"+l}).appendTo($("tbody",e)),r=$("<TD/>").addClass("STxtRank").appendTo(o),$("<P/>",{html:i[c].rank}).css({"font-color":b}).appendTo(r),r=$("<TD/>").appendTo(o),$("<P/>",{boat:i[c].idusers,html:i[c].idusers}).addClass("clckb").css({"font-color":b}).appendTo(r),r=$("<TD/>").appendTo(o),$("<P/>",{boat:i[c].idusers,html:i[c].boatpseudo}).addClass("clckb").css({"font-color":b}).appendTo(r),$("<IMG/>",{src:baseurl+"/cache/flags/"+i[c].country+".png"}).css({width:"30",height:"20px"}).appendTo($("<TD/>")).appendTo(o)}$(".clckb").bind("click",function(t){get_boat($(this).attr("boat"))}),e.tablesorter({theme:"blue",widthFixed:!0,widgets:["filter"],headers:{0:{sorter:!0,filter:!0},1:{sorter:!0,filter:!0},2:{sorter:!0,filter:!0},3:{sorter:!1,filter:!1}},widgetOptions:{filter_childRows:!1,filter_columnFilters:!0,filter_cssFilter:"tablesorter-filter",filter_functions:null,filter_hideFilters:!0,filter_ignoreCase:!0,filter_reset:"a.reset",filter_searchDelay:100,filter_startsWith:!1,filter_useParsedData:!1},sortList:[[0,0]]}),$(".loading").hide()}},error:function(){alert("erreur => refresh_ranking !")}}),"0"==a?"0":boats}function get_boat(t){if(void 0!==boats&&boats&&void 0!==boats[t]&&boats[t]){var a=[boats[t].latitude,boats[t].longitude];LMap.setView(a),draw_one_boat(t)}}function make_boat_texte(t){var a="";return void 0!==boats&&boats&&void 0!==boats[t]&&boats[t]&&(a="<img src='"+baseurl+"/cache/flags/"+boats[t].country+".png' width='30' height='20'>&nbsp;&nbsp;<span class='txtbold2'>"+boats[t].boatpseudo+"</span>&nbsp;&nbsp;<i>"+boats[t].idusers+"</i>&nbsp;&nbsp;&nbsp;&nbsp;<span class='TxtRank'>&nbsp;"+boats[t].rank+"&nbsp;</span><hr><strong>Distance parcourue : </strong>"+boats[t].loch+"<br><strong>Latitude : </strong>"+Math.round(1e3*boats[t].latitude)/1e3+",<strong>Longitude : </strong>"+Math.round(1e3*boats[t].longitude)/1e3+"<br><strong>Next WP : </strong>["+boats[t].nwp+"] "+boats[t].dnm+"<br><strong>Moyennes : [1H] </strong>"+boats[t].last1h+",[3H] "+boats[t].last3h+",[24H] "+boats[t].last24h),a}$.extend({getUrlVars:function(){for(var t,a=[],e=window.location.href.slice(window.location.href.indexOf("?")+1).split("&"),o=0;o<e.length;o++)t=e[o].split("="),a.push(t[0]),a[t[0]]=t[1];return a},getUrlVar:function(t){return $.getUrlVars()[t]}});