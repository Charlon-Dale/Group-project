<?php if(isset($_SESSION['message'])): ?>
	<div class="w-full py-3  px-10 ">
		<div class="
			alert py-3 px-5 mb-4 bg-<?php echo $_SESSION['message']['type']; ?>-100 text-<?php echo $_SESSION['message']['type']; ?>-900 text-sm rounded-md border border-<?php echo $_SESSION['message']['type']; ?>-200" role="alert">
    	   <strong><?php echo $_SESSION['message']['msg']; ?></strong>
    	</div>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>
