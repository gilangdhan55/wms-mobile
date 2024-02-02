<div class="modal fade zoomIn" id="ScanModal" style="display: none;" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ScanModalLabel">Scan QR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="cekStatusModal()"></button>
      </div>
      <div class="modal-body">
        <form action="" id="formScan">
            <div class="row mb-3 ">
                <div class="col-sm-3">
                    <label for="nameInputPal" class="form-label">PAL</label>
                </div>
                <div class="col-sm-9 d-flex justify-content-between align-items-center"> 
                    <div class="input-group">
                        <input type="text" class="form-control" id="nameInputPal"   onchange="fetchPalNo(this.value)">
                        <button type="button" class="btn btn-sm btn-primary" id="nameInputPal" onclick="palNO()"> <i class="mdi mdi-qrcode-scan"></i></button>
                    </div>
                    
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
                    <div class="input-group">
                        <input type="text" class="form-control" id="nameInputBin">
                        <button type="button" class="btn btn-sm btn-primary bScanBin" id="nameInputBin" onclick="scanBin()"> <i class="mdi mdi-qrcode-scan"></i></button>
                    </div>
                  
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="cekStatusModal()">Close</button>
        <button type="button" class="btn btn-primary buttonSave" onclick="saveTempt()" disabled>Save changes</button>
      </div>
    </div>
  </div>
</div>