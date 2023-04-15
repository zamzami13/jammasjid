<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sp.css">
    <title>x</title>
</head>
<body>
    <table>
        <tr><td>uuidx</td><td class="flex space-x-3"><span>:</span> <div id="uuid"></div></td></tr>
        <tr><td>isDevice</td><td class="flex space-x-3"><span>:</span> <div id="isDevice"></div></td></tr>
        <tr><td>host</td><td class="flex space-x-3"><span>:</span> <div id="host"></div></td></tr>
        <tr><td>hostname</td><td class="flex space-x-3"><span>:</span> <div id="hostname"></div></td></tr>
        <tr><td>platform</td><td class="flex space-x-3"><span>:</span> <div id="platform"></div></td></tr>
        <tr><td>os</td><td class="flex space-x-3"><span>:</span> <div id="os"></div></td></tr>
        <tr><td>browser</td><td class="flex space-x-3"><span>:</span> <div id="browser"></div></td></tr>
        <tr><td>browserVersion</td><td class="flex space-x-3"><span>:</span> <div id="browserVersion"></div></td></tr>
        <tr><td>resolutionW</td><td class="flex space-x-3"><span>:</span> <div id="resolutionW"></div></td></tr>
        <tr><td>resolutionH</td><td class="flex space-x-3"><span>:</span> <div id="resolutionH"></div></td></tr>
        <tr><td>userAgent</td><td class="flex space-x-3"><span>:</span> <div id="source"></div></td></tr>
        <tr><td>tex</td><td class="flex space-x-3"><span>:</span> <div id="tex"></div></td></tr>
        <tr><td>etex</td><td class="flex space-x-3"><span>:</span> <div id="etex"></div></td></tr>
    </table>

    <div data="<?php echo $server; ?>"></div>
    <div data="<?php echo $exec; ?>"></div>

    <button id="button" class="bg-indigo-500 px-3 py-3 rounded-md shadow-sm text-white justify-center items-center border-spacing-0">Ok</button>
    <script src="<?php echo base_url(); ?>assets/app.js"></script>
</body>
</html>