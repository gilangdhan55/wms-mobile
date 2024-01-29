<?php $this->view('template/header') ?>


  <!-- start page title -->
  <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">PUT</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">PUT/PICK</a></li>
                        <li class="breadcrumb-item active">PUT</li>
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
                            <th scope="col">#</th>
                            <th scope="col">NOPO</th>
                            <th scope="col">NOPAL</th>
                            <th scope="col">AUTO</th>
                            <th scope="col">BIN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            <?php foreach($allput as $all) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <!-- <td><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><?= $all->NoPo ?></a></td> -->
                                    <td><a href="<?= base_url().'put/'.$all->NoPo ?>" ><?= $all->NoPo ?></a></td>
                                    <td><?= $all->NoPal ?></td>
                                    <td><?= $all->auto ?></td>
                                    <td><?= $all->bin ?></td>
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