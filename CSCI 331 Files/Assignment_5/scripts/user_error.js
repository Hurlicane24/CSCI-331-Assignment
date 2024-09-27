//The form
const form = document.querySelector("form");

//The buttons within the div called "getOrPost"
const radioButtonsGP = document.querySelectorAll('input[name="send_method"]');

//The span element that relays which method is selected
const method = document.getElementById("method");
let selected_value;

//The div with the get and post radio buttons
const getOrPost = document.getElementById("getOrPost");

//Check which button is checked and update span element and method attribute of form
getOrPost.addEventListener("click", ()=> {
    radioButtonsGP.forEach(radioButton => {
        if(radioButton.checked) {
            method.innerHTML = radioButton.value;
            form.setAttribute("method", radioButton.value);
        }
    })
})

//Radio buttons that exist in both boxes
const plusButton1 = document.getElementById("rb1");
const plusButton2 = document.getElementById("rb3");
const multButton1 = document.getElementById("rb2");
const multButton2 = document.getElementById("rb4");

//div boxes containing the radio buttons
const set1box = document.getElementById("radioSet1");
const set2box = document.getElementById("radioSet2");

//Don't allow same operation to be chosen twice
set1box.addEventListener("click", ()=> {
    if(plusButton1.checked && plusButton2.checked) {
        plusButton2.checked = false;
        alert("You already selected the + operation, please reselect operation 2");
        if(cyclic2Button.selected == true) {
            alert('The property "cyclic" cannot be selected without the group axioms being satisfied');
            cyclic2Button.selected = false;
        }
        if(Assoc2.checked == true || ID2.checked == true || Inv2.checked == true || closed2.checked == true) {
            checkBoxSet2.forEach(checkBox => {
                checkBox.checked = false;
            })
        }
    }
    else if(multButton1.checked && multButton2.checked) {
        multButton2.checked = false;
        alert("You already selected the x operation, please reselect operation 2");
        if(cyclic2Button.selected == true) {
            alert('The property "cyclic" cannot be selected without the group axioms being satisfied');
            cyclic2Button.selected = false;
        }
        if(Assoc2.checked == true || ID2.checked == true || Inv2.checked == true || closed2.checked == true) {
            checkBoxSet2.forEach(checkBox => {
                checkBox.checked = false;
            })
        }
    }
    else if(multButton1.checked) {
        alert('Since you selected the "x" operation, you should select the properties of "x" on the set - {0}');
    }
})

set2box.addEventListener("click", ()=> {
    if(plusButton1.checked && plusButton2.checked) {
        plusButton1.checked = false;
        alert("You already selected the + operation, please reselect operation 1");
        if(cyclic1Button.selected == true) {
            alert('The property "cyclic cannot be selected without the group axioms being satisfied');
            cyclic1Button.selected = false;
        }
        if(Assoc1.checked == true || ID1.checked == true || Inv1.checked == true || closed1.checked == true) {
            checkBoxSet1.forEach(checkBox => {
                checkBox.checked = false;
            })
        }
    }
    else if(multButton1.checked && multButton2.checked) {
        multButton1.checked = false;
        alert("You already selected the x operation, please reselect operation 1");
        if(cyclic1Button.selected == true) {
            alert('The property "cyclic" cannot be selected without the group axioms being satisfied');
            cyclic1Button.selected = false;
        }
        if(Assoc1.checked == true || ID1.checked == true || Inv1.checked == true || closed1.checked == true) {
            checkBoxSet1.forEach(checkBox => {
                checkBox.checked = false;
            })
        }
    }
    else if(multButton2.checked) {
        alert('Since you selected the "x" operation, you should select the properties of "x" on the set - {0}');
    }
})

//Checkboxes in first operation box
const checkBoxDiv1 = document.getElementById("checkSet1");

//Checkboxes in second operation box
const checkBoxDiv2 = document.getElementById("checkSet2");

//Allows forEach iteration
const checkBoxSet1 = checkBoxDiv1.querySelectorAll('input[type="checkbox"]');

//Allows forEach iteration
const checkBoxSet2 = checkBoxDiv2.querySelectorAll('input[type="checkbox"]');

