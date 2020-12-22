<div class="fond-color3">
    <div class="container">
        <table class="table table-hover mt-4">
            <thead class="thead-light">
                <tr class="text-center">
                    <th>N°</th>
                    <th>Constructeur / Modèle</th>
                    <th>Carrière</th>
                    <th>Longévité (années)</th>
                    <th>Nb fabriqués</th>
                    <th>Pays</th>
                </tr>
            </thead>
            <tbody>
                <?foreach($jets as $jet){?>
                    <tr class="selectionable text-center">
                        <td><?=sprintf("%02d", $jet->id)?></td>
                        <td>
                            <div class="d-flex flex-wrap">
                                <h5 class="mr-3"><?=$jet->builder_name?></h5>
                                <h5 class="collec"><a href="<? echo base_url('jet/card/'.$jet->id)?>"><?=$jet->model?></a></h5>
                            </div>
                        </td>
                        <td>
                            <?=$jet->carrier_start?> - <?= (isset($jet->carrier_end)) ? $jet->carrier_end : "<strong>En service</strong>" ?>
                        </td>
                        <td><?=$jet->longevity?></td>
                        <td><?= (isset($jet->built_nb)) ? $jet->built_nb : 'NC' ?></td>
                        <td>
                            <?for($i=1;$i<5;$i++){
                                $flagCode = "flag$i";
                                if(!empty($jet->$flagCode)){?>
                                    <img src="<? echo base_url().'assets/flags/'.$jet->$flagCode.'.png'?>" style="width: 40px;" alt="<?=$jet->$flagCode?>">
                                <?}
                            }?>
                        </td>
                    </tr>
                <?}?>
            </tbody>
        </table>
    </div>
</div>

<script>
$('#list').addClass('on');
</script>
    
                            