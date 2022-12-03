const searchBar = document.getElementById('searchBar');
const url = new URL(window.location.href);
const form = document.getElementById('searchForm');
const eventArea = document.getElementById('events-area');
const avenir = document.getElementById('avenir');




//prevent default form
form.addEventListener('submit', (e) => {
    e.preventDefault();

    fetch('evenements/' + searchBar.value, {
        headers: {
            "X-Requested-With": "XMLHttpRequest"
        }
    }).then(response =>
        response.json(),
    ).then(data => {
        eventArea.innerHTML = data;
    })
})
