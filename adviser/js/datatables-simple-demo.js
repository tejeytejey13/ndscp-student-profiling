window.addEventListener('DOMContentLoaded', event => {
    // Define an array of class names for the tables
    const tableClassNames = ['datatablesSimple', 'datatablesSimple2', 'datatablesSimple3', 'datatablesSimple4', 'datatablesSimple5', 'datatablesSimple6'];

    // Initialize DataTables for each table with a class name
    tableClassNames.forEach(className => {
        const tables = document.getElementsByClassName(className);
        for (const table of tables) {
            new simpleDatatables.DataTable(table);
        }
    });
});
