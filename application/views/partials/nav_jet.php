<nav id="menu">
    <ul class="d-flex flex-wrap justify-content-end">
        <div class="mr-4">
            <?if(isset($this->session->id)){?>
                <a href="<? echo base_url('user')?>"><i class="fas fa-user-astronaut fa-2x"></i></a>
            <?} else {?>
                <a href="<? echo base_url('login')?>"><i class="fas fa-door-open fa-2x"></i></a>
            <?}?>
        </div>
        <li id="card"><a href="<? echo base_url('jet/card/1')?>">Fiches</a></li>
        <li id="list">
            <a class="dropdown-toggle" data-toggle="dropdown"
            href="#" role="button" aria-haspopup="true" aria-expanded="false">
            Liste</a>
            <div class="dropdown-menu text-center">
                <div><a class="dropdown-item" href="<? echo base_url('jet/list/model')?>">Modèle</a></div>
                <div><a class="dropdown-item" href="<? echo base_url('jet/list/builder')?>">Constructeur</a></div>
            </div>
        </li>
        <li id="sortBy">
            <a class="dropdown-toggle" data-toggle="dropdown"
            href="#" role="button" aria-haspopup="true" aria-expanded="false">
            Tri par...</a>
            <div class="dropdown-menu text-center">
                <div><a class="dropdown-item" href="<? echo base_url('jet/sortBy/carrier_start')?>">
                Début carrière</a></div>
                <div><a class="dropdown-item" href="<? echo base_url('jet/sortBy/built_nb')?>">
                Nb fabriqués</a></div>
                <div><a class="dropdown-item" href="<? echo base_url('jet/sortBy/max_speed')?>">
                Vitesse max.</a></div>
                <div><a class="dropdown-item" href="<? echo base_url('jet/sortBy/max_thrust')?>">
                Poussée max.</a></div>
                <div><a class="dropdown-item" href="<? echo base_url('jet/sortBy/max_range')?>">
                Rayon action</a></div>
                <div><a class="dropdown-item" href="<? echo base_url('jet/sortBy/ceiling')?>">
                Plafond pratique</a></div>
            </div>
        </li>
    </ul>
</nav>

<nav id="menu-mobile">
    <ul class="d-flex flex-wrap justify-content-end">
        <div class="mr-4">
            <?if(isset($this->session->id)){?>
                <a href="<? echo base_url('user')?>"><i class="fas fa-user-astronaut fa-2x"></i></a>
            <?} else {?>
                <a href="<? echo base_url('login')?>"><i class="fas fa-door-open fa-2x"></i></a>
            <?}?>
        </div>
        <div class="nav-item dropdown">
            <button class="btn text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 160px;"><i class="fas fa-bars"></i></button>
            <div class="dropdown-menu text-center">
                <div><a class="dropdown-item" href="<? echo base_url('jet/card/1')?>">
                Fiches</a></div>
                <div><h5 class="orange">Liste par...</h5></div>
                <div><a class="dropdown-item" href="<? echo base_url('jet/list/model')?>">
                Modèle</a></div>
                <div><a class="dropdown-item" href="<? echo base_url('jet/list/builder')?>">
                Constructeur</a></div>
                <button class="btn text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 160px;"><h5 class="orange">Tri par...</h5></button>
                <div class="dropdown-menu text-center">
                    <div><a class="dropdown-item" href="<? echo base_url('jet/sortBy/carrier_start')?>"
                    >Début carrière</a></div>
                    <div><a class="dropdown-item" href="<? echo base_url('jet/sortBy/built_nb')?>">
                    Nb fabriqués</a></div>
                    <div><a class="dropdown-item" href="<? echo base_url('jet/sortBy/max_speed')?>">
                    Vitesse max.</a></div>
                    <div><a class="dropdown-item" href="<? echo base_url('jet/sortBy/max_thrust')?>">
                    Poussée max.</a></div>
                    <div><a class="dropdown-item" href="<? echo base_url('jet/sortBy/max_range')?>">
                    Rayon action</a></div>
                    <div><a class="dropdown-item" href="<? echo base_url('jet/sortBy/ceiling')?>">
                    Plafond pratique</a></div>
                </div>
            </div>
        </div>
    </ul>
</nav>

<script>
/*$('.menuItem').on('click', function(){
    $('.menuItem').removeClass('on');
    $(this).addClass('on');
});*/
</script>