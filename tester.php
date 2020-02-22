<?php
    $conn = mysqli_connect('localhost', 'root', '', 'tester');
    if(!$conn){
        echo "Error occured while connecting to database " . mysqli_connect_error();
    }
    ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Tester</title>
</head>
<body>
<form action="" name="">
    <table>
        <thead>
            <h1>TESTER</h1>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input type="text" name="move1">
                    <input type="submit" name="character1">
                </td>
                <td>
                    <input type="text" name="move2">
                    <input type="submit" name="character">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="move3">
                    <input type="submit" name="character3">
                </td>
                <td>
                    <input type="hidden" name="move4">
                    <input type="submit" name="characte4">
                </td>
            </tr>
        </tbody>
    </table>
</form>
</body>

<?php
    if(isset($_POST['character'])){

    }
?>

<style>
    body{
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        text-align: center;
    }
    table{
    }
    table thead{
        alignment: center;
        text-align: center;
    }
    table tbody{

    }
    table tbody tr{
        color: white;
    }
    table tbody tr td{
    }
    table tbody tr td input{

    }
</style>
</html>
