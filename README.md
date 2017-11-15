# Google-drive-proxy-jwplayer

Ubuntu 16.04.3 LTS 

# Tutorial
```
Apt-get update && apt-get upgrade
apt-get -y install apache2
apt-get -y install php7.0 libapache2-mod-php7.0
apt-get -y install php7.0-mysql php7.0-curl php7.0-gd php7.0-intl php-pear php-imagick php7.0-imap php7.0-mcrypt php-memcache  php7.0-pspell php7.0-recode php7.0-sqlite3 php7.0-tidy php7.0-xmlrpc php7.0-xsl php7.0-mbstring php-gettext php7.0-opcache php-apcu
a2enmod rewrite
systemctl restart apache2
```

In the file Servers.php you can add different servers to do load balancing.

``` 
$proxies[] = "https://filmesx.co/drive.php?id=";  
$proxies[] = "https://dooplay.co/drive.php?id=";  
$proxies[] = "https://newdoma.co/drive.php?id=";  
```

# Encryption

``` $url = put your variable or your google drive url. ```

```
<?php //filmesx.co - ruan_cabral7@hotmail.com

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
    
// filmesx.co - ruan_cabral7@hotmail.com ?>

<iframe style="border:0px #FFFFFF none;" scrolling="no" frameborder="0" marginheight="0px" marginwidth="0px" height="480" width="100%" src="filmesx.co/embed.php?id=<?php echo $urlen; ?>" sandbox="allow-same-origin allow-scripts" allowfullscreen></iframe>
```

Obs 1: If you do not want encryption remove the first 19 lines of the file embed.php <br>
Obs 2: Without encryption you can simply paste the google id at the end of embed.php?id= <br>

Encrypted  <br>
http://domain.com/embed.php?id=MkF3UJlR1REVA <br>
No encryped  <br>
http://domain.com/embed.php?id=GOOGLEDRIVEID <br>

# Credits

I - for making the code available.

# Installation service

I charge a $ 5 fee for installing the script with ssl on domain, apache or nginx.
send a paypal payment to ruan_cabral7@hotmail.com followed by login and password to install quickly as soon as payment is made.

# Demo
```
https://filmesx.co/wp-content/play/embed.php?gd=VHhtbUVGVFRyVG5vbkZtUm5TeSt3bklYQUpmbFp0ajFCZy94NDEyOWJUaW1TRVNaSUdaN3FlM095K050TWlrVw==&legenda=23708&id=https://image.tmdb.org/t/p/w1000/djZ91wFhH07ufDwfaEo6c4tm7x.jpg
```
Eng
#AUTO CHECH FOR SUB (CAPTIONS) + PREVIEW IMAGES + DOOPLAY THEME 2.3.8 - ONLY FOR PREMIUM!
DEMO: Filmesx.co
$20 only paypal.

Pt-br
#SE HOUVER LEGENDAS NA PASTA ATIVA AUTOMATICAMENTE + IMAGEM DE CAPA NO PLAYER AUTOMATICA NO THEMA DOOPLAY + THEMA DOOPLAY 2.3.8
DEMONSTRAÇÃO: Filmesx.co
R$ 70.