//The none button
const noneButton = document.getElementById("rb5");

//Additional properties box of operation 1 box
const addProps1Div = document.getElementById("multiSelect1");

//Get select element
const addProps1Select = addProps1Div.querySelector("select");

//Get options
const addProps1Options = addProps1Select.options;

//Additional properties box of operation 2 box
const addProps2Div = document.getElementById("multiSelect2");

//Get select element
const addProps2Select = addProps2Div.querySelector("select");

//Get options
const addProps2Options = addProps2Select.options;

//Cyclic button 1
const cyclic1Button = addProps1Options[1];

//Cyclic button 2
const cyclic2Button = addProps2Options[1];

//Associative button 1
const Assoc1 = document.getElementById("cb1");

//Identity exists button 1
const ID1 = document.getElementById("cb2")

//Inverses exist button 1
const Inv1 = document.getElementById("cb3");

//Closed button 1
const closed1 = document.getElementById("cb4");

//Associative button 2
const Assoc2 = document.getElementById("cb5");

//Identity exists button 2
const ID2 = document.getElementById("cb6");

//Inverses exist button 2
const Inv2 = document.getElementById("cb7");

//Closed button 2
const closed2 = document.getElementById("cb8");

//Don't allows users to select impossible combinations of properties
checkBoxDiv1.addEventListener("click", (event)=> {
    if(plusButton1.checked == false && multButton1.checked == false) {
        alert("Set cannot have properties if no operation is selected");
        event.preventDefault();
    }
    if(Inv1.checked && ID1.checked == false) {
        alert("If inverses exist, and identity element must exist");
        ID1.checked = true;
    }
    if((Assoc1.checked == false || ID1.checked == false || Inv1.checked == false || closed1.checked == false) && cyclic1Button.selected == true) {
        alert('The property "cyclic" cannot be selected without the group axioms being satisfied');
        cyclic1Button.selected = false;
    }
})

//Don't allow user to select properties if the none button has been chosen. Don't allows users to select impossible
//combinations of properties
checkBoxDiv2.addEventListener("click", (event)=> {
    if(plusButton2.checked == false && multButton2.checked == false && noneButton.checked == false) {
        alert("Set cannot have properties if no operation is selected");
        event.preventDefault();
    }
    if(noneButton.checked) {
        alert("You selected none, so no properties can be selected");
        checkBoxSet2.forEach(checkBox => {
            checkBox.checked = false;
        })
    }
    else if(Inv2.checked && ID2.checked == false) {
        alert("If inverses exist, an identity element must exist");
        ID2.checked = true;
    }
    if((Assoc2.checked == false || ID2.checked == false || Inv2.checked == false || closed2.checked == false) && cyclic2Button.selected == true) {
        alert('The property "cyclic" cannot be selected without the group axioms being satisfied');
        cyclic2Button.selected = false;
    }
})

//Don't let user select additional properties if None is selected
addProps2Div.addEventListener("mousedown", (event)=> {
    if(noneButton.checked) {
        event.preventDefault();
        alert("You selected none, so no properties can be selected");        
    }
}) 

cyclic2Button.addEventListener("mousedown", (event)=> {
    if(Assoc2.checked == false || ID2.checked == false || Inv2.checked == false || closed2.checked == false || (plusButton2.checked == false && multButton2.checked == false)) {
        event.preventDefault();
        alert('The property "cyclic" cannot be selected without the group axioms being satisfied');
    }
})

cyclic1Button.addEventListener("mousedown", (event)=> {
    if(Assoc1.checked == false || ID1.checked == false || Inv1.checked == false || closed1.checked == false || (plusButton1.checked == false && multButton1.checked == false)) {
        event.preventDefault();
        alert('The property "cyclic" cannot be selected without the group axioms being satisfied');
    }
})

//Uncheck all properties if None is selected
noneButton.addEventListener("click", ()=> {
    alert("You selected none, so no properties can be selected");
    checkBoxSet2.forEach(checkBox => {
        checkBox.checked = false;
    })

    for(let i = 0; i < addProps2Options.length; i++) {
        addProps2Options[i].selected = false;
    }
})