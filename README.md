# Setup instruction

- To clone `git clone git@github.com:naran3434/send-websites-newsletter.git`
- Install Dependencies via composer
- Setup .env from .env.example
- Update DB, Mail & Queue Credentials (preferred: `database` for QUEUE_CONNECTION)
- Migrate DB & Seed Data (users, web_masters)
- Postman collection attached for 2 routes (Newsletter App.postman_collection.json)
- Use Artisan serve command or valet to configure app & run
- Replace `https://newsletter-app.test` with base url as per your need in postman for 2 routes
- `send:new-post-mail` command scheduled for every minute. Enable cron job or run `php artisan send:new-post-mail` to send email
- Process queue using command `php artisan queue:work` or `php artisan queue:listen`


