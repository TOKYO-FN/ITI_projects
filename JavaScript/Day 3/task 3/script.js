let childWindow;
let moveInterval;

function openChildWindow() {
  childWindow = window.open(
    "",
    "ChildWindow",
    "width=200,height=100,top=0,left=0,resizable=no"
  );
  childWindow.document.write(
    "<!DOCTYPE html><html><head><title>Child Window</title></head><body><h1>Child Window</h1></body></html>"
  );
  moveChildWindow();
}

function moveChildWindow() {
  let x = 0;
  let y = 0;
  let dx = 1;
  let dy = 1;

  moveInterval = setInterval(() => {
    if (!childWindow || childWindow.closed) {
      clearInterval(moveInterval);
      return;
    }

    // Get screen dimensions
    const screenWidth = window.screen.availWidth;
    const screenHeight = window.screen.availHeight;

    // Move the child window
    x += dx;
    y += dy;

    // Reverse direction if hitting the screen boundaries
    if (x <= 0 || x >= screenWidth - 200) dx = -dx; // 200 is the width of the child window
    if (y <= 0 || y >= screenHeight - 100) dy = -dy; // 100 is the height of the child window

    childWindow.moveTo(x, y);
  }, 10);
}

function stopChildWindowMovement() {
  clearInterval(moveInterval);
}
