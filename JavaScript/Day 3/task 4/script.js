let childWindow;
let typingInterval;

function openChildWindowWithMessage() {
  const message = "Youssef Magdy Mohamed";
  childWindow = window.open(
    "",
    "ChildWindow",
    "width=400,height=200,top=100,left=100,resizable=no"
  );
  childWindow.document.write(
    "<!DOCTYPE html><html><head><title>Typing Message</title></head><body><h1 id='message'></h1></body></html>"
  );

  let index = 0;
  typingInterval = setInterval(() => {
    if (index < message.length) {
      childWindow.document.getElementById("message").innerHTML +=
        message.charAt(index);
      index++;
    } else {
      clearInterval(typingInterval);
      setTimeout(() => {
        childWindow.close();
      }, 3000); // Close the window 3 seconds after the message is fully displayed
    }
  }, 100); // Adjust the typing speed by changing the interval duration
}
