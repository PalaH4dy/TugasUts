<!DOCTYPE html>
<html>

<!-- Mirrored from thememakker.com/templates/swift/hospital/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Oct 2023 03:59:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>:: Swift - Hospital Admin ::</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../../fonts.googleapis.com/icone91f.css?family=Material+Icons" type="text/css">

    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/css/main.css" />

</head>

<body class="theme-cyan authentication">
    <div class="container">
        <div class="card-top"></div>
        <div class="card">
            <h1 class="title"><span>Swift Hospital</span>Login <span class="msg">Sign in to start your
                    session</span></h1>
            <div class="body">
                <form action="{{ route('auth') }}" method="POST">
                    @csrf
                    <div class="input-group icon before_span">
                        <span class="input-group-addon"> <i class="zmdi zmdi-account"></i> </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required
                                autofocus>
                        </div>
                    </div>
                    <div class="input-group icon before_span">
                        <span class="input-group-addon"> <i class="zmdi zmdi-lock"></i> </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary waves-effect">login</button>
                </form>
            </div>
        </div>
    </div>
    <div class="theme-bg"></div>

    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
</body>

<!-- Mirrored from thememakker.com/templates/swift/hospital/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Oct 2023 03:59:50 GMT -->

</html>
