<?php
	require_once "config/db.php";

	db_connect();

	$challenges = "";

	$r = db_query("SELECT challenges.id,challenges.name,challenges.description,challenges.points,challenges.winner_id,challenges.timestamp_START,teams.name FROM challenges LEFT JOIN teams on teams.id=challenges.winner_id ORDER BY challenges.id;");
	for ($i=0; $i<mysql_numrows($r); $i++)
	{
		if ($i > 0)
		{
			$challenges .= "||";
		}
		$challenges .= mysql_result($r, $i, "challenges.id");
		$challenges .= "|-";
		$challenges .= mysql_result($r, $i, "challenges.name");
		$challenges .= "|-";
		$challenges .= mysql_result($r, $i, "challenges.description");
		$challenges .= "|-";
		$challenges .= mysql_result($r, $i, "challenges.points");
		$challenges .= "|-";
		$challenges .= mysql_result($r, $i, "challenges.timestamp_start");
		$challenges .= "|-";
		$challenges .= mysql_result($r, $i, "challenges.winner_id");
		$challenges .= "|-";
		$challenges .= mysql_result($r, $i, "teams.name");
 

	}

	echo $challenges;
?>
