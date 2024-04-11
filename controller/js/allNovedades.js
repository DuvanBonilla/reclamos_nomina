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

// 3. Converting HTML table to PDF
const customers_table = document.querySelector('#customers_table');
const pdf_btn = document.querySelector('#toPDF');

const toPDF = function (customers_table) {
    // Clonar el contenido del encabezado y el cuerpo de la tabla
    const tableHead = customers_table.querySelector('thead').cloneNode(true);
    const tableBody = customers_table.querySelector('tbody').cloneNode(true);

    // Reemplazar los botones con su texto en la tabla
    tableBody.querySelectorAll('button').forEach(button => {
        const textNode = document.createTextNode(button.textContent); // Obtener el texto del botón
        button.parentNode.replaceChild(textNode, button); // Reemplazar el botón con su texto
    });

    // Generar el código HTML con el encabezado y el cuerpo de la tabla
    const html_code = `
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tabla PDF</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <style>
            @page {
                size: landscape;
            }
        </style>
    </head>
    <body>
        <main class="table">
            <table>
                ${tableHead.outerHTML}
                ${tableBody.outerHTML}
            </table>
        </main>
    </body>
    </html>`;

    // Abrir una nueva ventana y escribir el código HTML
    const new_window = window.open();
    new_window.document.write(html_code);

    // Esperar un breve tiempo antes de imprimir y cerrar la ventana
    setTimeout(() => {
        new_window.print();
        new_window.close();
    }, 400);
}

pdf_btn.addEventListener('click', function () {
    toPDF(customers_table);
});


// 6. Converting HTML table to EXCEL File

// const excel_btn = document.querySelector('#toEXCEL');

// const toExcel = function (table) {
//     const tbody_rows = table.querySelectorAll('tbody tr');

//     const table_data = [...tbody_rows].map(row => {
//         const cells = row.querySelectorAll('td');
//         const rowData = [...cells].map(cell => cell.textContent.trim());
//         let imgSrc = '';
//         const img = row.querySelector('img');
//         if (img) {
//             imgSrc = decodeURIComponent(img.src);
//         }
//         rowData.push(imgSrc); // Añadir la fuente de la imagen como última celda
//         return rowData.join(';'); // Convertir la fila en una cadena CSV, separando las celdas por punto y coma
//     }).join('\n'); // Separar las filas por saltos de línea

//     return table_data;
// }

// excel_btn.onclick = () => {
//     const excel = toExcel(customers_table);
//     downloadFile(excel, 'excel.csv'); // Solo necesitas pasar el contenido del archivo CSV y el nombre del archivo
// }

// const downloadFile = function (data, fileName = '') {
//     const a = document.createElement('a');
//     a.download = fileName;
//     const csvData = new Blob([data], { type: 'text/csv;charset=utf-8' }); // Agregar ';charset=utf-8'
//     const csvUrl = URL.createObjectURL(csvData);

//     a.href = csvUrl;
//     document.body.appendChild(a);
//     a.click();
//     document.body.removeChild(a);
//     URL.revokeObjectURL(csvUrl);
// }


const excel_btn = document.querySelector('#toEXCEL');

const toExcel = function (table) {
    const thead = table.querySelector('thead');
    const tbody_rows = table.querySelectorAll('tbody tr');

    // Obtener los encabezados de columna y eliminar espacios adicionales y símbolos no deseados
    const headers = [...thead.querySelectorAll('th')].map(header => header.textContent.trim().replace(/[^\w\s]/gi, ''));

    const table_data = [headers.join(';')]; // Agregar los encabezados como la primera fila del archivo CSV

    tbody_rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        const rowData = [...cells].map(cell => cell.textContent.trim());
        let imgSrc = '';
        const img = row.querySelector('img');
        if (img) {
            imgSrc = decodeURIComponent(img.src);
        }
        rowData.push(imgSrc); // Añadir la fuente de la imagen como última celda
        table_data.push(rowData.join(';')); // Convertir la fila en una cadena CSV, separando las celdas por punto y coma
    });

    return table_data.join('\n'); // Unir todas las filas con saltos de línea
}

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

