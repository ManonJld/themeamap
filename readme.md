Creation of new wordpress
~~~~
mkdir wordpress
cd wordpress
wp core download --locale=fr_FR
wp config create --dbname=dbname --dbuser=root --dbpass=root --locale=fr_FR
wp db create
wp core install --url=localhost:8080 --title=Example --admin_user=admin --admin_password=admin --admin_email=admin@example.com
~~~~
Downloading the theme
~~~~
cd wp-conent/themes
git clone git@github.com:ManonJld/themeamap.git themeamap
cd themeamap
composer install
npm install