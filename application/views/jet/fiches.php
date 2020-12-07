<div class="fond-color3">
    <div class="container">
        <div class="flex-center">
            <div>
                <section id="avion-img">
                    <ul>
                        <li>
                            <div id="part<?=$photo['position']?>">
                                <div class="images" style="background-image: url('img/<?=$photoRef?>.jpg');"></div>
                            </div>
                        </li>
                    </ul>
                </section>

                <section class="avion-dim">
                    <div class="silouhette">
                        <img src="img/silouhette.png" alt="silouhette" width="150px">
                    </div>
                    <div class="name">
                        <h3><?=$builderName?></h3>
                        <h2><?=$jet['model']?></h2>
                    </div>
                    <div class="flag-pos">
                        <?for($i=1;$i<5;$i++){
                            if(!empty($builder["country_id$i"])){
                                $countryId = $builder["country_id$i"];
                                $query = $db->query("SELECT * FROM countries WHERE countries.id = '$countryId'");
                                $flag = $query->fetch();?>
                                <img src="<?=$flag['flag_url']?>" alt="<?=$flag['code']?>" class="flag">
                            <?}?>
                        <?}?>
                    </div>
                    <div class="bulle b-env">
                        <span><i class="fas fa-ruler-horizontal"></i></span>
                    </div>
                    <div class="bulle b-lg">
                        <span><i class="fas fa-ruler-vertical"></i></span>
                    </div>
                    <div class="bulle b-surf">
                        <span>S</span>
                    </div>
                </section>
            </div>
            
            <section class="avion-car">
                <div>
                    <h4>Poids à vide (Kg)</h4>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100" style="width:25%">
                            <h5><?=$jet['empty_weight']?></h5>
                        </div>
                    </div>
                </div>
                <div>
                    <h4>Poids Maxi au décollage (Kg)</h4>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" aria-valuenow="50"
                            aria-valuemin="0" aria-va luemax="100" style="width:50%">
                            <h5><?=$jet['max_weight']?></h5>
                        </div>
                    </div>
                </div>
                <div>
                    <h4>Poussée moteur Maxi (Kg)</h4>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="50"
                            aria-valuemin="0" aria-valuemax="100" style="width:50%">
                            <h5><?=$jet['max_thrust']?></h5>
                        </div>
                    </div>
                </div>
                <div>
                    <h4>Vitesse Maxi (Km/h)</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="53"
                            aria-valuemin="0" aria-valuemax="100" style="width:50%">
                            <h5><?=$jet['max_speed']?></h5>
                        </div>
                    </div>
                </div>
                <div>
                    <h4>Plafond pratique (m)</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="31"
                            aria-valuemin="0" aria-valuemax="100" style="width:25%">
                            <h5><?=$jet['ceiling']?></h5>
                        </div>
                    </div>
                </div>
                <div>
                    <h4>Rayon d'action (Km)</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100" style="width:25%">
                            <h5><?=$jet['max_range']?></h5>
                        </div>
                    </div>
                </div>
                <div class="flex-bulle">
                    <div>
                        <div class="b1">
                            <div class="bulle">
                                <span><i class="fas fa-ruler-horizontal"></i></span>
                            </div>
                            <div class="rect">
                                <h4><?=$jet['span']?> m</h4>
                            </div>
                        </div>
                    </div>
                    <div class="b2">
                        <div class="bulle">
                            <span><i class="fas fa-ruler-vertical"></i></span>
                        </div>
                        <div class="rect">
                            <h4><?=$jet['lenght']?> m</h4>
                        </div>
                    </div>
                    <div class="b3">
                        <div class="bulle">
                            <span>S</span>
                        </div>
                        <div class="rect">
                            <h4><?=$jet['surf']?> m2</h4>
                        </div>
                    </div>
                    <div class="b4">
                        <div class="bulle">
                            <span><i class="fas fa-user-astronaut"></i></span>
                        </div>
                        <div class="rect">
                            <h4>Pilote x <?=$jet['pilot']?></h4>
                        </div>
                    </div>
                    <div class="b5">
                        <div class="bulle">
                            <span><i class="fas fa-bolt"></i></span>
                        </div>
                        <div class="rect">
                            <h4>Moteur x <?=$jet['engine']?></h4>
                        </div>
                    </div>
                </div>
            </section>

            <section class="container avion-choice">
                <div class="flex-between">
                    <div class="bouton">
                        <a href="reaction-modeles.php?id=<?=($jetId-1)?>"><h4><i class="fas fa-chevron-left"></i>  Précédent</h4></a>
                    </div>
                    <div class="bouton">
                        <a href="reaction-modeles.php?id=<?=($jetId+1)?>"><h4>Suivant class="fas fa-chevron-right"></i></h4></a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>