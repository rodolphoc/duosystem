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
        <!-- {{ URL::asset('assets/css/bootstrap.min.css') }} -->
        <script type='text/javascript' src="/duosystem/public/packages/jquery/jquery.min.js"></script>
        <script type='text/javascript' src="/duosystem/public/packages/bootstrap/js/bootstrap.min.js"></script>
        <script type='text/javascript' src="/duosystem/public/packages/bootstrap-table/src/bootstrap-table.js"></script>
        <script type='text/javascript' src="/duosystem/public/packages/bootstrap-table/src/extensions/export/bootstrap-table-export.js"></script>
        <script type='text/javascript' src="/duosystem/public/packages/tableExportJQueryPlugin/tableExport.js"></script>
        <script type='text/javascript' src="/duosystem/public/packages/tableExportJQueryPlugin/jquery.base64.js"></script>

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 90%;
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
            <div class="list">Controle de Atividades!</div>
            <hr>
            <button type="button" class="btn btn-primary" id="new">Nova Atividade</button>
            <button type="button" class="btn btn-warning" id="edit">Editar Atividade</button>
            <hr>
            <div>
                <table id="table-atividades" data-toolbar="#table-atividades-toolbar">
                    <thead>
                        <tr>
                            <th data-field="STATE" data-checkbox="true"></th>
                            <th data-field="id">id</th>
                            <th data-field="nome">nome</th>
                            <th data-field="descricao">descricao</th>
                            <th data-field="data_inicio">data inicio</th>
                            <th data-field="data_fim">data fim</th>
                            <th data-field="status_descricao">status</th>
                            <th data-field="situacao">ativo</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    <script type='text/javascript'>
        function doOk(){}
        $(function() {
            // Formata a tabela
            //var atividades  = JSON.parse("{{$atividades}}");
            var atividades  = JSON.parse("{{$atividades}}".replace(/&quot;/g,'"'));
            $gridAtividade = $('#table-atividades').bootstrapTable({
                data: atividades,
                cache: false,
                height: 300,
                striped: true,
                search: true,
                showColumns: false,
                showRefresh: false,
                minimumCountColumns: 2,
                clickToSelect: true,
                singleSelect: true,
                showToggle: false,
                showHeader: true,
                showExport: true,
                exportDataType: 'all',
                exportTypes:    ['excel','csv'],            
                onCheck: function (row) {
                    //alert(JSON.stringify(row));
                }
            });        

            
            $('#new').click(function(){
                window.location = 'http://localhost/duosystem/public/edit'
            });

            $('#edit').click(function () {
                var selects = $gridAtividade.bootstrapTable('getSelections');
                if (selects.length > 0) {

                    if(selects[0]['id_status'] == 4){

                        $('#message-dialog .modal-title').html('Atenção!');
                        $('#message-dialog .modal-body').html('Atividade concluída, não será possível edita-la.');
                        $('#message-dialog').modal('show');                          

                        return
                    }

                    var id = selects[0]['id'];
                    window.location = 'http://localhost/duosystem/public/edit/'+id
                }else{
                    $('#message-dialog .modal-title').html('Atenção!');
                    $('#message-dialog .modal-body').html('Você deve selecionar uma atividade.');
                    $('#message-dialog').modal('show');                          
                }
            });

        });
    </script>
</html>