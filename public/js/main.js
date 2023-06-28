for (let birthYear = 2009; birthYear >= 1930; birthYear--) {
    let options = document.createElement("OPTION");
    document.getElementById("birthYear").appendChild(options).innerHTML = birthYear;
}