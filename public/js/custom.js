jQuery(document).ready(function($){
  var ctrMatkul = 8;
  var ctrAnggota = 4;

  $(".showText").css("display: none;");

  var addMatkul =
  '<div class="row" style="margin-top: 15px;">'+
    '<div class="offset col-xs-5">'+
      '<input type="text" class="form-control" placeholder="Nama mata kuliah">'+
    '</div>'+
    '<div class="col-xs-2">'+
      '<input type="text" class="form-control" placeholder="sks">'+
    '</div>'+
    '<button type="button" class="btn btn-default" aria-label="Remove">'+
        '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>'+
    '</button>'+
  '</div>';

  var addAnggota =
  '<div class="row" style="margin-top: 15px;">'+
    '<div class="offset col-xs-5">'+
      '<input type="text" class="form-control" placeholder="Nama anggota">'+
    '</div>'+
    '<div class="col-xs-2">'+
      '<input type="text" class="form-control" placeholder="NPM">'+
    '</div>'+
    '<button type="button" class="btn btn-default" id="removeTextField" aria-label="Remove">'+
        '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>'+
    '</button>'+
  '</div>';


  $("#btnAddTextField").click(function(){
      $(".addTextField").append(addMatkul);
      ctrMatkul--;
      if (ctrMatkul == 0) {
         document.getElementById("btnAddTextField").style.display = 'none';
       }
  });


  $(".addMember").click(function(){
    var clickButton = $(this).val();
      // console.log(clickButton);
    if(clickButton == "ya"){
      document.getElementById("showText").style.display = 'block';
      document.getElementById("showButton").style.display = 'block';
    }
  });

  $("#btnAddAnggota").click(function(){
      $(".addMember").append(addAnggota);
      ctrAnggota--;
      if (ctrAnggota == 0) {
         document.getElementById("btnAddAnggota").style.display = 'none';
       }
  });

  $(".jenis_surat").click(function(){
    var clickButton = $(this).val();
      // console.log(clickButton);
    if(clickButton == "{{ $formatsurat->id }}"){
        document.getElementById("showKeterangan")
    }
  });
});
