#Git Commits By Day

>View commit history of multiple repos ordered by date and time using "git log --pretty=format:"



##Setup:

1. Copy `gcbd-settings-sample.php` to `gcbd-settings.php`:

```
cp gcbd-settings-sample.php gcbd-settings.php
```

2. Set your primary git `$email_address` in `gcbd-settings.php`:

```
$email_address = 'yourname@email.com';
```

3. Update the `$folder_list` array with the name and directory of each repo you want to watch:

```
$folder_list=array(
	'Project Name 1'=>'~/path_to_project_1',
	'A Second Project'=>'/var/www/project_2'
);
```



##Usage:
```
 -s    since. (git --since) Ex: "3.days" "2.weeks" "2.months"
 -e    egrep. (filter by date) EX: "2014-05-20|2014-06-17" //pipe seperates dates
```

###Without options:
```
php gcbd.php
```

###Since Option (date range): 
```
$ php gcbd.php -s 1.day
--------------------------------------------------------------------------------
2014-06-17 09:43:13 -0500 ::GCBD:: rename & add readme
--------------------------------------------------------------------------------
```
```
$ php gcbd.php -s 2.monts
--------------------------------------------------------------------------------
2014-05-20 09:47:09 -0500 ::GCBD:: better dividiers
--------------------------------------------------------------------------------
2014-06-17 09:43:13 -0500 ::GCBD:: rename & add readme
--------------------------------------------------------------------------------
```

###Egrep Option (specific dates):
```
$ php gcbd.php -e "2014-05-20"
--------------------------------------------------------------------------------
2014-05-20 09:47:09 -0500 ::GCBD:: better dividiers
--------------------------------------------------------------------------------
```



##Requirements:
> 1. git-core
> 2. PHP
> 3. An active git repository


