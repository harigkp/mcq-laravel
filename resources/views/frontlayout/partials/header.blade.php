<?php 
$user =  session()->get('user');
?>

<div class="container">
<div class="row">
 <div class="col-md-10 bgtext">
	<h4>MCQ Test</h4>
 </div>
 <div class="col-md-2 bgtextlogout"><h4><?php if(isset($user['id'])){?><a href="/logout">LogOut</a><?php } ?></h4></div>
</div>
<div class="row">
 <div class="col-md-12">&nbsp;</div>
</div>
</div>