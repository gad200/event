<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="//unpkg.com/jquery@3.4.1/dist/jquery.min.js"></script>
  <script src="//unpkg.com/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
  <script src="//unpkg.com/bootstrap-select@1.12.4/dist/js/bootstrap-select.min.js"></script>
  <script src="//unpkg.com/bootstrap-select-country@4.0.0/dist/js/bootstrap-select-country.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>


    <title>Document</title>
    <style>
        #logo{
            margin-left:100px;
            margin-bottom:30px;
        }
        .dropdown-toggle{
            display:none;
        }
        @media only screen and (max-width: 1000px) {
         #logo {
            margin-left:20px;
            margin-bottom:30px;
           }
        }
        @media only screen and (max-width: 480px) {
         #logo {
            margin-left:10px;
           }
        }
        @media only screen and (max-width: 450px) {
         #logo {
            margin-left:0;
           }
        }
    </style>
</head>
<body>
  <div class="container w-100 text-center">
  <br>
  <br>

  <p class="h5 fw-bold ">You Registered Successfully</p>
  <p class="h5 fw-bold ">Please Take ScreenShot</p>
  <p class="h5 fw-bold ">Your Entry Code: <span id="code"></span></p>
                <br>
                <br>

                <canvas id="qrcode">

                </canvas>
                <br>
                <br>
                <button onclick="newRegister();" style="color:white;" class="btn btn-info">New Registeration</button>
    </div>
    </body>
<script>
      window.onload = function(){
         var register = localStorage.getItem("register");
          if(register == 0){
              window.location.replace("register.php");
           }
        document.getElementById("code").innerHTML = localStorage.getItem("code");
        let qrcodeContainer = document.getElementById("qrcode");
        qrcodeContainer.innerHTML = "";
        new QRious({
          element: qrcodeContainer,
          value: localStorage.getItem("code"),
          size: 300,
        });
    }
    window.onload();
    
    function newRegister(){
        window.location.replace("register.php");
        localStorage.setItem("register" , 0);
    }
  </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</body>
</html>
