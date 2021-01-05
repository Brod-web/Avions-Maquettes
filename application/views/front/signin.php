<div class="fond-reaction">
    <div class="fond-color1">
        <div class="container d-flex flex-wrap justify-content-around">
            <div class="col-md-6 col-12 pt-3">
                <!-- Message accueil -->
                <div class="mb-3">
                    <h3 class="text-center white">
                        Un pseudo, email et mot de passe nous sont nécessaires.
                    </h3>
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
            <div class="col-lg-4 col-md-6 col-12 pt-3">
                <?=form_open('signin/inscription')?>     
                    <div class="form-group">
                        <h3 class="text-center mb-3 orange">Merci de compléter :</h3>
                         
                        <input class="form-control mb-3" type="text" name="pseudo" placeholder="pseudo"/>

                        <input class="form-control mb-3" type="text" name="email" placeholder="email"/>

                        <input class="form-control mb-3" type="password" name="password" placeholder="mot de passe"/>

                        <input class="btn btn-info" type="submit" name="submit" value="Inscription" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="fond-color3" style="min-height: 195px;">
    <div class="container">
        <h2 class="white">2 univers et 1 lieu d'échange entre collectionneurs.</h2>
        <div class="text-center">
            <h3 class="mt-4 orange">Passionné(e) par les avions de combat et les maquettes ... Bienvenue.</h3>
            <h3>Créer un compte permet de suivre vos collections et d'échanger avec d'autres membres.</br>L'acces aux collections est cependant possible même sans identification.</h3>
        </div>
    </div>
</div>

<script>
$('#signin').addClass('on');
</script>

            