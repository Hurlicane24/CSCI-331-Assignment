function isStrongPassword(password) {
    if(password.length < 8) {
        console.log("No good. password must be at least 8 characters long.");
        return(false);
    }
    else if(password.indexOf("password") != -1) {
        console.log("No good. Password cannot contain the word 'password'.");
        return(false);
    }
    else if(password.indexOf("1234") != -1) {
        console.log("No good. Password cannot contain '1234'.");
        return(false);
    }
    else if(1) {
        let contains_char = false;
        for(let i = 0; i < password.length; i++) {
            if(password.charCodeAt(i) >= 48 && password.charCodeAt(i) <= 57) {
                contains_char = true;
            }
        }
        if(contains_char == false) {
            console.log("No good. Password must contain at least one number.");
            return(false);
        }
    }
    console.log("Good Password!");
    return(true);
}

console.log(isStrongPassword("qwerty1")); //false
console.log(isStrongPassword("qwertypassword1")); //false
console.log(isStrongPassword("qwertyABC")); //false
console.log(isStrongPassword("qwerty1234")); //false
console.log(isStrongPassword("qwerty123")); //true