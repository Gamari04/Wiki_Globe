let email = document.getElementById("email");
let password = document.getElementById("password");
let firstname = document.getElementById("firstname");
let lastname = document.getElementById("lastname");
let emailRegex =/^[a-zA-Z0-9.!#$%&'+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)$/;
console.log(email);
firstname.addEventListener("keyup", function () {

    if (firstname.value === "") {
      firstname.nextElementSibling.style.display = "block";
    } else {
      firstname.nextElementSibling.style.display = "none";
    }
  
  });
  lastname.addEventListener("keyup", function () {

    if (lastname.value === "") {
      lastname.nextElementSibling.style.display = "block";
    } else {
      lastname.nextElementSibling.style.display = "none";
    }
  
  });
  email.addEventListener("keyup", function () {

    if (email.value === "" || !email.value.match(emailRegex)) {
      email.nextElementSibling.style.display = "block";
    } else {
      email.nextElementSibling.style.display = "none";
    }
  });
  password.addEventListener("keyup", function () {

    if (password.value === "" || password.value.length <= 8 ) {
     password.nextElementSibling.style.display = "block";
    } else {
      password.nextElementSibling.style.display = "none";
    }
  });