<?if(isset($this->session->id)){?>
<div class="fond-color3">
    <div class="container">

        <div class="d-flex justify-content-center mt-4">
            <img src="<? echo base_url().'assets/img/logo-user.jpg'?>" style="width: 200px;" alt="user" id="dashboard">
            <div class="d-flex flex-wrap mt-4">
                <h3 class="orange ml-3 mr-2" style="border-bottom: 2px solid;"><?=strtoupper($this->session->pseudo)?> (compte : public)</h3>
                <h5 class="mt-2"><a href="<? echo base_url('user/mod_infos')?>" style="color: blue;">Modifier</a></h5>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="d-flex justify-content-start flex-wrap mt-4">
                    <div class="col-3">
                        <input class="form-control mb-1" type="text" placeholder="Nom" value="<?=$user->nom?>" readonly>
                        <input class="form-control" type="text" placeholder="Prénom" value="<?=$user->prenom?>" readonly>
                    </div>
                    <div class="col-6">
                        <input class="form-control mb-1" type="text" placeholder="Adresse" value="<?=$user->adresse?>" readonly>
                        <input class="form-control" type="text" placeholder="CP | Ville | Pays" value="<?=$user->CP?> | <?=$user->ville?> | <?=$user->pays?>" readonly>
                    </div> 
                    <div class="col-3">
                        <input class="form-control mb-1" type="text" placeholder="Email" value="<?=$user->email?>" readonly>
                        <input class="form-control" type="text" placeholder="Téléphone" value="<?=$user->phone?>" readonly>
                    </div>
                </div>
            </div>    
        </div>
        <hr>

        <div class="row mt-4">
            <div class="col-md-6 col-sm-6 col-12">
                <div class="d-flex justify-content-end">
                    <div class="mr-4 text-right">
                        <div class="mb-5">
                            <a class="btn btn-success" href="<? echo base_url('user/aff_collection/jet')?>">En images</a>
                            <a class="btn btn-info" href="<? echo base_url('user/mod_collection/jet')?>">Mettre à jour</a>
                        </div>
                        <h6>Vous détenez <?=$collection->jetCount?> <?= ($collection->jetCount > 1) ? 'maquettes' : 'maquette';?></h6>
                        <h6 class="mb-3">ainsi que <?=$collection->jetDoubleCount?> <?= ($collection->jetDoubleCount > 1) ? 'doubles' : 'double';?></h6>
                        <? $jetMiss = 73 - $collection->jetCount ?>
                        <h6 class="orange"><?=$jetMiss?> <?= ($jetMiss > 1) ? 'maquettes vous manquent' : 'maquette vous manque';?></h6> 
                    </div>
                    <div class="mb-3">
                        <img src="<? echo base_url().'assets/img/poster-jet.jpg'?>" alt="a reaction">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12">
                <div class="d-flex justify-content-start">
                    <div>
                        <img src="<? echo base_url().'assets/img/poster-ww2.jpg'?>" alt="2nde guerre mondiale">
                    </div>
                    <div class="ml-4 mb-5 text-left">
                        <div class="mb-5">
                            <a class="btn btn-info" href="<? echo base_url('user/mod_collection/ww2')?>">Mettre à jour</a>
                            <a class="btn btn-success" href="<? echo base_url('user/aff_collection/ww2')?>">En images</a>
                        </div>
                        <h6>Vous détenez <?=$collection->ww2Count?> <?= ($collection->ww2Count > 1) ? 'maquettes' : 'maquette';?></h6>
                        <h6 class="mb-3">ainsi que <?=$collection->ww2DoubleCount?> <?= ($collection->ww2DoubleCount > 1) ? 'doubles' : 'double';?></h6>
                        <? $ww2Miss = 60 - $collection->ww2Count ?>
                        <h6 class="orange"><?=$ww2Miss?> <?= ($ww2Miss > 1) ? 'maquettes vous manquent' : 'maquette vous manque';?></h6> 
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-center">
            <div><h3 class="orange">Vos annonces personnelles</h3></div>
            <div>
                <a class="btn btn-info ml-3" href="<? echo base_url('user/add_annonce')?>">Ajouter une annonce</a>
            </div>
        </div>
        
        <? foreach($annonces as $annonce){?>
            <div class="mt-3">
                <div class="row">
                    <?if($annonce->photo != ""){?>
                        <div class="mx-3">
                            <a href="<? echo base_url().'uploads/'.$annonce->photo?>" target="_blank"><img src="<? echo base_url().'uploads/'.$annonce->photo?>" style="width: 150px;" alt="photo"></a>
                        </div>
                    <?} else {?>
                        <div class="mx-3 gabarit">
                            <h6 class="mt-5 text-center">Photo non fournie</h6>
                        </div>
                    <?}?>
                    <div class="col-md-9 col-sm-9 col-12">
                        <div class="d-flex my-1">
                            <input class="form-control col-2" type="text" placeholder="<?=$annonce->deal?>" readonly>
                            <input class="form-control col-8" type="text" placeholder="<?=sprintf("%02d", $annonce->model_id)?> _ <?=$annonce->builder_name?> <?=$annonce->model_name?>" readonly>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-euro-sign"></i></div>
                                </div>
                                <input class="form-control" type="text" placeholder="prix (€)" readonly name="price" value="<?=$annonce->price?>"> <!--pourrait être modif ici -->
                            </div>
                        </div>
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-comments"></i></div>
                            </div>
                            <input class="form-control" type="text" placeholder="Votre message" readonly name="text" value="<?=$annonce->text?>"> <!--pourrait être modif ici -->
                        </div>

                        <div class="d-flex justify-content-end">
                            <a class="btn btn-info mr-1" href="<? echo base_url('user/mod_annonce/'.$annonce->id)?>">Modifier</a>

                            <a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-<?=$annonce->id?>">Supprimer</a>
                        </div>

                        <!-- Fenetre modal Confirmation suppression, data-target personnalisé -->
                        <div class="modal fade" id="deleteModal-<?=$annonce->id?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="alert alert-danger mt-3 text-center" role="alert">
                                            <? echo "Etes-vous sur de vouloir supprimer cette annonce ?";?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        <a class="btn btn-danger" href="<? echo base_url('user/del_annonce/'.$annonce->id)?>">Supprimer</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?}?>
        <hr>
        <div class="d-flex justify-content-center">
            <div><h3 class="orange text-center">Vos annonces favorites</h3></div>
            <div>
                <a class="btn btn-info ml-3" href="<? echo base_url('bourse/index')?>">Faire une recherche</a>
            </div>
        </div>

        <? foreach($favorites as $favorite){ ?>
            <div class="mt-3">
                <div class="row">
                    <?if($favorite->photo != ""){?>
                        <div class="mx-3">
                            <a href="<? echo base_url().'uploads/'.$favorite->photo?>" target="_blank"><img src="<? echo base_url().'uploads/'.$favorite->photo?>" style="width: 150px;" alt="photo"></a>
                        </div>
                    <?} else {?>
                        <div class="mx-3 gabarit">
                            <h6 class="mt-5 text-center">Photo non fournie</h6>
                        </div>
                    <?}?>
                    <div class="col-md-9 col-sm-9 col-12">
                        <div class="d-flex my-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-street-view"></i></div>
                                </div>
                                <input class="form-control" type="text" placeholder="<?= (isset($favorite->dept)) ? $favorite->dept : 'NC'?>" readonly >
                            </div>
                            <input class="form-control col-8" type="text" placeholder="<?= (isset($favorite->location)) ? $favorite->location : 'NC'?>" readonly>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-euro-sign"></i></div>
                                </div>
                                <input class="form-control" type="text" placeholder="<?= isset($favorite->price) ? $favorite->price : 'NC'?>" readonly>
                            </div>
                        </div>
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-plane"></i></div>
                            </div>
                            <input class="form-control" type="text" value="<?=sprintf("%02d", $favorite->model_id)?> _ <?=$favorite->builder_name?> <?=$favorite->model_name?>" readonly>
                        </div>

                        <div class="d-flex justify-content-end mb-3">
                            <a class="btn btn-info mr-1" data-toggle="modal" data-target="#detailModal-<?=$favorite->id?>">Contacter</a>
                            <a class="btn btn-success" href="<? echo base_url('bourse/del_favoris/'.$favorite->id)?>">Retirer des favoris</a>
                        </div>

                        <!-- Fenetre modal détail favorite, data-target personnalisé -->
                        <div class="modal fade" id="detailModal-<?=$favorite->id?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content" style="color: black;">
                                <? foreach($members as $member){
                                    if($favorite->user_id == $member->id){?>
                                    
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
                                            <textarea class="form-control" id="message-text"><?=$favorite->text?></textarea>
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
        <?}?>
        
    </div>
</div>
<?}?>

<script>
$('#dashboard').addClass('on');
</script>

