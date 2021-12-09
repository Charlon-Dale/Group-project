<?php if(isset($_SESSION['message'])): ?>
    <!-- Dialog (full screen) -->
    <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);">

      <!-- A basic modal dialog with title, body and one button to close -->
      <div class="h-auto p-4 mx-2 text-left bg-<?php echo $_SESSION['message']['type']; ?>-100  text-<?php echo $_SESSION['message']['type']; ?>-900 border border-<?php echo $_SESSION['message']['type']; ?>-200 rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0" role="alert">
        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
          <div class="mt-2">
            <strong><?php echo $_SESSION['message']['msg']; ?></strong>
        </div>
      </div>

      <!-- One big close button.  --->
      <div class="mt-5 sm:mt-6">
        <span class="flex w-full rounded-md shadow-sm text-center">
          <a
			class="w-full px-4 py-2 font-bold text-white bg-blue-500 dark:bg-gray-900 rounded-full hover:bg-blue-700 dark:hover:bg-gray-600 focus:outline-none focus:shadow-outline"
			href="index.php"
		  >
           Go back to Dashboard
          </a>
        </span>
      </div>
     </div>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>
