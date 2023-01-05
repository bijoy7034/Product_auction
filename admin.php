<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css"
  rel="stylesheet"
/>
<link rel="stylesheet" href="index.css">
    <title>Admin</title>
</head>
<body>
<center><nav class="h3 p-3 mx-4 text-danger" style="letter-spacing: 2px;"><b>AUCTION <span style="color: gray;">ZONE</span></b></nav></center>
<div class="tab-pane fade show active"
      id="ex1-pills-1"
      role="tabpanel"
      aria-labelledby="ex1-tab-1"
    >
    <div class="wrap">
        <div><img src="assets/admin.png" class="img-login" alt=""><br>
        <span class="text-dark"><center>Convert your Store to an Online Auction Site. Add unlimited auctions <br> and attract more visitors.</center></span>
      </div>
    <div class="cont">
        <form action="" method="post"> <br>
            <h2>ADMIN</h2>
            <p>Enter credentials to login to your account</p><br> 
            <div class="form-outline">
                <input type="email" required id="validationCustomUsername" name="username1" style="width: 400px;" class="form-control" />
                <label class="form-label" for="form12">Username</label>
              </div> <br>
              <div class="form-outline">
                <input type="password" name="password1" required id="form123" class="form-control" />
                <label class="form-label" for="form12">Password</label>
              </div><br>
              <button type="button" onclick="admin_login()" id="btn_admin" class="btn btn-danger btn-block my-2 mb-4">LOGIN</button>
             
              
        </form>
    </div>

    </div>
    </div>
      <br><br><br>
    <?php include "footer.php"; ?>

    <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
<script src="js/admin.js"></script>
</body>
</html>