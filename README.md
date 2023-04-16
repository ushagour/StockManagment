# Laravel 9 Hospital Stock Management System

Manage the assets and their stock in hospitals: view for one hospital, with superadmin overseeing all hospitals and get notified of low amounts left, also seeing transactions history.



## How to use

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- That's it: launch the main URL. 
- You can login to adminpanel by going go `/login` URL and login with credentials __admin@admin.com__ - __password__
- For other users, doctors/directors, their email is in `users.email` field, and password is __password__



## load methode orm
~~~
the "load" method is used to eagerly load relationships for a model. When you retrieve a model from the database, you can use the "load" method to load related data that is associated with that model.

~~~

