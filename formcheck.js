function checkLogin() {
    let errors =  []
    let faulty_elements = []
    let verzenden = true;
    let inputs = document.getElementsByTagName("input");
    let messages = document.getElementById('messages');
    messages.style.display = "none";
    for(let i = 0; i < inputs.length; i++) {
        let el = inputs[i]
        el.style.backgroundColor = "white"
        if(el.id == "pet_no") {
            // leeg of nummer
            if(el.value == "" || !isNaN(el.id.value)) {
                errors.push("pet_no: Niet leeg of geen nummer")
                faulty_elements.push(el)
            }
        } else if(el.id == "pet_name" || el.id == "species" || el.id == "owner") {
            if(el.value.length < 3) {
                errors.push("Naam, soort of eigenaar: Minimaal 3 letters.")
                faulty_elements.push(el)                       
            }
        } else if(el.id == "gender") {
            if(el.value != "male" && el.value != "female") {
                errors.push("Geslacht: Moet male of female zijn")
                faulty_elements.push(el)                       
            }
        } else if(el.id == "birthdate") {
            console.log(Date.parse(el.value))
            if(isNaN(Date.parse(el.value))) {
                errors.push("Geboortedatum: Moet een valide datum zijn bijv. (17-12-1964)")
                faulty_elements.push(el)                       
            }
        }

        if (errors.length > 0) {
            verzenden = false;
        }
    }

    const uniqueErrors = errors.filter((value, index, self) => {
        return self.indexOf(value) === index;
    });

    console.log(faulty_elements)
    errorTekst = "";
    for(let i = 0; i < uniqueErrors.length; i++) {
        errorTekst += uniqueErrors[i] + "<br>"
    }
    if(errorTekst.length > 0) {
        errors = document.getElementById("errors")
        errors.style.display = "block"
        errors.innerHTML = errorTekst
    }
    if(verzenden != true) {
        for(let i = 0; i < faulty_elements.length; i++) {
            faulty_elements[i].style.backgroundColor = "orange"
        }
        for(let i = 0; i < inputs.length; i++) {
            if(!faulty_elements.includes(inputs[i])) {
                inputs[i].style.backgroundColor = "lightgreen"
            }
        }
    }

    if(verzenden == true) {
        document.getElementById("petform").submit()
    }
}