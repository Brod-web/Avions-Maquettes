<?=form_open('user/mod_infos')?>
<div class="fond-reaction">
    <div class="fond-color1">
        <div class="container">
            <div class="row pt-3 mb-3">
                <div class="col">
                    <h3 class="orange">Vos informations :</h3>
                </div>
            </div>
            <div class="row d-flex justify-content-end mb-3">
                <div class="col-md-4 col-sm-6 col-12">                                
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Pseudo</span>
                        </div>
                        <input type="text" class="form-control" name="pseudo" value="<?=$user->pseudo?>">
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nom</span>
                        </div>
                        <input type="text" class="form-control" name="nom" value="<?=$user->nom?>">
                    </div>  
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Prenom</span>
                        </div>
                        <input type="text" class="form-control" name="prenom" value="<?=$user->prenom?>">
                    </div>  
                </div>
            </div>

            <div class="row d-flex justify-content-start mb-5">
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-envelope-square"></i></div>
                        </div>
                        <input type="text" class="form-control" name="email" value="<?=$user->email?>">
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-phone-square"></i></div>
                        </div>
                        <input type="text" class="form-control" name="phone" value="<?=$user->phone?>" placeholder="--------">
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-flag"></i></div>
                        </div>
                        <input type="text" class="form-control" name="pays" value="<?=$user->pays?>">
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-start mb-3">
                <div class="col-md-6 col-sm-12 col-12">                                   
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Adresse</span>
                        </div>
                        <input type="text" class="form-control" name="adresse" value="<?=$user->adresse?>">
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-start mb-3">
                <div class="col-md-2 col-sm-6 col-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">CP</span>
                        </div>
                        <input type="text" class="form-control" name="CP" value="<?=$user->CP?>" placeholder="-----">
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Ville</span>
                        </div>
                        <input type="text" class="form-control" name="ville" value="<?=$user->ville?>">
                    </div>
                </div>
            </div>
  
        </div>
    </div>
</div>
<div class="fond-color3" style="min-height: 195px;">
    <div class="container">
        <div class="row d-flex justify-content-end mt-3 mb-3">
            <div>
                <h3 class="orange">Vous collectionnez les avions de combat :</h3>
            </div>
            <div class="ml-3 my-1">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <?$jetCheck = str_split($collection->jet_have);
                            // test > collection active
                            if($jetCheck[0] > 0){?>
                                <input type="checkbox" name="jet" checked>
                            <?} else {?>
                                <input type="checkbox" name="jet">
                            <?}?>
                        </div>
                    </div>
                    <input type="text" class="form-control" value="à réaction">
                </div>
            </div>
            <div class="ml-3 my-1">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <?$ww2Check = str_split($collection->ww2_have);
                            // test > collection active
                            if($ww2Check[0] > 0){?>
                                <input type="checkbox" name="ww2" checked>
                            <?} else {?>
                                <input type="checkbox" name="ww2">
                            <?}?>
                        </div>
                    </div>
                    <input type="text" class="form-control" value="2nde guerre mondiale">
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-between">
            <div class="col-md-6 col-sm-12 col-12">
                <!-- Message accueil -->
                <div class="alert alert-info text-center" role="alert">
                    <?$msg = "<strong>Public</strong> : créez vos annonces, participez à des échanges entre membres</br>
                    <strong>Privé</strong> : les autres membres ne voient pas vos collections";
                    echo $msg;?>
                </div>
                <!-- Affichage erreurs formulaire -->
                <? echo validation_errors(); ?>
            </div>
            <div class="d-flex">
                <div>
                    <h3 class="orange">Votre choix de profil :</h3>
                </div>
                <div class="ml-3 my-1">
                    <select class="custom-select" name="profil">
                        <?if($user->profil == 'public'){?>
                            <option value="public" selected>Public</option>
                            <option value="privé">Privé</option>
                        <?} else {?>
                            <option value="privé" selected>Privé</option>
                            <option value="public">Public</option>
                        <?}?>
                    </select>
                </div>
                <div class="my-1">
                    <input class="btn btn-info ml-2" type="submit" name="submit" value="Enregistrer" />
                    <a class="btn btn-success ml-1" href="<? echo base_url('user')?>">Retour</a>
                </div>
            </div>
        </div>           
    </div>
</div>
</form>