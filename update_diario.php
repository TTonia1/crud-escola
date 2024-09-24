<?php
    include 'db.php';

    $id_diario = $_GET['id_diario'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id_diario = $_POST['id_diario'];
        $hora_aula = $_POST['hora_aula'];
        $turma = $_POST['turma'];

        $sql = "UPDATE diario SET hora_aula='$hora_aula', turma='$turma' WHERE id_diario= '$id_diario'";

        if ($conn->query($sql) === TRUE) {
            echo "Registro atualizado com sucesso";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
        $conn ->close();
        header ("Location: read.php");
        exit();
    }
    $sql = "SELECT * FROM diario WHERE id_diario='$id_diario'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update Diario</title>
</head>
<body>
    <form method="POST" action=" update_diario.php?id=<?php echo $row['id_diario'];?>">
        <label for="hora_aula">Hora Aula</label>
        <input type="text" name="hora_aula" value="<?php echo $row['hora_aula']; ?>" required>
        <label for="turma">Tipo Sala</label>
        <input type="text" name="turma" value="<?php echo $row['turma']; ?>" required>
        <input type="submit" value="Atualizar">
    </form>

</body>
</html>