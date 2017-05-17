<?php
include("connection.php");
$stateid=$_POST['State'];

$query="Select ID,CITY FROM city_master where state=$stateid order by city";
$result=mysqli_query($link,$query);
?>
<select id="city" name="City" class="form-control">
<option value="-1">Select City</option>
<?php
while($data=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    echo "<option value=$data[ID]>$data[CITY]</option>";
}
?>
</select>


                                            