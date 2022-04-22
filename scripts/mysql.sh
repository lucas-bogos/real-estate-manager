# automatiza a execução de shemas sql
mysql -u $DBUSER -p || echo "Digite o usuário do banco de dados: "; read dbuser; mysql -u $dbuser -p