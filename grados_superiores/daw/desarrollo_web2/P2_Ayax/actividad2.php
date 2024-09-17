<?php
  sleep(3);
  switch ($_POST['app']){
    case '+':
        echo $_POST['n1']+$_POST['n2'];
        break;
    case '-':
        echo $_POST['n1']-$_POST['n2'];
       break;
    case '/':
        echo $_POST['n1']/$_POST['n2'];
        break;
    case '*':
        echo $_POST['n1']*$_POST['n2'];
        break;
      }
?>
