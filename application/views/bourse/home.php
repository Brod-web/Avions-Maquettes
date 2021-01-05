<?if(isset($this->session->id)){?>
<div class="fond-color3">
    <div class="container">
        <h2 class="text-center white">Bourse des collectionneurs<br></h2>
        <h5 class="orange text-center">Ils vous manquent quelques modèles ... Trouvez les sur AVIONS + Maquettes ou chez notre partenaire Ebay.</h5>
        <div class="col-md-6 col-sm-6 col-12">
            <? echo validation_errors(); ?>
        </div>
        
        <div class="row mt-4 d-flex justify-content-around">
            <div class="col-md-5 col-sm-12 col-12 mb-3">
                <?=form_open('bourse/search_site')?>
                <div class="d-flex justify-content-start">
                    <img src="<? echo base_url().'assets/img/logo-bourse.jpg'?>" style="width: 200px;" alt="site">
                </div>
                <hr>
                
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="fra" value="fra" name="loc_site" <?if ($this->session->loc_site == 'fra') {echo "checked";}?>>
                    <label class="form-check-label" for="fra">Toute la France</label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" id="dept" value="dept" name="loc_site" <?if ($this->session->loc_site == 'dept') {echo "checked";}?>>
                    <label class="form-check-label" for="dept">Par département</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="all" value="all" name="model" <?if ($this->session->model == 'all') {echo "checked";}?>>
                    <label class="form-check-label" for="all">Tous modèles</label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" id="one" value="one" name="model" <?if ($this->session->model == 'one') {echo "checked";}?>>
                    <label class="form-check-label" for="one">Par modèle</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input collection" type="radio" id="ww2" value="ww2" name="collection">
                    <label class="form-check-label" for="ww2">Avions de combat de la 2nde guerre mondiale</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input collection" type="radio" id="jet" value="jet" name="collection" checked>
                    <label class="form-check-label" for="jet">Avions de combat à réaction</label>
                </div>
                
                <div class="mt-2">
                    <div class="d-flex justify-content-end">
                        <div class="input-group col-4">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Dept.</div>
                            </div>
                            <input class="form-control" type="text" name="dept" value="<?=$this->session->dept?>">
                        </div>
                    </div>
                    <select class="custom-select mt-2" id="selectCollection" name="req_model">
                        <option value="0">Choix du modèle</option>
                        <?foreach($jet_data as $jet){?>
                            <option class="jet" value="<?=sprintf("%02d", $jet->id)?>">
                            <?=sprintf("%02d", $jet->id)?> _ <?=$jet->builder_name?> <?=$jet->model?></option>
                        <?}?>
                        <!--<?foreach($ww2_data as $ww2){?>
                            <option class="ww2" style="display: none;" value="<?=sprintf("%02d", $ww2->id)?>">
                            <?=sprintf("%02d", $ww2->id)?> _ <?=$ww2->builder_name?> <?=$ww2->model?></option>
                        <?}?>-->
                    </select>
                </div>
                <hr>

                <div class="d-flex justify-content-center">
                    <input class="btn btn-info" type="submit" name="submit" value="Lancer la recherche"/>
                </div>
                </form> 
            </div>
        
            <div class="col-md-5 col-sm-12 col-12 mb-3">
                <?=form_open('bourse/search_ebay')?>
                <div class="d-flex justify-content-end">
                    <img src="<? echo base_url().'assets/img/logo-ebay.jpg'?>" style="width: 200px;" alt="site">
                </div>
                <hr>
                
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="fra" value="fra" name="loc_ebay" <?if ($this->session->loc_ebay == 'fra') {echo "checked";}?>>
                    <label class="form-check-label" for="fra">Toute la France</label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" id="dist" value="dist" name="loc_ebay" <?if ($this->session->loc_ebay == 'dist') {echo "checked";}?>>
                    <label class="form-check-label" for="dist">Distance maximum</label>
                </div>
                <h5 class="orange">Requêtes proposées :</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="fas" value="fascicule+avion+altaya" name="req" <?if ($this->session->req == 'fascicule+avion+altaya') {echo "checked";}?>>
                    <label class="form-check-label" for="fas">fascicule+avion+altaya</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="jet" value="altaya+avion+reaction" name="req" <?if ($this->session->req == 'altaya+avion+reaction') {echo "checked";}?>>
                    <label class="form-check-label" for="jet">altaya+avion+reaction</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="ww2" value="altaya+avion+guerre" name="req" <?if ($this->session->req == 'altaya+avion+guerre') {echo "checked";}?>>
                    <label class="form-check-label" for="ww2">altaya+avion+guerre</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="all" value="altaya+avion" name="req" <?if ($this->session->req == 'altaya+avion') {echo "checked";}?>>
                    <label class="form-check-label" for="all">altaya+avion</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="one" value="req_perso" name="req" <?if ($this->session->req == $this->session->req_perso) {echo "checked";}?>>
                    <label class="form-check-label" for="one">requête personnalisée (Ajoutez un + entre chaque mot)</label>
                </div>
                        
                <div class="d-flex mt-3">
                    <input class="form-control col-8" type="text" name="req_perso" value="<?= $this->session->req_perso?>">
                    
                    <div class="input-group mb-1 col-4">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Km</div>
                        </div>
                        <input class="form-control" type="text" name="dist" value="<?=$this->session->dist?>">
                    </div>
                </div>
                <hr>

                <div class="d-flex justify-content-center">
                    <input class="btn btn-info" type="submit" name="submit" value="Lancer la recherche"/>
                </div>
                </form> 
            </div>
        </div>
    </div>
</div>
<?}?>

<script>

let radios = document.getElementsByClassName('collection');
let options = document.querySelectorAll(`#selectCollection option`);
let collection = "";

for(radio of radios){
    radio.addEventListener('click',function(){
        collection = this.value;
        for(let option of options){
            option.style.display = (option.className==collection) ? "block" : "none";
        }
    })
}

</script>

