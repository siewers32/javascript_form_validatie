function checkLogin() {
    let errors =  []
    let faulty_elements = []
    let verzenden = true;
    let inputs = document.getElementsByTagName("input");
    for(let i = 0; i < inputs.length; i++) {
        let el = inputs[i]
        el.style.backgroundColor = "white"
        if(el.id == "pet_no") {
            // leeg of nummer
            if(el.value == "" || !isNaN(el.id.value)) {
                verzenden = false;
                errors.push("pet_no: Niet leeg of geen nummer")
                faulty_elements.push(el)
            }
        } else if(el.id == "pet_name" || el.id == "species" || el.id == "eigenaar") {
            if(el.value.length < 3) {
                verzenden = false;
                errors.push(el.id + ": Minimaal 3 letters")
                faulty_elements.push(el)                       
            }
        } else if(el.id == "gender") {
            if(el.value != "male" && el.value != "female") {
                verzenden = false;                       
                errors.push("gender: Moet male of female zijn")
                faulty_elements.push(el)                       
            }
        } else if(el.id == "birthdate") {
            console.log(Date.parse(el.value))
            if(isNaN(Date.parse(el.value))) {
                verzenden = false;                       
                errors.push("birthdate: Moet een valide datum zijn bijv. (17-12-1964)")
                faulty_elements.push(el)                       
            }
        }
    }
    console.log(errors)
    console.log(faulty_elements) 
    for(let i = 0; i < faulty_elements.length; i++) {
        faulty_elements[i].style.backgroundColor = "orange"
    }
    for(let i = 0; i < inputs.length; i++) {
        if(!faulty_elements.includes(inputs[i])) {
            inputs[i].style.backgroundColor = "lightgreen"
        }
    }
    if(verzenden == true) {
        document.getElementById("petform").submit()
    }
}