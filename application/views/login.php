 
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<!-- Mirrored from themesbrand.com/velzon/html/default/auth-signin-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Oct 2023 03:37:00 GMT -->
<head>

    <meta charset="utf-8" />
    <title>Sign In | Vendish</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/pandurasa_kharisma_pt.png">

    <!-- Layout config Js -->
    <script src="<?= base_url(); ?>assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url(); ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?= base_url(); ?>assets/css/custom.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="<?= base_url() ?>" class="d-inline-block auth-logo">
                                    <img src="<?= base_url() ?>assets/images/pandurasa-logo.jpg" alt="" height="20">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium"></p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue to WMS Mobile</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="" id="formLogin"> 
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" autofocus >
                                        </div>

                                        <div class="mb-3"> 
                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5 password-input" placeholder="Enter password" id="password" name="password">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                        </div>
   
                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="button" id="login">Sign In</button>
                                        </div>

                                       
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
 

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>document.write(new Date().getFullYear())</script> Pandurasa Kharisma 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/node-waves/waves.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/feather-icons/feather.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins.js"></script>

    <!-- particles js -->
    <script src="<?= base_url(); ?>assets/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="<?= base_url(); ?>assets/js/pages/particles.app.js"></script>
    <!-- password-addon init -->
    <script src="<?= base_url(); ?>assets/js/pages/password-addon.init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     
</body>
<script>
     const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });


    const bSubmit = document.querySelector('.login');
    const Blogin = document.getElementById('login');

    Blogin.addEventListener('click', async function () { 
        let formLogin       = await getForm();  
         
        const validasi      = await validasiform(formLogin);
        
        if(validasi){
            return
        }

        const prosesLogin   = await fetchLogin(formLogin) 

        await prosesResult(prosesLogin)
    })

    document.addEventListener("DOMContentLoaded", function() {  
        var formLogin = document.getElementById("formLogin");

        formLogin.addEventListener("keypress", function(event) {
        // Cek apakah tombol yang ditekan adalah tombol Enter
            if (event.key === "Enter") { 
                signIn();
            }
        });
    });

    async function signIn()
    {
        let formLogin       = await getForm();   
        const validasi      = await validasiform(formLogin); 
        if(validasi){
             return
        } 
        const prosesLogin   = await fetchLogin(formLogin)  
        await prosesResult(prosesLogin)
    } 


    async function getForm()
    {
        const username  = document.getElementById('username').value;
        const password  = document.getElementById('password').value;

        return {
        'username': username,
        'password': password
        }; 
    } 

    async function validasiform(data) 
    {
        const messageerror = [];   
        data.username ? true :  messageerror.push('username must required');  
        if(data.password){
            data.password.length >= 3 ? true : messageerror.push('Password minimum 3 character');
        }else{
            messageerror.push('Password  must required');
        }     
        
        const doneshow = await warningalert(messageerror);
        
        return doneshow
    }

    async function warningalert(message){  
        // untuk pengkondisian
        let text = message.join('<br>');
        
        if(!text){
            return false;
        }
       
        Toast.fire({
        icon: "warning",
        html: text
        })

        return true; 
    }

    async function fetchLogin(data)
    {
        try {
            const response = await fetch("<?= base_url('login') ?>", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({
                    'form': data
                })
            });

            const result = await response.json();
            return result;
        } catch (error) {
            console.error('Error:', error);
        }      
    }

    async function prosesResult(data)
    {
        if(data.success === true)
        {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: data.message,
                showConfirmButton: false,
                timer: 1500
              }).then(function() {
                    window.location.href = "<?= base_url('dashboard') ?>"
              })
        }

        if(data.success === false)
        {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: data.message,
                showConfirmButton: false,
                timer: 1500
              })
        }
    }

</script>
</html>