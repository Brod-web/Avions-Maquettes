<div class="fond-color3" style="min-height: 535px;">
    <div class="container">
        <h3 class="orange text-center">Modifiez votre annonce :</h3>
        <div class="mt-3">
            <div class="row">
                <div class="text-center">
                    <?if(isset($this->session->photo)){?>
                        <div class="mx-3 gabarit">
                            <img src="<? echo base_url().'uploads/'.$this->session->photo?>" width="150px" alt="photo">
                        </div>
                    <?} elseif($annonce->photo != "") {?>
                        <div class="mx-3 gabarit">
                            <img src="<? echo base_url().'uploads/'.$annonce->photo?>" width="150px" alt="photo">
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
                    <?=form_open('user/mod_annonce/'.$annonce->id)?>
                    <input class="form-control mb-1" type="text" placeholder="votre localisation : <?=$annonce->pays?> | Dépt. : <?=$annonce->dept?> | Ville : <?=$annonce->ville?>" readonly>
                    

                    <div class="d-flex my-1">
                        <input class="form-control col-2" type="text" placeholder="<?=$annonce->deal?>" readonly>
                        <input class="form-control col-8" type="text" placeholder="<?=sprintf("%02d", $annonce->model_id)?> _ <?=$annonce->builder_name?> <?=$annonce->model_name?>" readonly>
                        <input class="form-control col-2" type="text" placeholder="Prix (€)" value="<?=$annonce->price?>" name="price">
                    </div>
                    <input class="form-control my-1" type="text" placeholder="texte de l'annonce" value="<?=$annonce->text?>" name="text">
                    
                    <div class="d-flex justify-content-end mt-2">
                        <input class="btn btn-info" type="submit" name="submit" value="Enregistrer"/>
                        <a class="btn btn-success ml-1" href="<? echo base_url('user')?>">Retour</a>
                    </div>
                    <!-- Affichage erreurs formulaire -->
                    <? echo validation_errors(); ?>
                    </form>
                </div>
                
            </div>  
        </div>
<!--
        <h3 class="orange text-center">Aperçu :</h3>
        <div class="mt-3">
            <div class="row">
                <div class="mx-3 mb-3">
                    <img src="<? echo base_url().'uploads/photo1.jpg'?>" width="150px" alt="photo">
                </div>
                <div class="col-md-9 col-sm-9 col-12">
                    <div class="d-flex mb-1">
                        <input class="form-control col-9" type="text" placeholder="titre" readonly>
                        <input class="form-control col-3" type="text" placeholder="A vendre" readonly>
                    </div>
                    <input class="form-control mb-1" type="text" placeholder="texte" readonly>
                    <a class="btn btn-info" href="<? echo base_url('user/mod_annonce')?>">Modifier</a>
                    <a class="btn btn-danger" href="<? echo base_url('user/del_annonce')?>">Supprimer</a>
                </div>
            </div>
        </div>-->
    </div>
</div>

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

