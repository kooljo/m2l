<?php $this->classBody = "class='hold-transition skin-blue sidebar-mini'"?>
<?php $this->title = "Mes Formations"?>
<?php $this->script = "Formation/formations.js" ?>
<?php $this->employee = $employee; ?>
<?php $this->employeeFormations = $employeeFormations; ?>
<?php $this->performedFormations = $performedFormations; ?>
<?php $this->formations = $formations; ?>
<?php $this->breadcrumb = $breadcrumb; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 tableau" id="allFormation" data-tabname="all">
                <div id="__allFormations"></div>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Toutes les formations</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table id="table-all" class="table table-striped">
                            <tr>
                                <th>Nom</th>
                                <th>Date</th>
                                <th>Durée (en heure)</th>
                                <th>Jours / requis</th>
                                <th>Points / requis</th>
                                <th style=" width: 185px">Statut</th>
                                <th style="width: 80px"></th>
                            </tr>

                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div id="all" class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                        </ul>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.box -->

            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12" id="myFormation" data-tabname="myFormation">
                <div id="__askFormations"></div>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Mes formations en <?= date('Y') ?></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div  class="box-body no-padding">
                       
                            <table id="table-myFormation" class="table table-striped">
                                <tr>
                                    <th>Nom</th>
                                    <th>Date</th>
                                    <th>Durée (en heure)</th>
                                    <th>Jours / requis</th>
                                    <th>Points / requis</th>
                                    <th style=" width: 185px">Statut</th>
                                    <th style="width: 80px"></th>
                                </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                        </ul>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- ./col -->
            <div class="col-md-12" id="performedFormation" data-tabname="performedFormation">
                <div class="box box-green">
                    <div class="box-header">
                        <h3 class="box-title">Formations effectuées</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div id="table-do" class="box-body no-padding">
                  
                            <table id="table-performedFormation" class="table table-striped">
                                <tr>
                                    <th>Nom</th>
                                    <th>Date</th>
                                    <th>Durée (en heure)</th>
                                    <th>Jours / requis</th>
                                    <th>Points / requis</th>
                                    <th style="width: 185px">Statut</th>
                                    <th style="width: 80px"></th>
                                </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                        </ul>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- Your Page Content Here -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



