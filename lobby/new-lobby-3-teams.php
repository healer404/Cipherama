<div class="col-md-10 margin-off text-center">
    <header><span class="text-uppercase game-lobby-header"><h1>Game Lobby</h1></span></header>
</div>
<div class="col-md-2 margin-off text-center">
    <header><span class="text-uppercase game-lobby-header"><h1>Players</h1></span></header>
</div>
<div class="col-md-12">
    <div class="col-md-10 margin-off">
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <a href="addteam1.php?gameid=<?php echo $id; ?>&creator=<?php echo $creator; ?>">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12 margin-off">
                            <div class="team-container margin-off col-md-12 text-center team-air">
                                <div class="col-md-12 team-logo ">
                                    <img src="../assets/img/logo-team/Air.jpg" alt="Air Logo">
                                </div>
                                <div class="col-md-12 margin-off">
                                    <h3 class="text-center team-name-air">
                                        AIR
                                    </h3>
                                </div>
                                <div class="col-md-12 margin-off players-list-air">
                                    <team-air></team-air>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="addteam2.php?gameid=<?php echo $id; ?>&creator=<?php echo $creator; ?>">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12 margin-off">
                            <div class="team-container margin-off col-md-12 text-center team-earth">
                                <div class="col-md-12 team-logo ">
                                    <img src="../assets/img/logo-team/Earth.jpg" alt="Earth Logo">
                                </div>
                                <div class="col-md-12 margin-off">
                                    <h3 class="text-center team-name-earth">
                                        EARTH
                                    </h3>
                                </div>
                                <div class="col-md-12 margin-off players-list-earth">
                                    <team-earth></team-earth>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="addteam3.php?gameid=<?php echo $id; ?>&creator=<?php echo $creator; ?>">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12 margin-off">
                            <div class="team-container margin-off col-md-12 text-center team-fire">
                                <div class="col-md-12 team-logo ">
                                    <img src="../assets/img/logo-team/Fire.jpg" alt="Fire Logo">
                                </div>
                                <div class="col-md-12 margin-off">
                                    <h3 class="text-center team-name-fire">
                                        FIRE
                                    </h3>
                                </div>
                                <div class="col-md-12 margin-off players-list-fire">
                                    <team-fire></team-fire>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-2 margin-off">
        <div class="card">
            <div class="card-body">
                <div class="col-md-12 margin-off players-waiting-list">
                    <div class="col-md-12 margin-off players-waiting-list-holder">
                        <players-waiting></players-waiting>
                    </div>
                    <div class="col-md-12 margin-off leave-btn text-center">
                        <a href="leavelobby.php?gameid=<?php echo $id; ?>&creator=<?php echo $creator?>" class="btn btn-danger">LEAVE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
