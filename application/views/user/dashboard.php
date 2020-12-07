<div class="fond-color3">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12 col-sm-12 col-12 text-center">
                <h3 class="orange">Bienvenue <?=strtoupper($this->session->pseudo)?> (compte : public)</h3>
                <div class=" d-flex flex-wrap mt-4">
                    <div class="col-md-3 col-sm-3 col-3">
                        <input class="form-control mb-1" type="text" placeholder="Nom" value="<?=$user->nom?>" readonly>
                        <input class="form-control" type="text" placeholder="Prénom" value="<?=$user->prenom?>" readonly>
                    </div>
                    <div class="col-md-6 col-sm-6 col-6">
                        <input class="form-control mb-1" type="text" placeholder="Adresse" value="<?=$user->adresse?>" readonly>
                        <input class="form-control" type="text" placeholder="CP | Ville | Pays" value="<?=$user->CP?> | <?=$user->ville?> | <?=$user->pays?>" readonly>
                    </div> 
                    <div class="col-md-3 col-sm-3 col-3">
                        <input class="form-control mb-1" type="text" placeholder="Email" value="<?=$user->email?>" readonly>
                        <input class="form-control" type="text" placeholder="Téléphone" value="<?=$user->phone?>" readonly>
                    </div>
                </div>
                <a class="btn btn-info mt-3 mb-3" href="<? echo base_url('user/mod_infos')?>">Modifier mes informations</a>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-12">
                <div class="d-flex justify-content-end">
                    <div class="mr-4 mb-5 text-right">
                        <div class="mb-5">
                            <a class="btn btn-success" href="<? echo base_url('user/jet_collection')?>">En images</a>
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
                            <a class="btn btn-success" href="<? echo base_url('user/ww2_collection')?>">En images</a>
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
        <h3 class="orange text-center">Vos annonces personnelles :</h3>
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
                                <input class="form-control" type="text" placeholder="prix (€)" readonly name="price" value="<?=$annonce->price?>" > <!--pourrait être modif ici -->
                            </div>
                        </div>
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-paragraph"></i></div>
                            </div>
                            <input class="form-control" type="text" placeholder="texte de l'annonce" readonly name="text" value="<?=$annonce->text?>"> <!--pourrait être modif ici -->
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
        <a class="btn btn-info" href="<? echo base_url('user/add_annonce')?>">Ajouter une annonce</a>

        <h3 class="orange text-center">Vos annonces favorites :</h3>
        <div class="mt-3">
            <div class="row">
                <div class="mx-3">
                    <img src="<? echo base_url().'uploads/photo1.jpg'?>" width="150px" alt="photo">
                </div>
                <div class="col-md-9 col-sm-9 col-12">
                    <div class="d-flex my-1">
                        <input class="form-control col-9" type="text" placeholder="titre" readonly>
                        <input class="form-control col-3" type="text" placeholder="A vendre" readonly>
                    </div>
                    <input class="form-control mb-1" type="text" placeholder="texte" readonly>
                    <a class="btn btn-info" href="<? echo base_url('bourse/add_contact')?>">Prendre contact</a>
                    <a class="btn btn-danger" href="<? echo base_url('bourse/del_contact')?>">Supprimer des favoris</a>
                </div>
            </div>
        </div>
        <hr>
        <a class="btn btn-info" href="<? echo base_url('bourse/search')?>">Faire une recherche</a>
    </div>
</div>

