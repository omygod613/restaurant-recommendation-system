<?php 
	$link =	mysqli_connect("oniddb.cws.oregonstate.edu","hezhi-db", "J3NL61BXyBFGtxBV", "hezhi-db");
	if(!$link){
		echo "Cannot be connected!";
		exit;
	}

    //if($_POST["submit"]){
    if($_GET){
        $RestaurantName = $_GET["RestaurantName"];
        $query1 = "SELECT `Name`, `City`, `State`, `Country`, `Address`, `Total Review`, `dataset` FROM `Tripadvisor` WHERE `Name` LIKE '%$RestaurantName%' LIMIT 0 , 30";
        $query2 = "SELECT `Restaurant Name`, `City`,`Country Code`,`Address`,`Aggregate rating`, `dataset`FROM `zomato` WHERE `Restaurant Name` Like '%$RestaurantName%' LIMIT 0 , 30";
        $query3 = "SELECT `store_name`, `store_city`, `store_state`, `store_address`, `store_stars`, `dataset` FROM `yelp_business` WHERE `store_name` LIKE '%$RestaurantName%' LIMIT 0 , 30";
       //$query4 = "SELECT `Name`, `City`, `State`, `Country`, `Address`, `Total Review`, `dataset` FROM `Tripadvisor` WHERE `Restaurant ID` IN (SELECT `tripid` FROM `nameindex` WHERE `name` LIKE '%$RestaurantName%')";
       //$query5 = "SELECT `Restaurant Name`, `City`,`Country Code`,`Address`,`Aggregate rating`, `dataset` FROM `zomato` WHERE `Restaurant ID` IN (SELECT `zomatoid` FROM `nameindex` WHERE `name` LIKE '%$RestaurantName%')";
       //$query6 = "SELECT `store_name`, `store_city`, `store_state`, `store_address`, `store_stars`, `dataset` FROM `yelp_business` WHERE `Restaurant ID` IN (SELECT `yelpid` FROM `nameindex` WHERE `name` LIKE '%$RestaurantName%')";
        //print_r($query1);
        $query4 = "SELECT `tripid`,`zomatoid`, `yelpid` FROM `nameindex` WHERE `name` LIKE '%$RestaurantName%'";
        $data1 = mysqli_query($link, $query1); 
        $data2 = mysqli_query($link, $query2); 
        $data3 = mysqli_query($link, $query3); 
        $data4 = mysqli_query($link, $query4);
        //$data5 = mysqli_query($link, $query5);
        //$data6 = mysqli_query($link, $query6);

        //print_r(mysqli_num_rows($data1) == 0);
        if (mysqli_num_rows($data1) == 0 && mysqli_num_rows($data2) == 0 && mysqli_num_rows($data3) == 0)
        {
            echo "Not found";
            exit;
        }
    }
    //}
?>
<table width="700" border="1" align="center">
   <tr>
    <td >Restaurant Name</td>
    <td >City</td>
    <td >State</td>
    <td >Country</td>
    <td >Address</td>
    <td >Rates</td>
    <td >Source</td>
  </tr>

<?php
  for($i=1;$i<=mysqli_num_rows($data4);$i++){
$rs=mysqli_fetch_row($data4);
$name1 = $rs[0];
$query5 = "SELECT `Name`, `City`, `State`, `Country`, `Address`, `Total Review`, `dataset` FROM `Tripadvisor` WHERE `Restaurant ID` = $name1";
$data5 = mysqli_query($link, $query5);
for($j=1;$j<=mysqli_num_rows($data5);$j++){
$rs1=mysqli_fetch_row($data5);
?>
  <tr>
    <td><?php echo $rs1[0]?></td>
    <td><?php echo $rs1[1]?></td>
    <td><?php echo $rs1[2]?></td>
    <td><?php echo $rs1[3]?></td>
    <td><?php echo $rs1[4]?></td>
    <td><?php echo $rs1[5]?></td>
    <td><?php echo $rs1[6]?></td>
  </tr>
<?php
}
$name2 = $rs[1];
$query6 = "SELECT `Restaurant Name`, `City`,`Country Code`,`Address`,`Aggregate rating`, `dataset` FROM `zomato` WHERE `Restaurant ID` = $name2";
$data6 = mysqli_query($link, $query6);
for($j=1;$j<=mysqli_num_rows($data6);$j++){
$rs2=mysqli_fetch_row($data6);
?>
  <tr>
    <td><?php echo $rs2[0]?></td>
    <td><?php echo $rs2[1]?></td>
    <td><?php echo ""?></td>
    <td><?php echo $rs2[2]?></td>
    <td><?php echo $rs2[3]?></td>
    <td><?php echo $rs2[4]?></td>
    <td><?php echo $rs2[5]?></td>
  </tr>
<?php
}
$name3 = $rs[2];
$query7 = "SELECT `store_name`, `store_city`, `store_state`, `store_address`, `store_stars`, `dataset` FROM `yelp_business` WHERE `Restaurant ID` = $name3";
$data7 = mysqli_query($link, $query7);
for($j=1;$j<=mysqli_num_rows($data7);$j++){
$rs3=mysqli_fetch_row($data7);
?>
  <tr>
    <td><?php echo $rs3[0]?></td>
    <td><?php echo $rs3[1]?></td>
    <td><?php echo $rs3[2]?></td>
    <td><?php echo ""?></td>
    <td><?php echo $rs3[3]?></td>
    <td><?php echo $rs3[4]?></td>
    <td><?php echo $rs3[5]?></td>
  </tr>
<?php
}
}
?>

<?php
  for($i=1;$i<=mysqli_num_rows($data1);$i++){
$rs=mysqli_fetch_row($data1);
?>
  <tr>
    <td><?php echo $rs[0]?></td>
    <td><?php echo $rs[1]?></td>
    <td><?php echo $rs[2]?></td>
    <td><?php echo $rs[3]?></td>
    <td><?php echo $rs[4]?></td>
    <td><?php echo $rs[5]?></td>
    <td><?php echo $rs[6]?></td>
  </tr>
  
<?php
}
?>

<?php
  for($i=1;$i<=mysqli_num_rows($data2);$i++){
$rs=mysqli_fetch_row($data2);
?>
  <tr>
    <td><?php echo $rs[0]?></td>
    <td><?php echo $rs[1]?></td>
    <td><?php echo " "?></td>
    <td><?php echo $rs[2]?></td>
    <td><?php echo $rs[3]?></td>
    <td><?php echo $rs[4]?></td>
    <td><?php echo $rs[5]?></td>
  </tr>
  
<?php
}
?>

<?php
  for($i=1;$i<=mysqli_num_rows($data3);$i++){
$rs=mysqli_fetch_row($data3);
?>
  <tr>
    <td><?php echo $rs[0]?></td>
    <td><?php echo $rs[1]?></td>
    <td><?php echo $rs[2]?></td>
    <td><?php echo " "?></td>
    <td><?php echo $rs[3]?></td>
    <td><?php echo $rs[4]?></td>
    <td><?php echo $rs[5]?></td>
  </tr>
  
<?php
}
?>