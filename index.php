<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <input type="text" id="login" name="login" onkeyup="telLetters(this, 2)"><br>
        <input type="password" id="password" name="password" onkeyup="telLetters(this, 5)"><br>
        <input type="number" id="leeftijd" name="leeftijd" onkeyup="checkLeeftijd(this,3,12)">
        <input type="submit" name="knop">
    </form>
    <script>
        function telLetters(el, aantal) {
            if(el.value.length >= aantal) {
                el.style.backgroundColor = "lightgreen"
            } else {
                el.style.backgroundColor = "orange"
            }
        }
        function checkLeeftijd(el, min, max) {
            console.log("elementwaarde = " + el.value)
            console.log("min = " + min)
            console.log("max = " + max)
            if(parseInt(el.value) < min || parseInt(el.value) > max) {
                el.style.backgroundColor = "orange"
            } else {
                el.style.backgroundColor = "lightgreen"
            }
        }
    </script>
</body>
</html>