<?php
require('fer-settings.php');
$opts = getopt('s:d:');
$since ='';
$date = '';

// -s git --since option. Ex: "3.days" "2.weeks" "2.months"
if(!empty($opts['s'])){
	$since = ' --since='.$opts['s'];
}

// -d egrep the results. you can use it to filter for specific days. EX: "2013-11-22|2013-11-25" for commits on friday & monday
if(!empty($opts['d'])){
	$date = ' | egrep "'.$opts['d'].'"';
}

$output_array = array();
foreach($folder_list as $project => $folder){
	$command = 'git log --pretty=format:"%ai %Cgreen::'.$project.'::%Creset %Cred%s%Creset"'.$since.' --committer="'.$bitbucket_email.'" --all --date=iso'.$date;
	$tmp = shell_exec('cd '.$folder.' && '.$command);
	foreach(preg_split("/((\r?\n)|(\r\n?))/", $tmp) as $line){
		if(!empty($line) && $line!='' && $line){
			array_push($output_array,$line);
		}
	}
}
natsort($output_array);
$last_date='';
foreach($output_array as $commit){
	$current_date = substr($commit, 0, 10);
	if($last_date != $current_date){
		echo "--------------------------------------------------------------------------------\n";
	}
	echo $commit."\n";
	$last_date = substr($commit, 0, 10);
}
echo "--------------------------------------------------------------------------------\n";

?>