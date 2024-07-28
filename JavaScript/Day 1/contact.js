function main() {
  function getName() {
    while (true) {
      let name = prompt("Enter your name: ");
      if (name && /[a-zA-Z]/.test(name)) {
        return name.trim();
      }
      alert("Invalid name");
    }
  }

  function getBirthYear() {
    while (true) {
      let birthyear = prompt("Enter your birth year: ");
      if (birthyear && !isNaN(birthyear) && birthyear < 2010) return +birthyear;
      alert("Invalid birth year");
    }
  }

  function calculateAge(birthyear) {
    currentYear = new Date().getFullYear();
    return currentYear - birthyear;
  }

  function display() {
    let name = getName();
    let birthyear = getBirthYear();
    let age = calculateAge(birthyear);

    document.getElementById("userInfo").innerHTML = `
		<p>Name: ${name} </p>
		<p>Birth year: ${birthyear}</p>
		<p>Age: ${age}</p>`;
  }

  display();
}

main();
