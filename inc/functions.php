<?php  




function getProducts($i){

    global $conn;	
	$data= array();
	if ($i === 'all') {
		$q = "SELECT * FROM products ORDER BY `name` ASC";
	}else{
		$q = "SELECT * FROM products WHERE category = '".$i."' ORDER BY `name` ASC";		
	}
	$query = $conn->query($q);
	if($query->num_rows>0){
		while ($r=$query->fetch_array()) {
			$data[]=$r;
		}
	}
	return $data;
}


function getCategories(){
    global $conn;	
	$data= array();
	$query = $conn->query("SELECT * FROM categories WHERE active = 'yes' ORDER BY `name` ASC");
	if($query->num_rows>0){
		while ($r=$query->fetch_array()) {
			$data[]=$r;
		}
	}
	return $data;	
}

function getCategories_Admin(){
    global $conn;	
	$data= array();
	$query = $conn->query("SELECT * FROM categories ORDER BY `name` ASC");
	if($query->num_rows>0){
		while ($r=$query->fetch_array()) {
			$data[]=$r;
		}
	}
	return $data;	
}




function getOrdersByDate($i){

    global $conn;	
	$data= array();
	$q = "SELECT * FROM orders WHERE `date`  LIKE '%".$i."%' ORDER BY `date` DESC";		

	$query = $conn->query($q);
	if($query->num_rows>0){
		while ($r=$query->fetch_array()) {
			$data[]=$r;
		}
	}
	return $data;
}



function getUsers(){

    global $conn;	
	$data= array();
	$q = "SELECT * FROM users";		

	$query = $conn->query($q);
	if($query->num_rows>0){
		while ($r=$query->fetch_array()) {
			$data[]=$r;
		}
	}
	return $data;
}



function getTables($sector){
    global $conn;	
	$data= array();
	$query = $conn->query("SELECT * FROM tables WHERE sector = '".$sector."' ORDER BY `number` ASC");
	if($query->num_rows>0){
		while ($r=$query->fetch_array()) {
			$data[]=$r;
		}
	}
	return $data;	
}


function mod($i){
	return include './modules/'.$i.'.php';
}


function options($i){
    global $conn;	
	$data= NULL;
	$query = $conn->query("SELECT * FROM options WHERE option_name = '".$i."'");
	if($query->num_rows>0){
		while ($r=$query->fetch_array()) {
			$data=$r['option_value'];
		}
	}
	return $data;
}





function page($i){
    global $conn;	
	$data= array();
	$query = $conn->query("SELECT * FROM pages WHERE page_name = '".$i."'");
	if($query->num_rows>0){
		while ($r=$query->fetch_array()) {
			$data[]=$r;
		}
	}
	return $data;
}





function sale_by_User($i){
    global $conn;
	$id = explode("_", $i);
	$data= array();
	$query = $conn->query("SELECT * FROM sales WHERE sale_uid = '".$id[0]."'");
	if($query->num_rows>0){
		while ($r=$query->fetch_array()) {
			$data[]=$r;
		}
	}
	return $data;
}
function click_update($id){
    global $conn;
	$query = $conn->query("UPDATE sales SET sale_clicks = sale_clicks +1 WHERE id = '".$id."'");
}


function profile($i){
    global $conn;	
	$data= array();
	$query = $conn->query("SELECT * FROM users WHERE ID = '".$i."'");
	if($query->num_rows>0){
		while ($r=$query->fetch_array()) {
			$data[]=$r;
		}
	}
	return $data;
}

function urlFriendly($var, $t, $t2){
	$text = str_replace(" ", "_", $t);
	$text = strtolower($text);
	if ($t2) {
		$text2 = $t2.'_';
	}else{
		$text2 = '';		
	}
	return './product/'.$text2.$text;
}


 function url_parser($url) {
    
  // Pasamos a minúsculas
  $url = strtolower($url);

  // Reemplazamos caracteres latinos (tildes y eñes)
  $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
  $replace = array('a', 'e', 'i', 'o', 'u', 'n');
  $url = str_replace ($find, $replace, $url);
  
  // Añadimos guiones
  $find = array(' ', '&', '\r\n', '\n', '+'); 
  $url = str_replace ($find, '-', $url);
  
  // Reemplazamos resto de caracteres distintos de letras y números
  $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
  $replace = array('', '-', '');
  $url = preg_replace ($find, $replace, $url);
  
  return $url;
 }




function breadcrumb_categories($id){
    global $conn;	
	$query = $conn->query("SELECT * FROM categories WHERE ID = $id ");
	while ($r = $query->fetch_assoc()) {
		breadcrumb_subcategories($r['parent']);
		echo'<li class="breadcrumb-item"><a class="text-dark" href="'.urlFriendly('categorie', $r['title'],null).'">'.$r['title'].'</a></li>';
	}
}
function breadcrumb_subcategories($parent){
    global $conn;	
    $query = $conn->query("SELECT * FROM categories WHERE ID = $parent ");
	while ($r = $query->fetch_assoc()) {
		echo'<li class="breadcrumb-item"><a class="text-dark" href="'.urlFriendly('categorie', $r['title'],null).'">'.$r['title'].'</a></li>';
	}	
}


function search($i){
    global $conn;	
	$data= array();
	$query = $conn->query("SELECT * 
		FROM categories
		INNER JOIN sales ON sales.sale_categorie = categories.ID
		WHERE (sales.sale_title LIKE '%".$i."%' OR  sales.sale_description LIKE '%".$i."%' OR  categories.keywords LIKE '%".$i."%' OR  categories.title LIKE '%".$i."%') ");
	if($query->num_rows>0){
		while ($r=$query->fetch_array()) {
			$data[]=$r;
		}
	}
	return $data;
}





function getClients(){

    global $conn;	
	$data= array();
	$q = "SELECT * FROM clients";		

	$query = $conn->query($q);
	if($query->num_rows>0){
		while ($r=$query->fetch_array()) {
			$data[]=$r;
		}
	}
	return $data;
}




function logout(){
	session_start();
	$_SESSION = array();
	session_destroy();
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit;
}


function rating_stars($i){
return '
  <ul class="rating-stars">
    <li style="width:'.$i.'%" class="stars-active"> 
      <i class="fa fa-star"></i> 
      <i class="fa fa-star"></i> 
      <i class="fa fa-star"></i> 
      <i class="fa fa-star"></i> 
      <i class="fa fa-star"></i> 
    </li>
    <li>
      <i class="fa fa-star"></i> 
      <i class="fa fa-star"></i> 
      <i class="fa fa-star"></i> 
      <i class="fa fa-star"></i> 
      <i class="fa fa-star"></i> 
    </li>
  </ul>';

}




function removeqsvar($url, $varname) {
    return preg_replace('/([?&])'.$varname.'=[^&]+(&|$)/','',$url);
}


?>