# Gym Kulübü Yönetim Uygulaması

Bu proje, bir spor salonu yönetim sistemi uygulamasıdır. Kullanıcılar spor salonuna kayıt olabilir, çeşitli programlara katılabilir ve topluluk forumlarına katılım sağlayabilirler. Yöneticiler ise etkinlikler, blog yazıları ve bilgi ekleyip düzenleyebilirler.

## Link
- Web Site : http://95.130.171.20/~st21360859077/dashboard.php
- Youtube Tanıtım : https://youtu.be/U9r26TEtoUY

## İçindekiler
- [Kurulum](#kurulum)
- [Kullanım](#kullanım)
- [Dosya Yapısı](#dosya-yapısı)

## Kurulum

### Gereksinimler
- XAMPP (PHP ve MySQL dahil)
- Bir web tarayıcısı

### Adımlar
1. XAMPP'ı indirin ve kurun: [XAMPP İndir](https://www.apachefriends.org/index.html)
2. `gym-kulubu-yonetim-uygulamasi` klasörünü `C:\xampp\htdocs\` dizinine kopyalayın.
3. XAMPP Kontrol Panelini başlatın ve Apache ve MySQL servislerini çalıştırın.
4. Web tarayıcınızda `http://localhost/phpmyadmin` adresine gidin.
5. Yeni bir veritabanı oluşturun ve adını `gym-kulubu-database` olarak belirleyin(Farklı isim de verebilirsiniz).
6. `gym-kulubu-yonetim-uygulamasi` klasöründeki `config.php` dosyasını açın ve veritabanı bağlantı ayarlarını yapılandırın:
    ```php
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gym-kulubu-database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>
    ```
7. `gym-kulubu-database` veritabanında gerekli tabloları oluşturmak için SQL dosyasını içe aktarın:
    - `phpmyadmin` arayüzünde `gym-kulubu-database` veritabanını seçin.
    - Üst menüden "İçe Aktar" sekmesine tıklayın.
    - `gym-kulubu-yonetim-uygulamasi` klasöründe bulunan SQL dosyasını seçin ve içe aktarın.
8. Web tarayıcınızda `http://localhost/gym-kulubu-yonetim-uygulamasi` adresine gidin ve uygulamayı kullanmaya başlayın.

## Kullanım
- **Kullanıcılar:**
  - Kayıt olabilir ve giriş yapabilirler.
  - Programlara katılabilirler.
  - Topluluk forumlarına katılabilirler.
  - Kişisel antrenman notlarını tutabilirler.

- **Yöneticiler:**
  - Admin paneline giriş yaparak etkinlikler, blog yazıları ve bilgileri ekleyip düzenleyebilirler.
  - Kullanıcıların etkinlik ve blog yazılarını yönetebilirler.

## Dosya Yapısı
- `login.php`: Kullanıcı giriş sayfası.
- `logout.php`: Kullanıcı çıkış sayfası.
- `register.php`: Kullanıcı kayıt sayfası.
- `programs.php`: Programlar sayfası.
- `workout_notes.php`: Antrenman notları sayfası.
- `add_blog.php`: Blog ekleme sayfası(admin için).
- `add_event.php`: Etkinlik ekleme sayfası(admin için).
- `add_info.php`: Bilgi ekleme sayfası(admin için).
- `admin_dashboard.php`: Admin paneli ana sayfası.
- `admin_login.php`: Admin giriş sayfası.
- `community_forum.php`: Topluluk forumu sayfası.
- `config.php`: Veritabanı bağlantı ayarları.
- `dashboard.php`: Kullanıcı paneli ana sayfası.
- `delete_blogs.php`: Blog silme sayfası(admin).
- `delete_event.php`: Etkinlik silme sayfası(admin için).
- `delete_info.php`: Bilgi silme sayfası(admin için).
- `edit_blogs.php`: Blog düzenleme sayfası(admin için).
- `edit_event.php`: Etkinlik düzenleme sayfası(admin için).
- `edit_info.php`: Bilgi düzenleme sayfası(admin için).
- `list_blogs.php`: Blog listeleme sayfası.
- `list_events.php`: Etkinlik listeleme sayfası.
- `style.css`: Uygulama için stil dosyası.

Bu uygulama, spor salonu yönetimini kolaylaştırmak ve kullanıcıların spor aktivitelerini düzenlemelerini sağlamak amacıyla geliştirilmiştir.
