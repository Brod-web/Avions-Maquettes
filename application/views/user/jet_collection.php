<?if(isset($this->session->id)){?>
<div class="fond-color3">
    <div class="container">
        <div class="d-flex justify-content-center">
            <h2>Votre collection en images</h2>
        </div>
        <div class="d-flex flex-wrap">
            <? // 1 image contient 5 modèles, modèles 1 à 70
            for($aff=1; $aff<70; $aff+=5){?>

                <div class="col-md-6 col-sm-6 col-12">
                    <div class="avion-list">
                        <? $i=$aff; $j=$aff+4; ?>
                        <img src="<? echo base_url().'assets/img/'.$i.'-'.$j.'.jpg'?>" alt="<?=$i.'-'.$j?>" width="100%">

                        <div class="d-flex">
                            <? for($i; $i<$j+1; $i++){?>
                            <? $haveOrNot = ($have[$i] == '1') ? 'check' : 'times';?>
                            <div class=<?=$haveOrNot?>>
                                <span><i class="fas fa-<?=$haveOrNot?>-circle"></i></span>
                            </div>
                            <?}?>
                        </div>

                    </div>
                </div>
            <?}?>

            <!-- modèles 71 à 73  -->
            <div class="col-md-6 col-sm-6 col-12">
                    <div class="avion-list">
                        <img src="<? echo base_url().'assets/img/71-73.jpg'?>" alt="71-73" width="100%">

                        <div class="d-flex">
                            <? for($i=71; $i<74; $i++){?>
                            <? $haveOrNot = ($have[$i] == '1') ? 'check' : 'times';?>
                            <div class=<?=$haveOrNot?>>
                                <span><i class="fas fa-<?=$haveOrNot?>-circle"></i></span>
                            </div>
                            <?}?>
                        </div>

                    </div>
                
        </div>
    </div>
</div>
<?}?>