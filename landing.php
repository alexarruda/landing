<?php	
	$msg = "";

	if ((isset($_POST['mail']))&&(!empty($_POST['mail']))){
		
		$conec = mysqli_connect("localhost", "root", "", "landing") or die("Erro na conexão com banco de dados " . mysqli_error($conexao));
	
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$mail = $_POST['mail'];
		$state = $_POST['state'];
		$city = $_POST['city'];
		$date = $_POST['date'];
		$plataforma = $_POST['plataforma'];

		//var_dump($date);exit();
	
		$sql = "INSERT INTO lead (lead_id,lead_name,lead_phone,lead_mail,lead_uf,lead_city,lead_date,lead_plataforma) VALUES (null,'$name','$phone','$mail','$state','$city','$date','$plataforma')";

		$insert_member_res = mysqli_query($conec, $sql);

		if(mysqli_affected_rows($conec) > 0){ 
			$msg = "Seu cadastro foi realizado com sucesso!";
		} else {
			$msg = "Erro, não foi possível realizado seu cadastro. Tente Mais Tarde!";
		}
		mysqli_close($conec); 
	}else{
		$msg = "Por favor, preencha os dados";
	}
	
	echo $msg;
?>