const p1 = document.getElementById("password");
const p2 = document.getElementById("checkPassword");
const m1 = document.getElementById("incorrectPass");
const m2 = document.getElementById("lengthLower");

p1.addEventListener("keyup", () => {
  if(p1.value.length < 8) {
    m2.style.display = "block";
  } else {
    m2.style.display = "none";
  }
});

p2.addEventListener("keyup", () => {
  if (! (p1.value == p2.value)) {
    m1.style.display = "block";
  } else {
    m1.style.display = "none";
  }
});