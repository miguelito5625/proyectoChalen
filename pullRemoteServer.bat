@ECHO OFF 
git add -A
git commit -am %1
git push -u origin main
ssh root@47.252.35.87 "cd /var/www/html/proyectoChalen; git pull"