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
                        <li class="breadcrumb-item"><a href="<?= base_url('put') ?>">PUT</a></li>
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
                <button type="button" class="btn btn-success btn-icon waves-effect waves-light buttonPut" data-po="<?= $this->uri->rsegment(3) ?>">PUT</button>
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


<div class="modal fade zoomIn" id="ScanModal" styl="display: none;">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ScanModalLabel">Scan QR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="">
            <div class="row mb-3 ">
                <div class="col-sm-3">
                    <label for="nameInputPal" class="form-label">PAL</label>
                </div>
                <div class="col-sm-9 d-flex justify-content-between align-items-center">
                    <input type="text" class="form-control" id="nameInputPal"  onclick="palNO()" onchange="fetchPalNo(this.value)">
                    <input type="checkbox" id="autoBox" name="autobox" hidden>
                    <div class="checkPal" style="display: none;">
                        <span><i data-feather="check" style="color: green;"></i></span>
                    </div>
                    <div class="xclosePal" style="display: none;">
                        <span><i data-feather="x" style="color: red;"></i></span>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="nameInputBin" class="form-label">BIN</label>
                </div>
                <div class="col-sm-9 d-flex justify-content-between align-items-center"> 
                    <input type="text" class="form-control" id="nameInputBin"  onclick="scanBin()">
                    <div class="checkBin" style="display: none;">
                        <span><i data-feather="check" style="color: green;"></i></span>
                    </div>
                    <div class="xcloseBin" style="display: none;">
                        <span><i data-feather="x" style="color: red;"></i></span>
                    </div>
                </div>
            </div>
            <div class="row mb-3" >
                <main>
                    <div id="reader"></div> 
                </main> 
            </div> 
            <div class="row mb-3 div-scan-again" id="div-scan-again" style="display: none;"> 
                <div class="col-12" style="text-align: center;">
                    <div>
                        <button type="button" class="btn btn-success   waves-effect waves-light">SCAN AGAIN</button>
                    </div> 
                </div>
            </div>
        </form>         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script> 
    $('#tablePutWMS').DataTable();
    $('#tableScan').DataTable();
 
</script>
<script type="text/javascript">
    const scanner = new Html5QrcodeScanner('reader', {  
        qrbox: {
            width: 250,
            height: 250,
        },   
        fps: 20,  
    });
 
   
    async function successPalno(result) {

        $("#nameInputPal").val(result)

        await fetchPalNo(result); 
    }

    async function successBin(result) {

        $("#nameInputBin").val(result)

        if($("#autoBox").prop("checked", true)){ 
            await fetchBin(result); 
        }

    }

    async function fetchPalNo(result)
    {
        const NOPO      = document.querySelector('.buttonPut').dataset.po;
         
         let bodyData    = {
             "nopo": NOPO,
             "result" : result
         } 
         let checking  = await searchNopal(bodyData)
 
         await processResultNopal(checking)
           
         document.getElementById('div-scan-again').style.display='block' 
    }

    async function fetchBin(result)
    {
        const NOPO      = document.querySelector('.buttonPut').dataset.po;
        const NOPAL     = document.getElementById('nameInputPal').value;
         
         let bodyData    = {
             "nopo": NOPO,
             "nopal": NOPAL,
             "result" : result
         } 
         let checking  = await searchBin(bodyData)

         console.log(bodyData)
 
         await processResultBin(checking)
           
        //  document.getElementById('div-scan-again').style.display='block' 
    }
  

    function errorr(err) {
        // console.error(err);
        // Prints any errors to the console
    }

    async function onScan (){
        scanner.render(success, error);
    } 

    async function palNO()
    { 
        scanner.render(successPalno, errorr);  
    }

    async function scanBin()
    {  
        scanner.render(successBin, errorr);  
    }

    $(document).on('click', '.buttonPut', function(){
        $('#ScanModal').modal('show');
        // onScan()
    });

    $(document).on('click', '#div-scan-again', function(){ 
        $(this).hide()
        onScan()
    });
   

    async function searchNopal(form){
        try {
            const response = await fetch("<?= base_url('findScanNoPal') ?>", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(form),
            });

            const result = await response.json();
            return result
        } catch (error) {
            console.error("Error:", error);
        } 

    }
   
    async function searchBin(form){
        try {
            const response = await fetch("<?= base_url('findScanBin') ?>", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(form),
            });

            const result = await response.json();
            return result
        } catch (error) {
            console.error("Error:", error);
        } 

    }


    async function processResultNopal(data) {
        if(data.success === true)
        { 
            $("#nameInputPal").val(data.data.PaletNo)

            if(data.data.auto === "0")
            { 
                $("#autoBox").prop('checked', false)
                $(".checkBin").show() 
                $(".xcloseBin").hide()
            } 
            $(".checkPal").show()
            $(".xclosePal").hide()

            if(data.data.auto === "1")
            {
                $("#autoBox").prop('checked', true)
                $("#nameInputBin").click();
                $("#nameInputBin").focus();
                $(".checkBin").hide() 
                $(".xcloseBin").hide()
            }
        }

        if(data.success === false)
        { 
            $("#nameInputPal").val(data.Nopal) 
            $(".checkPal").hide()
            $(".xclosePal").show() 
        }
    }

    async function processResultBin(data) {
        // if(data.success === true)
        // { 
        //     $("#nameInputPal").val(data.data.PaletNo)

        //     if(data.data.auto === "0")
        //     { 
        //         $("#autoBox").prop('checked', false)
        //         $(".checkBin").show() 
        //         $(".xcloseBin").hide()
        //     } 
        //     $(".checkPal").show()
        //     $(".xclosePal").hide()

        //     if(data.data.auto === "1")
        //     {
        //         $("#autoBox").prop('checked', true)
        //         $("#nameInputBin").click();
        //         $("#nameInputBin").focus();
        //         $(".checkBin").hide() 
        //         $(".xcloseBin").hide()
        //     }
        // }

        if(data.success === false)
        { 
            $("#nameInputBin").val(data.bin) 
            $(".checkBin").hide()
            $(".xcloseBin").show() 
        }
    }


</script>

<?php $this->view('template/footer') ?>