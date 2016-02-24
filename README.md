Source
css:
    http://getbootstrap.com/css/  
    https://css-tricks.com/almanac/properties/b/box-shadow/
php:
    mysql:
        http://wiki.hashphp.org/PDO_Tutorial_for_MySQL_Developers#Running_Simple_Select_Statements
        http://www.mysqltutorial.org/mysql-foreign-key/
    cookie: 
        http://stackoverflow.com/questions/2038760/cookies-not-working-on-different-pages
    password hash matching: 
        http://stackoverflow.com/questions/3135524/comparing-passwords-with-crypt-in-php
Other:
    http://www.cnsecer.com/biancheng/html
    
Plan

use crosspage cookie to get user
according to the user, add the book when submitted

Amazon:

6WSSWWX5


    http://webservices.amazon.com/onca/xml?
  Service=AWSECommerceService
  &Operation=ItemLookup
  &ResponseGroup=Large
  &SearchIndex=All
  &IdType=ISBN
  &ItemId=076243631X
  &AWSAccessKeyId=AKIAI4B2CE3L3XQ35YWA
  &AssociateTag=bookies0d-20
  &Timestamp=[YYYY-MM-DDThh:mm:ssZ]
  &Signature=[Request_Signature]
  
  http://www.amazon.com/Mammoth-Book-Tattoos-Lal-Hardy/dp/076243631X%3FAWSAccessKeyId%3DAKIAI4B2CE3L3XQ35YWA%26tag%3Dbookies0d-20%26linkCode%3Dxm2%26camp%3D2025%26creative%3D165953%26creativeASIN%3D076243631X