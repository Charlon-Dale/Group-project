<?php
    include('includes/functions.php');
    $listAllStudents = selectAllStudents();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JUAN IT Student Dashboard</title>
    <?php include('components/header-scripts.php'); ?>
</head>
<body  x-data="{'isModalOpen': false}" x-on:keydown.escape="isModalOpen=false">
<div x-data="setup()" :class="{ 'dark': isDark }">
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-gray-200 dark:bg-gray-700 text-black dark:text-white">
      <!-- Header -->
      <?php include('components/header.php'); ?>
      <!-- ./Header -->
    
      <!-- Sidebar -->
      <div class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-blue-900 dark:bg-gray-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
        <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
          <ul class="flex flex-col py-4 space-y-1">
            <li class="px-5 hidden md:block">
              <div class="flex flex-row items-center h-8">
                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Main</div>
              </div>
            </li>
            <li>
              <a href="index.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
              </a>
            </li>
            <li class="px-5 hidden md:block">
              <div class="flex flex-row items-center mt-5 h-8">
                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Settings</div>
              </div>
            </li>
            <li>
              <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Profile</span>
              </a>
            </li>
          </ul>
          <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2021</p>
        </div>
      </div>
      <!-- ./Sidebar -->
    
      <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
        <div class='container mt-16 mx-auto lg:w-2/5 md:w-1/2 sm:w-7/8 bg-white shadow-lg rounded-lg'>
          <div class='p-6'>
            <h1 class='text-2xl text-center'>Your Todo</h1>
            <div class="border-t border-gray-100 my-2"></div>
              <div x-data="state">  
                <div class='mb-4'>
                    <div class="hidden sm:block">
                        <div class="border-b border-gray-200">
                            <nav class="-mb-px flex">
                                <a href="#"
                                    :class=" show_todo ? 'w-1/2 py-4 px-1 text-center border-b-2 border-indigo-500 font-medium text-sm leading-5 text-indigo-600 focus:outline-none focus:text-indigo-800 focus:border-indigo-700' : 'w-1/2 py-4 px-1 text-center border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300'"
                                    @click.prevent="show_todo = true">
                                    Todo
                                </a>
                                <a href="#"
                                    :class=" !show_todo ? 'w-1/2 py-4 px-1 text-center border-b-2 border-indigo-500 font-medium text-sm leading-5 text-indigo-600 focus:outline-none focus:text-indigo-800 focus:border-indigo-700' : 'w-1/2 py-4 px-1 text-center border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300'"
                                    @click.prevent="show_todo = false">
                                    Done
                                </a>

                            </nav>
                        </div>
                    </div>
                </div>

                <template x-for="todo in todos" :key="todo.id">
                    <div x-show="todo.todo === show_todo" class='transform transition origin-top'>
                        <div class=" flex items-center">
                            <input :id=" todo.id" type="checkbox"
                                class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                                :checked="!todo.todo" @click="setTimeout(function() {todo.todo = !todo.todo}, 1000)" />
                            <label :for="todo.id" class="ml-2 block text-md leading-6 text-gray-900">
                                <span x-text="todo.text"></span>
                            </label>
                        </div>

                    </div>
                </template>

                <div x-show="show_todo" class='mt-4'>
                    <label for="add_todo" class="ml-2 block text-sm leading-5 text-gray-900">Add a todo:</label>
                    <input type="text" id="add_todo" class='form-input'
                        @keyup.enter="todos.push({id: (+ new Date()), text: $event.target.value, todo: true});">
                </div>
              </div>
            </div>
        </div>
      </div>  
    </div>
  </div>
  <script>
   let state = {
    show_todo: true,
    todos: [
      {id: 1, text: 'Learn JavaScript', todo: true},
      {id: 2, text: 'Learn Vue', todo: true},
      {id: 3, text: 'Build something awesome', todo: true}
    ]
       
   }
  </script>
  <?php include('components/footer-scripts.php'); ?>  
</body>
</html>
<!-- px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700 -->