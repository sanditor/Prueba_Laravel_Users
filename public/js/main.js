var url = 'http://localhost:8000';
window.addEventListener("load", function () {

 //buscador
 $('#buscador').submit(function(){
    $(this).attr('action',url+'/usuarios/'+$('#buscador #search').val());
 });

});


