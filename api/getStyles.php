<?
	include('config/connect.php');
	
	$result = mysqli_query($connection_link,"select Nomenclature_Id as id, ParentNomenclature_Id as parent, Name_ru as name 
	from Taxon") or die(mysqli_error);
	$index = 0;
	while ($row = $result->fetch_assoc()) {
        $array[] = $row;
    }
    echo json_encode($array);
?>
