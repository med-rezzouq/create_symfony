<?php





//$request->query->get('name','world');  //va recuperer le get name si nexiste pas elle va creer un avec valeur world


$name = isset($_GET['name']) ? $_GET['name'] : 'World';

?>

hello <?= htmlspecialchars($name, ENT_QUOTES) ?>