1) Run Composer update

2) set credentials for Mysql DB in .env file
3) php artisan migrate
4) php artisan db:seed

5)Set Mailchimp API as MC_KEY at .env file


Commands 
1) Send all users to MailChimp List 
php artisan mailchimp:sendsubsribers  

2) Set all user's statuses to 1 or 0
php artisan subscribers:status {status}


Starting The Scheduler
When using the scheduler, you only need to add the following Cron entry to your server. If you do not know how to add Cron entries to your server, consider using a service such as Laravel Forge which can manage the Cron entries for you:

* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
