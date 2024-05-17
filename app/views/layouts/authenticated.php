<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? "$title - Boilerplate" : 'Boilerplate' ?></title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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


    <script src="/js/script.js"></script>
    <script>

        function generatePage(page, row, data, table = document.querySelector('#table-pagination')){
            if(table){
                let tbody = document.createElement('tbody');
                var dataTemp = ''
                var start = (page - 1) * row;
                for (let index = start; index <= start + row - 1; index++) {
                    if(data[index] != undefined){
                        dataTemp += data[index].outerHTML.toString();
                    }
                }
                tbody.innerHTML = dataTemp;
                
                table.appendChild(tbody);
            }
            return null;
        }

        function generatePagination(data, row, content = document.getElementById('content-pagination')){
            var lengths = Math.ceil(data.length / row)
            if(content){
                var elementPagination = `
                <div class="flex mt-5">
                        <div id="pagination" class="grid grid-cols-${lengths} border rounded-md overflow font-medium">`;
                
                for (let index = 1; index <= lengths; index++) {
                    elementPagination += `<a href="?pag=${index}" class="inline-block cursor-pointer hover:bg-indigo-100 transition-all duration-500 border py-2 px-4">${index}</a>`;
                }
                elementPagination += `
                        </div>
                    </div>
                `
                content.insertAdjacentHTML( 'beforeend', elementPagination );
            }
        }

        function pagination(){
            var dataPerPage = 10;
        
            var tablePagination = document.querySelector('#table-pagination tbody');
            var contentPagination = document.getElementById('content-pagination');
            var data = tablePagination.children;

            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            var activePage = 1;
            const params = urlParams.get('pag');
            if(params){
                activePage = parseInt(params);
            }
            generatePagination(data, dataPerPage)
            if(tablePagination){
                tablePagination.remove();
                const page = Math.ceil(data.length / dataPerPage);
                generatePage(activePage, dataPerPage, data);    
            }
        }
        document.addEventListener('DOMContentLoaded', function(){
            pagination()
        });
    </script>

</body>

</html>