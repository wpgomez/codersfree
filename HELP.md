- crear y editar propiedades .env
  APP_URL=http://codersfree.test
  DB_DATABASE=codersfree

- composer install

- php artisan key:generate

- editar el archivo en : vendor\fakerphp\faker\src\Faker\Provider\Image.php
curl_setopt($ch, CURLOPT_FILE, $fp); //línea existente
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //nueva línea
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //nueva línea
$success = curl_exec($ch) && curl_getinfo($ch, CURLINFO_HTTP_CODE) === 200;//línea existente

- php artisan migrate --seed (base datos limpia)
- php artisan migrate:refresh --seed

- php artisan storage:link
