<?php

$conn = mysqli_connect('localhost', 'root', '', 'contact') or die('connection failed');

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $komentar = mysqli_real_escape_string($conn, $_POST['komentar']);

    $insert = mysqli_query($conn, "INSERT INTO `coment`(name, email, komentar) VALUES('$name','$email','$komentar')") or die('query failed');

    if ($insert) {
        $message[] = 'Komentar Berhasil Dikirim!';
    } else {
        $message[] = 'Pengiriman Komentar Gagal';
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinas Pendidikan Kota Pekanbaru </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">




</head>

<body>

    <!-- header section starts  -->

    <header class="header">

        <a href="#" class="logo"> <i></i> Dinas Pendidikan Kota Pekanbaru </a>
        <nav class="navbar">
            <a href="index.php">Beranda</a>
            <a href="profil.php">Profil</a>
            <a href="berita.php">Berita</a>
            <a href="galeri.php">Galeri</a>
            <a href="contact.php" class="current">Contact</a>
        </nav>
        <div id="menu-btn"></div>

    </header>

    <!-- booking section starts   -->

    <section class="book" id="book">
        <br><br><br><br>

        <h1 class="heading"> <span>Kontak</span> Kami </h1>

        <div class="row">

            <div class="image">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6680764105536!2d101.35559285033766!3d0.4972340996354668!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5a9657dd5bda1%3A0xb3a9d2e9be1a98f6!2sKantor%20Dinas%20Pendidikan%20Kota%20Pekanbaru!5e0!3m2!1sid!2sid!4v1590461961248!5m2!1sid!2sid"
                    width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>



            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <?php
   if (isset($message)) {
       foreach ($message as $message) {
           echo '<p class="btn">' . $message . '</p>';
       }
   }
   ?>

                <h3>Komentar</h3>
                <input type="text" name="name" placeholder="masukkan nama" class="box">

                <input type="email" name="email" placeholder="masukkan email" class="box">

                <input type="text" name="komentar" placeholder="Komentar" class="box">

                <input type="submit" value="kirim" name="submit" class="btn">

            </form>

    </section>


    <!-- booking section ends -->

    <!-- review section starts  -->

    <section class="services" id="services">

        <div class="box-container">
        <div style=" height: 200px; overflow: auto; padding: 10px; width: 1250px;">
            <div class="box" style="background-color:#16a085">
                <?php
            $data = mysqli_query($conn, "SELECT * FROM coment");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <tr>

                        <p style="color:black">
                        <h3><img src="image/009.webp" style= "width:50px; height: 50px;" alt=""> &nbsp;<?php echo $d['name'] ?></h3>
                        </p>
                
                    <pre><?php
                echo ("                       ");
                date_default_timezone_set("Asia/Jakarta");
                echo date("l d-M-y");
                echo ("  ");
                echo date("H:i:s A");
            ?></pre>
                    
                   
                    <td>
                    <p>&emsp; &emsp;&emsp;&emsp;<a href="mailto:nama@yourdomain.com" style="color:#3f4a48"><?php echo $d['email'] ?>
                    </td></a></p>
                    <td>
                        <p style="color:black">&emsp;&emsp; &emsp;&emsp;<?php echo $d['komentar'] ?>
                    </td>
                    </p>
                    &emsp; &emsp; &emsp; &emsp;&emsp;<a href="hapus.php?id=<?php echo $d['id']; ?>" target="_blank" class="btn btn-success"><i
                            class="fa fa-delete-o"></i> Hapus</a>
                </tr>

                <hr>
                <br><br>
                <?php
            }
            ?>

        </div>
            </div>

    </section>


    <!-- footer section starts  -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>link cepat</h3>
                <a href="index.php"> <i class="fas fa-chevron-right"></i> Beranda </a>
                <a href="profil.php"> <i class="fas fa-chevron-right"></i> Profil </a>
                <a href="berita.php"> <i class="fas fa-chevron-right"></i> Berita </a>
                <a href="galeri.php"> <i class="fas fa-chevron-right"></i> Galeri </a>
                <a href="contact.php"> <i class="fas fa-chevron-right"></i> Contact </a>
            </div>

            <div class="box">
                <h3>Info Kontak</h3>
                <a href="tel:(0761)42788,855287"> <i class="fas fa-phone"></i> Telp. (0761)42788,855287 </a>
                <a href="tel:(0761)47204"> <i class="fas fa-phone"></i> FAX. (0761)47204 </a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="https://id-id.facebook.com/disdikpku/"> <i class="fab fa-facebook-f"></i> facebook </a>
                <a href="https://twitter.com/disdik_pekanbar"> <i class="fab fa-twitter"></i> twitter </a>
                <a href="https://www.instagram.com/disdikpku/"> <i class="fab fa-instagram"></i> instagram </a>
                <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
            </div>

        </div>
    </section>

    <!-- footer section ends -->


    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>