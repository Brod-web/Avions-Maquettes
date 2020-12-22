<div class="fond-reaction">
    <div class="fond-color1">
        <div class="container d-flex justify-content-end">
            <div class="col-md-4 col-sm-7 col-8 pt-3 mr-5">
                <?=form_open('signin/inscription')?>     
                    <div class="form-group">
                        <h3 class="text-center mb-3 orange">Merci de compléter :</h3>
                         
                        <input class="form-control mb-3" type="text" name="pseudo" placeholder="pseudo"/>

                        <input class="form-control mb-3" type="text" name="email" placeholder="email"/>

                        <input class="form-control mb-3" type="password" name="password" placeholder="nouveau mot de passe"/>

                        <input class="btn btn-info" type="submit" name="submit" value="Enregistrer" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="fond-color3" style="min-height: 195px;">
    <div class="container">
        <h2>2 univers et 1 lieu d'échange entre collectionneurs.</h2>
        <div class="d-flex justify-content-end">
            <div class="col-md-5 col-sm-12 col-12 mt-4">
                <!-- Message accueil -->
                <div class="alert alert-info text-center" role="alert">
                    <?$msg = "Entrez vos pseudo et email, ainsi qu'un nouveau mot de passe.";
                    echo $msg;?>
                </div>
                <!-- Affichage erreurs formulaire -->
                <? echo validation_errors(); ?>
                <!-- Affichage info inscription -->
                <? if ($this->session->flashdata('info')){?>
                    <div class="alert alert-success mt-3" role="alert">
                        <? echo $this->session->flashdata('info');?>
                    </div>
                <?}?>
                <!-- Affichage inscription non valide -->
                <? if ($this->session->flashdata('notvalid')){?>
                    <div class="alert alert-danger mt-3" role="alert">
                        <? echo $this->session->flashdata('notvalid');?>
                    </div>
                <?}?>
            </div>
            <div class="col-md-7 col-sm-12 col-12 text-center">
                <h3 class="mt-4 orange">Passionné(e) par les avions de combat et les maquettes ...</h3>
                <h3 class="mt-2">Suivez vos collections et échangez avec d'autres membres.<br>L'acces aux collections reste possible sans identification.</h3>
            </div>
    </div>
</div>
        
<script>
$('#change_pwd').addClass('on');
</script>

            