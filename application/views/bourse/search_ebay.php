<?if(isset($this->session->id)){?>
<div class="fond-color3" style="min-height: 535px;">
    <div class="container">
        <? if($count == 0){ ?>
            <div class="text-center pt-5">
                <h2 class="white">Désolé, aucune annonce trouvée !<br></h2>
                <? if(isset($ebayMsg)){?>
                    <h5 class="orange"><?=$ebayMsg?></h5>
                <?} else {?>
                    <h5 class="orange">Votre requête est limitée par une distance maximum, tentez d'augmenter celle-ci.</h5>
                    <h5 class="orange">Vous utilisez une requête personnalisée, tentez d'autres mots-clés.</h5>
                <?}?>
            </div>
        <?} else {?>
            <div class="d-flex justify-content-center pt-3">
                <h5><?=$count?><?=($count == 1) ? " annonce trouvée" : " annonces trouvées"?></h5>
                <h5 class="mx-3">|</h5>
                <h5><a href="<? echo base_url('bourse')?>" class="text-primary">Lancer une autre requête</a></h5>
            </div>
            <? for($i=0; $i < $count; $i++){ ?>
            <div class="mt-3">
                <div class="row d-flex">
                    <?if(isset($item[$i]->galleryPlusPictureURL[0])){?>
                        <div class="mx-3">
                            <img src="<?=$item[$i]->galleryPlusPictureURL[0]?>" style="width: 150px;" alt="photo"></a>
                        </div>
                    <?} else {?>
                        <div class="mx-3 gabarit">
                            <h6 class="mt-5 text-center">Photo non fournie</h6>
                        </div>
                    <?}?>
                    <div class="col-lg-9 col-12">
                        <div class="d-flex my-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-street-view"></i></div>
                                </div>
                                <? if($item[$i]->country[0] == 'FR'){ ?>
                                    <input class="form-control" type="text" placeholder="<?= isset($item[$i]->postalCode[0]) ? substr($item[$i]->postalCode[0],0,2) : 'NC'?>" readonly >
                                <?} else {?>
                                    <input class="form-control" type="text" placeholder="NC" readonly >
                                <?}?>
                            </div>
                            <input class="form-control col-lg-8 col-6" type="text" placeholder="<?= isset($item[$i]->location[0]) ? $item[$i]->location[0] : 'NC'?>" readonly>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-euro-sign"></i></div>
                                </div>
                                <? $price = $item[$i]->sellingStatus[0]->currentPrice[0]->__value__ ?>
                                <input class="form-control" type="text" placeholder="<?= isset($price) ? $price : 'NC'?>" readonly>
                            </div>
                        </div>
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-plane"></i></div>
                            </div>
                            <input class="form-control" type="text" placeholder="<?= isset($item[$i]->title[0]) ? $item[$i]->title[0] : 'NC'?>" readonly>
                        </div>

                        <div class="d-flex justify-content-end mb-3">
                            <a class="btn btn-info" href="<?=$item[$i]->viewItemURL[0]?>" target="_blank">Voir l'annonce sur EBAY</a>
                            <!-- TODO : ajout favoris ebay 
                            <a class="btn btn-success" href="<? echo base_url('bourse/add_favoris_ebay/'.$i)?>">Ajouter aux favoris</a>-->
                        </div>
                    </div>
                </div>
            </div>
            <?}?>
        <?}?>
        <div class="text-center py-3">
            <h5><a href="<? echo base_url('bourse')?>" class="text-primary">Lancer une autre requête</a></h5>
        </div>
    </div>
</div>
<?}?>