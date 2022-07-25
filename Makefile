up:
	composer install
	./vendor/bin/sail up
	./vendor/bin/sail artisan migrate:fresh
	./vendor/bin/sail artisan db:seed


