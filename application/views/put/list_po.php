<?php $this->view('template/header') ?>


  <!-- start page title -->
  <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">PUT / <?= $this->uri->rsegment(3); ?></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">PUT/PICK</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('put') ?>">PUT</a></li>
                        <li class="breadcrumb-item active"><?= $this->uri->rsegment(3); ?></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>


<div class="row">
    <div class="col-12">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="tablePutWMS">
                        <thead>
                            <tr>
                                <th style="text-align: center;">#</th>
                                <th style="text-align: center;">PALNO</th>
                                <th style="text-align: center;">BIN</th>
                                <th style="text-align: center;">AUTO</th> 
                                <th  style="text-align: center;">ACTION</th> 
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
                                    <td style="text-align: center;">
                                        <button type="button" class="btn btn-outline-success btn-sm btn-icon waves-effect waves-light">PUT</button>
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
    $('#tablePutWMS').DataTable()
</script>

<?php $this->view('template/footer') ?>