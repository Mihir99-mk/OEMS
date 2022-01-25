function loginCheck() {
  let email = document.getElementById("emails").value;
  let password = document.getElementById("passwords").value;

  if (email == "") {
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
