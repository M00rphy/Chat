<?php

include('database_connection.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header("location:login.php");
}
$text1 = "";
$text2 = "";


$consultaU = "SELECT * FROM datosusuarios WHERE tipoUsuario = 'Usuario' LIMIT $a ,$b";
$resultadoU = mysqli_query($connect, $consultaU);
$countR2 = mysqli_num_rows($resultadoU);

?>

<html>
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Chat</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <link rel="stylesheet" href="Assets/css/404.css"/>
</head>
<body>
<div class="overlay"></div>

<div class="container">

    <div class="row">

        <div class="col-4">

            <h5>Usuarios para asignar</h5>

            <input type="text" class="form-control pull-right" id="search" placeholder="Buscar">

            <table style="font-size: .7em" width="100%" id="mytable">


                <tr>

                    <td>

                        Nombre

                    </td>


                    <td>

                        Agregar Fisico

                    </td>

                    <td>

                        Agregar Moral

                    </td>


                </tr>

                <?php

                while ($rowU = mysqli_fetch_array($resultadoU)) {

                    $id = $rowU[0];

                    $usuarioI = $rowU[1];

                    $nombre = $rowU[2];

                    $apPaterno = $rowU[3];

                    $apMaterno = $rowU[4];


                    $expedienteI = $expediente;


                    $ncompleto = $nombre . " " . $apPaterno . " " . $apMaterno;


                    ?>

                    <tr>

                        <td>

                            <?php echo $ncompleto ?>

                        </td>


                        <td>

                            <a href="enviarInvitacion.php?usuarioI=<?php echo $usuarioI ?>&usuarioCo=<?php echo $usuario ?>&tipoInvitacion=<?php echo $fisico ?>&expediente=<?php echo $expediente ?>"
                               style="font-size: 1.2em" class="btn btn-success">+</a>

                        </td>

                        <td>

                            <a href="enviarInvitacion.php?usuarioI=<?php echo $usuarioI ?>&usuarioCo=<?php echo $usuario ?>&tipoInvitacion=<?php echo $moral ?>&expediente=<?php echo $expediente ?>"
                               style="font-size: 1.2em" class="btn btn-success">+</a>

                        </td>

                    </tr>

                <?php } ?>

            </table>

            <nav aria-label="...">
                <ul class="pagination">
                    <?php
                    if ($paginacion == 1) {
                        $activador = "disabled";
                    } ?>
                    <li class="page-item <?php echo $activador ?>">


                        <a class="page-link "
                           href="buscadorInvitaciones.php?expediente=<?php echo $expediente ?>&participacion=<?php echo $participacion ?>&estatus=<?php echo $estatus ?>&paginacion=<?php echo $paginacion - 1 ?>">Previous</a>

                    </li>

                    <?php for ($i = 0; $i < $test; $i++) {
                        $l = $i + 1;
                        echo '

   
    <li class="page-item " ><a class="page-link" href="buscadorInvitaciones.php?expediente=' . $expediente . '&participacion=' . $participacion . '&paginacion=' . $l . '">' . $l . '</a></li>
   
    
 ';
                    } ?>

                    <?php

                    if ($paginacion == $test) {
                        $activador2 = "disabled";
                    } ?>
                    <li class="page-item <?php echo $activador2 ?>">
                        <a class="page-link"
                           href="buscadorInvitaciones.php?expediente=<?php echo $expediente ?>&participacion=<?php echo $participacion ?>&estatus=<?php echo $estatus ?>&paginacion=<?php echo $paginacion + 1 ?>">Next</a>
                    </li>
                </ul>
            </nav>

        </div>

        <div class="col-8">

            <h5>Registrados</h5>

            <table style="font-size: .7em" width="100%">

                <tr>


                </tr>

                <tr>

                    <td>

                        Nombre

                    </td>

                    <td>

                        Documentos

                        <br>

                    </td>

                    <td colspan="2">

                        Formularios

                    </td>


                </tr>

                <?php

                while ($rowA = mysqli_fetch_array($resultadoA)) {

                    $usuarioC = $rowA[1];

                    $expedienteC = $rowA[2];

                    $idTipoParticipacionC = $rowA[4];


                    $consultaC = "SELECT * FROM datosusuarios WHERE usuario='$usuarioC'";

                    $resultadoC = mysqli_query($con, $consultaC);

                    $rowC = mysqli_fetch_array($resultadoC);

                    $nombre = $rowC[2];

                    $apPaterno = $rowC[3];

                    $apMaterno = $rowC[4];


                    $ncompletoA = $nombre . " " . $apPaterno . " " . $apMaterno;

                    switch ($estatus) {
                        case 'Nuevo':
                            $btnEliminar = '<a href="eliminarRegistro.php?expediente=' . $expedienteC . '&usuario=' . $usuarioC . '"
style="font-size: 1.2em" class="btn btn-danger">-</a>';
                            break;

                        default:
                            $btnEliminar = '';
                            break;
                    }


                    ?>

                    <?php //Banderas

                    //Consulta formato

                    $consultaFormato = "SELECT * FROM formatoinv WHERE usuario='$usuarioC' AND expediente ='$expedienteC' ";
                    $resultadoFormato = mysqli_query($con, $consultaFormato);
                    $cantidadF = mysqli_num_rows($resultadoFormato);

                    //Consulta Identificaciones

                    $consultaIdentificacion = "SELECT * FROM identificaciones WHERE usuario='$usuarioC' ";
                    $resultadoIdentificacion = mysqli_query($con, $consultaIdentificacion);
                    $cantidadI = mysqli_num_rows($resultadoIdentificacion);


                    //Consulta de poderes
                    $consultaPoderes = "SELECT * FROM poderes WHERE usuario='$usuarioC' AND expediente ='$expedienteC' ";
                    $resultadoPoderes = mysqli_query($con, $consultaPoderes);
                    $cantidadPod = mysqli_num_rows($resultadoPoderes);

                    //Consulta de solvencia
                    $consultaSolv = "SELECT * FROM docsolvencia WHERE usuario='$usuarioC' AND expediente ='$expedienteC' ";
                    $resultadoSolv = mysqli_query($con, $consultaSolv);
                    $cantidadSolv = mysqli_num_rows($resultadoSolv);


                    //Consulta de actas
                    $consultaActas = "SELECT * FROM actas WHERE usuario='$usuarioC' AND expediente ='$expedienteC' ";
                    $resultadoActas = mysqli_query($con, $consultaActas);
                    $cantidadAct = mysqli_num_rows($resultadoActas);


                    //Consulta de comprobantes
                    $consultaComp = "SELECT * FROM comprobantes WHERE usuario='$usuarioC' AND expediente ='$expedienteC' ";
                    $resultadoComp = mysqli_query($con, $consultaComp);
                    $cantidadComp = mysqli_num_rows($resultadoComp);

                    //Consulta de Inmueble
                    $consultaIn = "SELECT * FROM inmueble WHERE usuario='$usuarioC' AND expediente ='$expedienteC' ";
                    $resultadoIn = mysqli_query($con, $consultaIn);
                    $cantidadIn = mysqli_num_rows($resultadoIn);

                    //Consulta tipoParticipacion

                    $consultaTipo = "SELECT * FROM relacionadosexpediente WHERE usuario='$usuarioC' AND expediente ='$expedienteC' ";
                    $resultadoTipo = mysqli_query($con, $consultaTipo);
                    $rowTipo = mysqli_fetch_array($resultadoTipo);


                    //Consulta tipoSolvencia

                    $consultaTipoS = "SELECT * FROM tiposolvencias WHERE usuario='$usuarioC' AND expediente ='$expedienteC' ";
                    $resultadoTipoS = mysqli_query($con, $consultaTipoS);
                    $rowTipoS = mysqli_fetch_array($resultadoTipoS);
                    $TipoSolvencia = $rowTipoS[3];

                    //Sumatoria contadores

                    /*
                     switch ($TipoSolvencia) { //FIXME
                         case 'RN':
                             $consultaTSolv = "SELECT * FROM docsolvencia WHERE usuario='$usuarioC' AND expediente ='$expedienteC' AND tipoSol = '$TipoSolvencia' ";
                             $resultadoTSolv = mysqli_query($con, $consultaTSolv);
                             $cantidadTSolv = mysqli_num_rows($resultadoTSolv);
                             echo $cantidadTSolv;
                             break;
                         case 'DI':

                             $totalS = 3;
                             break;
                         case 'EC':

                             $totalS = 3;
                             break;
                         case 'EF':
                             $totalS = 1;
                             break;
                             break;
                         case 'DG':
                             $totalS = 1;
                             break;
                     }
                    */

                    switch ($idTipoParticipacionC) {
                        case '1':
                            $sumatoriaContadores = $cantidadF + $cantidadI + $cantidadComp + $cantidadSolv;

                            switch ($sumatoriaContadores) {

                                case 1:

                                    $bandera = 'amarilla';
                                    break;


                                case 2:

                                    $bandera = 'amarilla';
                                    break;

                                case 3:

                                    $bandera = 'amarilla';
                                    break;

                                case 4:

                                    $bandera = 'verde';
                                    break;

                                default:

                                    $bandera = 'roja';
                                    break;
                            }

                            break;
                        case '2':
                            $sumatoriaContadores = $cantidadI + $cantidadF + $cantidadAct + $cantidadComp + $cantidadSolv + $cantidadPod;

                            switch ($sumatoriaContadores) {

                                case 1:

                                    $bandera = 'amarilla';
                                    break;


                                case 2:

                                    $bandera = 'amarilla';
                                    break;

                                case 3:

                                    $bandera = 'amarilla';
                                    break;

                                case 4:

                                    $bandera = 'amarilla';
                                    break;

                                case 5:

                                    $bandera = 'amarilla';
                                    break;

                                case 6:

                                    $bandera = 'amarilla';
                                    break;

                                case 7:
                                    $bandera = 'amarilla';
                                    break;

                                case 8:

                                    $bandera = 'verde';
                                    break;


                                default:

                                    $bandera = 'roja';
                                    break;
                            }

                            break;
                        case '3':
                            $sumatoriaContadores = $cantidadF + $cantidadI + $cantidadComp;

                            switch ($sumatoriaContadores) {

                                case 1:

                                    $bandera = 'amarilla';
                                    break;


                                case 2:

                                    $bandera = 'amarilla';
                                    break;

                                case 3:

                                    $bandera = 'verde';
                                    break;

                                default:

                                    $bandera = 'roja';
                                    break;
                            }

                            break;
                        case '4':
                            $sumatoriaContadores = $cantidadF + $cantidadI + $cantidadComp;

                            switch ($sumatoriaContadores) {

                                case 1:

                                    $bandera = 'amarilla';
                                    break;


                                case 2:

                                    $bandera = 'amarilla';
                                    break;

                                case 3:

                                    $bandera = 'verde';
                                    break;

                                default:

                                    $bandera = 'roja';
                                    break;
                            }

                            break;
                        case '5':
                            $sumatoriaContadores = $cantidadF + $cantidadI + $cantidadComp + $cantidadIn;

                            switch ($sumatoriaContadores) {

                                case 1:

                                    $bandera = 'amarilla';
                                    break;


                                case 2:

                                    $bandera = 'amarilla';
                                    break;

                                case 3:

                                    $bandera = 'amarilla';
                                    break;

                                case 4:

                                    $bandera = 'verde';
                                    break;

                                default:

                                    $bandera = 'roja';
                                    break;
                            }

                            break;
                        case '6':
                            $sumatoriaContadores = $cantidadF + $cantidadI + $cantidadPod + $cantidadAct + $cantidadComp + $cantidadIn;

                            switch ($sumatoriaContadores) {

                                case 1:

                                    $bandera = 'amarilla';
                                    break;


                                case 2:

                                    $bandera = 'amarilla';
                                    break;

                                case 3:

                                    $bandera = 'amarilla';
                                    break;

                                case 4:

                                    $bandera = 'amarilla';
                                    break;

                                case 5:

                                    $bandera = 'amarilla';
                                    break;

                                case 6:

                                    $bandera = 'verde';
                                    break;


                                default:

                                    $bandera = 'roja';
                                    break;
                            }

                            break;

                        default:
                            $bandera = 'roja';
                            break;
                    }


                    ?>


                    <?php


                    // Formulario Fisico


                    $consultaFormularioFisico = "SELECT * FROM formulariosfisicos WHERE usuario='$usuarioC' AND expediente ='$expedienteC' ";

                    $resultadoFormulario = mysqli_query($con, $consultaFormularioFisico);

                    $rowFormularioFisico = mysqli_fetch_array($resultadoFormulario);

                    $formulario2Term = $rowFormularioFisico[25];

                    $formulario3Term = $rowFormularioFisico[38];

                    $formulario4Term = $rowFormularioFisico[84];

                    $cantidadForm = mysqli_num_rows($resultadoFormulario);


                    $sumatoriaContadoresForm = $formulario3Term + $formulario4Term;


                    switch ($sumatoriaContadoresForm) {

                        case 1:

                            $banderaF = 'amarilla';

                            break;

                        case 2:

                            $banderaF = 'verde';

                            break;


                        default:

                            $banderaF = 'roja';

                            break;
                    }


                    ?>


                    <tr>

                        <td>

                            <?php echo $ncompletoA ?>

                        </td>

                        <td>

                            <a href="documentos.php?expediente=<?php echo $expedienteC ?>&usuario=<?php echo $usuarioC ?>&idTipoParticipacion=<?php echo $idTipoParticipacionC ?>"
                               style="font-size: .9em" class="btn btn-success">Documentos</a><img
                                    src="../img/bandera_<?php echo $bandera ?>.png" style="width: 5%">

                        </td>

                        <td>

                            <a href="formularioCor.php?expediente=<?php echo $expedienteC ?>&usuario=<?php echo $usuarioC ?>"
                               style="font-size: .9em" class="btn btn-success">Formularios</a><img
                                    src="../img/bandera_<?php echo $banderaF ?>.png" style="width: 5%">

                        </td>

                        <td>

                            <?php echo $btnEliminar ?>

                        </td>

                    </tr>

                <?php } ?>

            </table>


            <h5>Invitados/Rechazados</h5>

            <table style="font-size: .7em" width="100%">


                <tr>

                    <td>

                        Nombre

                    </td>

                    <td>

                        Tipo Invitacion


                    </td>

                    <td>

                        Expediente

                    </td>

                    <td>

                        Estatus

                    </td>

                    <td>

                        Acciones

                    </td>


                </tr>

                <?php

                while ($rowB = mysqli_fetch_array($resultadoB)) {

                    $usuarioD = $rowB[1];

                    $expedienteD = $rowB[4];

                    $idTipoParticipacionD = $rowB[3];

                    $estatusD = $rowB[5];


                    $consultaD = "SELECT * FROM datosusuarios WHERE usuario='$usuarioD'";

                    $resultadoD = mysqli_query($con, $consultaD);

                    $rowD = mysqli_fetch_array($resultadoD);

                    $nombre = $rowD[2];

                    $apPaterno = $rowD[3];

                    $apMaterno = $rowD[4];


                    $ncompletoD = $nombre . " " . $apPaterno . " " . $apMaterno;


                    ?>

                    <tr>

                        <td>

                            <?php echo $ncompletoD ?>

                        </td>

                        <td>

                            <?php echo $idTipoParticipacionD ?>

                        </td>

                        <td>

                            <?php echo $expedienteD ?>

                        </td>

                        <td>

                            <?php echo $estatusD ?>

                        </td>

                        <td>

                            <!-- Falta eliminar registro -->


                            <a href="eliminarRegistroInvitacion.php?expediente=<?php echo $expedienteD ?>&usuario=<?php echo $usuarioD ?>"
                               style="font-size: 1.2em" class="btn btn-danger">-</a>

                        </td>

                    </tr>

                <?php } ?>

            </table>

        </div>

    </div>

