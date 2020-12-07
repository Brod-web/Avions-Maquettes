
<div class="fond-color3" style="min-height: 535px;">
    <div class="container">
        <h3 class="orange">Chargez votre photo :</h3>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-12 text-center mt-3">
                <div class="alert alert-info" role="alert">
                    <p>Formats autorisés : .gif | .jpg | .jpeg | .png</p>
                    <p>Max. size : 1400x1400, 2Mo (affichage photo : 150x150 px)</p>
                    <p>Une seule photo est prévue par annonce ... Choisissez bien !</p>
                </div>
                
                <h5 style="color: red;"><?=$error?></h5>
                
            </div>
                
            <?= form_open_multipart('upload/do_upload');?>
                <div class="col-md-6 col-sm-6 col-12 d-flex mt-3">
                    <input class="btn btn-info" type='file' name='userfile' size='20' />
                    <input class="btn btn-info ml-1" type='submit' name='submit' value='upload' />
                    <a class="btn btn-success ml-1 pt-2" href="<? echo base_url('user/add_annonce')?>">Retour</a>
                </div>
            </form>
        </div>  
    </div>
</div>
