<?php

    include('includes/functions.php');

    if(isset($_POST['btnLogin'])):
        $Username = $_POST['username'];
        $Password = $_POST['password'];
        doLogin($Username, $Password);
    endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <?php include('theme/header-scripts.php'); ?>
</head>
<body class="font-mono bg-blue-300">
    <?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['message']['type']; ?>" role="alert">
            <?php echo $_SESSION['message']['msg']; ?>
        </div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?> 
	<!-- Container -->
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
					<h3 class="pt-4 text-2xl text-center">Welcome back!</h3>
					<form class="px-8 pt-6 pb-8 mb-4 bg-white rounded login" method="post">
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
								autocomplete="off"
							/>
						</div>
						<div class="mb-4">
							<label class="block mb-2 text-sm font-bold text-gray-700" for="username">
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
                                name="btnLogin"
							>
								Login
							</button>
						</div>
						<hr class="mb-6 border-t" />
						<div class="text-center">
							<a
								class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
								href="register.php"
							>
								Don't have an account? Register!
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
