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

// const toExcel = function (table) {
//     const thead = table.querySelector('thead');
//     const tbody_rows = table.querySelectorAll('tbody tr');

//     // Obtener los encabezados de columna y eliminar espacios adicionales y símbolos no deseados
//     const headers = [...thead.querySelectorAll('th')].map(header => header.textContent.trim().replace(/[^\w\s]/gi, ''));

//     // Encontrar los índices de las columnas "Estado" y "Eliminar"
//     const estadoIndex = headers.indexOf('Estado');
//     const eliminarIndex = headers.indexOf('Eliminar');

//     // Eliminar las columnas "Estado" y "Eliminar" de los encabezados
//     if (estadoIndex !== -1) {
//         headers.splice(estadoIndex, 1);
//     }
//     if (eliminarIndex !== -1) {
//         headers.splice(eliminarIndex, 1);
//     }

//     const table_data = [headers.join(';')]; // Agregar los encabezados como la primera fila del archivo CSV

//     tbody_rows.forEach(row => {
//         const cells = row.querySelectorAll('td');
//         const rowData = [...cells].map(cell => cell.textContent.trim());

//         // Eliminar las celdas correspondientes a las columnas "Estado" y "Eliminar"
//         if (estadoIndex !== -1) {
//             rowData.splice(estadoIndex, 1);
//         }
//         if (eliminarIndex !== -1) {
//             rowData.splice(eliminarIndex, 1);
//         }

//         let imgSrc = '';
//         const img = row.querySelector('img');
//         if (img) {
//             imgSrc = decodeURIComponent(img.src);
//         }
//         rowData.push(imgSrc); // Añadir la fuente de la imagen como última celda
//         table_data.push(rowData.join(';')); // Convertir la fila en una cadena CSV, separando las celdas por punto y coma
//     });

//     return table_data.join('\n'); // Unir todas las filas con saltos de línea
// }

// const excel_btn = document.querySelector('#toEXCEL');
// excel_btn.onclick = () => {
//     const excel = toExcel(customers_table);
//     downloadFile(excel, 'excel.csv'); // Solo necesitas pasar el contenido del archivo CSV y el nombre del archivo
// }

// const downloadFile = function (data, fileName = '') {
//     const a = document.createElement('a');
//     a.download = fileName;
//     const csvData = new Blob([data], { type: 'text/csv;charset=utf-8' }); // Especificar la codificación de caracteres como UTF-8
//     const csvUrl = URL.createObjectURL(csvData);

//     a.href = csvUrl;
//     document.body.appendChild(a);
//     a.click();
//     document.body.removeChild(a);
//     URL.revokeObjectURL(csvUrl);
// }



const excel_btn = document.querySelector('#toEXCEL');

const toExcel = function (table) {
    const tbody = table.querySelector('tbody');
    const rows = tbody.querySelectorAll('tr');

    // Array para almacenar los datos de cada fila, incluyendo los encabezados
    const rowData = [];

    // Especificar los encabezados manualmente
    const headers = [
        "Fecha registro",
        "Fecha novedad",
        "Coordinador",
        "Novedad",
        "Trabajador",
        "Descripción",
        "ID servicio",
        "Cliente",
        "Costos",
        "Nómina",
    ];
    rowData.push(headers.join(';')); // Agregar los encabezados al array

    // Recorremos cada fila de la tabla
    rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        const rowValues = Array.from(cells).map(cell => cell.innerText.trim());
        rowData.push(rowValues.join(';')); // Agregar los valores de la fila al array
    });

    console.log('Datos de la tabla:', rowData);

    return rowData.join('\n'); // Unir todas las filas con saltos de línea
}

excel_btn.onclick = () => {
    const excel = toExcel(customers_table);
    downloadFile(excel, 'datos.csv'); // Nombrar el archivo como "datos.csv"
}

const downloadFile = function (data, fileName = '') {
    const a = document.createElement('a');
    a.download = fileName;
    const csvData = new Blob([new Uint8Array([0xEF, 0xBB, 0xBF]), data], { type: 'text/csv;charset=utf-8' });

    const csvUrl = URL.createObjectURL(csvData);

    a.href = csvUrl;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(csvUrl);
}

