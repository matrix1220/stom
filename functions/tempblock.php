<?
function tempblock($block,$temp=null) {
	func("template/modules/$block.php",ob_get_clean(),$temp);
}
?>