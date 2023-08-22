
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>CHECKER AMAZON</title>
<link rel="icon" type="image/png" href="foto1.ico">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
<link href="assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="assets/css/style.css?v=1.0.0" rel="stylesheet" />
<link href="assets/demo/demo.css" rel="stylesheet" />
</head>
<body>
<div class="col-md-11 mt-4" style="margin: auto;">
<div class="row">
<div class="col-md-8">
<div class="card">
<div class="card-body text-center">
<h5 class="title"><i class="fa fa-credit-card"></i> CHECKER AMAZON <i class="fa fa-credit-card"></i> </h5><hr>
<textarea style="height: 8.06rem;" class="form-control text-center form-checker mb-2" placeholder=" "></textarea>

<div class="input-group mb-1">
					<input type="text" style="background-color:#112132;" class="form-control" id="cslive" placeholder="cookies br" name="cslive">&nbsp;       
					<input type="text" style="background-color:#112132;" class="form-control" id="pklive" placeholder="cookies gringo" name="pklive">
                    </div>

<button class="btn btn-outline-success btn-play" style="width: 49%; float: left;"><i class="fa fa-play"></i> INICIAR</button>
<button class="btn btn-outline-danger btn-stop text-white" style="width: 49%; float: right;" disabled><i class="fa fa-stop"></i> PARAR</button>
</div>
</div>
</div>
<div class="col-md-4">
<div class="card">
<div class="card-body">
<h5 class="title"><i class="fas fa-code"></i> <b> CODER:</b> <b><font color="white">@Poucas</font></b></a> <i class="fas fa-code"></i></span></h5><hr>
<h5 class="title"><i class="fa fa-thumbs-up"></i> Aprovadas:<span class="badge badge-success float-right aprovadas">0</span></h5><hr>
<h5 class="title"><i class="fa fa-thumbs-down"></i> Reprovadas:<span class="badge badge-danger float-right reprovadas">0</span></h5><hr>
<h5 class="title"><i class="fa fa-sync-alt"></i> Testadas:<span class="badge badge-info float-right testadas">0</span></h5><hr>
<h5 class="title mb-0"><i class="fa fa-share-square"></i> Carregadas:<span class="badge badge-primary float-right carregadas">0</span></h5>
</h5><hr>
</div>
</div>
</div>
<div class="col-xl-12">
<div class="card">
<div class="card-body">
<div class="float-right">
<button type="show" class="btn btn-primary btn-sm show-Aprovadas"><i class="fa fa-eye-slash"></i></button>
<button class="btn btn-success btn-sm btn-copy"><i class="fa fa-copy"></i></button>
</div>
<h4 class="title mb-1"><i class="fa fa-thumbs-up text-success"></i> Aprovadas</h4>
<div id='cards_aprovadas'></div>
</div>
</div>
</div>
<div class="col-xl-12">
<div class="card">
<div class="card-body">
<div class="float-right">
<button type='hidden' class="btn btn-primary btn-sm show-Reprovadas"><i class="fa fa-eye"></i></button>
<button class="btn btn-danger btn-sm btn-trash"><i class="fa fa-trash"></i></button>
</div>
<h4 class="title mb-1"><i class="fa fa-thumbs-down text-danger"></i> Reprovadas</h4>
<div style='display: none;' id='cards_reprovadas'></div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
<script>

