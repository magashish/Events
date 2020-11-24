@extends('layouts.frontendLayout.design')
@section('content')
<main class="main-content-wrapper padd-200">
         <div class="leaderboard-page-wrapper">
          <div class="container">
           <div class="leaderboard-dropdown-wrapper">
              <div class="overall-board-select">
                <h5>WODS:</h5>
                <div id="accordion">
                  <div class="card">
                    <div class="card-header">
                      <a class="collapsed card-link" data-toggle="collapse" href="#overall">OVERALL 
                    </a>
                    </div>
                    <div id="overall" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                        <ul class="dropdown-list">
                        <li class="new" id="wod_13921"><a href="#" data-id="13921">Cluster Truck (WOD 3)</a></li><li class="new" id="wod_13922"><a onclick="loaddiv(13922,'Hard in the Paint(WOD 1)','')" href="#" data-id="13922">Hard in the Paint(WOD 1)</a></li><li class="new" id="wod_13923"><a onclick="loaddiv(13923,'Skill Station 1 Berzerker Annihilation','')" href="#" data-id="13923">Skill Station 1 Berzerker Annihilation</a></li><li class="new" id="wod_13924"><a onclick="loaddiv(13924,'Extra Berzerker Annihilation','')" href="#" data-id="13924">Extra Berzerker Annihilation</a></li><li class="new" id="wod_13925"><a onclick="loaddiv(13925,'Skill Station 2 Snatchsquatch','')" href="#" data-id="13925">Skill Station 2 Snatchsquatch</a></li><li class="new" id="wod_13926"><a onclick="loaddiv(13926,'Extra Snatchsquatch','')" href="#" data-id="13926">Extra Snatchsquatch</a></li><li class="new" id="wod_13927"><a onclick="loaddiv(13927,'Extra Extra Tyrs Fury','')" href="#" data-id="13927">Extra Extra Tyrs Fury</a></li><li class="new" id="wod_13928"><a onclick="loaddiv(13928,' 500M Row In Extra','')" href="#" data-id="13928"> 500M Row In Extra</a></li><li class="new" id="wod_13931"><a onclick="loaddiv(13931,'Extra HERMODS RIDE TO HEL','')" href="#" data-id="13931">Extra HERMODS RIDE TO HEL</a></li><li class="new" id="wod_13933"><a onclick="loaddiv(13933,'Skill Station 4 Row, Bike, Ski Erg','')" href="#" data-id="13933">Skill Station 4 Row, Bike, Ski Erg</a></li><li class="new" id="wod_13934"><a onclick="loaddiv(13934,'Skill Station 5 T2B, C2B,BMUs','')" href="#" data-id="13934">Skill Station 5 T2B, C2B,BMUs</a></li><li class="new" id="wod_13935"><a onclick="loaddiv(13935,'Extra Skill Station T2B, C2B,BMUs','')" href="#" data-id="13935">Extra Skill Station T2B, C2B,BMUs</a></li><li class="new" id="wod_13936"><a onclick="loaddiv(13936,'Station 7 TYRs FURY','')" href="#" data-id="13936">Station 7 TYRs FURY</a></li><li class="new" id="wod_13937"><a onclick="loaddiv(13937,'Extra Extra Skill Station T2B, C2B,BMUs','')" href="#" data-id="13937">Extra Extra Skill Station T2B, C2B,BMUs</a></li><li class="new" id="wod_13938"><a onclick="loaddiv(13938,'Skill Station 6 Unbroken Ring HSPU','')" href="#" data-id="13938">Skill Station 6 Unbroken Ring HSPU</a></li><li class="new" id="wod_13939"><a onclick="loaddiv(13939,'Extra Extra Berzerker Annihilation','')" href="#" data-id="13939">Extra Extra Berzerker Annihilation</a></li><li class="new" id="wod_13940"><a onclick="loaddiv(13940,'Extra Extra Skill Station Row, Bike, Ski Erg	','')" href="#" data-id="13940">Extra Extra Skill Station Row, Bike, Ski Erg	</a></li><li class="new" id="wod_13941"><a onclick="loaddiv(13941,'Extra Skill Station Row, Bike, Ski Erg','')" href="#" data-id="13941">Extra Skill Station Row, Bike, Ski Erg</a></li><li class="new" id="wod_13943"><a onclick="loaddiv(13943,'Extra Tyrs Fury','')" href="#" data-id="13943">Extra Tyrs Fury</a></li><li class="new" id="wod_13944"><a onclick="loaddiv(13944,'Skill Station 8 Hound of Garmr','')" href="#" data-id="13944">Skill Station 8 Hound of Garmr</a></li><li class="new" id="wod_13945"><a onclick="loaddiv(13945,'Ode to Woda(WOD 2)','')" href="#" data-id="13945">Ode to Woda(WOD 2)</a></li><li class="new" id="wod_13946"><a onclick="loaddiv(13946,'Skill Station 9 HERMODS RIDE TO HEL','')" href="#" data-id="13946">Skill Station 9 HERMODS RIDE TO HEL</a></li><li class="new" id="wod_13947"><a onclick="loaddiv(13947,'500 Row In Extra Extra','')" href="#" data-id="13947">500 Row In Extra Extra</a></li><li class="new" id="wod_13948"><a onclick="loaddiv(13948,'Extra Extra Snatchsquatch','')" href="#" data-id="13948">Extra Extra Snatchsquatch</a></li><li class="new" id="wod_13949"><a onclick="loaddiv(13949,'ChaosPlex(floater)reps','')" href="#" data-id="13949">ChaosPlex(floater)reps</a></li><li class="new" id="wod_14167"><a onclick="loaddiv(14167,'ChaosPlex(floater)time','')" href="#" data-id="14167">ChaosPlex(floater)time</a></li><li class="new" id="wod_14168"><a onclick="loaddiv(14168,'Skill Station 3 500m Row In','')" href="#" data-id="14168">Skill Station 3 500m Row In</a></li><li class="new" id="wod_14169"><a onclick="loaddiv(14169,'Extra Extra HERMODS RIDE TO HEL','')" href="#" data-id="14169">Extra Extra HERMODS RIDE TO HEL</a></li></ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="divisons-board-select">
                <h5>DIVISIONS:</h5>
                <div id="accordion">
                  <div class="card">
                    <div class="card-header">
                      <a class="collapsed card-link" data-toggle="collapse" href="#division1">
                        Scaled Female Individual (Age 14+)  
                    </a>
                    </div>
                    <div id="division1" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                         <div class="division-cntnt-list">
                           <div class="row no-mrg">
                               <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
                                <div class="divison-numbers">
                                  <span class="circle-numbers">1</span>
                                </div>
                               </div>
                               <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                      <div class="divisons-center-cntnt">
                                        <h4>Ashley Matthews <span class="small-cntnt">(Crossfit megalodon )</span></h4>
                                      </div>
                               </div>
                               <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
                                <div class="divison-numbers-toggleWrap">
                                    <button class="value-dropdown">434.000 <i class="fas fa-caret-down"></i></button>
                                </div>
                               </div>
                           </div>
                           <div class="collapsed-table-wrap">
                            <table id="myTable" class="table dt-responsive nowrap" cellspacing="0" width="100%">
                              <thead>
                                <tr style="background-color: #000;color: #fff;">
                                  <th>Event</th>
                                  <th class="text-center">Place</th>
                                  <th class="text-center">Score</th>
                                  <th class="text-center">Points</th>
                                </tr>
                              </thead>
                              <tbody>
                                              <tr>
  
                                                    <td>Hard in the Paint(WOD 1)</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">00:10:05.000</td>
                                          <td class="text-center"><span>  (100.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Ode to Woda(WOD 2)</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">00:07:19.000</td>
                                          <td class="text-center"><span>  (100.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Cluster Truck (WOD 3)</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">00:13:04.000</td>
                                          <td class="text-center"><span>  (100.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>ChaosPlex(floater)reps</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">90.246</td>
                                          <td class="text-center"><span>  (100.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>ChaosPlex(floater)time</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">01:00:00.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Skill Station 1 Berzerker Annihilation</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">5.000</td>
                                          <td class="text-center"><span>  (5.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Extra Berzerker Annihilation</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Extra Extra Berzerker Annihilation</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Skill Station 2 Snatchsquatch</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">5.000</td>
                                          <td class="text-center"><span>  (5.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Extra Snatchsquatch</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Extra Extra Snatchsquatch</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Skill Station 3 500m Row In</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">5.000</td>
                                          <td class="text-center"><span>  (5.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td> 500M Row In Extra</td>
                                          <td class="text-center"><span>2</span></td>
                                          <td class="text-center">2.000</td>
                                          <td class="text-center"><span>  (2.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>500 Row In Extra Extra</td>
                                          <td class="text-center"><span>2</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Skill Station 4 Row, Bike, Ski Erg</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">5.000</td>
                                          <td class="text-center"><span>  (5.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Extra Skill Station Row, Bike, Ski Erg</td>
                                          <td class="text-center"><span>2</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Extra Extra Skill Station Row, Bike, Ski Erg	</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Skill Station 5 T2B, C2B,BMUs</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">5.000</td>
                                          <td class="text-center"><span>  (5.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Extra Skill Station T2B, C2B,BMUs</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Extra Extra Skill Station T2B, C2B,BMUs</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Skill Station 6 Unbroken Ring HSPU</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Station 7 TYRs FURY</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Extra Tyrs Fury</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Extra Extra Tyrs Fury</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Skill Station 8 Hound of Garmr</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Skill Station 9 HERMODS RIDE TO HEL</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">5.000</td>
                                          <td class="text-center"><span>  (5.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Extra HERMODS RIDE TO HEL</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">2.000</td>
                                          <td class="text-center"><span>  (2.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
                                                    <td>Extra Extra HERMODS RIDE TO HEL</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">01:00:00.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                        </tbody>
                            </table>
                           </div>
                         </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <a class="collapsed card-link" data-toggle="collapse" href="#division2">
                        Scaled Female Individual (Age 14+)  
                    </a>
                    </div>
                    <div id="division2" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                         <div class="division-cntnt-list">
                           <div class="row no-mrg">
                               <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
                                <div class="divison-numbers">
                                  <span class="circle-numbers">1</span>
                                </div>
                               </div>
                               <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                      <div class="divisons-center-cntnt">
                                        <h4>Ashley Matthews <span class="small-cntnt">(Crossfit megalodon )</span></h4>
                                      </div>
                               </div>
                               <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
                                <div class="divison-numbers-toggleWrap">
                                    <button class="value-dropdown">434.000 <i class="fas fa-caret-down"></i></button>
                                </div>
                               </div>
                           </div>
                           <div class="collapsed-table-wrap">
                            <table id="myTable" class="table dt-responsive nowrap" cellspacing="0" width="100%">
                              <thead>
                                <tr style="background-color: #000;color: #fff;">
                                  <th>Event</th>
                                  <th class="text-center">Place</th>
                                  <th class="text-center">Score</th>
                                  <th class="text-center">Points</th>
                                </tr>
                              </thead>
                              <tbody>
                                              <tr>
  
                                                    <td>Hard in the Paint(WOD 1)</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">00:10:05.000</td>
                                          <td class="text-center"><span>  (100.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Ode to Woda(WOD 2)</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">00:07:19.000</td>
                                          <td class="text-center"><span>  (100.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Cluster Truck (WOD 3)</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">00:13:04.000</td>
                                          <td class="text-center"><span>  (100.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>ChaosPlex(floater)reps</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">90.246</td>
                                          <td class="text-center"><span>  (100.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>ChaosPlex(floater)time</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">01:00:00.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Skill Station 1 Berzerker Annihilation</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">5.000</td>
                                          <td class="text-center"><span>  (5.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Extra Berzerker Annihilation</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Extra Extra Berzerker Annihilation</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Skill Station 2 Snatchsquatch</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">5.000</td>
                                          <td class="text-center"><span>  (5.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Extra Snatchsquatch</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Extra Extra Snatchsquatch</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Skill Station 3 500m Row In</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">5.000</td>
                                          <td class="text-center"><span>  (5.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td> 500M Row In Extra</td>
                                          <td class="text-center"><span>2</span></td>
                                          <td class="text-center">2.000</td>
                                          <td class="text-center"><span>  (2.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>500 Row In Extra Extra</td>
                                          <td class="text-center"><span>2</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Skill Station 4 Row, Bike, Ski Erg</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">5.000</td>
                                          <td class="text-center"><span>  (5.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Extra Skill Station Row, Bike, Ski Erg</td>
                                          <td class="text-center"><span>2</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Extra Extra Skill Station Row, Bike, Ski Erg	</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Skill Station 5 T2B, C2B,BMUs</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">5.000</td>
                                          <td class="text-center"><span>  (5.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Extra Skill Station T2B, C2B,BMUs</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Extra Extra Skill Station T2B, C2B,BMUs</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Skill Station 6 Unbroken Ring HSPU</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Station 7 TYRs FURY</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Extra Tyrs Fury</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Extra Extra Tyrs Fury</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Skill Station 8 Hound of Garmr</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">0.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Skill Station 9 HERMODS RIDE TO HEL</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">5.000</td>
                                          <td class="text-center"><span>  (5.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
  
                                                    <td>Extra HERMODS RIDE TO HEL</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">2.000</td>
                                          <td class="text-center"><span>  (2.000)</span></td>
  
  
                                        </tr>
                                                  <tr>
                                                    <td>Extra Extra HERMODS RIDE TO HEL</td>
                                          <td class="text-center"><span>1</span></td>
                                          <td class="text-center">01:00:00.000</td>
                                          <td class="text-center"><span>  (0.000)</span></td>
  
  
                                        </tr>
                                        </tbody>
                            </table>
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
</main>
<script>
    $(document).ready( function () {
        $('.table').DataTable();
    } );
</script>
<script>
    $(document).ready(function(){
        $('.value-dropdown').click(function(){
        $('.collapsed-table-wrap').toggleClass('show-table');
        });
    });
</script>
@endsection