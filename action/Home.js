var site_url = $('#site_url').val();
var base_url = $('#base_url').val();

new ClipboardJS('.btn');

$("#inputFile").change(function(event) {  
  getURL(this);  
  // console.log(this.files)  
});

function getURL(input) {    
  if (input.files && input.files[0]) {   
    var reader = new FileReader();
    var filename = $("#inputFile").val();
    filename = filename.substring(filename.lastIndexOf('\\')+1);
    reader.onload = function(e) {
      // debugger;      
      $('#imgView').attr('src', e.target.result);
      $('#imgView').hide();
      $('#imgView').fadeIn(500);      
      $('.custom-file-label').text(filename);             
    }
    reader.readAsDataURL(input.files[0]);    
  }
}


// var base_url = window.location.origin;
// // "http://stackoverflow.com"

// var host = window.location.host;
// // stackoverflow.com

function getData(){
  $.ajax({
    url     : site_url+'Ajax/getGambar',
    type    : 'GET',
    dataType: 'JSON',
    success : function(res){
      var row = [];
      var no  = 0; 
      $.each(res, function(i, d) {
        var convert   = parseInt(d.ukuran)/1024;
        no++;
        row[i] = [
          no,
          '<img height="60px" src="'+base_url+'assets/upload/'+d.nm_gambar+'" >',
          '<div>Nama File: '+d.keterangan+'</div>'+
          '<div>Ukuran: '+convert.toFixed(2)+'KB</div>'+
          '<div class="clip'+no+'">'+base_url+'assets/upload/'+d.nm_gambar+'</div>',
          d.uploaded_at,
          '<button class="btn btn-sm btn-info text-white" data-clipboard-target=".clip'+no+'" style="margin:2px"><i class="fa fa-copy"></i> </button>'+
          '<button class="btn btn-sm btn-warning text-white lihat" style="margin:2px" value="'+d.nm_gambar+'" id="'+d.id_gambar+'" nama="'+d.keterangan+'" ><i class="fa fa-search" ></i> </button>'+
          '<button class="btn btn-sm btn-danger del" value="'+d.id_gambar+'" style="margin:2px"><i class="fa fa-trash-o"></i> </button>'
        ]
      });
      $('#mydata').dataTable({
          destroy: true,
          sort : false,
          searching: true,
          data: row,
      });
    }
  })
}

getData();

$('#mydata').on('click', '.lihat', function(event) {
  event.preventDefault();
  $('#modal-id').modal("toggle")
  var img = $(this).attr('value');
  var id  = $(this).attr('id');
  var nama  = $(this).attr('nama');
  $('.judul').html('Lihat Gambar');
  $('.gambar').html('<img src="'+base_url+'assets/upload/'+img+'">')
  $('#namaFile').val(nama)
  $('.update').attr('id_gambar', id);
});

$('.update').on('click', function(event) {
  event.preventDefault();
  var value = $('#namaFile').val()
  var id    = $('.update').attr('id_gambar');
  $.ajax({
    url     : site_url+'Ajax/updateGambar/'+id,
    type    : 'POST',
    dataType: 'json',
    data    : {keterangan: value},
    success : function(res){
      notif(res.ket, ' ', res.icon)
      $('#modal-id').modal("toggle")
      getData()
    } 
  })

});

$('#mydata').on('click','.del', function(event) {
    var id = $(this).attr('value');
    swal({ 
        title: "Konfirmasi Hapus Gambar ?",
        text: " ",
        icon: "warning",
        buttons: {
          cancel: "Batal",
          Hapus: true,
        },
      }).then((value =>{
        switch(value){
          case 'Hapus':
            $.ajax({
              url: site_url+'Ajax/hapusGambar/'+id,
              type: 'GET',
              dataType: 'json',
              success: function(res){
                notif(res.ket, ' ', res.icon);
                getData()
              }
            });
          break;
        }
      }));
  });

$('#submitForm').on('submit', function(event) {
  event.preventDefault();
  // loading();
   $.ajax({
      url         : site_url+"Ajax/addGambar/",
      type        : "POST",
      data        : new FormData(this),
      contentType : false,
      cache       : false,
      processData : false,
      success     : function(res){
        var json = JSON.parse(res);
        notif(json.ket, ' ', json.icon)
        $('#inputFile').val(null)
        $('#imgView').attr('src', base_url+'assets/logo/no_image.png');
        getData();
      }
    })
});