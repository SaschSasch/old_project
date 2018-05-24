<?
	include('php/config/connect.php');
	$result = mysqli_query($connection_link,"SELECT Nomenclature_Id, Name_ru, Description FROM Taxon") or die(mysqli_error);
	$index = 0;
	while ($row = $result->fetch_assoc()) {
        $array[] = $row;
    }
    echo json_encode($array);
?>
