var condition = true;
var btn = document.querySelector("button");
document.querySelector("button").onclick = function () {
  if (condition) {
    btn.innerText = "Dark mode";
    btn.backgroundColor = "#000";
    document.body.style.backgroundColor = "#fff";
  } else {
    btn.innerText = "Light mode";
    btn.backgroundColor = "#fff";
    document.body.style.backgroundColor = "#000";
  }
  condition = !condition;
};
