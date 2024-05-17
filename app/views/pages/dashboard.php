<?php
$title = 'Dashboard';
ob_start();
?>


<div class="grid grid-cols-3 gap-2">
    <div class="max-w-sm p-6 bg-blue-500 border border-gray-200 rounded-lg shadow-lg ">
        <h5 class="mb-2 text-2xl font-bold text-white">Data Pustakawan</h5>
    
        <p class="mb-3 font-normal text-gray-700 ">Total Data Pustakawan : <?= $totalPustakawan; ?> </p>
        <a href="/pustakawans" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-cyan-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
            Read more
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
    <div class="max-w-sm p-6 bg-blue-500 border border-gray-200 rounded-lg shadow-lg ">
        <h5 class="mb-2 text-2xl font-bold text-white">Data Pengunjung</h5>
    
        <p class="mb-3 font-normal text-gray-700 ">Total Data Pengunjung : <?= $totalPengunjung; ?> </p>
        <a href="/pengunjung" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-cyan-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
            Read more
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
    <div class="max-w-sm p-6 bg-emerald-500 border border-gray-200 rounded-lg shadow-lg ">
        <h5 class="mb-2 text-2xl font-bold text-white">Data Buku Available</h5>
    
        <p class="mb-3 font-normal text-gray-700 ">Total Data Buku Available : <?= $totalAvailableBooks; ?> </p>
        <a href="/books" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-cyan-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
            Read more
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
    <div class="max-w-sm p-6 bg-emerald-500 border border-gray-200 rounded-lg shadow-lg ">
        <h5 class="mb-2 text-2xl font-bold text-white">Data Buku Not Available</h5>
    
        <p class="mb-3 font-normal text-gray-700 ">Total Data Buku Not Available : <?= $totalNotAvailableBooks; ?> </p>
        <a href="/books" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-cyan-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
            Read more
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>

</div>



<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/authenticated.php';
?>