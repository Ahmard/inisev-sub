# Inisev Email Subscription
Email subscription system 

## Installation
Clone repo
```
git clone git@github.com:ahmard/inisev-sub.git
```
Install composer packages
```
composer install
```
Generate app secret key
```
php artisan key:generate
```
Edit [.env](.env) file to provide necessary config


Run migrations
```
php artisan migrate -seed
```

## Usage
Start the server
```
php artisan serve
```

You will then send json payload to each below endpoints

### Create User
POST http://localhost:8000/api/users
```json
{
    "name": "Jane",
    "email": "jane@anonym.net",
    "password": "1234"
}
```

### Create Website
POST http://localhost:8000/api/websites
```json
{
    "user": 1,
    "website_name": "Inisev",
    "website_domain": "inisev.com"
}
```

### Create Post
POST http://localhost:8000/api/websites/posts
```json
{
    "user": 1,
    "post_title": "Post Number 1",
    "post_content": "Post content should be here"
}
```

### Make Subscription
POST http://localhost:8000/api/websites/subscriptions
```json
{
    "user": 1,
    "website": 1
}
```

## Sending Email
Execute below command to send email to subscribers
```
php artisan subs:send --post=1 --site=1
```
