# HBTUChat


> A chatting platform for HBTU Kanpur. 

# License
This repository is licensed under GNU General Public License v3.0

## How to Setup

Setting up HBTUChat on your local machine is really easy.
Follow this guide to setup your development machine.

### Requirements :

1. PHP > 5.6
2. MySQL
3. XAMPP
4. Adobe Dreamweaver
5. git


### Installation :

1. Get the source code on your machine via git.

	```shell
    git clone https://github.com/DhawalAgrawal/HBTUChat.git
    ```

2. Install VOZ

	```
	Copy all the files to the htdoccs folder of Xampp server
	```

3. Setting up the Dreamweaver.

	```
	open index page in dreamweaver
	 Click files on right side of window
   manage sites
   New
   Site name HBTUChat
   Local root folder < path\xampp\htdocs\HBTUChat\
   HTTP Address < http://localhost/HBTUChat/
   server mode PHP MySQL
   Access LOCAL/NETWORK
   Testing server folder < path\xampp\htdocs\HBTUChat\
   URL prefix < http://localhost/HBTUChat/
   ok
	```


4. Create an empty sql database and run import database.

	```
	Start MySQL admin in xammp
	create new database HBTUChat
	import databse < path\HBTUChat\sql\HBTUChat.sql
	```

That's it, now start development at [http://localhost/HBTUChat/index.php](http://localhost/HBTUChat/index.php) in your browser

## Contribution guidelines

If you are interested in contributing to HBTUChat, Open Issues, send PR and Don't forget to star the repo.
> Feel free to code and contribute
