server {
    listen 80;
    server_name scatbay.com;
    root /var/www/scatbay.com/@;
    include sites-available/scatbay.com.d/*.sub;
}
