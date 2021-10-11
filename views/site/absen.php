
<?php
use yii\helpers\Url;
use yii\helpers\Html;

  use app\widgets\Alert;
use yii\widgets\ActiveForm;
use app\widgets\InboxWidget;


$this->title = 'Halaman Absen';

$this->params['breadcrumbs'][] = 'Mari Bagawi';
$this->registerCSS("    h1 { 
  color:green; 
} 
.xyz { 
  background-size: auto; 
  text-align: center; 
  padding-top: 100px; 
} 

.btn-circle.btn-xl { 
  width: 100px; 
  height: 100px; 
  padding: 10px 16px; 
  border-radius: 50px; 
  font-size: 20px; 
  text-align: center; 
} ");

$js = "

var myVar = setInterval(myTimer ,1000);
function myTimer() {
  var d = new Date();
  document.getElementById('jam').innerHTML = d.toLocaleTimeString(navigator.language, {
    hour: '2-digit',
    minute:'2-digit'
  }) +' WIB';
}
$( document ).ready(function() {





  navigator.geolocation.getCurrentPosition(function(position) {
    let lat = position.coords.latitude;
    let long = position.coords.longitude;
     $('#lokasi').val(long+' : '+lat);
     var mapLink = document.querySelector('#map-link');
        $('#map-link').addClass('btn-success');
        $('#absen-latitude-masuk').val(lat.toFixed(8));
        $('#absen-longitude-masuk').val(long.toFixed(8));
         $('#absen-latitude-pulang').val(lat.toFixed(8));
        $('#absen-longitude-pulang').val(long.toFixed(8));

        minlat = lat - (0.009 * 0.05);
        maxlat = lat + (0.009 * 0.05);
        minlon = long - (0.009 * 0.05);
        maxlon = long + (0.009 * 0.05);

   mapLink.href = `https://google.com/maps/search/\${lat},\${long}`;
   var mapLink = document.querySelector('#map');


    mapLink.src = `https://www.openstreetmap.org/export/embed.html?bbox=\${minlon},\${minlat},\${maxlon},\${maxlat}&marker=\${lat},\${long}`;       
  
    
  },
       (error) => {
        console.log(error)
        $('#map-link').addClass('btn-danger');
        $('#map-link'). html('<i class=\"fas fa-lock\"></i> Lokasi  tidak Sesuai');
        
      },
      {enableHighAccuracy: true, timeout: 20000, maximumAge: 10000}
  
  );

});
";
$this->registerJS($js);




?>


<div class="modal  bd-example-modal-lg" tabindex="-1" id="modal-masuk"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    
    <div class="modal-content">
       <div class="modal-header modal-colored-header bg-success">
       <h5 class="modal-title text-white" id="primary-header-modalLabel">Doa Masuk Kerja</h5>
      </div>
      <?php $form = ActiveForm::begin(); ?>

  
        <div class="modal-body">
<?=
"
<p>
Tuhan, saat ini saya akan memulai pekerjaan saya.
<br><br>
Berkatilah Tuhan pekerjaan ku ini dan sertailah aku sepanjang aku bekerja pada hari ini, agar menjadi berkat bagi aku, keluarga dan masyarakat. 
<br><br>
Kami mohon bimbingan-Mu dalam melaksanakan pekerjaan kami hari ini. Arahkanlah pikiran, perkataan, dan perbuatan kami, agar dalam Dikau kami memulai dan menyelesaikannya.
 <br><br>  
Jauhkanlah aku dari orang-orang jahat. Berkati pimpinan kami dan juga rekan-rekan kerjaku dan ajarlah kami untuk saling mengasihi dan bekerjasama.
<br><br>  
Semoga pekerjaan hari ini bernilai ibadah dan berkah.
</p> 
"; ?>         
             
    </div>
      <div class="modal-footer">
      
      
      
      
           <?= Html::submitButton("<i class='fas fa-hands'></i> ".(is_null($modelAbsen->masuk_kerja)?'Aamiin . . .':'Aamin..'),
                                                       ['class' => 'btn waves-effect waves-light btn-lg btn-rounded ' . (is_null($modelAbsen->masuk_kerja)?'btn-success':'btn-success')]); ?>
      </div>      
      
            <?= $form->field($modelAbsen, 'id')->hiddenInput()->label(false); ?>
                                <?= $form->field($modelAbsen, 'masuk_kerja')->hiddenInput()->label(false); ?>
                              
                                <?php ActiveForm::end()  ?>
                              
    </div>
  </div>
