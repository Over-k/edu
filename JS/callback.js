const readline = require("readline");
let messageFunc = function (type, message) {
  if (type == "error") {
    console.error("[x]", message);
  } else if (type == "success") {
    console.log("[v]", message);
  }
};

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout,
});

rl.question("Enter error or success: ", (answer) => {
  messageFunc(answer, "message");
  rl.close();
});
