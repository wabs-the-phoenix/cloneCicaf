$(function(){
    $('#TableBien').DataTable();
    $('#addBien').click(function(){
        $('#addBienForm').modal('show');
    });

    $("#addBienForm").modal({
		closable: true
	});
    $('#tauxAmr').hide();
    $('#Dure').keyup(function(){
        var dure=0;
        dure+=$(this).val();

        var taux= 0;
        if(dure!=0){
            taux=1/dure;
        }
        $("#tauxammortissement").val(taux);
        $('#tauxAmr').show();     

    });
    $('#details').click(function(e){
        e.preventDefault();
        $('#detailsBox').modal('show');
    });
    $('#mouvement').click(function(e){
        e.preventDefault();
       
        var idBien=$('#idBien').val();
        alert("Mouvement du bien "+idBien);
    });
    
    $('.ui.selection.dropdown').dropdown();
   
});


  