<!DOCTYPE html>
<html>
<head>
    <title>SISTEM INFORMASI BERKAH LAUNDRY</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"><script>
</head>
<body style="background: #f0f0f0">
    <br/>
    <br/>
    <center>
        <h2>SISTEM INFORMASI BERKAH LAUNDRY</h2>
    </center>
    <br/>
    <br/>

    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <?php 
            session_start();
            if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "gagal"){
                    echo "<div class='alert alert-danger'>Login gagal! username dan password salah!</div>";
                }else if($_GET['pesan'] == "logout"){
                    echo "<div class='alert alert-info'>Anda telah berhasil logout</div>";
                }else if($_GET['pesan'] == "belum_login"){
                    echo "<div class='alert alert-danger'>Anda harus login untuk mengakses halaman admin</div>";
                }
            }
            ?>          
            
            <form action="login.php" method="post">
                <div class="panel">
                    <br/>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>  


                        <input type="submit" class="btn btn-primary" value="Log In">                
                    </div>
                    <br/>
                </div>
            </form>


        </div>
    </div>
</body>
</html>
