# ChatPlatform-MongoDB-PHP
Chatplatform android app back end

# MongoPHP-files

#We need to install 3 things:

1) MongoDB

2) Install Apache PHP

3) Mongo PHP Driver
  
#First MongoDB:

  Installing MongoDB on Linux Server:
  
  Use the following link to install MongoDB on Ubuntu:
  
    https://docs.mongodb.org/v3.0/tutorial/install-mongodb-on-ubuntu/
  
#Second, setting up PHP Server:

  Install Apache:
  
    sudo apt-get update
  
    sudo apt-get install apache2
  
  To check if Apache is installed, go to browser and type in the server's ip address. (May have to specify port) (eg. http://123.456.678:8080). If installed correctly you should apache page.
  To find server ip address, use following command:
  
    ifconfig eth0 | grep inet | awk '{ print $2 }'
    
  Install PHP:
  
    sudo apt-get install php5 libapache2-mod-php5 php5-mcrypt
    
    Answer "Yes" to install.
    
    Add php to the directory index:
    
      sudo nano /etc/apache2/mods-enabled/dir.conf
      
      Add index.php to the beginning of index files. So, it should look like this:
      <IfModule mod_dir.c>
      
          DirectoryIndex index.php index.html index.cgi index.pl index.php index.xhtml index.htm
      
      </IfModule>
    
    To check if PHP is working:
    
    Create a new file:
    
      sudo nano /var/www/html/info.php
      
    Add following lines:
      <?php
      phpinfo();
      ?>
      
    Save and exit.
    
  Restart apache:
  
    sudo service apache2 restart
    
  Test php by visiting php page on brower: 
  
    http://123.456.678:8080/info.php
    
  It should display php configurations

#Third, install mongo php driver:

  We are using mongodb legacy php driver:
  
  Use following link to setup and install:
    
    http://php.net/manual/en/book.mongo.php
    


      
    
      
