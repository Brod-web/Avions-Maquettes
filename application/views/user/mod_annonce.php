<?if(isset($this->session->id)){?>
<div class="fond-color3" style="min-height: 535px;">
    <div class="container">
        <h3 class="orange text-center mt-5 mb-3">Modifiez votre annonce :</h3>
        <div>
            <div class="row">
                <div class="text-center">
                    <?if(isset($this->session->photo)){?>
                        <div class="mx-3">
                            <img src="<? echo base_url().'uploads/'.$this->session->photo?>" width="150px" alt="photo">
                        </div>
                    <?} elseif($annonce->photo != "") {?>
                        <div class="mx-3">
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
                    <input class="form-control mb-1" type="text" placeholder="votre localisation : département <?=$annonce->dept?> | <?=$annonce->location?>" readonly>
                    
                    <div class="d-flex my-1">
                        <input class="form-control col-2" type="text" placeholder="<?=$annonce->deal?>" readonly>
                        <input class="form-control col-8" type="text" placeholder="<?=sprintf("%02d", $annonce->model_id)?> _ <?=$annonce->builder_name?> <?=$annonce->model_name?>" readonly>
                        <input class="form-control col-2" type="text" placeholder="Prix (€)" value="<?=$annonce->price?>" name="price">
                    </div>
                    <input class="form-control my-1" type="text" placeholder="Votre message" value="<?=$annonce->text?>" name="text">
                    
                    <div class="d-flex justify-content-end my-2">
                        <input class="btn btn-info" type="submit" name="submit" value="Enregistrer"/>
                        <a class="btn btn-danger mx-1" href="<? echo base_url('user/del_photo/'.$annonce->id)?>">Supprimer photo</a>
                        <a class="btn btn-success" href="<? echo base_url('user')?>">Retour</a>
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

