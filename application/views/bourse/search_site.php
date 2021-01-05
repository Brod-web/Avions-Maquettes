<?if(isset($this->session->id)){?>
<div class="fond-color3" style="min-height: 535px;">
    <div class="container">
        <? if($count == 0){ ?>
            <div class="text-center pt-5">
                <h2>Désolé, aucune annonce trouvée !<br></h2>
                <h5 class="orange">Votre requête est limitée par département ou modèle, elargissez celle-ci.</h5>
            </div>
        <?} else {?>
            <div class="d-flex justify-content-center pt-3">
                <h5><?=$count?><?=($count == 1) ? " annonce trouvée" : " annonces trouvées"?></h5>
                <h5 class="mx-3">|</h5>
                <h5><a href="<? echo base_url('bourse')?>" class="text-primary">Lancer une autre requête</a></h5>
            </div>
            <? foreach($annonces as $annonce){ ?>
            <div class="mt-3">
                <div class="row d-flex">
                    <?if($annonce->photo != ""){?>
                        <div class="mx-3">
                            <a href="<? echo base_url().'uploads/'.$annonce->photo?>" target="_blank"><img src="<? echo base_url().'uploads/'.$annonce->photo?>" style="width: 150px;" alt="photo"></a>
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
                                <input class="form-control" type="text" placeholder="<?= (isset($annonce->dept)) ? $annonce->dept : 'NC'?>" readonly >
                            </div>
                            <input class="form-control col-lg-8 col-6" type="text" placeholder="<?= (isset($annonce->location)) ? $annonce->location : 'NC'?>" readonly>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-euro-sign"></i></div>
                                </div>
                                <input class="form-control" type="text" placeholder="<?= isset($annonce->price) ? $annonce->price : 'NC'?>" readonly>
                            </div>
                        </div>
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-plane"></i></div>
                            </div>
                            <input class="form-control" type="text" value="<?=sprintf("%02d", $annonce->model_id)?> _ <?=$annonce->builder_name?> <?=$annonce->model_name?>" readonly>
                        </div>

                        <div class="d-flex justify-content-end mb-3">
                            <? if($annonce->user_id != $this->session->id){?>
                                <a class="btn btn-info mr-1" data-toggle="modal" data-target="#detailModal-<?=$annonce->id?>">Contacter</a>
                                <? if($annonce->favoris != 1){?>
                                    <a class="btn btn-danger" href="<? echo base_url('bourse/add_favoris_site/'.$annonce->id)?>">Favoris</a>
                                <?} else {?>
                                    <a class="btn btn-success">Favoris</a>
                                <?}?>
                            <?} else {?>
                                <a class="btn btn-warning">Annonce personnelle</a>
                            <?}?>
                        </div>

                        <!-- Fenetre modal détail annonce, data-target personnalisé -->
                        <div class="modal fade" id="detailModal-<?=$annonce->id?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content" style="color: black;">
                                <? foreach($members as $member){
                                    if($annonce->user_id == $member->id){?>
                                    
                                    <div class="modal-header text-center">
                                        <img src="<? echo base_url().'assets/img/logo-user.jpg'?>" style="width: 100px;" alt="user">
                                        <h3 class="modal-title font-weight-bold"><?=$member->pseudo?></h3> 
                                    </div>
                                    <div class="modal-body">
                                        <div>
                                            <i class="fas fa-envelope-square prefix text-grey"></i>
                                            <label> <?=$member->email?></label>
                                        </div>
                                        <div>
                                            <i class="fas fa-phone-square prefix text-grey"></i>
                                            <label> <?=$member->phone?></label>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Message:</label>
                                            <textarea class="form-control" id="message-text"><?=$annonce->text?></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    </div>
                                    <?}?>
                                <?}?>
                                </div>
                            </div>
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