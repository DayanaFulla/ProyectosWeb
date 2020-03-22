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

            jQuery.ajax({
                url: '{{ url('/existuser') }}',
                method: 'GET',
                success: function (e) {
                    if (e != "false") {
                        var objUsuario = JSON.parse(e);
                        if(objUsuario.tipo==0){
                            window.location.href = "/Desktop";
                        }else{
                            window.location.href="/Home";
                        }
                    } else {
                        Console.log(e);
                    }
                },
                error(e) {
                    console.log(e);
                }
            });

            jQuery('#registrardocente').on('click', function () {
                var parametros = {
                    _token: '{{csrf_token()}}',
                    tipo: 0,
                    nombrecompleto: $('#txt_nombre_docente').val(),
                    correo: $('#txt_correo_docente').val(),
                    contrasena: $('#txt_contrasena_docente').val(),
                    confirmacion: $('#txt_con_contrasena_docente').val()
                };
                jQuery.ajax({
                    url: '{{ url('/createusuario') }}',
                    method: 'post',
                    data: parametros,
                    success: function (e) {
                        if (e == "true") {
                            $('#ModalInsertarDocente').modal('hide');
                        } else {
                            alert('Error al registrar el nuevo instructor!');
                        }
                    },
                    error(e) {
                        console.log(e);
                    }
                });
                return false;
            });
            jQuery('#registraralumno').on('click', function () {
                var parametros = {
                    _token: '{{csrf_token()}}',
                    tipo: 1,
                    nombrecompleto: $('#txt_nombre_alumno').val(),
                    correo: $('#txt_correo_alumno').val(),
                    contrasena: $('#txt_contrasena_alumno').val(),
                    confirmacion: $('#txt_con_contrasena_alumno').val()
                };
                jQuery.ajax({
                    url: '{{ url('/createusuario') }}',
                    method: 'post',
                    data: parametros,
                    success: function (e) {
                        if (e == "true") {
                            $('#ModalInsertarAlumno').modal('hide');
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

            jQuery('#Login').on('click', function () {
                var parametros = {
                    _token: '{{csrf_token()}}',
                    correo: $('#txt_correo_usuario').val(),
                    contrasena: $('#txt_contrasena_usuario').val()
                };
                jQuery.ajax({
                    url: '{{ url('/login') }}',
                    method: 'post',
                    data: parametros,
                    success: function (e) {
                        if (e != "false") {
                            $('#ModalLogin').modal('hide');
                            var objUsuario = JSON.parse(e);
                            if(objUsuario.tipo==0){
                                window.location.href = "/Desktop";
                            }else{
                                window.location.href="/Home";
                            }
                        } else {
                            alert("Alguno de los datos que ingresó es incorrecto, por favor continue intentando");
                        }
                    },
                    error(e) {
                        console.log(e);
                    }
                });
                return false;
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
            <li class="nav-item active">
                <a class="nav-link" href="#">Tour <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Stories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Connect</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Resources</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <div style="display: flex; margin-left: 450px;">
                <li class="nav-item">
                    <button type="button" class="nav-link" data-toggle="modal" data-target="#ModalLogin" id="btnlogin">
                        LOG IN
                    </button>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">|</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        SIGN UP
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <button type="button" class="dropdown-item" data-toggle="modal"
                                data-target="#ModalInsertarDocente">Instructor
                        </button>
                        <button type="button" class="dropdown-item" data-toggle="modal"
                                data-target="#ModalInsertarAlumno">Estudiante
                        </button>
                    </div>
                </li>
            </div>
        </ul>
    </div>
</nav>
<div class="ContentSecciones">
    <div class="secction1">
        <h2>Advance What's Possible</h2>
        <p>
            Colegiology brings together the best k-12 learning management
            system with assessment management to improve student performance, foster
            collaboration, and personalize learning.
        </p>
        <button>REQUEST A DEMO</button>
    </div>
    <div class="secction2">
        <img alt="icono" id="imgfoto" src="{{asset('Imagenes/listenmusic.jpg')}}">
    </div>
</div>
</body>
@extends('Docente.ModalDocenteInsertar')
@extends('Alumno.ModalAlumnoInsertar')
@extends('Usuario.ModalLogin')


<script src="{{asset('js/bootstrap.min.js')}}"></script>
</html>


