# kino

1. clone project with: git clone https://github.com/kkolaric1/kino.git
2. position in project and install composer with:
  a) php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
  b) php -r "if (hash_file('sha384', 'composer-setup.php') === 'c5b9b6d368201a9db6f74e2611495f369991b72d9c8cbd3ffbc63edff210eb73d46ffbfce88669ad33695ef77dc76976') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
  c) php composer-setup.php
  d) php -r "unlink('composer-setup.php');"
3. run: composer.phar install
4. install symfony CLI with: wget https://get.symfony.com/cli/installer -O - | bash
5. run: symfony server:start
6. open http://127.0.0.1:8000/ address in browser
