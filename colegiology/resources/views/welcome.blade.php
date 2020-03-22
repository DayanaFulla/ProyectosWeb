<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/navigatorstyle.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fachadastyle.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/cursostyle.css')}}">

    <!-- scripts -->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>

    <script type="text/javascript">
        jQuery(document).ready(function () {
            var course_id=0;
            var contenido_id=0;
            var tarea_id=0;

            $.ajax({
                url: '/getusuario/',
                method: 'GET',
                success: function (e) {
                    var objUsuario = JSON.parse(e);
                    $('#txt_alumno_id').val(objUsuario.id);
                    $('#spnombrecompleto').text(objUsuario.nombrecompleto);
                    if(objUsuario.tipo==1){
                        $('#btnmateria').hide();
                        $('#btninscripcion').html("Unirse a un Curso");
                    }else{
                        $('#btnmateria').html("Agregar una materia");
                        $('#btninscripcion').hide();
                    }
                },
                error(e) {
                    console.log(e);
                }
            });

            jQuery('#btncerrarsesion').on('click', function () {
                jQuery.ajax({
                    url: '{{ url('/cerrarsession') }}',
                    method: 'GET',
                    success: function (e) {
                        if (e == "signout") {
                            window.location.href="http://localhost:8000/";
                        } else {
                            alert('Error al cerrar sesión!');
                        }
                    },
                    error(e) {
                        console.log(e);
                    }
                });
            });

            jQuery('#registrarmateria').on('click', function () {
                var direccion='';
                if(course_id==0){
                    direccion='/createmateria';
                }else{
                    direccion='/updatemateria';
                }
                var parametros = {
                    _token: '{{csrf_token()}}',
                    nombre: $('#txt_nombre_materia').val(),
                    id:course_id,
                };
                console.log(direccion);
                jQuery.ajax({
                    url: direccion,
                    method: 'POST',
                    data: parametros,
                    success: function (e) {
                        var objMateria = JSON.parse(e);
                        if (objMateria!=null) {
                            if(course_id!=0){
                                var nom='#licurso'+objMateria.id;
                                jQuery(nom).remove();
                            }

                            $('#ModalInsertarMateria').modal('hide');
                            var seccion="<li id='licurso"+objMateria.id+"'>" +
                                "                        <div class='course'>" +
                                "                            <a href=\"/Materia/"+objMateria.id+"\">"+objMateria.nombre+"</a>" +
                                "                            <button type='button' class='btnUpdateMateria'  data-id="+objMateria.id+"><i class='fa fa-pencil'></i>" +
                                "                            </button>" +
                                "                            <button type='button'  class='btneliminarmateria' data-id="+objMateria.id+" ><i class='fa fa-trash'></i></button><br>" +
                                "                        </div>" +
                                "                        <label><span><i class='fa fa-book'></i></span>"+objMateria.codigo+"</label>" +
                                "                    </li>";

                            $( ".ulcursos" ).append( seccion );
                        } else {
                            alert('Error al registrar el nuevo alumno!');
                        }
                    },
                    error(e) {
                        console.log(e);
                    }
                });

            });

            jQuery(document).on('click', '.btnUpdateMateria', function () {
                var materia_id=$(this).data('id');
                course_id=materia_id;
                $.ajax({
                    url: '/getmateria/'+materia_id,
                    method: 'GET',
                    success: function (e) {
                        var objMateria = JSON.parse(e);
                        $('#txt_nombre_materia').val(objMateria.nombre);
                        $('#ModalInsertarMateria').modal('show');
                    },
                    error(e) {
                        console.log(e);
                    }
                });

            });

            jQuery('#registrarcontenido').on('click', function () {
                var direccion='';
                if(contenido_id==0){
                    direccion='/createcontenido';
                }else{
                    direccion='/updatecontenido'
                }

                var parametros = {
                    _token: '{{csrf_token()}}',
                    titulo: $('#txt_titulo_contenido').val(),
                    orden: $('#txt_orden_contenido').val(),
                    contenido: $('#txt_contenido_contenido').val(),
                    id: contenido_id,
                    materia_id: $('#insertarcontenidopop').data('id')
                };
                jQuery.ajax({
                    url: direccion,
                    method: 'POST',
                    data: parametros,
                    success: function (e) {
                        var objContenido = JSON.parse(e);
                        if (objContenido !=null) {
                            $('#ModalInsertarContenido').modal('hide');
                            if(contenido_id!=0){
                                var nom='#divcontenido'+objContenido.id;
                                jQuery(nom).remove();
                            }

                            var seccion="<div class='seccontent' id='divcontenido"+objContenido.id+"'>" +
                                "                        <a class='flcontenidos' href='/Contenido/"+objContenido.id+"'><i class='fa fa-file'></i>"+objContenido.titulo+"</a>" +
                                "                        <button type='button' class='btnUpdatecontenido'  data-id='"+objContenido.id+"'>" +
                                "                            <i class='fa fa-pencil'></i>" +
                                "                        </button>" +
                                "                        <button type='button' class='btneliminarcontenido'  data-id='"+objContenido.id+"' >" +
                                "                            <i class='fa fa-trash'></i>" +
                                "                        </button>" +
                                "                    </div>";

                            $( ".lstflcontenidos" ).append( seccion );


                        } else {
                            alert('Error al registrar el nuevo alumno!');
                        }
                    },
                    error(e) {
                        console.log(e);
                    }
                });
                return false;
            });

            jQuery(document).on('click', '.btnUpdatecontenido', function () {
                var content_id=$(this).data('id');
                contenido_id=content_id;
                $.ajax({
                    url: '/getcontenido/'+content_id,
                    method: 'GET',
                    success: function (e) {
                        var objContenido = JSON.parse(e);
                        $('#txt_titulo_contenido').val(objContenido.titulo);
                        $('#txt_orden_contenido').val(objContenido.orden);
                        $('#txt_contenido_contenido').val(objContenido.contenidotextual);
                        $('#ModalInsertarContenido').modal('show');
                    },
                    error(e) {
                        console.log(e);
                    }
                });

            });

            jQuery('#registrartarea').on('click', function () {
                var direccion='';
                if(tarea_id==0){
                    direccion='/createtarea';
                }else{
                    direccion='/updatetarea';
                }

                var parametros = {
                    _token: '{{csrf_token()}}',
                    titulo: $('#txt_titulo_tarea').val(),
                    descripcion: $('#txt_descripcion_tarea').val(),
                    fechalimite: $('#txt_fecha_tarea').val(),
                    notamaxima: $('#txt_notamaxima_tarea').val(),
                    orden: $('#txt_orden_tarea').val(),
                    id:tarea_id,
                    materia_id: $("#insertartareapop").data('id')
                };
                debugger;
                jQuery.ajax({
                    url: direccion,
                    method: 'POST',
                    data: parametros,
                    success: function (e) {
                        var objTarea = JSON.parse(e);
                        if (objTarea !=null) {
                            $('#ModalInsertarTarea').modal('hide');
                            if(objTarea!=0){
                                var nom='#divtarea'+objTarea.id;
                                jQuery(nom).remove();
                            }

                            var seccion="<div class='sectarea' id='divtarea"+objTarea.id+"'>" +
                                "                        <a class='fltareas' href='/Tarea/"+objTarea.id+"'><i class='fa fa-edit'></i>"+objTarea.titulo+"</a><br>" +
                                "                        <button type='button' class='btnUpdatetarea' data-id='"+objTarea.id+"'>" +
                                "                            <i class='fa fa-pencil'></i>" +
                                "                        </button>" +
                                "                        <button type='button' class='btneliminartarea' data-id='"+objTarea.id+"'>" +
                                "                            <i class='fa fa-trash'></i>" +
                                "                        </button>" +
                                "                        <br>" +
                                "                    </div>";

                            $( ".lstfltareas" ).append( seccion );
                        }else {
                            alert('Hubo un error al guardar los cambios!');
                        }
                    },
                    error(e) {
                        console.log(e);
                    }
                });

            });

            jQuery(document).on('click', '.btnUpdatetarea', function () {
                var task_id=$(this).data('id');
                tarea_id=task_id;
                $.ajax({
                    url: '/gettarea/'+task_id,
                    method: 'GET',
                    success: function (e) {
                        var objTarea = JSON.parse(e);
                        $('#txt_titulo_tarea').val(objTarea.titulo);
                        $('#txt_descripcion_tarea').val(objTarea.descripcion);
                        $('#txt_fecha_tarea').val(objTarea.fechalimite);
                        $('#txt_notamaxima_tarea').val(objTarea.notamaxima);
                        $('#txt_orden_tarea').val(objTarea.orden);
                        $('#ModalInsertarTarea').modal('show');
                    },
                    error(e) {
                        console.log(e);
                    }
                });

            });

            jQuery('#registrarinscripcion').on('click', function () {
                var parametros = {
                    _token: '{{csrf_token()}}',
                    codigo: $('#txt_codigo_inscripcion').val()
                };
                jQuery.ajax({
                    url: '{{ url('/createinscripcion') }}',
                    method: 'post',
                    data: parametros,
                    success: function (e) {
                        var objInscripcion = JSON.parse(e);
                        if (objInscripcion != null) {
                            $('#ModalInsertarInscripcion').modal('hide');
                            window.location.href="/Home";
                        } else {
                            alert('Error al registrar el nuevo alumno!');
                        }
                    },
                    error(e) {
                        console.log(e);
                    }
                });
                return false;
            });

            jQuery('#registrarcalificacion').on('click', function () {
                var presentacion_id=$(this).data("id");
                debugger;
                //var presentacion_id=$(this).attr("data-id")

                console.log(presentacion_id);
                var parametros = {
                    _token: '{{csrf_token()}}',
                    nota: $('#txt_calificacion_insc').val(),
                    id : presentacion_id
                };
                jQuery.ajax({
                    url: '{{ url('/calificacion') }}',
                    method: 'POST',
                    data: parametros,
                    success: function (e) {
                        console.log(e);
                        var objPresentacion = JSON.parse(e);
                        if (objPresentacion != null) {
                            $('#ModalInsertarCalificacion').modal('hide');

                        } else {
                            alert('La calificacion debe estar entre el máximo establecido!');
                        }
                    },
                    error(e) {
                        console.log(e);
                    }
                });
                return false;
            });




        });
        <!-- Eliminar -->
        jQuery(document).on('click', '.btneliminarmateria', function () {
            var materia_id=$(this).data('id');
            var confirmacion = confirm("Está seguro que desea eliminar?");
            if (!confirmacion)
                return false;
            jQuery.ajax({
                url: '{{ url('/eliminarmateria') }}/'+materia_id,
                method: 'GET',
                success: function (e) {
                    var data=e;
                    if (e =!null) {
                        var nom='#licurso'+data;
                        jQuery(nom).remove();
                    } else {
                        alert('Error al eliminar la materia!');
                    }
                },
                error(e) {
                    console.log(e);
                }
            });
        });

        jQuery(document).on('click', '.btneliminarcontenido', function () {
            var content_id=$(this).data('id');
            var confirmacion = confirm("Está seguro que desea eliminar?");
            if (!confirmacion)
                return false;
            jQuery.ajax({
                url: '{{ url('/eliminarcontenido') }}/'+content_id,
                method: 'GET',
                success: function (e) {
                    var data=e;
                    if (e =!null) {
                        var nom='#divcontenido'+data;
                        jQuery(nom).remove();
                    } else {
                        alert('Error al eliminar el contenido!');
                    }
                },
                error(e) {
                    console.log(e);
                }
            });
        });

        jQuery(document).on('click', '.btneliminartarea', function () {
            var task_id=$(this).data('id');
            var confirmacion = confirm("Está seguro que desea eliminar?");
            if (!confirmacion)
                return false;
            jQuery.ajax({
                url: '{{ url('/eliminartarea') }}/'+task_id,
                method: 'GET',
                success: function (e) {
                    var data=e;
                    if (e =!null) {
                        var nom='#divtarea'+data;
                        jQuery(nom).remove();
                    } else {
                        alert('Error al eliminar la tarea!');
                    }
                },
                error(e) {
                    console.log(e);
                }
            });
        });

        jQuery(document).on('click', '.btneliminarmiembro', function () {
            var miembro_id=$(this).data('id');
            var mate=$('#txtincripcionmateria').val();
            var confirmacion = confirm("Está seguro que desea eliminar?");
            if (!confirmacion){
                return false;
            }
            var parametros = {
                _token: '{{csrf_token()}}',
                alumno_id: miembro_id,
                materia_id: mate
            };

            jQuery.ajax({
                url: '/eliminarinscripcion',
                method: 'POST',
                data: parametros,
                success: function (e) {
                    var data=e;
                    if (e =!null) {
                        var nom='#divmiembro'+data;
                        jQuery(nom).remove();
                    } else {
                        alert('Error al eliminar la tarea!');
                    }
                },
                error(e) {
                    console.log(e);
                }
            });
        });

        jQuery(document).on('click', '.btneliminarmimateriaregistrada', function () {;
            var materia_id=$(this).data('id');
            var confirmacion = confirm("Está seguro que desea eliminar?");
            if (!confirmacion){
                return false;
            }

            jQuery.ajax({
                url: '/eliminarmiinscripcion/'+materia_id,
                method: 'GET',
                success: function (e) {
                    var data=e;
                    if (e =!null) {
                        var nom='#licurso'+data;
                        jQuery(nom).remove();
                    } else {
                        alert('Error al eliminar su inscripcion!');
                    }
                },
                error(e) {
                    console.log(e);
                }
            });
        });




    </script>


</head>
<body>

<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#"><label>C</label>colegiol<span>OGY</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Materia
                </a>

                <form style="display: none;">
                    <input id="txt_usuario_id" value="">
                </form>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <button type="button" class="dropdown-item" data-toggle="modal" id="btnmateria"
                            data-target="#ModalInsertarMateria" >
                        Materias
                    </button>
                    <button type="button" class="dropdown-item" data-toggle="modal" id="btninscripcion"
                            data-target="#ModalInsertarInscripcion" >
                        Materias
                    </button>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Grupos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Recursos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Calificaciones</a>
            </li>
            <li class="nav-item dropdown" style="margin-left: 480px;">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                    <span id="spnombrecompleto"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <button type="button" id="btncerrarsesion">Cerrar Sesion
                    </button>
                </div>
            </li>

        </ul>
    </div>
</nav>


<div class="contenedor">
    @yield('content')
</div>

@extends('Inscripcion.ModalIncripcionInsertar')
@extends('Materia.ModalMateriaInsertar')
@extends('Contenido.ModalContenidoInsertar')

</body>
<script src="{{asset('js/bootstrap.min.js')}}"></script>


</html>
