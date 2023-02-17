<?php
 foreach(glob('./src/img/webcamHistory/*.*') as $filename){
                     
    echo('<div class="col-md-4">');
    echo('<div class="card-camera card card-block ">');
    echo('<div class="card-body">');
    echo('</div>');
    echo ('<img src="'.$filename.'" class="img-fluid" alt="Responsive image">');
    echo('</div>');
    echo('<p class="card-text">'.substr($filename,31,-10).'</p>');
    echo('</div>');

}
?>