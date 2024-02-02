<script type="text/javascript">

    $(document).on('click', '.buttonPut', function(){
        $('#ScanModal').modal('show');
        // onScan()
    });

    // $(document).on('click', '#div-scan-again', function(){ 
    //     $(this).hide()
    //     onScan()
    // });

    //load scanner dari library npm js
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
         
        let bodyData    = { "nopo": NOPO,  "result" : result } 
        let checking  = await searchNopal(bodyData)
 
        await processResultNopal(checking) 
    }

    async function fetchBin(result)
    {
        const NOPO      = document.querySelector('.buttonPut').dataset.po;
        const NOPAL     = document.getElementById('nameInputPal').value;
         
         let bodyData    = { "nopo": NOPO, "nopal": NOPAL, "result" : result } 
         let checking  = await searchBin(bodyData)
 
         await processResultBin(checking) 
    }
  
    //error saat scann, di matikan saja karna handling nya selalu terpanggil
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
 
    function cekStatusModal() {
        if($("#ScanModal").css("display") === "block") { 
            scanner.clear();
        } else {
            // reset form
            $("#formScan").trigger("reset");  

            //disabled button save
            $(".buttonSave").prop("disabled", true)
            
            //hide check and close icon
            $(".checkPal").hide() 
            $(".xclosePal").hide()
            $(".checkBin").hide()
            $(".xcloseBin").hide()   
        }
    } 

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
                $(".buttonSave").prop("disabled", false)
                ("#nameInputBin").val("") 
            } 
           
            if(data.data.auto === "1")
            {
                $("#autoBox").prop('checked', true)
                // $(".bScanBin").click();
                // $("#nameInputBin").focus();
                $(".checkBin").hide() 
                $(".xcloseBin").hide()
            }

        // Clears scanning instance

            // document.getElementById('reader').remove();

            $(".checkPal").show()
            $(".xclosePal").hide()
        }

        if(data.success === false)
        { 
            $("#nameInputPal").val(data.Nopal) 
            $(".checkPal").hide()
            $(".xclosePal").show() 
        }

        if($(".checkBin").is(":visible") &&  $(".checkPal").is(":visible"))
        {
            $(".buttonSave").prop("disabled", false)
        }else{
            $(".buttonSave").prop("disabled", true)
        }

        
        await scanner.clear();
    }

    async function processResultBin(data) {
        if(data.success === true)
        { 
            $("#nameInputBin").val(data.data.Bin.trim()) 
            $(".checkBin").show()
            $(".xcloseBin").hide() 
        }

        if(data.success === false)
        { 
            $("#nameInputBin").val(data.bin) 
            $(".checkBin").hide()
            $(".xcloseBin").show() 
        }

        if($(".checkBin").is(":visible") &&  $(".checkPal").is(":visible"))
        {
             $(".buttonSave").prop("disabled", false)
        }else{
            $(".buttonSave").prop("disabled", true)
        }

        await scanner.clear();
    }
  
</script>