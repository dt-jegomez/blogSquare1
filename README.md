
## installation

    1. clone the repository

    2. composer install and npm install

    3. npm run dev o npm run watch

    4. configure the .env

    5. php artisan migrate -- seed

    6. Starting The Scheduler
    
        When using the scheduler, you only need to add the following Cron entry to your server. If you do not know how to add         Cron entries to your server, consider using a service such as Laravel Forge which can manage the Cron entries for             you:

    * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1

       This Cron will call the Laravel command scheduler every minute. When the schedule:run command is executed, Laravel            will evaluate your scheduled tasks and runs the tasks that are due.
 
    7. php artisan serve


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
