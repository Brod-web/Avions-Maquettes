<?if(isset($this->session->id)){?>
<div class="fond-color3">
    <div class="container" style="min-height: 535px;">
    
        <? $collectionName = "jet" ?> <!-- A REACTION -->
        <div class="row py-5">
            <div class="mt-5">
                <img src="<? echo base_url().'assets/img/poster-jet.jpg'?>" alt="a reaction">
            </div>
            
            <div class="col-md-9 col-sm-9 col-12 ml-3">
                <?$haveTable = str_split($collection->jet_have);
                // test > collection active
                if($haveTable[0] > 0){?>
                    <?=form_open("user/mod_collection/$collectionName")?>
                    <div>
                        <h3 class="orange mb-2">Je posséde les maquettes numérotées :</h3>
                    </div>
                    <div>
                    <?for($i=1; $i < 74; $i++){?>
                        <div class="form-check form-check-inline">
                            <?if($haveTable[$i] > 0){?>
                                <input class="form-check-input" type="checkbox" id="checkbox<?=$i?>" name="model<?=$i?>" checked>
                            <?} else {?>
                                <input class="form-check-input" type="checkbox" id="checkbox<?=$i?>" name="model<?=$i?>">
                            <?}?>
                            <label class="form-check-label" for="checkbox<?=$i?>"><?=sprintf("%02d", $i)?></label>
                        </div>
                    <?}?>
                    <div class="d-flex justify-content-end">
                        <input class="btn btn-info mr-1" type="submit" value="Enregistrer"/>
                        <? echo validation_errors(); ?>
                        </form>

                        <?=form_open("user/sel_all/$collectionName")?>
                        <input class="btn btn-success" type="submit" value="Tout sélectionner">
                        <? echo validation_errors(); ?>
                        </form>
                    </div><hr>
                    
                    <?=form_open("user/add_double/$collectionName")?>
                    <h3 class="orange mb-2">Je détiens des modèles en double :</h3>
                    <div class="d-flex">
                        <div>
                            <select class="custom-select mr-3" name="new_double">
                            <?for($i=1 ; $i < 74 ; $i++){?>
                                <option value="<?=$i?>"><?=sprintf("%02d", $i)?></option>
                            <?}?>
                            </select>
                        </div>
                            <input class="btn btn-success ml-1 mr-3" type="submit" value="Ajouter | Retirer"/>

                            <?$doubleTable = str_split($collection->jet_double);
                            $double_aff = "";
                            for($i=1 ; $i < 74 ; $i++){
                                if($doubleTable[$i] !== "0"){
                                    $double_aff = $double_aff.' '.$i;
                                }
                            }?>

                            <input class="form-control" type="text" placeholder="liste des doubles" value="<?=$double_aff?>" readonly>
                            <input type="hidden" value="<?=$collection->jet_double?>" name="double">
                            <? echo validation_errors(); ?>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <a class="btn btn-success" href="<? echo base_url('user')?>">Retour</a>
                    </div>
                    </form>
                    
                <?// test > collection inactive
                } else {?>
                    <div>
                        <h3 class="orange">Je ne posséde aucune maquette liée à cette collection</h3>
                        <h3>Si l'information est erronée, merci de mettre à jour votre compte</h3>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <a class="btn btn-success" href="<? echo base_url('user')?>">Retour</a>
                    </div>
                <?}?>
            </div>
        </div>
    </div>
</div>
</form>
<?}?>

        

            