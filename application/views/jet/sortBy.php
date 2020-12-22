<div class="fond-color3" style="min-height: 535px;">
    <div class="container d-flex justify-content-center">
        
            <table class="table table-hover mt-4">
                <thead class="thead-light">
                    <tr class="text-center">
                        <th>Rang</th>
                        <th>Constructeur / Modèle</th>
                        <th>Equipage</th>
                        <th>Nb moteurs</th>
                        <th><?=$field[1]?></th>
                        <th>Pays</th>
                    </tr>
                </thead>
                <tbody>
                    <?$rank = 1;
                    foreach($jets as $jet){?>
                        <tr class="selectionable text-center">
                            <td><?=sprintf("%02d", $rank)?></td>
                            <td>
                                <div class="d-flex flex-wrap">
                                    <h5 class="mr-2"><?=$jet->builder_name?></h5>
                                    <h5 class="collec"><a href="<? echo base_url('jet/card/'.$jet->id)?>"><?=$jet->model?></a></h5>
                                </div>
                            </td>
                            <?$concerned_field = $field[0];?>
                            <td><?=$jet->pilot?></td>
                            <td><?=$jet->engine?></td>
                            <td><?=$jet->$concerned_field?></td>
                            <td>
                            <?for($i=1;$i<5;$i++){
                                $flagCode = "flag$i";
                                if(!empty($jet->$flagCode)){?>
                                    <img src="<? echo base_url().'assets/flags/'.$jet->$flagCode.'.png'?>" style="width: 40px;" alt="<?=$jet->$flagCode?>">
                                <?}
                            }?>
                            </td>
                        </tr>
                    <?$rank ++;
                    }?>
                </tbody>
            </table>
        

        <!--<div class="col-md-6 col-sm-6 col-12"> // Plus utilisé
            <h3 class="text-center my-3"><?= ($field[0] != 'carrier_start') ? 'Les derniers ...' : 'Les plus anciens';?></h3>
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr class="text-center">
                        <th>Rang</th>
                        <th>Constructeur / Modèle</th>
                        <th><?=$field[1]?></th>
                    </tr>
                </thead>
                <tbody>
                    <?$rank = 52;
                    foreach($last_items as $last){?>
                        <tr class="selectionable text-center">
                            <td><?=sprintf("%02d", $rank)?></td>
                            <td>
                                <div class="d-flex flex-wrap">
                                    <h5 class="mr-2"><?=$last->builder_name?></h5>
                                    <h5 class="collec"><a href="<? echo base_url('jet/card/'.$last->id)?>"><?=$last->model?></a></h5>
                                </div>
                            </td>
                            <?$concerned_field = $field[0];?>
                            <td><?=$last->$concerned_field?></td>
                        </tr>
                    <?$rank --;
                    }?>
                </tbody>
            </table>
        </div>-->
    </div>
</div>

<script>
$('#sortBy').addClass('on');
</script>
