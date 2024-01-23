<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form>
        Login: <input type="text" name="login" id="login"><br>
        Password: <input type="password" name="password" id="password"><br>
        <input type="button" value="Ga maar versturen" id="knop" onclick=checkValue()>
   </form>
   <script>
        function checkValue() {
            let aantal = 0
            let inputs = document.getElementsByTagName('input');
            for (let index = 0; index < inputs.length; ++index) {
                if(inputs[index].id == "login") {
                    aantal = 3
                } else if(inputs[index].id == "password") {
                    aantal = 6
                }
    
                if(inputs[index].id == "knop") {
                    inputs[index].style.backgroundColor = "white"
                } else {
                    if(inputs[index].value.length < aantal) {
                        inputs[index].style.backgroundColor = "orange"
                    } else if(inputs[index].value.length >= aantal) {
                        inputs[index].style.backgroundColor = "lightgreen"
                    }
                }
            }

        }
   </script> 
</body>
</html>