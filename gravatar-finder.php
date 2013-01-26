<?php
class myGrav {

	public $email,
		   $explodes,
		   $data;
	
	public function __construct(){
	}
	
	public function setHash(){
		$this->email = $_POST['emails'];
		$this->explodes = explode(";", $this->email);
		
		return $this->explodes;
	}
	
	public function getGrav(){
		return $this->setHash();
	}
}
$hash = new myGrav();
?>

<h1>Gravatar Finder</h1>
<p>This tool searches a list of emails and builds gravatars for each email address. You can evaluate your use of gravatar into your web app.</p>
<p>Enter in a few email addresses below be sure to seperate each email address with the semi-colon ;</p>
<p>jeremy@gmail.com;kellan@gmail.com;bob@gmail.com</p>
<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
	<textarea name="emails" style="width: 500px; min-height: 100px"></textarea><br />
	<input type="submit" value="Find Gravatars" />
</form>
<style>
	.gravatars {
		margin-bottom: 10px;
		border-bottom: 1px dotted #444;
	}

	.gravatars img {
		vertical-align: middle;
		margin-right: 10px;
	}
</style>

<?php if(isset($_POST['emails'])): ?>
	
	<?php $arrNames = $hash->getGrav(); ?>
	<?php foreach($arrNames as $name): ?>
		<?php $gravatar = md5(strtolower($name)); ?>
		<div class="gravatars"><img src="http://www.gravatar.com/avatar/<?= $gravatar; ?>" /><?= $name; ?></div>
	<?php endforeach; ?>
	
<?php endif; ?>


