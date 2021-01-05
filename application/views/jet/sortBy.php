<div class="fond-color3" style="min-height: 535px;">
    <div class="container">
        <table class="table table-responsive mt-4">
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
    </div>
</div>

<script>
$('#sortBy').addClass('on');
</script>
