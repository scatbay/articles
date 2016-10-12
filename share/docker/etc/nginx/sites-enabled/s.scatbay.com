server {
    listen 80;
    server_name s.scatbay.com;
    root /var/www/scatbay.com/s;
    include sites-available/s.scatbay.com.d/*.sub;
}
