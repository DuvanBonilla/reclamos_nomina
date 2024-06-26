const search = document.querySelector('.input-group input'),
    table_rows = document.querySelectorAll('tbody tr'),
    table_headings = document.querySelectorAll('thead th');

// 1. Searching for specific data of HTML table
search.addEventListener('input', searchTable);

function searchTable() {
    table_rows.forEach((row, i) => {
        let table_data = row.textContent.toLowerCase(),
            search_data = search.value.toLowerCase();

        row.classList.toggle('hide', table_data.indexOf(search_data) < 0);
        row.style.setProperty('--delay', i / 25 + 's');
    })

    document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
        visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
    });
}

// 2. Sorting | Ordering data of HTML table

table_headings.forEach((head, i) => {
    let sort_asc = true;
    head.onclick = () => {
        table_headings.forEach(head => head.classList.remove('active'));
        head.classList.add('active');

        document.querySelectorAll('td').forEach(td => td.classList.remove('active'));
        table_rows.forEach(row => {
            row.querySelectorAll('td')[i].classList.add('active');
        })

        head.classList.toggle('asc', sort_asc);
        sort_asc = head.classList.contains('asc') ? false : true;

        sortTable(i, sort_asc);
    }
})


function sortTable(column, sort_asc) {
    [...table_rows].sort((a, b) => {
        let first_row = a.querySelectorAll('td')[column].textContent.toLowerCase(),
            second_row = b.querySelectorAll('td')[column].textContent.toLowerCase();

        return sort_asc ? (first_row < second_row ? 1 : -1) : (first_row < second_row ? -1 : 1);
    })
        .map(sorted_row => document.querySelector('tbody').appendChild(sorted_row));
}


//  ------------------------ convertir a excel ------------------------

const toExcel = function (table) {
    const thead = table.querySelector('thead');
    const tbody_rows = table.querySelectorAll('tbody tr');

    // Obtener los encabezados de columna, eliminar espacios adicionales y símbolos no deseados, y tomar solo los primeros 7
    const headers = [...thead.querySelectorAll('th')]
        .map(header => header.textContent.trim().replace(/[^\w\s]/gi, ''))
        .slice(0, 7); // Tomar solo los primeros 7 encabezados

    const table_data = [headers.join(';')]; // Agregar los encabezados como la primera fila del archivo CSV

    tbody_rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        // Tomar solo los primeros 7 datos de cada fila
        const rowData = [...cells]
            .map(cell => cell.textContent.trim())
            .slice(0, 7); // Tomar solo las primeras 7 celdas

        table_data.push(rowData.join(';')); // Convertir la fila en una cadena CSV, separando las celdas por punto y coma
    });

    return table_data.join('\n'); // Unir todas las filas con saltos de línea
}

const excel_btn = document.querySelector('#toEXCEL');
excel_btn.onclick = () => {
    const excel = toExcel(customers_table);
    downloadFile(excel, 'excel.csv'); // Solo necesitas pasar el contenido del archivo CSV y el nombre del archivo
}

const downloadFile = function (data, fileName = '') {
    const a = document.createElement('a');
    a.download = fileName;
    const csvData = new Blob([data], { type: 'text/csv;charset=utf-8' }); // Especificar la codificación de caracteres como UTF-8
    const csvUrl = URL.createObjectURL(csvData);

    a.href = csvUrl;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(csvUrl);
}


