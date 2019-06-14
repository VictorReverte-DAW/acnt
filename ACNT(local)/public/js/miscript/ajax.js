function editar(){
    $('.editarUsu').on('click',function(){
        $('#edit').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function(){
            return $(this).text();
        }).get();
        $('#id').val(data[2]);
        $('#dni').val(data[3]);
        $('#nick').val(data[4]);
        $('#name').val(data[5]);
        $('#apellido').val(data[6]);
        $('#email').val(data[7]);
        $('#password').val(data[8]);
        $('#provincia').val(data[9]);
        $('#localidad').val(data[10]);
        $('#cp').val(data[11]);
        $('#telefono').val(data[12]);
        $('#fnac').val(data[13]);
        $('#esMiembro').val(data[14]);
   
        if(data[14]==="1"){
            $('#esMiembro_check').prop('checked', true);
            $('#esMiembro').val(1)
        }else{
            $('#esMiembro_check').prop('checked', false);
            $('#esMiembro').val(0)
        }
        mostrarRoles()
    })
    $('.editar').on('submit',function(e){
        e.preventDefault()

        var id = $('#id').val();
        $.ajax({
            type: "PUT",
            url: "/actualizar/"+id,
            data: $('.editar').serialize(),
            success: function(response){
                console.log(response);
                //$('#edit').modal('hide');
                window.location.reload();
            },
            error: function(error){
                console.log(error);
            }
        })

    })
}
function confiarmacionAsistencia(){
    $.ajax({
        type: "post",
        url: "/AsistirReunion/"+id,
        success: function(response){
            console.log(response);
            //$('#edit').modal('hide');
           $('#asistir'+id).replaceWith('<img class="confirmacion" src="img/icons/checked.svg" alt="checked">')
        },
        error: function(error){
            console.log(error);
        }
    })
}
function AsistirReunion(id){
        $.ajax({
            type: "Get",
            url: "/AsistirReunion/"+id,
            success: function(response){
                console.log(response);
                //$('#edit').modal('hide');
               $('#asistir'+id).replaceWith('<img class="confirmacion" src="img/icons/checked.svg" alt="checked">')
            },
            error: function(error){
                console.log(error);
            }
        })
}

function crearTorneo(){

    if ($('#gratis_check').is(':checked')) {
        $('.precio').css("display", "none");
        $('#gratis').val(1)
    } else {
        $('.precio').css("display", "flex");
        $('#gratis').val(0)
        $('.Cantprecio').val(1)
    }
    $('#gratis_check').on('click', function() {
        if ($(this).is(':checked')) {
            $('.precio').css("display", "none");
            $('#gratis').val(1)
        } else {
            $('.precio').css("display", "flex");
            $('#gratis').val(0)
            $('#gratis').val(0)
        }
    })
}
function Torneo(id_Torneo,id_Tabla){
    $(document).on('click','.inscripcion',function(){
        $.ajax({     
            type: "Get",
              url: "/inscribirse/"+id_Torneo,
              success: function(response){
                  console.log(response);
                 alert("Inscrito")
                 //Aqui capturamos el valor anterior antes de inscribirse
                 var anterior = $("#"+id_Torneo).text()
                 //Y aqui lo reemplazamos por el nuevo
              $("#"+id_Torneo).text(parseInt(anterior)+1)
                 $('#inscripcion'+id_Torneo).replaceWith('<button class="btn btn-primary describirse"  id="describirse'+id_Torneo+'" onclick="Torneo('+id_Torneo+','+id_Tabla+')">Eliminar Suscripcion</button>')
                 if((parseInt(anterior)+1)>=parseInt($('#num_max'+id_Torneo).text())){
                  $('#inscripcion'+id_Torneo).replaceWith("<label>Numero maximo ocupado</label>")
                 }
              },
              error: function(error){
                  console.log(error);
                  alert("Ha habido un fallo")
              }
          })
    })
    $(document).on('click','.describirse',function(){
        $.ajax({   
        type: "Get",
              url: "/describirse/"+id_Tabla,
              success: function(response){
                  console.log(response);
                 alert("Inscripcion cancelada")
                 //Aqui capturamos el valor anterior antes de describirse
                 var anterior = $("#"+id_Torneo).text()
                 //Y aqui lo reemplazamos por el nuevo
                $("#"+id_Torneo).text(parseInt(anterior)-1)
                 $('#describirse'+id_Torneo).replaceWith('<button class="btn btn-primary inscribirse"  id="inscribirse'+id_Torneo+'" onclick="Torneo('+id_Torneo+','+id_Tabla+')">Inscribirse</button>')
                 if((parseInt(anterior)+1)<=parseInt($('#num_max'+id_Torneo).text())){
                  $('#inscripcion'+id_Torneo).replaceWith( $("#"+id_Torneo).text(parseInt(anterior)-1))
                 }
              },
              error: function(error){
                  console.log(error);
                  alert("Ha habido un fallo al describirse")
              }
          })
    })
$(document).on('click','.EnviarComentario',function(){
   var comentario= $('#comentario'+id_Torneo).val();
   alert(comentario);
    $.ajax({   
        type: "Post",
              url: "/Comentar/"+id_Torneo,
              success: function(response){
                  console.log(response);
                 alert("Comentario insertado")
              },
              error: function(error){
                  console.log(error);
                  alert("Comentario no añadido")
              }
          })
})
   
}
function actualizarJuego(){
    var data
    var id
$('.Editjuego').on('click',function(){
    var padre = $(this).parent().parent();
    var plataforma = padre.find(".plataform").text();
    id= padre.find(".id").text();


$("#plataforma option[value='"+ plataforma +"']").attr("selected",true);
    $ul = $(this).closest('ul');
    data = $ul.children('li').map(function(){
        return $(this).text();
    }).get();
    $('#nombre').val(data[0]);
    $('#descripcion').val(data[1]);
})
    $('.botonEditarJuego').on('click',function(){
    $('.formEditjuego').on('submit',function(e){
        e.preventDefault()
        
        $.ajax({
            type: "POST",
            url: "/actualizarJuego/"+id,
            data:new FormData(this),
            dataType:"JSON",
            contentType: false,
            cache: false,
            processData:false,
            success: function(response){
                console.log(response);
                //window.location.reload();
            },
            error: function(error){
                console.log(error);
            }
        })
        
        $.ajax({
            type: "post",
            url: "/actualizarJuego/"+id,
            data: $('.formEditjuego').serialize(),
            success: function(response){
                console.log(response);
                window.location.reload();
            },
            error: function(error){
                console.log(error);
            }
        })


    })
})
   
}

