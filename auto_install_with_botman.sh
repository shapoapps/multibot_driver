#!/bin/bash

#place here your path
PATH_TO_WEB_FOLDER='/var/www/some_bot/botman/'

sudo -H -u www-data bash -c "cd $PATH_TO_WEB_FOLDER && composer clearcache " 
sudo -H -u www-data bash -c "cd $PATH_TO_WEB_FOLDER && composer create-project --prefer-dist botman/studio $PATH_TO_WEB_FOLDER " 
sudo -H -u www-data bash -c "cd $PATH_TO_WEB_FOLDER && php artisan botman:install-driver telegram " 
sudo -H -u www-data bash -c "cd $PATH_TO_WEB_FOLDER && composer require \"shapoapps/multibot_driver\" "

#publish config file
sudo -H -u www-data bash -c "cd $PATH_TO_WEB_FOLDER && php artisan vendor:publish --provider=\"Shapoapps\MultibotDriver\Providers\ShapoappsMultibotServiceProvider\" "

#if you want make some controllers or jobs at same time
#sudo -H -u www-data bash -c "cd $PATH_TO_WEB_FOLDER && php artisan make:controller SomeController && php artisan make:controller OtherController && php artisan make:job SomeJob && php artisan make:job OtherJob && php artisan make:job AnotherJob "

#if you want push all files at remote git repository at same time
#sudo -H -u www-data bash -c "cd $PATH_TO_WEB_FOLDER && git init "
#sudo -H -u www-data bash -c "cd $PATH_TO_WEB_FOLDER && git config --global user.email \"my_email@example.com\" && git config --global user.name \"My computer\" " 
#sudo -H -u www-data bash -c "cd $PATH_TO_WEB_FOLDER && git add . && git commit -m \"Init commit\" " 
#sudo -H -u www-data bash -c "cd $PATH_TO_WEB_FOLDER && git remote add origin git@my_ssh_connection:github_repo/my_repo.git "
#sudo -H -u www-data bash -c "cd $PATH_TO_WEB_FOLDER && git branch --set-upstream-to=origin/master master " 
#sudo -H -u www-data bash -c "cd $PATH_TO_WEB_FOLDER && git push origin master " 


