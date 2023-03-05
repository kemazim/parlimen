<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: Arial;   
    background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
}

/* Full-width input fields */
input[type=text], input[type=password], input[type=email] {
  width: 80%;
  padding: 12px 20px;
  margin: 15px 0;
  display: inline-block;
  border: 2px solid #ccc;
  box-sizing: border-box;
  align: center;
}

/* Set a style for all buttons */
a {
  background-color: #224BA0;
  font-size:15px;
  color: white;
  padding: 14px 15px;
  margin: 15px 20px;
  border: 0.5px solid #000000;
  cursor: pointer;
  width: 30%;
  text-decoration:none;
}

form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  margin: 0 auto 100px;
  padding: 50px;
  text-align: center;
}

.row {
    padding: 5px; 
}

.container {
  padding: 16px;
  padding-top: 50px;
  text-align: center;
}

.card {
  position: relative;
  z-index: 2;
  background: #FFFFFF;
  max-width: 40%;
  margin: 60px auto 100px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

@media screen and (max-width: 768px) {
  /* Adjust styles for screens smaller than 768px */
  input[type=text], input[type=password], input[type=email] {
    width: 100%;
  }
  a {
    width: 100%;
  }
  .card {
    max-width: 80%;
  }
}

@media screen and (max-width: 576px) {
  /* Adjust styles for screens smaller than 576px */
  .card {
    max-width: 100%;
  }
}
</style>
</head>

<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

 
            <div class="card">
              
            <div class="row mb-3">
                <h2> Selamat Datang ke Sistem e-Parlimen </h2>
                </div>
                <br>

                        <div class="text-center">
                  <img src="https://seeklogo.com/images/A/agensi-antidadah-kebangsaan-logo-F11C5219C0-seeklogo.com.png"
                    style="width: 185px;" alt="logo">
                </div>
                <br> <br><br>

                <div class="form-group mb-3">
                <a href="login" class="button">&nbsp &nbsp Log Masuk &nbsp &nbsp</a> 
                <a href="register" class="button"> Pengguna Baru</a>
                 </div>
                 <br>
                  <br>
                  <br>
                </div>
            </div>
        </div>
    </div>
</body>

