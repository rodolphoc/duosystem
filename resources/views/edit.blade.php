<?php
// controle de edicao
$nome       = isset($data->nome) ? $data->nome : '';
$descricao  = isset($data->descricao) ? $data->descricao : '';
$data_inicio= isset($data->data_inicio) ? $data->data_inicio : '';
$data_fim   = isset($data->data_fim) ? $data->data_fim : '';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Duosystem - Tecnologia e Informática Ltda</title>
        <meta name="keywords" content="Duosystem, desenvolvimento de softwares de gestão, saúde, " />
        <meta name="description" content="Especializada no desenvolvimento de softwares de gestão, a Duosystem atua no mercado desde 2005, atendendo os segmentos público e privado. Atuamos diretamente, a partir de uma análise completa da estratégia de negócios dos nossos clientes." />
        <meta name="Author" content="João Lucas Tavares das Neves[www.duosystem.com]" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- mobile settings -->
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

        <!-- Favicon -->
        <link rel="shortcut icon" href="http://www.duosystem.com.br/assets/images/favicon.ico" />

        <!-- WEB FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800%7CDosis:300,400&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css" />        

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <link rel='stylesheet' href="/duosystem/public/packages/bootstrap/css/bootstrap.css" type='text/css' />
        <link rel='stylesheet' href="/duosystem/public/packages/bootstrap/css/button.css" type='text/css' />
        <link rel='stylesheet' href="/duosystem/public/packages/bootstrap-table/src/bootstrap-table.css" type='text/css' />
        <link rel='stylesheet' href="/duosystem/public/packages/font-awesome/css/font-awesome.min.css" type='text/css' />
        <link media="all" type="text/css" rel="stylesheet" href="/duosystem/public/packages/bootstrap-datepicker/css/datepicker3.css?atualizacao=14052018171614">        
        <!-- {{ URL::asset('assets/css/bootstrap.min.css') }} -->
        <script type='text/javascript' src="/duosystem/public/packages/jquery/jquery.min.js"></script>
        <script type='text/javascript' src="/duosystem/public/packages/bootstrap/js/bootstrap.min.js"></script>
        <script type='text/javascript' src="/duosystem/public/packages/bootstrap-table/src/bootstrap-table.js"></script>
        <script type='text/javascript' src="/duosystem/public/packages/bootstrap-table/src/extensions/export/bootstrap-table-export.js"></script>
        <script type='text/javascript' src="/duosystem/public/packages/tableExportJQueryPlugin/tableExport.js"></script>
        <script type='text/javascript' src="/duosystem/public/packages/tableExportJQueryPlugin/jquery.base64.js"></script>        
        <script src="/duosystem/public/packages/bootstrap-datepicker/js/bootstrap-datepicker.js?atualizacao=14052018171614"></script>        
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
            }

            .container {
                text-align: left;
                display: table-cell;
                vertical-align: top;
            }

            .content {
                text-align: left;
                display: inline-block;
            }

            .title {
                padding: 20px;
                font-size: 32px;
            }

            .list{
                padding: 20px;
            }

            .tdTitle{
                text-align: right;
            }

        </style>
    </head>
    <body>
        <div class="modal fade in" id="message-dialog" tabindex="-1" role="dialog" data-backdrop="true" aria-hidden="true">

            <!-- Botão de precaução de fechamento -->
            <!--<button type="button" class="close" onclick="doOk()" data-dismiss="modal"><span aria-hidden="true" style='font-size: 26px; padding: 10px; color: navy; opacity: 0.8;'>&times;</span><span class="sr-only">Close</span></button>-->

            <!-- .modal-dialog -->
            <div class="modal-dialog">
                <!-- .modal-content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" onclick="doOk()" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-fresh" onclick="doOk()" data-dismiss="modal">OK</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>   
        <div class="container">
            <div class="content">
                <div class="title"><img src='http://www.duosystem.com.br/assets/images/logo.png'></div>
            </div>
            <div class="list">Nova Atividades!</div>
            <hr>
            <button type="button" class="btn btn-primary" onclick="javascript:history.back()">Listar Atividades</button>            
            <hr>
            <div>
                <form action='/duosystem/public/save' method="POST" name="form_atividade" id="form_atividade">
                <input type="hidden" name="id" value="{{$id}}">
                {{ csrf_field() }}
                <table>
                    <tr>
                        <td class="tdTitle">Nome:&nbsp;</td>
                        <td><input type="text" name="nome" id="nome" value="{{$nome}}" maxlength="255">&nbsp;*</td>                        
                    </tr>
                    <tr>
                        <td class="tdTitle">Descri&ccedil;&atilde;o:&nbsp;</td>
                        <td><textarea rows="4" cols="45" name="descricao" id="descricao">{{$descricao}}</textarea>&nbsp;*</td>                        
                    </tr>
                    <tr>
                        <td class="tdTitle">Data In&iacute;cio:&nbsp;</td>
                        <td><input type="text" name="data_inicio" id="data_inicio" value="{{$data_inicio}}" maxlength="10">&nbsp;*</td>                        
                    </tr>
                    <tr>
                        <td class="tdTitle">Data Fim:&nbsp;</td>
                        <td><input type="text" name="data_fim" id="data_fim" value="{{$data_fim}}" maxlength="10">&nbsp;*</td>
                    </tr>
                    <tr>
                        <td class="tdTitle">Status:&nbsp;</td>
                        <td>
                            <select name='status' id='status'>
                                @foreach ($status as $status_)
                                    <option value="{{$status_->id}}">{{$status_->descricao}}</option>
                                @endforeach                        
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdTitle">Ativo:&nbsp;</td>
                        <td><input type="checkbox" name="ativo" id="ativo" value="1"></td>
                    </tr>                    
                </table>
                </form>
            </div>
            <div style="text-align: center;padding: 15px;">
                <button type="button" class="btn btn-secondary" onclick="javascript:history.back()">Cancelar</button>
                <button type="button" class="btn btn-success" id='salvar'>Salvar</button></div>
            <hr>
        </div>
    </body>
    <script type='text/javascript'>
        function doOk(){}
        $(function() {
            
            $('#data_inicio,#data_fim').datepicker({
                autoclose:  true
            ,   format:     'dd/mm/yyyy'
            });

            $('#salvar').click(function(){

                var nome        = $('#nome').val();
                var descricao   = $('#descricao').val();
                var data_inicio = $('#data_inicio').val();
                var data_fim    = $('#data_fim').val();
                var erros       = '';

                if(nome == ''){
                    erros += ' Nome, ';
                }

                if(descricao == ''){
                    erros += ' Descricao, ';
                }

                if(data_inicio == ''){
                    erros += ' Data Inicio, ';
                }

                if(data_fim == ''){
                    erros += ' Data Fim, ';
                }

                if(erros != ''){
                    $('#message-dialog .modal-title').html('Atenção!');
                    $('#message-dialog .modal-body').html('Os campos: [' + erros + '] são obrigatórios!');
                    $('#message-dialog').modal('show');                                            
                }else{
                    //console.log(erros);
                    $('#form_atividade').submit();
                }

            });

        });
    </script>    
</html>