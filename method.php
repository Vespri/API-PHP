<?php
require_once "koneksi.php";
class API
{

	public  function get_mahasiswas()
	{
		global $db_connect;
		$query="SELECT * FROM mahasiswa";
		$data=array();
		$result=$db_connect->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'status' => 1,
							'message' =>'Success.',
							'data' => $data
						);
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function get_mahasiswa($id=0)
	{
		global $db_connect;
		$query="SELECT * FROM mahasiswa";
		if($id != 0)
		{
			$query.=" WHERE id=".$id." LIMIT 1";
		}
		$data=array();
		$result=$db_connect->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
        if($data)
		{
		$response=array(
							'status' => 1,
							'message' =>'Success.',
							'data' => $data
						);
		}else {
		$response=array(
							'status' => 0,
							'message' =>'Data Not Found.',
							'data' => $data
						);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
		 
	}

	public function insert_mahasiswa()
		{
			global $db_connect;
			$array = array('nim' => '', 'nama' => '', 'no_hp' => '', 'alamat' => '', 'jurusan'   => '');
			$count = count(array_intersect_key($_POST, $array));
			if($count == count($array)){
			
					$result = mysqli_query($db_connect, "INSERT INTO mahasiswa SET
					nim = '$_POST[nim]',
					nama = '$_POST[nama]',
					no_hp = '$_POST[no_hp]',
					alamat = '$_POST[alamat]',
					jurusan = '$_POST[jurusan]'");
					
					if($result)
					{
						$response=array(
							'status' => 1,
							'message' =>'Success.'
						);
					}
					else
					{
						$response=array(
							'status' => 0,
							'message' =>'Failed.'
						);
					}
			}else{
				$response=array(
							'status' => 0,
							'message' =>'Parameter Do Not Match'
						);
			}
			header('Content-Type: application/json');
			echo json_encode($response);
		}

	public function update_mahasiswa($id)
		{
			global $db_connect;
			$array = array('nim' => '', 'nama' => '', 'no_hp' => '', 'alamat' => '', 'jurusan'   => '');
			$count = count(array_intersect_key($_POST, $array));
			if($count == count($array)){
			
		        $result = mysqli_query($db_connect, "UPDATE mahasiswa SET
		        nim = '$_POST[nim]',
		        nama = '$_POST[nama]',
		        no_hp = '$_POST[no_hp]',
		        alamat = '$_POST[alamat]',
		        jurusan = '$_POST[jurusan]'
		        WHERE id='$id'");
		   
				if($result)
				{
					$response=array(
						'status' => 1,
						'message' =>'Success.'
					);
				}
				else
				{
					$response=array(
						'status' => 0,
						'message' =>'Failed.'
					);
				}
			}else{
				$response=array(
							'status' => 0,
							'message' =>'Parameter Do Not Match'
						);
			}
			header('Content-Type: application/json');
			echo json_encode($response);
		}

	public function delete_mahasiswa($id)
	{
		global $db_connect;
		$query="DELETE FROM mahasiswa WHERE id=".$id;
		if(mysqli_query($db_connect, $query))
		{
			$response=array(
				'status' => 1,
				'message' =>'Success.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'message' =>'Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
}

 ?>
