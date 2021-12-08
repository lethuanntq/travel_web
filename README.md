###Bước 1: 
git clone https://github.com/lethuanntq/travel_web.git
###Bước 2: 
  - Chay `composer install` de install thu vien vendor
  - chạy `npm install` để install node package       
###Bước 3: 
Copy file .env.example taoj file .env
  - Chinh sua thong tin DB connect trong file .env
     DB_CONNECTION=mysql
     DB_HOST=localhost
     DB_PORT=3306
     DB_DATABASE=travel  -- Tên db
     DB_USERNAME=root  -- Tài khoản
     DB_PASSWORD=  -- password
###Bước 4:
 - Chạy `npm run dev` để gender css
###Bước 5:
 - Chay `php artisan migrate --seed` de tao table và tài khoản admin
  tài khoản: admin@gmail.com/123456789
###Bước 6:
 - Chay `php artisan serve` de chay server
Truy cập theo link: http://127.0.0.1:8000/
