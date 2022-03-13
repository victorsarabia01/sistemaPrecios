<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../librerias/jquery-3.2.1.min.js"></script>
    <style>
        .centrarr{
            text-align: right;
            border-radius: 10px;/* borde CURVO*/
            font-size: 25px; /* Tamano de la letra */
   
        }
        .precioDolar{
            font-size: 18px; /* Tamano de la letra */
            text-align: center;
        }
    </style>
</head>
<body>
    
    <div class="centrarr">
        <label>Precio dolartoday</label>
    <input id="precioDolarA" class="precioDolar" readonly> </input>
    </div>
    
    
</body>
            
</html>
<script language="JavaScript" type="text/javascript">
            $(document).ready(function(){
                fetch ('http://s3.amazonaws.com/dolartoday/data.json')
                .then(res => res.json())
                .then(data => {
                    console.log(data.USD.transferencia)
                    document.getElementById('precioDolarA').value=data.USD.transferencia
                })
            });
              
            </script>
         