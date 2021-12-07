<?php if(isset($_SESSION['message'])): ?>
	<div class="w-full py-3  px-10 ">
		<div class="
			alert py-3 px-5 mb-4 bg-green-100 text-green-900 text-sm rounded-md border border-green-200" role="alert">
    	   <strong><?php echo $_SESSION['message']['msg']; ?></strong>
    	</div>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>
