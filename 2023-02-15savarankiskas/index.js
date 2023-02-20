let shortenButton = document.getElementById('shorten-button');
let urlInput = document.getElementById('url-input');

async function sendData(){
    shortenButton.disabled = true;
    const url = 'generator.php';
    const formData = new FormData();
    formData.append('urlToShorten', urlInput.value);
    const response = await fetch(url, {
        method: 'POST',
        cache: 'no-cache',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        },
        body: formData
    });

    const responseData = await response.json()
    shortenButton.disabled = false;
    console.log(responseData);
    if(responseData.status == 'success'){
        addToTable(responseData.results);
    } else if (responseData.status == 'duplicate') {
        alert('Url already shortened to: ' + responseData.results);
    } else {
        alert('Error: ' + responseData.message);
    }
}

function addToTable(data){
    let tbody = document.getElementById('tbody');
    let tr = document.createElement('tr');
    let thURL = document.createElement('th');
    let thID = document.createElement('th');
    let thNumber = document.createElement('th');
    tr.scope='row';
    thNumber.textContent = parseInt(tbody.lastElementChild.firstElementChild.textContent) + 1;
    thID.textContent = data.id;
    thURL.textContent = data.url;
    tr.append(thNumber,thID,thURL);
    tbody.append(tr);
}


shortenButton.addEventListener('click', () => {
sendData();
});

