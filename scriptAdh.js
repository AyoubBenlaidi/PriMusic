$("document").ready(function(){
  $('#adh_instr1').change(function(){
    var params = {
      action: "getProfByInstr",
      instr_id: $(this).val()
    };
    if($(this).val() != ""){
      $.ajax({
        type: "GET",
        dataType: "json",
        url: "AfficherListe.php",
        data: params,
        success: function(data) {
          var option = '';
          for (var i=0;i<data.length;i++){
            option += '<option value="'+ data[i][0] + '">' + data[i][1] + ' ' + data[i][2] + '</option>';
          }
          $('#adh_prof1').html(option);
        }
      });
    } else{
      $('#adh_prof1').html("<option value=''></option>");
    }
  }).trigger( "change" );

  $('#adh_instr2').change(function(){
    var params = {
      action: "getProfByInstr",
      instr_id: $(this).val()
    };
    if($(this).val() != ""){
      $.ajax({
        type: "GET",
        dataType: "json",
        url: "AfficherListe.php",
        data: params,
        success: function(data) {
          var option = '';
          for (var i=0;i<data.length;i++){
            option += '<option value="'+ data[i][0] + '">' + data[i][1] + ' ' + data[i][2] + '</option>';
          }
          $('#adh_prof2').html(option);
        }
      });
    } else{
      $('#adh_prof2').html("<option value=''></option>");
    }
  }).trigger( "change" );

});
