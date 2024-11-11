<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Todo App template</title>
<script src="https://cdn.tailwindcss.com"></script>
<link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"
/>
</head>

<body>
<div id="head" class="flex border-blue-800 border-t-2">
    <div class="w-full">
        <header class="flex bg-white justify-between h-20 border-b border-b-gray-200 items-center px-6">
            <div id="left-header" class="">
            </div>
            <div id="right-header" class="space-x-5">
                <a href="{{ route('logout') }}" class="block text-black cursor-pointer"><i class="text-rose-600 ri-logout-box-r-line text-xl md:text-2xl"></i></a> 
            </div>
        </header>
    </div>
</div>
<div id="content" class="mx-auto" style="max-width:500px;">
    @livewire('layout')
</div>
</body>
</html>