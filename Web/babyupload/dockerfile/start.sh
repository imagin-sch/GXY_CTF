/clean.sh
echo $FLAG > /flag
export FLAG=not_flag
FLAG=null
apache2-foreground


