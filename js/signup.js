const form = document.querySelector("form");
const errorTxt = document.querySelector(".error-txt");
const submitBtn = document.querySelector(".submit input");
const passwordInput = document.querySelector("input[type='password']");
const showPasswordIcon = document.querySelector(".input-box i");

showPasswordIcon.addEventListener("click", () => {
  passwordInput.type = passwordInput.type === "password" ? "text" : "password";
  showPasswordIcon.className = `bi bi-eye${passwordInput.type === "password" ? "-slash" : ""}-fill`;
});
