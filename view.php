<?php
    include('includes/functions.php');
    $listAllStudents = selectAllStudents();
    $user = (isset($_GET['Studentid'])) ? selectSingleUser($_GET['Studentid']) : false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JUAN IT Dashboard</title>
    <?php include('components/header-scripts.php'); ?>
</head>
<body>
<div x-data="setup()" :class="{ 'dark': isDark }">
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-gray-200 dark:bg-gray-700 text-black dark:text-white">
      <!-- Header -->
      <?php include('components/header-admin.php'); ?>
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
            <li>
              <a href="addUser.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Add Student</span>
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
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
          <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
              <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <div class="text-right">
              <?php
                echo'<p class="text-2xl">'.count($listAllStudents).'</p>';
              ?>
              <p>Students</p>
            </div>
          </div>
        </div>
        <!-- ./Statistics Cards -->
    
        <!-- Update Student -->
        <div class="mt-4 mx-4">
          <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="flex justify-center items-center">
              <div class="w-full lg:w-7/12 bg-white dark:bg-gray-800 p-5 rounded-lg lg:rounded">
                <?php if ($user != false) : ?>
			    	      <h3 class="pt-4 text-2xl text-center text-gray-600 dark:text-gray-400">Update Student Account!</h3>
			    	      <form class="px-8 pt-6 pb-8 mb-4 bg-white dark:bg-gray-800 rounded form" method="post">
                    <input type="hidden" name="Studentid" value="<?php echo $user['Studentid']; ?>">
			    	      	<div class="mb-4 md:flex md:justify-between">
			    	      		<div class="w-full sm:w-1/2 sm:pr-2 mb-3 sm:mb-0">
			    	      			<label class="block mb-2 text-sm font-bold text-gray-600 dark:text-gray-400" for="firstName">
			    	      				First Name
			    	      			</label>
			    	      			<input
			    	      				class="w-full px-3 py-2 text-sm leading-tight text-gray-600 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600 dark:focus:ring-gray-600 focus:border-transparent"
			    	      				id="firstname"
                          name="firstname"
			    	      				type="text"
                          value="<?php echo $user['Firstname']; ?>"
			    	      				placeholder="First Name"
			    	      			/>
			    	      		</div>
			    	      		<div class="w-full sm:w-1/2 sm:pl-2">
			    	      			<label class="block mb-2 text-sm font-bold text-gray-600 dark:text-gray-400" for="lastName">
			    	      				Last Name
			    	      			</label>
			    	      			<input
			    	      				class="w-full px-3 py-2 text-sm leading-tight text-gray-600 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600 dark:focus:ring-gray-600 focus:border-transparent"
			    	      				id="lastname"
			    	      				name="lastname"
			    	      				type="text"
                          value="<?php echo $user['LastName']; ?>"
			    	      				placeholder="Last Name"
			    	      			/>
			    	      		</div>
			    	      	</div>
			    	      	<div class="mb-4 md:flex md:justify-between">
			    	      		<div class="w-full sm:w-1/2 sm:pr-2 mb-3 sm:mb-0">
			    	      			<label class="block mb-2 text-sm font-bold text-gray-600 dark:text-gray-400" for="birthday">
			    	      				Birthday
			    	      			</label>
			    	      			<input
			    	      				class="w-full px-3 py-2 text-sm leading-tight text-gray-600 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600 dark:focus:ring-gray-600 focus:border-transparent"
			    	      				id="birthday"
                          name="birthday"
                          value="<?php echo $user['Birthday']; ?>"
			    	      				type="date"	
			    	      			/>
			    	      		</div>
			    	      		<div class="w-full sm:w-1/2 sm:pl-2">
			    	      			<label class="block mb-2 text-sm font-bold text-gray-600 dark:text-gray-400" for="email">
			    	      				Email
			    	      			</label>
			    	      			<input
			    	      				class="w-full px-3 py-2 text-sm leading-tight text-gray-600 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600 dark:focus:ring-gray-600 focus:border-transparent"
			    	      				id="email"
			    	      				name="email"
			    	      				type="email"
                          value="<?php echo $user['Email']; ?>"
			    	      				placeholder="Email"
			    	      			/>
			    	      		</div>
			    	      	</div>
                    <div class="mb-4">
			    	      		<label class="block mb-2 text-sm font-bold text-gray-600 dark:text-gray-400" for="course">
                       Course
			    	      		</label>
			    	      		<input
			    	      			class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-600 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600 dark:focus:ring-gray-600 focus:border-transparent"
			    	      			id="course"
			    	      			name="course"
			    	      			type="text"
                        value="<?php echo $user['Course']; ?>"
			    	      			placeholder="Course"
			    	      		/>
			    	      	</div>
                    <div class="mb-4">
			    	      		<label class="block mb-2 text-sm font-bold text-gray-600 dark:text-gray-400" for="username">
			    	      			Username
			    	      		</label>
			    	      		<input
			    	      			class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-600 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600 dark:focus:ring-gray-600 focus:border-transparent"
			    	      			id="username"
			    	      			name="username"
			    	      			type="text"
                        value="<?php echo $user['Username']; ?>"
			    	      			placeholder="Username"
			    	      		/>
			    	      	</div>
			    	      	<div class="mb-6 text-center">
			    	      		<button
			    	      			class="w-full px-4 py-2 font-bold text-white bg-blue-500 dark:bg-gray-900 rounded-full hover:bg-blue-700 dark:hover:bg-gray-600 focus:outline-none focus:shadow-outline"
			    	      			type="submit"
                        name="btnUpdateUser"
			    	      		>
			    	      			Update Student
			    	      		</button>
			    	      	</div>
			    	      </form>
                <?php else: ?>  
                    <h1>User is not set. Try again.</h1>
                <?php endif; ?> 
			        </div>
            </div>
          </div>
        </div>
        <!-- ./Add Student -->
      </div>
    </div>
  </div>    
  <?php include('components/footer-scripts.php'); ?>  
</body>
</html>
