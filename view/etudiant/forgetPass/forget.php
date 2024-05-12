<?php
include "C:/xampp/htdocs/web/gestionUser/controller/etudiantC.php";



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié</title>
    <link rel="stylesheet" type="text/css" href="forget.css">
    <style>
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background:url(Design\ sans\ titre.png);
            /*background-image: url(contact-bg.png);*/
            background-size: cover;
            background-position: center center; 
        }

        .forgot-password {
            position: relative;
            width: 400px;
            height: 300px;
            background-color: #fff;
            max-width: 450px;
            border-radius: 20px;
            padding: 40px;
            color: #03a4ed;
            box-shadow: 0 0 50px rgba(246, 50, 50, 0.969);
            overflow: hidden;
            justify-content: center; 
            align-items: center;
        }
        .form.forgot-password{
            padding: 40px;

        }
        .fa {
            width: 100%;
            max-width: 400px; /* Adjust the max-width as needed */
            padding: 20px;

        }
        
        .header {
            text-align: center;
            margin-top: 0.75rem;
            margin-bottom: 20px;
        }
        
        .forgot-password .title {
            font-size: 1.875rem;
            font-weight: 700;
            line-height: 1.25rem;
            color: #fe3f40;
            left: 20px;
        }
        
        .forgot-password .sub-title {
            margin-top: 0.4rem;
            font-size: 1rem;
            line-height: 1.5rem;
        }
        .sub-title{
            margin-left: 50px;

        }
        .reset-option {
            margin-top: 1rem;
            margin-bottom: 15px;
            
        }
        
        .reset-option label {
            cursor: pointer;
            overflow: hidden;
            border: 2px solid rgba(229, 231, 235, 1);
            border-radius: 0.375rem;
            background-color: #F7F7F7;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem .4rem;
            margin: 10px 0;
            transform: all .15s ease;
        }
        
        .reset-option label .reset-info {
            display: flex;
            flex-direction: column;
            margin-left: 100px;
            backdrop-filter: blur(20px);
        }
        
        .reset-title {
            font-size: 1.1rem;
            line-height: 1.75rem;
            font-weight: 600;
            color:#03a4ed;
        }
        
        .reset-sub-title {
            font-size: 0.875rem;
            line-height: 1.25rem;
        }
        
        .reset-option input:checked + label {
            border-color: #fe3f40;
        }
        
        .send-btn {
            text-decoration: none;
            width: 300px;
            margin-top: 20px;
            margin-right: -10px;
            margin-left: -10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 30px;
            background-color: #fe3f40;
            box-shadow: 0 0 10px #fe3f40;
            padding: 1rem 3rem;
            font-weight: 500;
            color: #fff;
            transform: all .15s ease;
            font-size: 1.5rem;

        }
        
        .send-btn:hover {
            background-color: #03a4ed;
            box-shadow: 0 0 10px #03a4ed;
        }
        .sub-title {
            margin-top: 10px;
            font-size: 14px;
            margin-left: 30px;

        }

    </style>
</head>
<body>

   <form id="myForm" name="myForm" action="sendmail.php" method="POST"  class="forgot-password">
       <div class="header">
          <span class="title">Mot de passe oublié</span>
        </div>
        <div class="fa">
            <label class="reset-title" >Tapez votre Email ici :</label>
            <br>
            <input type="email" name="email" class="reset-title" placeholder="Email" id="email" required>
            <div class="form-group">
               <button type="submit" class="send-btn">Envoyer Email</button>
            </div>
        </div>
    </form>
</body>
</html>