# Google-drive-proxy-jwplayer

Ubuntu 16.04.3 LTS 

# Tutorial

Apt-get update && apt-get upgrade<br>

apt-get -y install apache2<br>

apt-get -y install php7.0 libapache2-mod-php7.0<br>

apt-get -y install php7.0-mysql php7.0-curl php7.0-gd php7.0-intl php-pear php-imagick php7.0-imap php7.0-mcrypt php-memcache  php7.0-pspell php7.0-recode php7.0-sqlite3 php7.0-tidy php7.0-xmlrpc php7.0-xsl php7.0-mbstring php-gettext php7.0-opcache php-apcu <br>

a2enmod rewrite <br>

systemctl restart apache2 <br>

In the file Servers.php you can add different servers to do load balancing.

"  $proxies[] = "https://filmesx.co/drive.php?id=";  " <br>
"  $proxies[] = "https://dooplay.co/drive.php?id=";  " <br>
"  $proxies[] = "https://newdoa.co/drive.php?id=";  " <br>

# Encryption

$url = put your variable or your google drive url.

// <?php //filmesx.co - ruan_cabral7@hotmail.com

$inboxf = $url; // your variable

    $plain_txt = base64_encode($inboxf);
    $string = $plain_txt;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'PWaanA*()!#EGyKaaZa';
    $secret_iv = 'PWAsrqWUN*()!#RETyAAgaa';
    // hash
    $key = hash('sha256', $secret_key); 
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);
    $encrypted_txt = $output;
    $urlen = $encrypted_txt;

//filmesx.co - ruan_cabral7@hotmail.com ?> //

Obs 1: If you do not want encryption remove the first 19 lines of the file embed.php <br>
Obs 2: Without encryption you can simply paste the google id at the end of embed.php?id= <br>

Encrypted  <br>
http://domain.com/embed.php?id=MkF3UJlR1REVA <br>
No encryped  <br>
http://domain.com/embed.php?id=GOOGLEDRIVEID <br>

# Creditos

I - for making the code available.

# Serviço de instalação

I charge a $ 5 fee for installing the script .
send a paypal payment to ruan_cabral7@hotmail.com followed by login and password by email to start the installation.
