<?php
    include 'db.php';
    $id_professor = $_GET['id_professor'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id_professor = $_POST['id_professor'];
        $nome_professor = $_POST['nome_professor'];
        $data_nascimento = $_POST['data_nascimento'];
        $CPF = $_POST['CPF'];
        $materia = $_POST['materia'];


        $sql = "UPDATE professor SET nome_professor='$nome_professor', data_nascimento='$data_nascimento', CPF='$CPF', materia='$materia' WHERE id_professor= '$id_professor'";

        if ($conn->query($sql) === TRUE) {
            echo "Registro atualizado com sucesso";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
        $conn ->close();
        header ("Location: read.php");
        exit();
    }
    $sql = "SELECT * FROM professor WHERE id_professor='$id_professor'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update Professor</title>
</head>
<body>
    <form method="POST" action=" update_professor.php?id=<?php echo $row['id_professor'];?>">
        <label for="numero_sala">Hora Aula</label>
        <input type="text" name="numero_sala" value="<?php echo $row['numero_sala']; ?>" required>
        <label for="tipo_sala">Tipo Sala</label>
        <input type="text" name="tipo_sala" value="<?php echo $row['tipo_sala']; ?>" required>
        <input type="submit" value="Atualizar">
    </form>

</body>
</html>