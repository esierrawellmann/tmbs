<?php
	require_once '../../models/Vale.php';	
	require_once '../../models/Usuario.php';	 
	$request_body = file_get_contents('php://input');
	$request = json_decode($request_body);
	$data = get_object_vars($request);
	switch ($data['action']) {

	    case "insert":
	    	if(isset($data['vale'])){
	    		$vale = new Vale();
		     	$objVale = $vale ->newProducto($data['vale']);
		     	$result = $objVale[0];
		     	echo json_encode($result);

		     }
	        break;
	    case "query":
		        $vale = new Vale();
		        $objVale= $vale ->getVales();

		       	$usuario = new Usuario();
		       	$objUsuario = $usuario ->getUsers();

		        echo '{"vales":'.json_encode($objVale).',"usuarios":'.json_encode($objUsuario).'}';
	    	break;
	    case "update":
	        if(isset($data['vale'])){
	        	$vale = new Vale();
	        	$updatedVale = get_object_vars($data['vale']);
	        	$objvale = $vale ->updateVale($updatedVale);
	        	echo json_encode($objvale);
	        }
	        break;
	    case "delete":
		    if(isset($data['producto'])){
		    	$vale = new Vale();
	        	$updatedVale = get_object_vars($data['vale']);
	        	$objvale = $vale ->deleteVale($updatedVale['id_vale']);
	        	echo json_encode($objvale);
		    }
		        break;
	}
?>
