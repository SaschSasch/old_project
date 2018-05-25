<?
	include('config/connect.php');

    $id = $_GET['id'];
	
	function mysqli_last_result($connection_link) {
		while (mysqli_more_results($connection_link)) {
			mysqli_use_result($connection_link); 
			mysqli_next_result($connection_link);
		}
		return mysqli_store_result($connection_link);
	}
	
	mysqli_query($connection_link, "set @cnt = (select count(*) from DPr.Keyk)");
	$result = mysqli_query($connection_link,"
		select Key_Id as 'id', ParentKey_Id as 'parent', Name_ru as 'name' 
		from Keyk where Key_Id in (select Key_Id from Key_Value where KeyValue_Id in
		(select KeyValue_Id from Taxon_Value where Nomenclature_Id = ".$id."))
		union 
		SELECT KeyValue_Id + @cnt as 'id', Key_Id as 'parent', Value_ru as 'name' from Key_Value where
		KeyValue_Id in (select KeyValue_Id from Taxon_Value where Nomenclature_Id = ".$id.")"
	) or die(mysqli_error($connection_link));
	$array = array();
    while ($row = $result->fetch_assoc()) {
        $array[] = $row;
	}
	
    echo json_encode($array);
?>