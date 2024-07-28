function main() {
  alert("Welcome to my site");
  let u_input = prompt("what is your name?");

  function temp_today(temp) {
    return document.write(temp >= 30 ? "HOT" : "Cold");
  }

  document.write(`welcome ${u_input}`);
  function createHeadings() {
    for (let i = 1; i <= 6; i++) {
      let heading = document.createElement(`h${i}`);
      heading.textContent = "welcome to my page";
      document.body.appendChild(heading);
    }
  }

  createHeadings();
  temp_today(20);
}

main();
