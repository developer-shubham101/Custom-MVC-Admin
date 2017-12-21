 
<div class="container">
	<div class="card-panel z-depth-5">
	<pre>
<?php 
print_r(Help::getUserDetails()); 
echo "<br/>";
print_r(Help::getUserType()); 
echo "<br/>";
print_r(Help::isAdminLogedin()); 
echo "<br/>";
print_r(Help::getUserId()); 
?>
</pre>
	</div>
</div>