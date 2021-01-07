<div class="fond-reaction">
    <div class="fond-color1">
        <div class="container">
            <h2 class="white">2 univers et 1 lieu d'échange entre collectionneurs.<br></h2>
            <div class="d-flex flex-wrap justify-content-end">
                <div class="fascicule mr-3">
                    <a href="<? echo base_url('jet/list/model')?>"><img src="<? echo base_url().'assets/img/poster-jet.jpg'?>" alt="avions a reaction"></a>
                </div>
                <div class="fascicule">
                    <a href="#"></a><img src="<? echo base_url().'assets/img/poster-ww2.jpg'?>" alt="avions de la seconde guerre mondiale"></a>
                </div>
            </div>       
        </div>
    </div>
</div>
<div class="fond-ww2">
    <div class="fond-color2">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="fascicule mt-4">
                        <a href="<? echo base_url('login/to_be_logged')?>"><img src="<? echo base_url().'assets/img/bourse.jpg'?>" alt="bourse des collectionneurs"></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <h3 class="orange text-center my-3">Identifiez-vous</h3>
                    <?=form_open('login/connexion')?>     
                        <div class="form-group"> 
                            <input class="form-control mb-3" type="text" name="pseudo" placeholder="pseudo"/>
                                    
                            <input class="form-control mb-3" type="password" name="password" placeholder="mot de passe"/>

                            <div class="d-flex justify-content-end">
                                <h5><a href="<? echo base_url("login/userChangePwd")?>" class="black">Mot de passe oublié ?</a></h5>

                                <input class="btn btn-info ml-3" type="submit" name="submit" value="Connexion" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 col-sm-6 col-12 mt-4 text-center">
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
            <h3><q> AVIONS + <span>Maquettes</span> : ce sont 2 univers, l'un lié aux avions de combat à réaction et l'autre à ceux de la 2nde guerre mondiale </q></h3>
            <div class="row mt-4">
                <div class="col-lg-6 text-justify">
                    <article>Editées par Altaya dans les années 90, ces collections sont constituées de maquettes métal à l'échelle 1/72 accompagnées de fascicules documentés. Chaque numéro pouvait être acheté en bureau de tabac presse ou reçu à la maison via un abonnement.</article>

                    <div class="d-flex justify-content-center mt-5">
                        <img src="<? echo base_url().'assets/img/savoir-cla.png'?>" width="400px" alt="classeurs">
                    </div>
                </div>
                <div class="col-lg-6 d-flex flex-column">
                    <div class="d-flex justify-content-center">
                        <img src="<? echo base_url().'assets/img/savoir-maq.png'?>" width="400px" alt="maquettes">
                    </div>

                    <div class="text-justify mt-3">
                        <article>La collection avions de combat à réaction se compose de 73 maquettes (dont 3 offertes aux fidèles abonnés); celle de la 2nde guerre mondiale en compte 60.</article><br>
                        <article>Le site s'attache à vous faire découvrir chaque avion présenté grace à des fiches techniques et divers classements permettant les comparaisons.</article>
                    </div>
                </div>
            </div>
            
            <h3><q> AVIONS + <span>Maquettes</span> : c'est aussi un lieu d'échange </q></h3>
            <div class="row d-flex mt-4">
                <div class="col-lg-6 text-justify mb-3">
                    <article>Ce n'est pas tout ... Le site permet également à chaque membre inscrit de lister ces maquettes et obtenir une vision claire de ces collections.</article><br>
                    <article>Cerise sur le gâteau ... votre compte personnel vous donne accès à un lieu d'échange et recherche de maquettes : la bourse des collectionneurs.</article>
                </div>
                <div class="col-lg-6 d-flex justify-content-center">
                    <img src="<? echo base_url().'assets/img/savoir-vues.png'?>" width="450px" alt="maquettes">
                </div>
            </div>
            <h3><q> Nous espérons vous compter bientôt parmis nos membres, bonne navigation ! </q></h3>
        </div>
    </div>
</div>

<script>
$('#login').addClass('on');
</script>



    
        
    

            