$(document).ready(function(){


Swal.fire({ title: "Aviso!", text: "chk amazon so roda com cookies validos", icon: "Aviso!", confirmButtonText: "OK", buttonsStyling: false, confirmButtonClass: 'btn btn-primary'});

// getSaldo();

$('.show-Aprovadas').click(function() {
      var type = $('.show-Aprovadas').attr('type');
      $('#cards_aprovadas').slideToggle();
      if (type == 'show') {
        $('.show-Aprovadas').html('<i class="fa fa-eye"></i>');
        $('.show-Aprovadas').attr('type', 'hidden');
      } else {
        $('.show-Aprovadas').html('<i class="fa fa-eye-slash"></i>');
        $('.show-Aprovadas').attr('type', 'show');
      }});

    $('.show-Reprovadas').click(function() {
      var type = $('.show-Reprovadas').attr('type');
      $('#cards_reprovadas').slideToggle();
      if (type == 'show') {
        $('.show-Reprovadas').html('<i class="fa fa-eye"></i>');
        $('.show-Reprovadas').attr('type', 'hidden');
      } else {
        $('.show-Reprovadas').html('<i class="fa fa-eye-slash"></i>');
        $('.show-Reprovadas').attr('type', 'show');
      }});

      $('.btn-trash').click(function() {
      Swal.fire({
        title: 'Reprovadas Limpas.', icon: 'success', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000
      });
      $('#cards_reprovadas').text('');
    });
    
    $('.btn-copy').click(function() {
      Swal.fire({
        title: 'Aprovadas Copiadas!', icon: 'success', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000
      });
      var cards_aprovadas = document.getElementById('lista_aprovadas').innerText;
      var textarea = document.createElement("textarea");
      textarea.value = cards_aprovadas;
      document.body.appendChild(textarea);
      textarea.select();
      document.execCommand('copy'); document.body.removeChild(textarea);
    });



$('.btn-play').click(function(){
var cards = $('.form-checker').val().trim();
var array = cards.split('\n');
var pklive = $("#pklive").val().trim();
var cslive = $("#cslive").val().trim();
var Aprovadas = 0, Reprovadas = 0, testadas = 0, txt = '';

if(!cards){
	Swal.fire({title: 'Cadê seu cartão?? adicione um cartão!!', icon: 'error', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000});
	return false;
}

if(!pklive){
	Swal.fire({title: 'Cadê seu cookie ? por favor adicione um cookies !!', icon: 'error', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000});
	return false;
}

if(!cslive){
	Swal.fire({title: 'Cadê seu cookies ?? por favor adicione um cookies !!', icon: 'error', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000});
	return false;
}


Swal.fire({title: 'Aguarde o processamento do cartão!!', icon: 'success', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000});

var line = array.filter(function(value){
if(value.trim() !== ""){
	txt += value.trim() + '\n';
	return value.trim();
}
});

/*
var line = array.filter(function(value){
return(value.trim() !== "");
});
*/

var total = line.length;


/*
line.forEach(function(value){
txt += value + '\n';
});
*/

$('.form-checker').val(txt.trim());
// ảo ma hả, đừng lấy code chứ !!
if(total > 30000){
  Swal.fire({title: ':) MAIS DE 30000 CC', icon: 'warning', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000});
  return false;
}

$('.carregadas').text(total);
$('.btn-play').attr('disabled', true);
$('.btn-stop').attr('disabled', false);

line.every(function(data, index){
setTimeout(
function() {
var callBack = $.ajax({
  url: 'api.php?cards=' + data + '&cslive=' + cslive + '&pklive=' + pklive + '&referrer=Auth',
  success: function(retorno){
    if(retorno.indexOf("Aprovada") >= 0){
      Swal.fire({title: '+1 Aprovada!', icon: 'success', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000});
      $('#cards_aprovadas').append(retorno);
              removelinha();
              audioLive.play();
              Aprovadas = Aprovadas +1;
            } else {
      $('#cards_reprovadas').append(retorno);
      removelinha();
      Reprovadas = Reprovadas +1;
    }
    testadas = Aprovadas + Reprovadas;
    $('.aprovadas').text(Aprovadas);
    $('.reprovadas').text(Reprovadas);
    $('.testadas').text(testadas);
    
    if(testadas == total){
      Swal.fire({title: 'FORAM DESCARTADOS', icon: 'success', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000});
      $('.btn-play').attr('disabled', false);
      $('.btn-stop').attr('disabled', true);
    }
        }
      });
    },   
    10000 * index);
    return true;
    });
  });
});

function removelinha() {
var lines = $('.form-checker').val().split('\n');
lines.splice(0, 1);
$('.form-checker').val(lines.join("\n"));
}

var myVar=setInterval(function(){myTimer()},1000);
function myTimer() {
	var dt = new Date();
	document.getElementById("datetime").innerHTML = dt.toLocaleDateString();
    var d = new Date();
    document.getElementById("timenow").innerHTML = d.toLocaleTimeString();
}

  
	
</script>

  </body>
</html>