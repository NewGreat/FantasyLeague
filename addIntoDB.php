<?php
ob_start();
session_start();
require('connect.inc.php');

echo $team_name=$_POST['team_name'];			//team name
echo $total_spent=$_POST['total_spent_send'];	//spent
echo $team_composition=$_POST['composition_send'];	//team_composition
echo $player_ids[]=$_POST['selected_player_id'];	//player ids

$p=implode(" ", $player_ids);

$player_id=explode(" ",$p);//players ids

$uid=$_SESSION['user_id'];

$query="INSERT into `team` values ('','".$team_name."','".$team_composition."',$total_spent,$uid,".$player_id[0].",".$player_id[1].",".$player_id[2].",".$player_id[3].",".$player_id[4].",".$player_id[5].",".$player_id[6].",".$player_id[7].")";
	
	if($query_run=mysql_query($query))
	{
		echo 'inserted';
	}
?>
<script type="text/javascript">
	alert("Team created successfully");
</script>
<?php
	header('location:home.php');
?>