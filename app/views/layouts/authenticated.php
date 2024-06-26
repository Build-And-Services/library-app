<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? "$title - Boilerplate" : 'Boilerplate' ?></title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
</head>

<body>
    <div class="flex h-dvh overflow-hidden">
        <?php include_once __DIR__ . '/../components/sidebar.php' ?>
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            <?php include_once __DIR__ . '/../components/header.php' ?>
            <main class="p-4">
                <?= $content ?>
            </main>
        </div>
    </div>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#table-pagination').DataTable({
                "paging": true,
                "searching": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
    <script src="/js/script.js"></script>
    <script>
        // function generatePage(page, row, data, table = document.querySelector('#table-pagination')) {
        //     if (table) {
        //         let tbody = document.createElement('tbody');
        //         var dataTemp = ''
        //         var start = (page - 1) * row;
        //         for (let index = start; index <= start + row - 1; index++) {
        //             if (data[index] != undefined) {
        //                 dataTemp += data[index].outerHTML.toString();
        //             }
        //         }
        //         tbody.innerHTML = dataTemp;

        //         table.appendChild(tbody);
        //     }
        //     return null;
        // }

        // function generatePagination(data, row, content = document.getElementById('content-pagination')) {
        //     var lengths = Math.ceil(data.length / row)
        //     if (content) {
        //         var elementPagination = `
        //         <div class="flex mt-5">
        //                 <div id="pagination" class="grid grid-cols-${lengths} border rounded-md overflow font-medium">`;

        //         for (let index = 1; index <= lengths; index++) {
        //             elementPagination += `<a href="?pag=${index}" class="inline-block cursor-pointer hover:bg-indigo-100 transition-all duration-500 border py-2 px-4">${index}</a>`;
        //         }
        //         elementPagination += `
        //                 </div>
        //             </div>
        //         `
        //         content.insertAdjacentHTML('beforeend', elementPagination);
        //     }
        // }

        // function search(data, content = document.getElementById('content-pagination')) {
        //     let search = document.getElementById('search');
        //     search.addEventListener('input', (e) => {
        //         let tbody = document.createElement('tbody');
        //         let table = document.querySelector('#content-pagination table');
        //         if (e.target.value === '') {
        //             console.log('masuk sini')
        //             console.log(data)
        //             for (let index = 0; index < data.length; index++) {
        //                 tbody.appendChild(data[index]);
        //             }
        //         }

        //         // let result = []
        //         // for (let i = 0; i < data.length; i++) {
        //         //     if (data[i].children[1].textContent.toLowerCase().includes(e.target.value.toLowerCase())) {
        //         //         console.log(data[i].children[1].textContent.toLowerCase().includes(e.target.value.toLowerCase()))
        //         //         result.push(data[i])
        //         //     }
        //         // }

        //         // for (let index = 0; index < result.length; index++) {
        //         //     tbody.appendChild(result[index]);
        //         // }



        //         console.log(table)

        //         // if (table.getElementsByTagName('tbody').length > 0) {
        //         //     table.replaceChild(tbody, table.getElementsByTagName('tbody')[0]);
        //         // } else {
        //         //     table.appendChild(tbody);
        //         // }
        //     })
        // }

        // function dataTable() {
        //     var dataPerPage = 10;

        //     var tablePagination = document.querySelector('#table-pagination tbody');
        //     var contentPagination = document.getElementById('content-pagination');
        //     var data = tablePagination.children;
        //     console.log(data)
        //     search(data);

        //     const queryString = window.location.search;
        //     const urlParams = new URLSearchParams(queryString);
        //     var activePage = 1;
        //     const params = urlParams.get('pag');
        //     if (params) {
        //         activePage = parseInt(params);
        //     }
        //     generatePagination(data, dataPerPage)
        //     if (tablePagination) {
        //         tablePagination.remove();
        //         const page = Math.ceil(data.length / dataPerPage);
        //         generatePage(activePage, dataPerPage, data);
        //     }
        // }
        // document.addEventListener('DOMContentLoaded', function() {
        //     dataTable()
        // });
    </script>

</body>

</html>