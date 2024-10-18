@servers(['web' => ['root@192.168.1.55']])

@task('deploy', ['on' => 'web'])
  cd /var/www/proyect-fn-cf-laravel

  git pull origin --rebase main

  composer install --no-interaction --ignore-platform-reqs


  # Agregar tokens al archivo .env
  echo "GITHUB_CLIENT_ID= YOUR_CLIENT_ID_HERE" >> .env
  echo "GITHUB_CLIENT_SECRET=your_secret_here" >> .env
  echo "GITHUB_REDIRECT_URI=http://your.url/redirect/github" >> .env

  echo "MERCADO_PAGO_TOKEN=your_access_token_here" >> .env

  # Agregar Facturama credentials
  echo "FACTURAMA_USER=your_facturama_user" >> .env
  echo "FACTURAMA_PASSWORD=your_facturama_password" >> .env


  php artisan migrate --force
  php artisan optimize
  php artisan config:cache
@endtask