</div>

<div class="modal  bd-example-modal-lg" tabindex="-1" id="modal-pulang" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-colored-header bg-danger">
       <h5 class="modal-title text-white" id="primary-header-modalLabel">Doa Pulang Kerja</h5>
      </div>
      <?php $form = ActiveForm::begin(); ?>

  
        <div class="modal-body">
<?=
"<p>
Ya Tuhan, yang penuh kasih setia, kami bersyukur kepada-Mu atas bimbingan dan kasih-Mu, yang kami alami selama kami melaksanakan pekerjaan yang baru saja kami selesaikan.
  <br><br>
  Semoga hasil yang kami capai berguna bagi hidup kami dan berkenan pada-Mu. Semoga kami tidak menjadi sombong karena keberhasilan kami. Kami sadar bahwa semua hasil yang baru saja kami capai berasal dari-Mu juga.
  <br><br>
  Ya Tuhan, kami mohon maaf atas kesalahan dan kekurangan yang kami lakukan dalam bekerja tadi. Semoga kami tidak menjadi putus asa karena mengalami kegagalan.
<br><br>
Semoga pekerjaan hari ini berkah dan bermanfaat bagi diri kami pribadi dan orang lain.
</p> "           
          ?>
    </div>
      <div class="modal-footer">
      
      
           <?= Html::submitButton("<i class='fas fa-hands'></i> ".(is_null($modelAbsen->masuk_kerja)?'Amin..':'Aamiin . . .'),
                                                       ['class' => 'btn waves-effect waves-light btn-lg btn-rounded ' . (is_null($modelAbsen->masuk_kerja)?'btn-info':'btn-danger')]); ?>
      </div>          
      
            <?= $form->field($modelAbsen, 'id')->hiddenInput()->label(false); ?>
                                <?= $form->field($modelAbsen, 'masuk_kerja')->hiddenInput()->label(false); ?>
                  
                                <?php ActiveForm::end()  ?>
                              
    </div>
  </div>
</div>

<?php if (!is_null(Yii::$app->user->identity->pegawai)) {
    $model = $pegawai;
  //  $foto = '/media/' . $model->foto;
  
    

        
        
    
    ?>
    
    <?= Alert::widget(); ?>
 <div class="row">
<div class="col-md-12">
<div class="card">

                <center class="mt-4">
                  
                  
       
           
                  <h4 class="my-1"><?= $model->nama_lengkap; ?></h4>
                  <h6 class="my-1"><?= $model->nip; ?></h6>
                  <span class="mail-desc font-12 text-truncate overflow-hidden text-nowrap d-block"><?= $model->jabatan->nama; ?></span>
        
                 <hr style=" border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));"> 
                                <h4 class="my-1"><?=Yii::$app->formatter->asDate(date("Y-m-d"),'full')?></h4>
                                <h6 class="my-1"><div id='jam'></div>  </h6>
                 <hr style=" border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));"> 
         
                                <a id = "map-link" target="_blank" class="btn waves-effect waves-light btn-rounded "><i class="fas fa-lock-open"></i>  Lokasi Terkonfirmasi </a> 
                                
                                
                                <hr style=" border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));"> 
								
                <iframe id="map" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                
                <hr style=" border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));"> 
                              <?php if (is_null($modelAbsen->masuk_kerja)) { ?>
                              <button type="button" class="waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-backdrop="static" data-toggle="modal" data-target="#modal-masuk"><i class='fas fa-map-marker-alt'></i> Masuk Kerja</button>
                             <?php } else { ?>
                              <button type="button" class="waves-effect waves-dark btn btn-danger btn-md btn-rounded" data-backdrop="static" data-toggle="modal" data-target="#modal-pulang"><i class='fas fa-map-marker-alt'></i> Pulang Kerja</button>
                  
                             <?php }?>
                                     <hr style=" border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));"> 

                                <small class="text-muted"> Masuk Kerja : </small> <h6>  <?=$modelAbsen->masuk_kerja ?> WIB </h6>
                                
                                <small class="text-muted">   Pulang Kerja :  </small> <h6> <?=$modelAbsen->pulang_kerja ?> WIB </h6>

                                <hr style=" border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));"> 
								                
						                		<small class="text-muted">Pastikan Jam masuk dan Jam Pulang telah muncul di Aplikasi  </small> 
						 		                </center>  
                  
                          

                </div>
  

              
                
                
                </div>

        


            

</div>




    <?php
}
?>

