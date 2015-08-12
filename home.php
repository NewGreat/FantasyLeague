<?php

ob_start();
session_start();
require('connect.inc.php');
?>

<html>
	<head>
		<title>Fantasy League</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/style.css"/>
	</head>
	<body>

		<?php 
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
		{
			

		?>
		<div id="wrapper" class="col-lg-8 col-lg-offset-2">
			<!--Header-->
			<div id="titlebody" class="row" style="background-color:white;">
				<img style="width:100%;" class="img-responsive" src="css/banner.jpg"></img>
			</div>

			<!--Display welcome-->
			<div id="disp" class="row">
				<h4>Welcome <span class=""><?php echo $_SESSION['user_id'];?></span></h4>
			</div>
			<!--if user has already created team then just display the team details--> 
			<?php
				$query="SELECT * from `team` where u_id=".$_SESSION['user_id']."";
				$query_run=mysql_query($query);
				if(mysql_num_rows($query_run)==1)
				{
					$team_name = mysql_result($query_run,0,'t_name');
					$total_amount_spent=mysql_result($query_run,0,'t_moneyspent');
					$team_composition=mysql_result($query_run,0,'t_composition');
					$p_id1=mysql_result($query_run,0,'p_id1');
					$p_id2=mysql_result($query_run,0,'p_id2');
					$p_id3=mysql_result($query_run,0,'p_id3');
					$p_id4=mysql_result($query_run,0,'p_id4');
					$p_id5=mysql_result($query_run,0,'p_id5');
					$p_id6=mysql_result($query_run,0,'p_id6');
					$p_id7=mysql_result($query_run,0,'p_id7');
					$p_id8=mysql_result($query_run,0,'p_id8');
					
				?>
				<div id="main_body" class="row">
					<h1 style="text-align:center;">You can create only one team.</h1>
					<div class=" col-lg-offset-1 col-lg-10">
						<a style="float:right;" class="btn btn-primary" href="logout.php">Logout</a>
						<h4>Team Name: <?php echo $team_name?></h4>
						<h4>Total Amount spent: <?php echo $total_amount_spent ?></h4>
						<div class="table-responsive">
						<table class="table table-hover">
						<tr class="info">
							<td>#</td>
							<td>Name</td>
							<td>Price</td>
							<td>Role</td>
							
						</tr>
						<?php
								
								@$query="SELECT * from `player` where p_id in ($p_id1,$p_id2,$p_id3,$p_id4,$p_id5,$p_id6,$p_id7,$p_id8)";
								$query_run=mysql_query($query);
								while($row=mysql_fetch_array($query_run))
								{
									echo '<tr>';
									echo '<td>'.$row[0].'</td>';
									echo '<td>'.$row[1].'</td>';
									echo '<td>'.$row[2].'</td>';
									echo '<td>'.$row[3].'</td>';
									echo '</tr>';
								}
							
						?>	
						</table>
						</div>
					</div>
				</diV>
				
				
				
				<?php
				}
				else
				{
				?>
			<!--If user has not created team earlier-->
			<!--Welcome Name-->
			<form action="addIntoDB.php" name="Form1" method="post" id="createTeamForm" style="margin-bottom:0px !important;">
			<!--Team Name and logout functionality-->
			<div class="row" style="padding-top:5%;background-color:white;">
				<div class="col-lg-4">
				<div class="input-group">
  					<span class="input-group-addon" id="basic-addon1">Team Name:</span>
  					<input type="text" id="team_name" name="team_name" class="form-control" placeholder="India" aria-describedby="basic-addon1"/>
  					<input type="hidden" name="total_spent_send" style="display:none" value=""/><!--to pass data to form handler for inserting into database-->
				</div>
				</div>
				
				<div class="col-lg-offset-5 col-lg-1">
					<a style="float:right;" class="btn btn-primary" href="logout.php">Logout</a>
				</div>			
			</div>

			<!--Team amount and spent amount starts-->
			<div class="row" style="background-color:white">
				<div class="col-lg-4">
					<h4 style="font-weight:bolder;">Total Amount available: 100</h4>
					<h4 >Total spent: <span id="total_spent">0</span></h4>
				</div>
				
			</div>

			<!--Team Composition-->
			<div class="row" style="background-color:white">
				<!--your team composition-->
				<div class="col-lg-4">
					<h4 style="font-weight:bolder;">Your Team Composition:</h4>
					
					<table class="table table-hover">
						<tr>
							<td>Batsman</td>
							<td id="batsman" value="0">0</td>
						</tr>
						<tr>
							<td>Wicketkeeper</td>
							<td id="wicketkeeper">0</td>
						</tr>
						<tr>
							<td>Bowler</td>
							<td id="bowler">0</td>
						</tr>
						<tr>
							<td>All-Rounder</td>
							<td id="allrounder">0</td>
						</tr>
					</table>
				
				</div>
				<!--selecting  from available team composition-->
				<div class="col-lg-offset-2 col-lg-6">
					<h4 style="font-weight:bolder;">Allowed team compositions</h4>
					<h4>Select One team composition:</h4>
					<div>
						<input type="radio" class="composition" name="composition" onchange="comp()" value="0">3 batsmen, 1 wicketkeeper, 2 all rounders, 2 bowlers</br>	
						<input type="radio" class="composition" name="composition" onchange="comp()" value="1">3 batsmen, 1 wicketkeeper, 1 all rounders, 3 bowlers</br>
						<input type="radio" class="composition" name="composition" onchange="comp()" value="2">4 batsmen, 1 wicketkeeper, 1 all rounders, 2 bowlers
						</br>
						<input type="hidden" style="display:none" name="composition_send" value=""/><!--to pass data to form handler for inserting into database-->
						<button class="btn btn-primary" style="margin-top:15px;margin-bottom:10px;" onclick="return createTeam()">Create Team</button>
					</div>
				</div>
			</div>

			<!--team balance and composition left total players ends-->
			<div id="main_body" class="row">
				

				<!--selected players-->
				<div class="col-lg-6">
					<div class="table-responsive">
					<table id="selected" class="table table-hover">
					<tr class="info">
						<td>#</td>
						<td>Name</td>
						<td>Price</td>
						<td>Role</td>
						<td>Remove</td>
					</tr>

					</table>
					</div>
					<input type="hidden" name="selected_player_id" value=""/><!--to pass data to form handler for inserting into database-->
				
				</div>

				<!--Available players-->
				<div class="col-lg-6">
					<div class="table-responsive" style="height:600px;">
					<table class="table table-hover">
					<tr class="info">
					<td>#</td>
					<td>Name</td>
					<td>Price</td>
					<td>Role</td>
					<td>Add</td>
					</tr>

					<?php
						
						$query="SELECT * from `player`";

						$query_run=mysql_query($query);
	
						while($row=mysql_fetch_array($query_run))
						{
							echo "<tr>";
							echo "<td class='id'>".$row['p_id']."</td>";
							echo "<td class='name'>".$row['p_name']."</td>";
							echo "<td class='price'>".$row['p_price']."</td>";
							echo "<td class='role'>".$row['p_role']."</td>";
							echo "<td><button id='".$row['p_id']."' class='add btn btn-primary'>Add</button></td>";
							echo "</tr>";
						}
					?>
					</table>
					</div>
				</div>

				
			</div>

			</form>
			<!--selected player and database retrieved-->
			<?php
				}
				?>
		<div id="footer" class="row">
			<div class="col-lg-12">
			<h4 style="float:left;color:white;overflow:hidden;">IPL Fantasy league</h4>
			<h6 style="float:right;color:white;overflow:hidden;">Developed by: Nandish Kotadia</h6>
			</div>
		</div>

	</div><!--wrapper ends-->
		<?php
		}
		else
		{
			echo "<h1>Hello dont try . Please login and come.</h1>";
		}
		?>

		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript">
			//create team
			var total_players=0;	//total players selected
			var total_price=100;	//total amount given
			var current_total_price=0;	//total price spent 
			
			var selected=[];		//currently selected players id
			var index=0;			//index in selected
			var flag=0;				//player id already present or not in selected
			var batsman_count=0;	//total batsman selected
			var wicketkeeper_count=0;	//toatl wicketkeeper selected
			var bowler_count=0;		//total bowler selected
			var allrounder_count=0;	//total allrounder selected
			var allowed_compositions=[[3,1,2,2],[3,1,1,3],[4,1,1,2]]; //allowed composition database it can be scalled[batsman,wicketkeepr,allrounder,bowler]
			var cookie=[];		//to restore previously selected after refresh

			var current_id,current_name,current_price,current_role;	//current player details to be added to selected OR to remove from selected
			

			//on refresh persist the database

			//composition persist
			function comp()
			{
			localStorage["radio_comp"]=$('input[name=composition]:checked').val();
			//alert(localStorage.getItem("radio_comp"));
			}
			
			if(typeof localStorage["datas"]!=='undefined')
			{
			 cookie=JSON.parse(localStorage["datas"]);
			}
			for(var i=0;i<cookie.length;i++)
			{
				
				current_id=cookie[i];
				if(current_id!=0)
				{
				 	current_name=$("button.add").filter("#"+current_id).parent().parent().find('.name').text();
				 	current_price=$("button.add").filter("#"+current_id).parent().parent().find('.price').text();
				 	current_role=$("button.add").filter("#"+current_id).parent().parent().find('.role').text();

					main_add();
				}
			}

			
			//persistent data collected
			function createTeam()
			{
				var team_name=document.getElementById("team_name").value;
				if(team_name==null || team_name=="")
				{
					alert("Please enter the team name");//checking team name
					return false;
				}
				else
				{
					var radios = document.getElementsByName('composition');
					
					if(!radios[0].checked && !radios[1].checked && !radios[2].checked)
					{
						alert("please select your team composition");//checking team composition
						return false;
					}
					else
					{
						if(total_players<8)
						{
							alert("please select 8 players atleast");
							return false;
						}
						else
						{
							var comp_ind=$('input[name=composition]:checked').val();

							if(allowed_compositions[comp_ind][0]==batsman_count && allowed_compositions[comp_ind][1]==wicketkeeper_count && allowed_compositions[comp_ind][3]==bowler_count && allowed_compositions[comp_ind][2]==allrounder_count)
							{
								//assign values to input elements for sending to form handler 
								
								document.Form1.total_spent_send.value=current_total_price;
								document.Form1.composition_send.value=comp_ind;
								document.Form1.selected_player_id.value=selected[0]+" "+selected[1]+" "+selected[2]+" "+selected[3]+" "+selected[4]+" "+selected[5]+" "+selected[6]+" "+selected[7];
				
								//submit form
								//$('#createTeamForm').submit(2000);
							}
							else
							{
								alert("Your selected team does not match your composition");
								return false;
							}
						}
					}
				}
			}
			



			//remove functionality
			/*
			total_players-1
			current_total_price ko decrement
			index--
			remove tat player id from array
			remove tat element
			
			change counters

			*/
			
			function remove()
			{
				
				
				var current_id=$(this).attr('id');
				var current_name=$(this).parent().parent().find('td').eq(1).text();
				var current_price=parseInt($(this).parent().parent().find('td').eq(2).text());
				var current_role=$(this).parent().parent().find('td').eq(3).text();
				
				$(this).parent().parent().remove();//remove the element
				total_players--;

				
				current_total_price=+current_total_price - +current_price;
				for(var i=0;i<index;i++)
				{
					if(selected[i]==current_id)
					{
						selected.splice(i,1);//remove id from array
						break;
					}
				}
				index--;//reduce index
				//alert(current_total_price);

				//counter changes
							if(current_role.localeCompare("batsman")==0)
							{
								batsman_count=batsman_count-1;
								document.getElementById("batsman").innerHTML=batsman_count;
							}
							else if(current_role.localeCompare("wicketkeeper")==0)
							{
								wicketkeeper_count=wicketkeeper_count-1;
								document.getElementById("wicketkeeper").innerHTML=wicketkeeper_count;
							}
							else if(current_role.localeCompare("bowler")==0)
							{
								bowler_count=bowler_count-1;
								document.getElementById("bowler").innerHTML=bowler_count;
							}
							else if(current_role.localeCompare("allrounder")==0)
							{
								allrounder_count=allrounder_count-1;
								document.getElementById("allrounder").innerHTML=allrounder_count;
							}
							document.getElementById("total_spent").innerHTML=current_total_price;

				localStorage["datas"] = JSON.stringify(selected);
				//alert(JSON.parse(localStorage["datas"]));
			}
			//remove functionality over

			$(document).ready(function(){
				//mark the localstorage checkbox true
				
				if(typeof localStorage["radio_comp"]!=='undefined')
				{
					$(".composition").filter('[value="'+localStorage["radio_comp"]+'"]').attr("checked", true);
				}
				//adding players to selected list

				$('.add').click(function(){
				current_id=$(this).attr('id');
				current_name=$(this).parent().parent().find('.name').text();
				current_price=parseInt($(this).parent().parent().find('.price').text());
				current_role=$(this).parent().parent().find('.role').text();
				
				
				if(total_players<8)
				{
					flag=0;
					for(var i=0;i<index;i++)
					{
						//alert("array"+selected[i]);
						if(selected[i]==current_id)
						{
							flag=1;
							break;
						}
					}
					if(flag==1)
					{
						alert("player already selected");
						return false;
					}
					else
					{
						if(parseInt(current_price)+parseInt(current_total_price)<=total_price)
						{
							main_add();
							localStorage["datas"] = JSON.stringify(selected);
							return false;
						}
						else
						{
							alert("Insufficient fund");
							return false;
						}
					}

				}
				else
				{
					alert("Team is formed with maximum players : 8");
					return false;
				}
				
				})
			//add functionality over
			});

			//common add functionality REUSABILITY
			function main_add()
			{
				var tr=document.createElement("tr");

							var td1=document.createElement("td");
							var t1 = document.createTextNode(""+current_id);
							td1.appendChild(t1);

							var td2=document.createElement("td");
							var t2 = document.createTextNode(""+current_name);
							td2.appendChild(t2);
							var td3=document.createElement("td");
							var t3 = document.createTextNode(""+current_price);
							td3.appendChild(t3);
							var td4=document.createElement("td");
							var t4 = document.createTextNode(""+current_role);
							td4.appendChild(t4);
							
							var td5=document.createElement("td");
							var btn=document.createElement("BUTTON");
							var bt = document.createTextNode("Remove");
							btn.id=""+current_id;
							
							btn.appendChild(bt);
							btn.onclick=remove;
							td5.appendChild(btn);

							tr.appendChild(td1);
							tr.appendChild(td2);
							tr.appendChild(td3);
							tr.appendChild(td4);
							tr.appendChild(td5);

							var tab=document.getElementById("selected");
							tab.appendChild(tr);

							current_total_price=parseInt(current_total_price)+parseInt(current_price);
							$("#"+current_id).addClass("btn btn-primary remove");
							selected[index]=current_id;//adding id to array
							index++;
							total_players++;
							
							//update the counters
							if(current_role.localeCompare("batsman")==0)
							{
								batsman_count=batsman_count+1;
								document.getElementById("batsman").innerHTML=batsman_count;
							}
							else if(current_role.localeCompare("wicketkeeper")==0)
							{
								wicketkeeper_count=wicketkeeper_count+1
								document.getElementById("wicketkeeper").innerHTML=wicketkeeper_count;
							}
							else if(current_role.localeCompare("bowler")==0)
							{
								bowler_count=bowler_count+1;
								document.getElementById("bowler").innerHTML=bowler_count;
							}
							else if(current_role.localeCompare("allrounder")==0)
							{
								allrounder_count=allrounder_count+1
								document.getElementById("allrounder").innerHTML=allrounder_count;
							}
							document.getElementById("total_spent").innerHTML=current_total_price;

			}
		</script>

	</body>
</html>