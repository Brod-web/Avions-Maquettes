<div class="fond-reaction">
    <div class="fond-color1">
        <div class="container">
            <h2 class="white">2 univers et 1 lieu d'échange entre collectionneurs.<br></h2>
            <div class="d-flex flex-wrap justify-content-end">
                <div class="fascicule mr-3">
                    <a href="<? echo base_url('jet/list/model')?>"><img src="<? echo base_url().'assets/img/poster-jet.jpg'?>" alt="avions a reaction"></a>
                </div>
                <div class="fascicule mr-3">
                    <a href="#"></a><img src="<? echo base_url().'assets/img/poster-ww2.jpg'?>" alt="avions de la seconde guerre mondiale"></a>
                </div>
                <div class="fascicule mr-3">
                    <a href="<? echo base_url('login/to_be_logged')?>"><img src="<? echo base_url().'assets/img/bourse.jpg'?>" alt="bourse des collectionneurs"></a>
                </div>
            </div>       
        </div>
    </div>
</div>
<div class="fond-ww2">
    <div class="fond-color2">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-md-4 col-sm-6 col-12">
                    <h3 class="orange text-center mb-3">Identifiez-vous</h3>
                    <?=form_open('login/connexion')?>     
                        <div class="form-group"> 
                            <input class="form-control mb-3" type="text" name="pseudo" placeholder="pseudo"/>
                                    
                            <input class="form-control mb-3" type="password" name="password" placeholder="mot de passe"/>

                            <div class="d-flex justify-content-end">
                                <p><a href="<? echo base_url("login/userChangePwd")?>" class="orange">Mot de passe oublié ?</a></p>

                                <input class="btn btn-info ml-3" type="submit" name="submit" value="Connexion" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8 col-sm-6 col-12 mt-4 text-center">
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
            </div>
        </div>
    </div>
</div>
<div id="savoir">
    <div class="fond-color3" style="min-height: 340px;">
        <div class="container">
            <h2><q> AVIONS + <span>Maquettes</span> ... 2 gros centres d'intérêts pour moi. Il y a également l'informatique, la programmation. </q></h2>
            <h3>Aprés 22 ans passés dans l'aéronautique, je me suis lancé depuis ce début d'année dans une reconversion. Je poursuis actuellement une formation de concepteur développeur d'applications. Ce site est l'un de mes premiers bébés ... Encore en construction, il sera progressivement étoffé pour présenter 130 maquettes.</h3>
            <h2><q> Avions de combat à réaction ou de la seconde guerre mondiale ... Faites votre choix </q></h2>
        </div>
    </div>
</div>

<script>
$('#login').addClass('on');
</script>



    
        
    

            