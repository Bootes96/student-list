const radioDesc = document.querySelector('#desc');
const radioAsc = document.querySelector('#asc');
let url = window.location.search;
const setOrder = (value) => {
  //если в searchParams пусто
  if (window.location.search == "") {
    let newUrl = url + "?sortByPoints=" + value;
    window.location.href = newUrl;
  } else { //если в searchParams есть параметры
    let href = new URL(window.location.href);
    href.searchParams.delete('sortByPoints');
    href.searchParams.append('sortByPoints', value);
    //Если есть параметр page, то удаляем его из середины и добавляем в конце
    if (href.searchParams.has('page')) {
      let pageNumber = href.searchParams.get('page');
      href.searchParams.delete('page');
      href.searchParams.append('page', pageNumber);
    }
    window.location.href = href.toString();
  }
}

if (!!radioDesc) {
  radioDesc.addEventListener('click', setOrder.bind(null, radioDesc.value));
}

if (!!radioAsc) {
  radioAsc.addEventListener('click', setOrder.bind(null, radioAsc.value));
}



function dropdown() {
  document.getElementById("dropdown").classList.toggle("show");
}

// Закрывает выпадающее меню, если пользователь щелкает за его пределами
window.onclick = function (event) {
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

//автоматическое исчезновение alert
let alertEl = document.querySelector('.alert-success');

if (!!alertEl) {
  setTimeout(function() {
    alertEl.style.display = 'none';
  }, 4000);
}

