const $table = document.querySelector('#table')

$table.addEventListener('click', event => {
    if (event.target.classList.contains('btn-primary') || event.target.classList.contains('btn-success')) {
        updateTable(event)
    }
})

function updateTable(event) {
    const $row = event.target.parentElement.parentElement
    const data = new FormData()
    data.append('id', $row.dataset.id)
    if (event.target.dataset.action) {
        data.append('action', event.target.dataset.action)
    }
    fetch('updateTable.php', {
        method: 'POST',
        body: data,
    })
        .then(response => response.json())
        .then(data => renderTable(data))
}

function renderTable(data) {
    $table.innerHTML = ''
    data.forEach(product => {
        if (product['HIDE'] === '0') {
            $table.insertAdjacentHTML('beforeend', `
            <tr data-id="${product['ID']}">
                <td>${product['PRODUCT_NAME']}</td>
                <td>${product['PRODUCT_PRICE']}</td>
                <td>${product['PRODUCT_ARTICLE']}</td>
                <td>
                    <button data-action="-" class="btn btn-success">-</button>       
                    ${product['PRODUCT_QUANTITY']}
                    <button data-action="+" class="btn btn-success">+</button>
                </td>
                <td>${product['DATE_CREATE']}</td>
                <td>
                    <button class="btn btn-primary" >Hide</button>
                </td>
            </tr>
            `)
        }
    })
}