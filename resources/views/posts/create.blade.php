<x-layout-register>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white rounded-xl shadow-md p-6 w-full max-w-3xl">
        <div class="flex items-center space-x-4">
            <img class="h-24 w-24 rounded-full border-4 border-purple-500" src="path-to-image.jpg" alt="Profile Picture">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Dustin Warren</h1>
                <p class="text-gray-600">UX Designer</p>
            </div>
        </div>
        <form class="mt-8 grid grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full bg-purple-50 border-transparent rounded-md shadow-sm" placeholder="Dustin">
            </div>
            <div>
                <label for="surname" class="block text-sm font-medium text-gray-700">Surname</label>
                <input type="text" id="surname" name="surname" class="mt-1 block w-full bg-purple-50 border-transparent rounded-md shadow-sm" placeholder="Warren">
            </div>
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" name="title" class="mt-1 block w-full bg-purple-50 border-transparent rounded-md shadow-sm" placeholder="UX Designer">
            </div>
            <div>
                <label for="profile-picture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
                <input type="file" id="profile-picture" name="profile-picture" class="mt-1 block w-full bg-purple-50 border-transparent rounded-md shadow-sm">
            </div>
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" id="address" name="address" class="mt-1 block w-full bg-purple-50 border-transparent rounded-md shadow-sm" placeholder="717 S 34th St, Mattoon, IL 61938">
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" id="phone" name="phone" class="mt-1 block w-full bg-purple-50 border-transparent rounded-md shadow-sm" placeholder="(217) 499-0822">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full bg-purple-50 border-transparent rounded-md shadow-sm" placeholder="ryan@rowandtable.com">
            </div>
        </form>
        <div class="mt-8 flex justify-center">
            <button type="submit" class="bg-purple-500 text-white px-6 py-3 rounded-full shadow-md hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-400">SAVE</button>
        </div>
    </div>
</body>
</html>


</x-layout-register>
