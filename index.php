<?php
    require_once "./connection/Connection.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordenação</title>
</head>
<body>
    <?php
        if(isset($_GET['ordem']) && empty($_GET['ordem']) == false){
            $ordem = addslashes($_GET['ordem']);             
            $sql = "SELECT * FROM usuarios ORDER BY ".$ordem;
        }else{
            $ordem = "";
            $sql = "SELECT * FROM usuarios";
        }
        
        $sql = $pdo->query($sql);
    ?>
    <form method="GET">
        <select name="ordem" onchange="this.form.submit()">
            <option></option>
            <option value="nome" <?php echo ($ordem=="nome")?'selected="selected"':'';?>>Pelo Nome</option>
            <option value="idade"<?php echo ($ordem=="idade")?'selected="selected"':'';?>>Por Idade</option>
        </select>
    
    </form>
    <br><br>
    <table border="1" width="400">
        <tr>
            <th>Nome</th>
            <th>Idade</th>
        </tr>
        <?php
            
            if($sql->rowCount() > 0){
                
                foreach($sql->fetchAll() as $users){ 
                    echo "<tr>";
                        echo '<td>'.$users['nome'].'</td>';
                        echo '<td>'.$users['idade'].'</td>';
                    echo "</tr>";
                } 
            }
        
            ?>
    </table>
</body>
</html>