function actualizarTorneo(){
    var data
    var id;
    $('.EditTorneo').on('click',function(){
    $ul = $(this).closest('ul');
    data = $ul.children('li').map(function(){
        return $(this).text();
    }).get();
    $('#nombre').val(data[0]);
    if(data[2]=="Gratis"){
        $('#gratis_check').val(1);
        $('#gratis_check').prop('checked', true)
        $('.precio').css("display","none")
    }else{
        $('#gratis_check').val(0);
        $('#gratis_check').prop('checked', false)
        $('#precio').val(data[2].substr(0,data[2].length-1))
        $('.precio').css("display","flex")
    }
    if(!$('#gratis_check').is(':checked')){
        $("#precio").prop('required',true);
    }
})
$('.EditTorneo').on('click',function(){
    var padre = $(this).parent().parent();
    id= padre.find(".id").text();
})



$('.EditarTorneoForm').on('submit',function(e){
    e.preventDefault()
    $.ajax({
        type: "POST",
        url: "/actualizarTorneo/"+id,
        data:new FormData(this),
        dataType:"JSON",
        contentType: false,
        cache: false,
        processData:false,
        success: function(response){
            console.log(response);
            //window.location.reload();
        },
        error: function(error){
            console.log(error);
        }
    })
})



$('.EditarTorneo').on('click',function(){
    var esNumero=$('#precio').val();
    if(esNumero!==""|| $('#gratis_check').is(':checked')){
    $.ajax({
        type: "post",
        url: "/actualizarTorneo/"+id,
        data: $('.EditarTorneoForm').serialize(),
        success: function(response){
            console.log(response);
            window.location.reload();
        },
        error: function(error){
            console.log(error);
        }
    })
}

})

}

function actualizarReunion(){
    var id;
    var data;
    $('.EditarReunionModal').on('click',function(){
    $tr = $(this).closest('tr');
        data = $tr.children('td').map(function(){
            return $(this).text();
        }).get();
        $('#EditarFecha').val(data[3])
        $('#EditarFecha').attr({"min" : data[3]})
        $('#EditarHora').val(data[4])
        $('#EditarAsunto').text(data[5])
        id=data[6]
    })
       
        $('.actualizarReunion').on('click',function(){
            $('.reunionForm').on('submit',function(e){
                e.preventDefault();
                var fecha = data[3];
                var hora = data[4];
                var asunto = data[5];
            $.ajax({
                type: "post",
                url: "/actualizarReunion/"+id,
                data:$('.reunionForm').serialize(),
                success: function(response){
                    //console.log(response);
                    console.log(data);
                    window.location.reload();
                },
                error: function(error){
                    console.log(error);
                }
            })
        })

    })
}

function pago(id){
    $(document).one('click','tbody tr' ,function(){
        var tr=$(this).index();
        var td = $('tbody tr').eq(tr);
        var fechaSiguientePago =td.find('.fechaSiguientePago').text()
        var total =parseInt(td.find('.mes input').val())
        var fechaPago = td.find('.efectua').text()
        var mesesPagados= td.find('.fechaPago').text()
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "/crearCuota/",
                data:{fechaPago:fechaPago,total:total,fecha:fechaSiguientePago,id:id},
                success: function(response){
                    alert("pago efectuado")
                    location.reload();
                 
                },
                error: function(error){
                    console.log(error);
                    alert("no se ha abonado la cuota")
                }
            })
    })
}

function escribirComentario(id){
    $(document).one('click','.card-juegos' ,function(){
    var comentario= $(this).find($('.comentario')).val();
    var puntuacion = $('.card-juegos').find($('.puntuacion')).val();
    if(comentario==""||comentario==null){
        alert("Comentario no insertado")
    }else{
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/añadirComentario/",
            data:{id_torneo:id, comentario:comentario,puntuacion:puntuacion},
            success: function(response){
                alert("Comentario insertado")
            },
            error: function(error){
                console.log(error);
                alert("Comentario no insertado")
            }
        })
    }
   
    })
}

function guardarTarea(){
    $('.tareasTable tr').each(function(index){
        var id_usuario=$(this).find('.id').text();
        var texto = $(this).find('.texto').val()
        var id_Torneo =  $(this).find($('.id_torneo')).text()

       $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "post",
        url: "/repartirTareas/",
        data:{id_torneo:id_Torneo, id_usuario:id_usuario,texto:texto},
        success: function(response){
            alert("Tareas asignadas")
        },
        error: function(error){
            console.log(error);
            alert("No se ha podido añadir la tarea")
        }
    })
    })
    
   
}