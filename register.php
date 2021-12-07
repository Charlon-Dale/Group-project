<?php
    include('includes/functions.php');
    if(isset($_POST['btnRegister'])):
        $Firstname = $_POST['firstname'];
        $LastName = $_POST['lastname'];
        $Birthday = $_POST['birthday'];
        $Course = $_POST['course'];
        $Email = $_POST['email'];
        $Username = $_POST['username'];
        $Password = $_POST['password'];
        createUser($Firstname, $LastName, $Birthday, $Course, $Email, $Username, $Password);
    endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <?php include('theme/header-scripts.php'); ?>
</head>
<body class="font-mono bg-blue-300">
    <?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['message']['type']; ?>" role="alert">
            <?php echo $_SESSION['message']['msg']; ?>
        </div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?> 
	<div class="container mx-auto">
		<div class="flex justify-center px-6 my-12">
			<!-- Row -->
			<div class="w-full xl:w-3/4 lg:w-11/12 flex">
				<!-- Col -->
				<div
					class="w-full h-auto bg-blue-400 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
					style="background-image: url(images/rtu.jpg)"
				></div>
				<!-- Col -->
				<div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
					<h3 class="pt-4 text-2xl text-center">Create an Account!</h3>
					<form class="px-8 pt-6 pb-8 mb-4 bg-white rounded register" method="post">
						<div class="mb-4 md:flex md:justify-between">
							<div class="mb-4 md:mr-2 md:mb-0">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
									First Name
								</label>
								<input
									class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
									id="firstName"
                                    name="firstname"
									type="text"
									placeholder="First Name"
								/>
							</div>
							<div class="md:ml-2">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="lastName">
									Last Name
								</label>
								<input
									class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
									id="lastName"
									name="lastname"
									type="text"
									placeholder="Last Name"
								/>
							</div>
						</div>
						<div class="mb-4 md:flex md:justify-between">
							<div class="mb-4 md:mr-2 md:mb-0">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="birthday">
									Birthday
								</label>
								<input
									class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
									id="birthday"
                                       name="birthday"
									type="date"	
								/>
							</div>
							<div class="md:ml-2">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="email">
									Email
								</label>
								<input
									class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
									id="email"
									name="email"
									type="email"
									placeholder="Email"
								/>
							</div>
						</div>
                        <div class="mb-4">
							<label class="block mb-2 text-sm font-bold text-gray-700" for="course">
                                Course
							</label>
							<input
								class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
								id="course"
								name="course"
								type="text"
								placeholder="Course"
							/>
						</div>
                        <div class="mb-4">
							<label class="block mb-2 text-sm font-bold text-gray-700" for="username">
								Username
							</label>
							<input
								class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
								id="username"
								name="username"
								type="text"
								placeholder="Username"
							/>
						</div>
						<div class="mb-4">
							<label class="block mb-2 text-sm font-bold text-gray-700" for="password">
								Password
							</label>
							<input
								class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
								id="password"
								name="password"
								type="password"
								placeholder="Password"
							/>
						</div>
						<div class="mb-6 text-center">
							<button
								class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
								type="submit"
                                name="btnRegister"
							>
								Register Account
							</button>
						</div>
						<hr class="mb-6 border-t" />
						<div class="text-center">
							<a
								class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
								href="login.php"
							>
								Already have an account? Login!
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
    <?php include('theme/footer-scripts.php'); ?>
</body>
</html>