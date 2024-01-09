let email = document.getElementById("email");
let password = document.getElementById("password");
let fullname = document.getElementById("name");
let emailRegex =/^[a-zA-Z0-9.!#$%&'+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)$/;
console.log(email);
fullname.addEventListener("keyup", function () {

    if (fullname.value === "") {
      fullname.nextElementSibling.style.display = "block";
    } else {
      fullname.nextElementSibling.style.display = "none";
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