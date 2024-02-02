<?php $this->view('template/header') ?>

<style>
     main {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #reader {
        width: 600px;
    }
    #result {
        text-align: center;
        font-size: 1.5rem;
    }
</style>

  <!-- start page title -->
  <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">PUT / <?= $this->uri->rsegment(3); ?></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">PUT/PICK</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('put') ?>" >PUT</a></li>
                        <li class="breadcrumb-item active"><?= $this->uri->rsegment(3); ?></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>


<div class="row">
    <div class="col-12 putArea">
        <div class="card card-h-100">
            <div class="button" style="padding: 10px;"> 
                <a type="button" class="btn btn-primary btn-icon waves-effect waves-light" href="<?= base_url('put') ?>"><i data-feather="arrow-left"></i></a>
                <a type="button" class="btn btn-warning btn-icon waves-effect waves-light" href="<?= base_url().'put/'.$this->uri->rsegment(3) ?>"><i data-feather="refresh-cw"></i></a>
                <button type="button" class="btn btn-success btn-icon waves-effect waves-light buttonPut" data-po="<?= $this->uri->rsegment(3) ?>" onclick="cekStatusModal()">PUT</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="tablePutWMS">
                        <thead>
                            <tr>
                                <th style="text-align: center;">#</th>
                                <th style="text-align: center;">PALNO</th>
                                <th style="text-align: center;">BIN</th>
                                <th style="text-align: center;">AUTO</th>   
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            <?php foreach($allpo as $all) : ?>
                                <tr>
                                    <td style="text-align: center;"><?= $no; ?></td> 
                                    <td style="text-align: center;"><?= $all->NoPal ?></td> 
                                    <td style="text-align: center;"><?= $all->bin ?></td>
                                    <td >
                                        <div class="form-check form-switch" style="text-align: center;">
                                            <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck1" <?= $all->auto == "1" ? "checked" : "" ?> disabled> 
                                        </div><br>
                                    </td>  
                                </tr>
                            <?php $no++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div> 
            </div>
        </div> 
    </div> 
  
</div>

<div class="row">
    <div class="col-12">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="tableScan">
                        <thead>
                            <tr> 
                                <th style="text-align: center;">SCANPAL</th>
                                <th style="text-align: center;">SCANBIN</th>
                                <th style="text-align: center;">WMSREAD</th>  
                            </tr>
                        </thead>
                        <tbody>
                        
                        </tbody>
                    </table>
                </div> 
            </div>
        </div> 
    </div>
</div>


<?php $this->view('put/modal-scan') ?>

<script> 
    $('#tablePutWMS').DataTable();
    $('#tableScan').DataTable();
 
</script>
 
<?php $this->view('put/scan_js') ?>

<script>
function saveTempt()
{
    const tempNopal = $('#nameInputPal').val()
    const tempBin   = $('#nameInputBin').val()
}

</script>
<?php $this->view('template/footer') ?>