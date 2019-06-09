function mostrarRoles() {
    if( $('#esMiembro').val()==="1"){
          $('.checkRol').css("display", "block");
      }else{
          $('.checkRol').css("display", "none");
      }
      $('#esMiembro_check').on('click', function() {
          if ($(this).is(':checked')) {
              $('.checkRol').css("display", "block");
              $('#esMiembro').val(1)
          } else {
              $('.checkRol').css("display", "none");
              $('#esMiembro').val(0)
          }
      })
  }
function añadirPunto(){
    $(document).on('click','.Añadir',function(){
        var $divs = $(".punto").toArray().length+1;
        $('.puntos').append("<div class='punto'><h3 class='titulo'>Punto " + $divs +"<button class='Eliminar'>-</button></h3><div contenteditable='true'>Escribir punto de la reunión</div></div>")
    })
}
function borrarPunto(){
    $(document).on('click','.Eliminar',function(){
        $( this ).parent().parent().remove();
        /*
        $('.titulo').each(function(index){
            alert(index);
            $(this).eq(index).text('Punto ' + index+1)
        })*/
    })
    
}
function obtenerFechaCuota(){
   $('tbody tr').each(function(i){
    var tr=$(this).index();
    var td = $('tbody tr').eq(tr);
    var fecha =new Date(td.find('.fecha').text())
    var numMes = parseInt(td.find('.mes input').val());
    fecha.setMonth(fecha.getMonth()+numMes)
    var mes= fecha.getMonth()+1;
    var dia= fecha.getDate();
    var RegExPattern = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;
    var test = td.find('.fecha').text();
    var result= (dia<10 ? '0' : '') + dia  + '-' +
                (mes<10 ? '0' : '') + mes + '-' +
                fecha.getFullYear();
    if(((test.match(RegExPattern)))){
        td.find( ".fechaSiguientePago" ).text(result)
    }
    })
}
function actualizarFechaCuota(){
    $('tbody tr').click(function(){
        var tr=$(this).index();
        var td = $('tbody tr').eq(tr);
        var fecha =new Date(td.find('.fecha').text())
        var numMes = parseInt(td.find('.mes input').val());
        fecha.setMonth(fecha.getMonth()+numMes)
        var mes= fecha.getMonth()+1;
        var dia= fecha.getDate();
        var RegExPattern = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;
        var test = td.find('.fecha').text();
        var result= (dia<10 ? '0' : '') + dia  + '-' +
                    (mes<10 ? '0' : '') + mes + '-' +
                    fecha.getFullYear();
        if(((test.match(RegExPattern)))){
            td.find( ".fechaSiguientePago" ).text(result)
        }
        })
}
