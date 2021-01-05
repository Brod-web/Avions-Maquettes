<?if(isset($this->session->id)){?>
<div class="fond-color3" style="min-height: 535px;">
    <div class="container">
        <h3 class="orange text-center my-4">Publiez votre annonce :</h3>
        <div>
            <div class="row">
                <div class="text-center pt-4">
                    <?if(isset($this->session->photo)){?>
                        <div class="mx-3">
                            <img src="<? echo base_url().'uploads/'.$this->session->photo?>" width="150px" alt="photo">
                        </div>
                    <?} else {?>
                        <div class="mx-3 gabarit">
                            <h6 class="mt-5">Photo 150 x 150</h6>
                        </div>
                    <?}?>
                        <? $this->session->set_userdata('referred_from', current_url());?>
                        <a class="btn btn-info my-3" href="<? echo base_url('upload/upload_view')?>">Ajout | Modif. photo</a>
                </div>
                
                
                <div class="col-md-9 col-sm-9 col-12">
                    <?=form_open('user/add_annonce')?>
                    <? $dept = substr($user->CP,0,2) ?>
                    <h3>Votre Localisation : dépt. | ville, pays :</h3>
                    <input class="form-control mb-3" type="text" placeholder="<?=$dept?> | <?=$user->ville?>,<?=$user->pays?>" readonly>
                    <div class="d-flex mb-3">
                        <select class="custom-select col-3" name="deal">
                            <option value="A vendre" selected>A vendre</option>
                            <option value="Recherche">Recherche</option>
                            <option value="Echange">Echange</option>
                        </select>
                        <div class="ml-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="jet" value="jet" name="type">
                                <label class="form-check-label" for="jet">Avions de combat à réaction</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="ww2" value="ww2" name="type">
                                <label class="form-check-label" for="ww2">Avions de combat de la 2nde guerre mondiale</label>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex my-1">
                        <select class="custom-select col-9" id="selectCollection" name="model">
                            <option value="0">Choix du modèle</option>
                            <?foreach($jet_data as $jet){ // Création liste modeles avec builder?>
                                <option class="jet" style="display: none;" value="<?=sprintf("%02d", $jet->id)?>"><?=sprintf("%02d", $jet->id)?> _ <?=$jet->builder_name?> <?=$jet->model?></option>
                            <?}?>
                        </select>
                        <input class="form-control col-3" type="text" placeholder="prix (€)" name="price">
                    </div>
                    <input class="form-control my-1" type="text" placeholder="Votre message" name="text">
                    
                    <div class="d-flex justify-content-end my-2">
                        <input class="btn btn-info" type="submit" name="submit" value="Enregistrer"/>
                        <a class="btn btn-success ml-1" href="<? echo base_url('user')?>">Retour</a>
                    </div>
                    <!-- Affichage erreurs formulaire -->
                    <? echo validation_errors(); ?>
                    </form>
                </div>
                
            </div>  
        </div>
    </div>
</div>
<?}?>

<script>

let radios = document.getElementsByClassName('form-check-input');
let options = document.querySelectorAll(`#selectCollection option`);
let type = "";

for(radio of radios){
    radio.addEventListener('click',function(){
        type = this.value;
        for(let option of options){
            option.style.display = (option.className==type) ? "block" : "none";
        }
    })
}

/* AUTRE POSSIBILITE avec ajout 
        - onclick="switchCollection('jet') dans input radio jet
        - onclick="switchCollection('ww2') dans input radio ww2

function switchCollection(type) {
    let select = document.querySelectorAll(`#selectCollection option`);
    let options = document.querySelectorAll(`#selectCollection option.${type}`);
    
    console.log(options);
    console.log(type);
    
    for(let option of select){
        option.style.display="none";
    }

    for(let option of options){
        option.style.display="block";
    }
}*/
</script>

