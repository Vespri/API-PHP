<?php
require_once "method.php";
$mahasiswa = new API();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
	case 'GET':
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				$mahasiswa->get_mahasiswa($id);
			}
			else
			{
				$mahasiswa->get_mahasiswas();
			}
			break;
	case 'POST':
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				$mahasiswa->update_mahasiswa($id);
			}
			else
			{
				$mahasiswa->insert_mahasiswa();
			}		
			break; 
	case 'DELETE':
		    $id=intval($_GET["id"]);
            $mahasiswa->delete_mahasiswa($id);
            break;
	default:
		// Invalid Request Method
			header("The 405 Method Not Allowed");
			break;
		break;
}

?>
