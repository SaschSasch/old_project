<?
	include('config/connect.php');

    $id = $_GET['id'];

	mysqli_query($connection_link, "set @p = (select ParentNomenclature_Id from Taxon where Nomenclature_Id = ".$id.")");
	$result = mysqli_query($connection_link, "select Nomenclature_Id as id, ParentNomenclature_Id as parent, Name_ru as name 
		from Taxon where Nomenclature_Id in (".$id.", @p) or ParentNomenclature_Id in (".$id.", @p)")
		or die(mysqli_error($connection_link));
	$array = array();
    while ($row = $result->fetch_assoc()) {
        $array[] = $row;
    }
    echo json_encode($array);
?>
