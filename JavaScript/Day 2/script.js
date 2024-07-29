function main() {
  function getName() {
    while (true) {
      const name = prompt("Enter your name: ");
      if (/^[a-zA-Z\s]+$/.test(name.trim())) {
        return name.trim();
      } else alert("Invalid name");
    }
  }

  function getPhoneNo() {
    while (true) {
      const phoneNum = prompt("Enter your phone number: ").trim();
      if (/^\d{8}$/.test(phoneNum)) return phoneNum;
      else alert("Invalid Phone number");
    }
  }

  function getMobileNo() {
    while (true) {
      const mobileNo = prompt("Enter your mobile number: ").trim();
      if (/^(010|011|012)\d{8}$/.test(mobileNo)) return mobileNo;
      else alert("Invalid Mobile Number");
    }
  }

  function getEmail() {
    while (true) {
      const email = prompt("Enter your email: ").trim();
      if (/^\w+@[\w\d]+\.com$/.test(email)) return email;
      else alert("Invalid email");
    }
  }

  function getColorChoice() {
    let color;
    while (true) {
      color = prompt("choose a color (red, green, blue):").trim().toLowerCase();
      if (["red", "green", "blue"].includes(color)) {
        return color;
      } else {
        alert("Invalid color choice.");
      }
    }
  }

  function display() {
    let color = getColorChoice();
    let u_name = getName();
    let u_phoneNumber = getPhoneNo();
    let u_mobileNumber = getMobileNo();
    let u_email = getEmail();

    document.getElementById("userInfo").innerHTML = `
		<p style="color: ${color};">Name: ${u_name} </p>
		<p style="color: ${color};">Phone Number: ${u_phoneNumber}</p>
		<p style="color: ${color};">Mobile Number: ${u_mobileNumber}</p>
		<p style="color: ${color};">Email: ${u_email}</p>`;
  }

  function singleStringOnly() {
    const stringOfChar = prompt("enter some text").split(/\s/);
    let largestOne = "";
    for (const str of stringOfChar) {
      if (str.length > largestOne.length) {
        largestOne = str;
      }
    }
    document.write(`<p>largest string: ${largestOne}</p>`);
  }

  function fillArray() {
    let arr = [];
    for (let i = 1; i < 6; i++) {
      arr.push(prompt(`value of position ${i}`));
    }
    arr.sort((x, y) => x - y);
    document.write(`<p>ascending: ${arr}</p>`);
    arr.sort((x, y) => y - x);
    document.write(`<p>descending: ${arr}</p>`);
  }

  function calculateArea() {
    const radius = prompt("enter the radius: ");
    const area = Math.PI * radius ** 2;

    const angle = prompt("enter an angle: ");
    const radians = angle * (Math.PI / 180);
    const angle_cos = Math.cos(radians);

    const value = prompt("enter number: ");
    const sqrt_of_value = Math.sqrt(value);

    alert(`sqrt of ${value} is ${sqrt_of_value}`);
    document.write(`<p>Area is ${area}</p>`);
    document.write(`<p>cosine of ${angle} = ${Math.round(angle_cos)}</p>`);
  }

  // Enter another value to calculate its square root and alert the result  as shown in fig.

  display();
  singleStringOnly();
  fillArray();
  calculateArea();
}

main();
