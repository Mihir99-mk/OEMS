function registerCheck() {
  let fname = document.getElementById("firstnames").value;
  let lname = document.getElementById("lastnames").value;
  let email = document.getElementById("emails").value;
  let password = document.getElementById("passwords").value;

  if (fname.length == 0) {
    document.getElementById("invalid_first").innerHTML = "Enter your first name";
    return false;
  }else if (fname.length <= 2 || fname.length >= 12) {
    document.getElementById("invalid_first").innerHTML = "First name length must between 2 to 12";
    return false;
  }else if (lname.length == 0) {
    document.getElementById("invalid_last").innerHTML = "Enter your last name";
    return false;
  }else if (lname.length <= 2 || lname.length >= 12) {
    document.getElementById("invalid_last").innerHTML = "Last name length must between 2 to 12";
    return false;
  }else if (email == "") {
    document.getElementById("invalid_email").innerHTML = "Enter your email";
    return false;
  } else if (email.indexOf("@gmail.com") < 0) {
    document.getElementById("invalid_email").innerHTML = "Email must contain @";
    return false;
  } else if (password.length == "") {
    document.getElementById("invalid_password").innerHTML =
      "Enter your password";
    return false;
  } else if (password.indexOf("@") <= "") {
    document.getElementById("invalid_password").innerHTML =
      "Password must contain @";
    return false;
  }

  return true;
}
