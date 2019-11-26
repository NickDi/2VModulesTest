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


Not realized, but needed
 - error exception on send to MailChimp function
 - Subscriber facade make fake Users with bad email such as example, thats doesn't sends to Mailchimp


 ТЗ:

1. Развернуть проект на Laravel
2. Создать таблицу в БД для хранения информации о пользователях рассылки: 
имя, фамилия, адрес электронной почты, статус подписки на рассылку (0/1), дата синхронизации

3. Занести в базу 10 тестовых записей, изначально все записи должны иметь статус = 0 (не подписан)

4. Создать две консольные команды:
4.1 первая команда должна позволять отправить всех пользователей из базы в определенный список Mailchimp (ID списка можно задать прямо в коде)
4.2 вторая команда должна позволять обновить статус всех пользователей в базе - подписан или отписан

5. Повесить вторую команду на выполнение раз в 30 минут (средствами Laravel)

6. Создать форму, позволяющую добавить пользователя в базу данных с полями - имя, фамилия, адрес почты. 
При отправке формы должна проходить валидация адреса почты, а также не пустых значений имени и фамилии (на стороне сервера)

7. Форма из п.6 должна быть доступна только после авторизации. 
Добавьте одного пользователя, предоставьте мне логин и пароль для доступа к приложению
