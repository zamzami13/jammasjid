<?php
/*
    jangan hapus atau edit halaman ini.
*/
?>

<div class="bg-gradient-to-r from-slate-600 to-slate-800 card-ab rounded-md px-3 py-3">
    <div class="grid grid-cols-1">
        <div class="text-slate-100 space-y-3">

            <div class="px-3 py-3 border-l-2 border-lime-400">
                <p>Bismillah</p>
                <p>Terimakasih telah membeli produk asli.</p>
                <p>
                    <strong>Kami tidak berkenan</strong>, jika Anda <strong>secara sengaja</strong> membajak produk kami, menyebarluaskan dan menjualnya kembali.
                </p>
                <p class="animate-pulse">Semoga berkah.</p>
            </div>

            <div class="space-y-3 px-3 py-3 border-l-2 border-lime-400">
                <table class="w-full">
                    <tr class="flex space-x-1">
                        <td class="w-20">Produk</td>
                        <td>:</td>
                        <td><?php @$fxProduct; ?></td>
                    </tr>

                    <tr class="flex space-x-1">
                        <td class="w-20">Invoice</td>
                        <td>:</td>
                        <td><?php @$fxInvoice; ?></td>
                    </tr>

                    <tr class="flex space-x-1">
                        <td class="w-20">Lisensi </td>
                        <td>:</td>
                        <td><?php @$fxLicense; ?></td>
                    </tr>

                    <tr class="flex space-x-1 items-center">
                        <td class="w-20">Status</td>
                        <td>:</td>
                        <td class="flex space-x-3 items-center">
                            <div class="text-emerald-300"><?php @$fxStatus; ?></div>
                            <div>|</div>
                            <button class="text-yellow-400 hover:text-yellow-500">Pindah Device</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>