</div>

<div class="container">
    <br/>

    <h3 align="center">Chat</h3><br/>
    <br/>
    <div class="row">
        <div class="col-md-8 col-sm-6">
            <h4>Online User</h4>
        </div>
        <div class="col-md-2 col-sm-3">
            <p class="glitch_3" data-text="Hi <?php echo $_SESSION['username']; ?> " align="right">Hi <?php echo $_SESSION['username']; ?> <a href="logout.php">Logout</a></p>
        </div>
    </div>
    <div class="table-responsive">

        <div id="user_details"></div>
        <div id="user_model_details"></div>
    </div>
    <br/>
    <br/>

</div>

</body>
</html>

<style>

    .chat_message_area {
        position: relative;
        width: 100%;
        height: auto;
        border: 1px solid #000000;
        border-radius: 3px;
        background-color: rgba(0,0,0,0);
    }

    .image_upload {
        position: absolute;
        top: 3px;
        right: 3px;
    }

    .image_upload > form > input {
        display: none;
    }

    .image_upload img {
        width: 24px;
        cursor: pointer;
    }

</style>


<script>

    $(document).ready(function () {

        fetch_user();

        setInterval(function () {
            update_last_activity();
            fetch_user();
            update_chat_history_data();
            fetch_group_chat_history();
        }, 5000);

        function fetch_user() {
            $.ajax({
                url: "fetch_user.php",
                method: "POST",
                success: function (data) {
                    $('#user_details').html(data);
                }
            })
        }

        function update_last_activity() {
            $.ajax({
                url: "update_last_activity.php",
                success: function () {

                }
            })
        }

        function make_chat_dialog_box(to_user_id, to_user_name) {
            var modal_content = '<div>' +
                '<div id="user_dialog_' + to_user_id + '" class="user_dialog" title="You have a chat with ' + to_user_name + '">';
            modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px; background-color: rgba(0,0,0,0);' +
                '"class="chat_history" data-touserid="' + to_user_id + '" id="chat_history_' + to_user_id + '">';
            modal_content += fetch_user_chat_history(to_user_id);
            modal_content += '</div>';
            modal_content += '<div class="form-group">';
            modal_content += '<textarea name="chat_message_' + to_user_id + '" id="chat_message_' + to_user_id + '" class="form-control chat_message"></textarea>';
            modal_content += '</div><div class="form-group" align="right">';
            modal_content += '<button type="button" name="send_chat" id="' + to_user_id + '" class="btn btn-info send_chat">Send</button></div></div></div>';
            $('#user_model_details').html(modal_content);
        }

        $(document).on('click', '.start_chat', function () {
            var to_user_id = $(this).data('touserid');
            var to_user_name = $(this).data('tousername');
            make_chat_dialog_box(to_user_id, to_user_name);
            $("#user_dialog_" + to_user_id).dialog({
                autoOpen: false,
                width: 400
            });
            $('#user_dialog_' + to_user_id).dialog('open');
            $('#chat_message_' + to_user_id).emojioneArea({
                pickerPosition: "top",
                toneStyle: "bullet"
            });
        });

        $(document).on('click', '.send_chat', function () {
            var to_user_id = $(this).attr('id');
            var chat_message = $.trim($('#chat_message_' + to_user_id).val());
            if (chat_message != '') {
                $.ajax({
                    url: "insert_chat.php",
                    method: "POST",
                    data: {to_user_id: to_user_id, chat_message: chat_message},
                    success: function (data) {
                        //$('#chat_message_'+to_user_id).val('');
                        var element = $('#chat_message_' + to_user_id).emojioneArea();
                        element[0].emojioneArea.setText('');
                        $('#chat_history_' + to_user_id).html(data);
                    }
                })
            } else {
                alert('Type something');
            }
        });


        $('#emojionearea-editor').keydown(function (event) {
            var keyCode = (event.keyCode ? event.keyCode : event.which);
            if (keyCode == 13) {
                $('#startSearch').trigger('click');
                $('.send_chat').click();
                return false;
            }
        });


        function fetch_user_chat_history(to_user_id) {
            $.ajax({
                url: "fetch_user_chat_history.php",
                method: "POST",
                data: {to_user_id: to_user_id},
                success: function (data) {
                    $('#chat_history_' + to_user_id).html(data);
                }
            })
        }

        function update_chat_history_data() {
            $('.chat_history').each(function () {
                var to_user_id = $(this).data('touserid');
                fetch_user_chat_history(to_user_id);
            });
        }

        $(document).on('click', '.ui-button-icon', function () {
            $('.user_dialog').dialog('destroy').remove();
            $('#is_active_group_chat_window').val('no');
        });

        $(document).on('focus', '.chat_message', function () {
            var is_type = 'yes';
            $.ajax({
                url: "update_is_type_status.php",
                method: "POST",
                data: {is_type: is_type},
                success: function () {

                }
            })
        });

        $(document).on('blur', '.chat_message', function () {
            var is_type = 'no';
            $.ajax({
                url: "update_is_type_status.php",
                method: "POST",
                data: {is_type: is_type},
                success: function () {

                }
            })
        });

        $(document).on('click', '.remove_chat', function () {
            var chat_message_id = $(this).attr('id');
            if (confirm("Are you sure you want to remove this chat?")) {
                $.ajax({
                    url: "remove_chat.php",
                    method: "POST",
                    data: {chat_message_id: chat_message_id},
                    success: function (data) {
                        update_chat_history_data();
                    }
                })
            }
        });

    });
</script>