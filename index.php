<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
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
      <title>Auction Zone Login</title>
  </head>
<body> 
  <nav class="h3 p-3 mx-4 text-danger"><b>AUCTION <span style="color: gray;">ZONE</span></b></nav>
<div class="nav1">
    <ul class="nav nav-pills mb-3" id="ex1" role="tablist">
        <li class="nav-item bg " role="presentation">
          <a
            class="nav-link bg-danger text-white active"
            id="ex1-tab-1"
            data-mdb-toggle="pill"
            href="#ex1-pills-1"
            role="tab"
            aria-controls="ex1-pills-1"
            aria-selected="true"
            >Login</a
          >
        </li>
        <li class="nav-item " role="presentation">
          <a
            class="nav-link "
            id="ex1-tab-2"
            data-mdb-toggle="pill"
            href="#ex1-pills-2"
            role="tab"
            aria-controls="ex1-pills-2"
            aria-selected="false"
            >Register</a
          >
        </li>
      </ul>
</div>
  <div class="tab-content" id="ex1-content">
    <div
      class="tab-pane fade show active"
      id="ex1-pills-1"
      role="tabpanel"
      aria-labelledby="ex1-tab-1"
    >
    <div class="wrap">
        <div><img src="assets/2.png" class="img-login" alt=""><br>
        <span class="text-dark"><center>Convert your Store to an Online Auction Site. Add unlimited auctions <br> and attract more visitors.</center></span>
      </div>
    <div class="cont">
        <form action="login.php" method="post"> <br>
            <h2>LOGIN</h2>
            <p>Enter credentials to login to your account</p> <br>
            <div class="form-outline">
                <input type="text" required id="form12 validationCustomUsername" name="username1" style="width: 400px;" class="form-control" />
                <label class="form-label" for="form12">Username</label>
              </div> <br>
              <div class="form-outline">
                <input type="password" name="password1" required id="form12" class="form-control" />
                <label class="form-label" for="form12">Password</label>
              </div><br>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault">Remember Login</label>
              </div> <br>
              <button type="submit" name="submit2" class="btn btn-danger">LOGIN</button><br>
        </form>
    </div>

    </div>
    </div>
    <div class="tab-pane fade" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
        <div class="wrap">
            
        <div class="cont">
            <form action="signup.php" method="post"> <br>
                <h2>Register</h2>
                <p>Enter informations to register your account</p> <br>
                <div class="form-outline">
                    <input type="text" required id="form12" name="name" style="width: 400px;" class="form-control" />
                    <label class="form-label" for="form12">Fullname</label>
                  </div> <br>
                  <div class="form-outline">
                    <input type="email" required id="form12" name="email" style="width: 400px;" class="form-control" />
                    <label class="form-label" for="form12">Email</label>
                  </div> <br>
                  <div class="form-outline">
                    <input type="password" id="form12" class="form-control" />
                    <label class="form-label" for="form12">Create password</label>
                  </div><br>
                  <div class="form-outline">
                    <input type="password" id="form12" name="password" class="form-control" />
                    <label class="form-label" for="form12">Re-enter password</label>
                  </div><br>
                  <button type="submit" name="submit1" class="btn btn-danger">SIGN UP</button><br>
            </form>
        </div>
        <div><img src="assets/3.png" class="img-login" alt="">
        <br>
        <span class="text-dark"><center>Convert your Store to an Online Auction Site. Add unlimited auctions <br> and attract more visitors.</center></span>
      
      </div>
    
        </div>
    </div>
  </div>
    <br>
    <br><br>
    <br><br><br><br>
    
    
    <?php include "footer.php"; ?>
    <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
</body>
</html>