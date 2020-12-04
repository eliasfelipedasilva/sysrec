<?php
use App\Models\Category;

function isAdmin()
{
 	return session('admin') == true ? true : false;
}

function isClient()
{
 	return session('client') == true ? true : false;
}

function userSession()
{
 	return session('user');
}

function getCategoryList(){
	$category = Category::matchNode("Category");    
	$records = $category->getRecords();

	$categoryList = "";

	foreach ($records as $r){
		$categoryList .= "\n<li class='p-t-4'>";
		$categoryList .= "\n\t<a href=".route('produtoCategoria', $r->value('id'))." class='s-text13'>". $r->value('name') . "</a>";
		$categoryList .= "\n</li>";
	}
	return $categoryList;
}

?>