<?php
session_start();
include("db.php");
include("func.php");

$user_data = check_login($connect);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];

    if (!empty($pseudo) && !empty($mdp)) {
        $query = "SELECT * FROM `users` WHERE `pseudo` = '$pseudo' LIMIT 1";
		$result = mysqli_query($connect,$query);
        if($result)
		{
			if ($result && mysqli_num_rows($result) > 0) {

				$user_data = mysqli_fetch_assoc($result);

				if ($user_data['mdp'] == $mdp && $user_data['pseudo'] == $pseudo) {
					$_SESSION['id_user'] = $user_data['id_user'];
					header("Location: ./espaceadmin.html");
					
				}
				

			}
		}
    }
    if (empty($pseudo) || empty($mdp)) {
		echo'<script>alert("missing something");
		window.location.href="login.html"
		</script>';
		
	}
}


?>