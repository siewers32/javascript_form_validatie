<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="myForm">
        Login: <input type="text" name="login" id="login"><br>
        Password: <input type="password" name="pass" id="pass"><br>
        <button type="button" name="knop" id="knop" onclick="checkLogin()">Versturen</button>
    </form>
    <script>
        function checkLogin() {
            let verzenden = true;
            let inputs = document.getElementsByTagName("input");
            for(let i = 0; i < inputs.length; i++) {
                if(inputs[i].value.length < 3) {
                    inputs[i].style.backgroundColor = "orange"
                    verzenden = false;
                } else {
                    inputs[i].style.backgroundColor = "lightgreen"
                }
            }
            if(verzenden == true) {
                document.getElementById("myForm").submit()
            }
        }
    </script>
</body>
</html>