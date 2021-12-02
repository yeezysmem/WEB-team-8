<!DOCTYPE html>
<html>
<head>
<style>
	label{
		display: inline-block;
		width: 100px;
		margin-bottom: 10px;
	}
</style>
<title>Lab 7</title>
</head>
<body>
<a href="tvprograms.html"><h1>Add tvprograms</h1></a>
<a href="channels.html"><h1>Add channels</h1></a>
<a href="tvshows.html"><h1>Add tvshows</h1></a>

<form method="get" action="representTvshows.php">
<label>Check all Tvshows</label>
<input type="submit" name="show_tvshows" value="Show">
</form>
<form method="get" action="representTvprograms.php">
<label>Check all Tvprograms</label>
<input type="submit" name="show_tvprograms" value="Show">
</form>
<form method="get" action="representChannels.php">
<label>Check all channels</label>
<input type="submit" name="show_channels" value="Show">
</form>


</body>
</html>