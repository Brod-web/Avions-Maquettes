<div class="fond-color3">
    <div class="container">
        <section class="container mt-1 mb-3" style="max-width: 540px;">
            <div class="d-flex justify-content-between">
                <div class="prev-next">
                    <?if($jet->id != 1) {?>
                        <a href="<? echo base_url('jet/card/'.($jet->id-1))?>"><h4><i class="fas fa-chevron-left"></i>  Précédent</h4></a>
                    <?} else {?>
                        <a href="<? echo base_url('jet/card/73')?>"><h4><i class="fas fa-chevron-left"></i>  Précédent</h4></a>
                    <?}?>
                </div>
                <div class="prev-next">
                    <?if($jet->id == 73) {?>
                        <a href="<? echo base_url('jet/card/1')?>"><h4><i class="fas fa-chevron-right"></i>  Suivant</h4></a>
                    <?} else {?> 
                        <a href="<? echo base_url('jet/card/'.($jet->id+1))?>"><h4><i class="fas fa-chevron-right"></i>  Suivant</h4></a>
                    <?}?>   
                </div>
            </div>
        </section>
        <div class="d-flex justify-content-center flex-wrap">
            
            <div class="d-flex" id="avion-card">
                <section id="avion-img">
                    <ul>
                        <li>
                            <div id="part<?=$photo->position?>">
                                <div class="n<?=$photo->reference?> images"></div>
                            </div>
                        </li>
                    </ul>
                </section>

                <section class="avion-dim">
                    <div class="silouhette">
                        <img src=<? echo base_url().'assets/img/silouhette.png'?> alt="silouhette" width="150px">
                    </div>
                    <div class="jet-name white">
                        <h3><?=$builder->name?></h3>
                        <h2><?=$jet->model?></h2>
                    </div>
                    <div class="flag-pos">
                        <?for($i=1;$i<5;$i++){
                            $flagCode = "flag$i";
                            if(!empty($jet->$flagCode)){?>
                                <img src="<? echo base_url().'assets/flags/'.$jet->$flagCode.'.png'?>" style="width: 40px;" alt="<?=$jet->$flagCode?>">
                            <?}
                        }?>
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
                        <input type="hidden" id="final1" value="<?=$jet->empty_weight?>">
                        <input type="hidden" id="ratio1" value="<?=($jet->empty_weight/21820*100)?>">
                        <div id="move1" class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                            <h5 style="color: black;"><?=$jet->empty_weight?></h5>
                        </div>
                    </div>
                </div>
                <div>
                    <h4>Poids Maxi au décollage (Kg)</h4>
                    <div class="progress">
                        <input type="hidden" id="final2" value="<?=$jet->max_weight?>">
                        <input type="hidden" id="ratio2" value="<?=($jet->max_weight/46200*100)?>">
                        <div id="move2" class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                            <h5 style="color: black;"><?=$jet->max_weight?></h5>
                        </div>
                    </div>
                </div>
                <div>
                    <h4>Poussée moteur Maxi (Kg)</h4>
                    <div class="progress">
                        <input type="hidden" id="final3" value="<?=$jet->max_thrust?>">
                        <input type="hidden" id="ratio3" value="<?=($jet->max_thrust/15500*100)?>">
                        <div id="move3" class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                            <h5 style="color: black;"><?=$jet->max_thrust?></h5>
                        </div>
                    </div>
                </div>
                <div>
                    <h4>Vitesse Maxi (Km/h)</h4>
                    <div class="progress">
                        <input type="hidden" id="final4" value="<?=$jet->max_speed?>">
                        <input type="hidden" id="ratio4" value="<?=($jet->max_speed/2660*100)?>">
                        <div id="move4" class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                            <h5 style="color: black;"><?=$jet->max_speed?></h5>
                        </div>
                    </div>
                </div>
                <div>
                    <h4>Plafond pratique (m)</h4>
                    <div class="progress">
                        <input type="hidden" id="final5" value="<?=$jet->ceiling?>">
                        <input type="hidden" id="ratio5" value="<?=($jet->ceiling/21000*100)?>">
                        <div id="move5" class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                            <h5 style="color: black;"><?=$jet->ceiling?></h5>
                        </div>
                    </div>
                </div>
                <div>
                    <h4>Rayon d'action (Km)</h4>
                    <div class="progress">
                        <input type="hidden" id="final6" value="<?=$jet->max_range?>">
                        <input type="hidden" id="ratio6" value="<?=($jet->max_range/4620*100)?>">
                        <div id="move6" class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                            <h5 style="color: black;"><?=$jet->max_range?></h5>
                        </div>
                    </div>
                </div>

                <div class="position-absolute bulles">
                    <div class="position-relative">
                        <div class="bulle">
                            <span><i class="fas fa-ruler-horizontal"></i></span>
                        </div>
                        <div class="rect">
                            <h4><?=$jet->span?> m</h4>
                        </div>
                    </div>
                    <div class="position-relative mt-4">
                        <div class="bulle">
                            <span><i class="fas fa-ruler-vertical"></i></span>
                        </div>
                        <div class="rect">
                            <h4><?=$jet->lenght?> m</h4>
                        </div>
                    </div>
                    <div class="position-relative mt-4">
                        <div class="bulle">
                            <span>S</span>
                        </div>
                        <div class="rect">
                            <h4><?=$jet->surf?> m2</h4>
                        </div>
                    </div>
                    <div class="position-relative mt-4">
                        <div class="bulle">
                            <span><i class="fas fa-user-astronaut"></i></span>
                        </div>
                        <div class="rect">
                            <h4>Pilote x <?=$jet->pilot?></h4>
                        </div>
                    </div>
                    <div class="position-relative mt-4">
                        <div class="bulle">
                            <span><i class="fas fa-bolt"></i></span>
                        </div>
                        <div class="rect">
                            <h4>Moteur x <?=$jet->engine?></h4>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>

<script>
$('#card').addClass('on');

for(let i=1; i<7; i++){
    $(function() {
    let progress$i = 0;
    let final$i = document.getElementById(`final${i}`).value;
    let ratio$i = document.getElementById(`ratio${i}`).value;
    let interval$i = setInterval(function() {
        progress$i += 1;
        $(`#move${i}`)
        .css("width", progress$i + "%")
        .attr("aria-valuenow", final$i)
        /*.text(final);*/
        if (progress$i >= 30)
            $(`#move${i}`).removeClass('bg-danger')

        if (progress$i >= 70)
            $(`#move${i}`).addClass('bg-success')

        if (progress$i >= ratio$i)
            clearInterval(interval$i);
    }, 30);
    });
}
</script>