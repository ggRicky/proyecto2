<?php
    /**
     * GIT DEPLOYMENT SCRIPT
     *
     * Used for automatically deploying websites via GitHub
     *
     */

    // array of commands
    $commands = array(
        'echo $PWD',
        'whoami',
        'git pull 2>&1',
        'git status',
        'git submodule sync 2>&1',
        'git submodule update 2>&1',
        'git submodule status 2>&1',
    );

    // exec commands
    $output = '';
    foreach($commands AS $command){
        $tmp = shell_exec($command);

        $output .= "<span style=\"color: #6BE234;\">\$</span><span style=\"color: #729FCF;\">{$command}\n</span><br />";
        $output .= htmlentities(trim($tmp)) . "\n<br /><br />";
    }
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Git Deployment Script</title>
</head>
<style>
    body {
        width: 35em;
        margin: 0 auto;
        font-family: Tahoma, Verdana, Arial, sans-serif;
        background-color: #ffffff;
        color: #000000;
    }
</style>
<body>

	<h1>Git Deployment Script</h1>
	<p>This page reports about git's commands status, for a producction server updates, based on GitHub's WebHooks.</p>

	<div style="width:700px">
		<div style="float:left;width:350px;">
    			<p style="color:white;">Git Deployment Script</p>
			<?php echo $output; ?>
		</div>
	</div>

</body>
</html>
