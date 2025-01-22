let flag = true;
let count = 0;
function toggle() {
  switch (flag) {
    case true:
      console.log("[INFO] Value of flag is true");
      break;
    case false:
      console.log("[INFO] Value of flag is false");
      break;
    default:
      console.log("[ERROR] Value of flag is neither true nor false");
      break;
  }
  flag = !flag;
}

while (count < 10) {
  toggle();
  count++;
}
