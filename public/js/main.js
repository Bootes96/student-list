const radioDesc = document.querySelector('#desc');
const radioAsc = document.querySelector('#asc');
let url = window.location.pathname;
const setOrder = (value) => {
    let newUrl = url + "?sortByPoints=" + value;
    window.location.href = newUrl;
 }
radioDesc.addEventListener('click', setOrder.bind(null, radioDesc.value));
radioAsc.addEventListener('click', setOrder.bind(null, radioAsc.value));




function dropdown() {
    document.getElementById("dropdown").classList.toggle("show");
  }
  
  // Закрывает выпадающее меню, если пользователь щелкает за его пределами
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      let dropdowns = document.getElementsByClassName("dropdown-content");
      let i;
      for (i = 0; i < dropdowns.length; i++) {
        let openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  } 

