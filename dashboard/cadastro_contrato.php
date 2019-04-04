<!DOCTYPE html>
<html lang="pt-br"> 
    <head>    
        <meta charset="UTF-8"/>
        <meta name="description" content="Gestão Eletronico de Contrato">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link rel="icon" href="favicon.png">   
        <title>GEC - Gestão Eletronico de Contrato</title>
        <!-- CSS -->
        <link rel="stylesheet" href="css/css.css"/>
        <script type="text/javascript" src="js/jquery-1.6.4.js"></script>        
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"/>
        <script src="js/jquery.min.js"></script>
    </head>
    <body>
        <!-- Conteúdo -->
        <header>
            <nav class="top-nav">
                <div class="logo-nav">
                    <img src="img/logo_benfica.png"/>
                </div>
                <div class="dados-user-nav">
                    <div class="dados-user">
                         <?php include 'includes/topbar.php'; ?>
                    </div>
                </div>
            </nav>
        </header>
        <div class="barra-lateral">
            <nav>
                <div class="barra-lateral-nav">
                    <?php include('includes/menu.php'); ?>


                </div>
            </nav>
        </div>
        <!-- BOX CONTEUDO DA PAG -->

        <div class="box-conteudo">
           <article class="article-contrato" data-aos="zoom-in" id="result">
            <header class="header-article-contrato">
                <label class="title-contrato">CADASTRO CONTRATO</label>
            </header>
            <form action="" method="post" onsubmit="return false;">
                <div class="line-contrato">
                    <div class="form-contrato num_contrato">
                        <label class="title-option-contrato">Nº Contrato:</label>
                        <input type="text" class="input-contrato input-auto-num" id="numero_contrato" placeholder="Nº Contrato" autocomplete="off">
                    </div>
                    <div class="form-contrato tipo_contrato">
                        <label class="title-option-contrato"> Tipo Contrato:</label>
                        <label class="input-radio-contrato">
                            <input type="radio" id="rd_publico" name="radio-group" checked>
                            <label for="rd-publico" class="rd-label-contrato">Público</label>
                        </label>
                        <label class="input-radio-contrato">
                            <input type="radio" id="rd_privado" name="radio-group">
                            <label for="rd-privado" class="rd-label-contrato">Privado</label>

                        </label>
                    </div>
                </div>
                <div class="line-contrato">
                    <div class="form-contrato contratante">
                        <label class="title-option-contrato">Contratante: </label>
                        <input type="text" class="input-contrato input-auto" id="nome_contratante"  placeholder="Nome Contratante" autocomplete="off">
                    </div>
                    <div class="form-contrato contratada">
                        <label class="title-option-contrato">Contratada: </label>
                        <input type="text" class="input-contrato input-auto" id="nome_contratada"  placeholder="Nome Contratada" autocomplete="off">
                    </div>
                </div>
                <div class="line-contrato">
                    <div class="form-contrato concorrencia">
                        <label class="title-option-contrato">Concorrência: </label>
                        <input type="text" class="input-contrato input-auto-concorrencia" id="nome_concorrencia"  placeholder="Nome Concorrência" autocomplete="off">
                    </div>     
                    <div class="form-contrato datavigencia">
                        <label class="title-option-contrato">Data Vigência: </label>
                        <input type="date" class="input-contrato input-auto-vigencia" id="inicio_vigencia"  placeholder="00/00/0000" autocomplete="off">
                        <span class="span-space">á</span>
                        <input type="date" class="input-contrato input-auto-vigencia" id="fim_vigencia"  placeholder="00/00/0000" autocomplete="off">
                    </div> 
                </div>
                <div class="line-contrato">
                    <div class="form-contrato valorcontrato">
                        <label class="title-option-contrato">Valor Contrato: </label>
                        <input type="text" class="input-contrato input-auto-valor" id="valor_contrato"  placeholder="Valor Contrato" autocomplete="off">
                    </div> 
                    <div class="form-contrato parcela">
                        <label class="title-option-contrato">Parcelas </label>
                        <input type="text" class="input-contrato input-auto-valor" id="parcela"  placeholder="Parcelas" autocomplete="off">
                    </div> 
                    <div class="form-contrato valorparcela">
                        <label class="title-option-contrato">Valor Parcela: </label>
                        <input type="text" class="input-contrato input-auto-valorparcela" id="valor_parcela"  placeholder="Valor Parcela" autocomplete="off" readonly="readonly">
                    </div> 
                </div>
                <div class="line-contrato">
                    <div class="form-contrato datapagparc">
                        <label class="title-option-contrato">Data de pagamento das parcelas: </label>
                        <input type="date" class="input-contrato input-auto-dataparc" id="data_pag_parcela"  placeholder="Valor Contrato" autocomplete="off">
                    </div> 
                    <div class="form-contrato parcelasfinalizadas">
                        <label class="title-option-contrato">Parcelas Finalizadas: </label>
                        <input type="text" class="input-contrato input-auto-parcelasfinalizadas" id="parcelas_finalizadas"  placeholder="Parc. Finalizadas" autocomplete="off">
                    </div> 
                </div>
                <div class="line-contrato">

                    <div class="form-contrato totalfinalizado">
                        <label class="title-option-contrato">Total Finalizado: </label>
                        <input type="text" class="input-contrato input-auto-totalfinalizado" id="total_finalizado"  placeholder="Total finalizado" autocomplete="off" readonly="readonly">
                    </div> 
                    <div class="form-contrato vencimentocontrato">
                        <label class="title-option-contrato">Vencimento: </label>
                        <input type="date" class="input-contrato input-auto-vencimento" id="vencimento"  placeholder="00/00/0000" autocomplete="off">
                    </div> 
                </div>
                <div class="line-contrato">
                    <div class="form-contrato cadastrar">
                        <center>  
                            <input type="button" value="PROSSEGUIR" class="button-cadastro-contrato" id="cadastrar_contrato">
                        </center>
                    </div> 

                </div>
            </form>
        </article>

        </div>


        <!-- /BOX CONTEUDO DA PAG -->
        <!-- /Conteúdo -->

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>

    </body>
</html>