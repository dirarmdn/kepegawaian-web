<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  @vite('resources/js/app.js')
</head>
<body class="bg-[#0f102b] ">
  
  <div class="container mx-auto my-40">
    <div class="font-main font-extrabold text-6xl text-center mx-auto text-gray-200 mb-10">Kepegawaian</div>
    <div class="bg-ebony-clay-900 p-8 rounded-xl mx-auto shadow-xl w-1/3 font-main">
      <form action="/loginuser" method="post">
        @csrf
        <div class="mb-6">
          <label for="base-input" class="block mb-2 text-gray-300 font-bold text-base">USERNAME</label>
          <input type="text" id="base-input" name="name" class="bg-gradient-to-br from-ebony-clay-500 to-white text-gray-900 text-lg font-semibold rounded-xl focus:outline-none focus:bg-gray-300 block w-full px-2.5 py-4">
        </div>
        <div class="mb-6">
          <label for="base-input" class="block mb-2 text-gray-300 font-bold text-base">PASSWORD</label>
          <input type="password" id="base-input" name="password" class="bg-gradient-to-br from-ebony-clay-500 to-white text-gray-900 text-lg font-semibold rounded-xl focus:outline-none focus:bg-gray-300 block w-full px-2.5 py-4">
        </div>
        <div class="flex justify-center">
        <button type="submit" class="text-gray-900 bg-white hover:bg-ebony-clay-500 font-extrabold focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-3xl text-sm w-full sm:w-auto px-14 py-4 text-center mt-5">LOG IN</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>