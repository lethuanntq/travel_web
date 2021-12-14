
###Bước 1: 
Chạy lệnh để lấy source code về
- git clone https://github.com/lethuanntq/travel_web.git

###Bước 2: 
  - Mở cmd hoặc git bash ở trong thư mục source code
  - Chạy `composer install` để install thư viện vender
  - Chạy `npm install` để install node package   
   
   
###Bước 3: 
Copy file .env.example sửa lại thành .env
  - Chỉnh sửa thông tin Database để connect trong file .env
  
     `DB_CONNECTION=mysql`  
     `DB_HOST=localhost`    
     `DB_PORT=3306`     
     `DB_DATABASE=travel`  -- Tên database  
     `DB_USERNAME=root`  -- Tài khoản   
     `DB_PASSWORD=`  -- password
     
###Bước 4:
 - Chạy `npm run dev` để render css


###Bước 5:
 - Chạy `php artisan migrate --seed` để tạo table và tài khoản admin
  tài khoản: admin@gmail.com/123456789
 - Chạy `php artisan config:clear` để lấy thông tin ở trong file .env
  
 - Chạy lại DB để cập nhật mới
  php artisan migrate:fresh --seed
  
###Bước 6:
 - Chạy `php artisan serve` để chạy server
 - Link trang chu: http://127.0.0.1:8000/
 - Link admin: http://127.0.0.1:8000/management
 
### Bước 7 
 - Chạy các lệnh sau để setup ckeditor
    + `composer require ckfinder/ckfinder-laravel-package` 
    + `php artisan ckfinder:download`
    + `php artisan vendor:publish --tag=ckfinder-assets --tag=ckfinder-config`
    + `php artisan vendor:publish --tag=ckfinder-views`
    + `php artisan vendor:publish --tag=ckfinder`
    + `mkdir -m 777 public/userfiles`
