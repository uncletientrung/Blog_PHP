<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reponsive Multipage Blog Website</title>
    <link rel="stylesheet" href="./style.css">      <!-- TRANG TRÍ HTML -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> <!-- ICONSCOUT -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
 
</head>
<body>  
    <!-- Thẻ điều hướng MENU BAR -->
    <nav>   
        <div class="container nav__container">
            <a href="index.html" class="nav__logo">TBLOG</a>
            <ul class="nav__items">
                <li><a href="blog.html">Blog</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="services.html">Servies</a></li>
                <li><a href="contact.html">Contact</a></li>
                <!-- <li><a href="signin.html">Signin</a></li> -->
                <li class="nav__profile">
                    <div class="avatar">
                        <img src="./images/blog4.jpg">
                    </div>
                    <ul>
                        <li><a href="dashboard.html">Dashboard</a></li>
                        <li><a href="logout.html">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <button id="open__nav-btn"><i class="fas fa-bars"></i></button>
            <button id="close__nav-btn"><i class="fas fa-times"></i></button>
        </div>
    </nav>

    <!-- XONG PHẦN MENU BAR -->

    <section class="singlepost">
        <div class="container singlepost__container">
            <h2>Giới thiệt về Gumdam</h2>
            <div class="post__author">
                <div class="post__author-avatar">
                    <img src="./images/blog2.jpg" alt="">
                </div>
                <div class="post__author-info">
                    <h5>By: TrungGD1</h5>
                    <small>July 16, 2025 - 11:17</small>
                </div>
            </div>
            <div class="singlepost__thumbnail">
                <img src="./images/blog6.jpg" >
            </div>
            <p> là dòng sản phẩm truyền thông khoa học viễn tưởng được sản xuất bởi Sunrise, 
                dòng sản phẩm này xoay quanh những người máy khổng lồ (mecha) với tên gọi "Gundam"
            </p>
            <p>
                Mobile Suit Gundam được phát triển bởi Yoshiyuki Tomino và một nhóm các nhà sáng tạo của Sunrise với tên gọi Hajime Yatate.
                Bộ phim ban đầu được đặt tên là Freedom Fighter Gunboy (hay Gunboy), hướng chủ yếu vào đối tượng là các bé trai. 
                Giai đoạn phát triển ban đầu có nhiều chi tiết liên quan tới cụm từ Tự Do: The White Base - Căn Cứ Trắng ban đầu được đặt tên là 
                Freedom's Fortress - Pháo Đài Tự Do, chiến đấu cơ Core Fighter thì được gọi là Freedom Wing - Đôi Cánh Tự Do và vận chuyển 
                cơ Gunperry được gọi là Freedom Cruiser - Tuần Dương Tự Do
            </p>
            <p>
                Mobile Suit Gundam được phát triển bởi Yoshiyuki Tomino và một nhóm các nhà sáng tạo của Sunrise với tên gọi Hajime Yatate.
                Bộ phim ban đầu được đặt tên là Freedom Fighter Gunboy (hay Gunboy), hướng chủ yếu vào đối tượng là các bé trai. 
                Giai đoạn phát triển ban đầu có nhiều chi tiết liên quan tới cụm từ Tự Do: The White Base - Căn Cứ Trắng ban đầu được đặt tên là 
                Freedom's Fortress - Pháo Đài Tự Do, chiến đấu cơ Core Fighter thì được gọi là Freedom Wing - Đôi Cánh Tự Do và vận chuyển 
                cơ Gunperry được gọi là Freedom Cruiser - Tuần Dương Tự Do
            </p>
        </div>
    </section>
    <!-- XONG PHẦN SINGLE POST -->

      <footer>
        <div class="footer__socials">
            <a href="https://www.facebook.com/nguyen.trung.800827/" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/chnugaws/" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://github.com/uncletientrung" target="_blank"><i class="fab fa-github"></i></a>
            <a href="https://www.youtube.com/channel/UCQV_biMhYlIKVPJgDvN3y7w"><i class="fab fa-youtube"></i></a>
        </div>
        <div class="container footer__container">
            <article>
                <h4>Categories</h4>
                <ul>
                    <li><a href="">RED</a></li>
                    <li><a href="">GREEN</a></li>
                    <li><a href="">YELLOW</a></li>
                    <li><a href="">BLUE</a></li>
                    <li><a href="">PURPLE</a></li>
                    <li><a href="">ORANGE</a></li>
                </ul>
            </article>
            <article>
                <h4>Support</h4>
                <ul>
                    <li><a href="">Online Suport</a></li>
                    <li><a href="">Phone Number</a></li>
                    <li><a href="">Email</a></li>
                    <li><a href="">Location</a></li>
                </ul>
            </article>
            <article>
                <h4>Categories</h4>
                <ul>
                    <li><a href="">RED</a></li>
                    <li><a href="">GREEN</a></li>
                    <li><a href="">YELLOW</a></li>
                    <li><a href="">BLUE</a></li>
                    <li><a href="">PURPLE</a></li>
                    <li><a href="">ORANGE</a></li>
                </ul>
            </article>
            <article>
                <h4>Permalinks</h4>
                <ul>
                    <li><a href="">Hone</a></li>
                    <li><a href="">Blog</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </article>
        </div>
        <div class="footer__copyright">
            <small>Copyright &copy; UNCLETIENTRUNG</small>
        </div>
      </footer>
      <script src="main.js"></script>

</body>
</html>