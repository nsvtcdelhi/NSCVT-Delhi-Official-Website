<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NSVTC - National Skill & Vocational Training Centre</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f8f9fa;
        }

        /* HEADER & NAVIGATION */
        header {
            background: linear-gradient(135deg, #8b0000 0%, #5c0000 100%);
            color: white;
            padding: 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .header-top {
            background: #6b0000;
            padding: 10px 0;
            font-size: 14px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .header-top-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .contact-info span {
            margin-right: 30px;
        }

        .contact-info a {
            color: white;
            text-decoration: none;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 15px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-section img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: white;
            padding: 3px;
        }

        .logo-text h1 {
            font-size: 28px;
            font-weight: bold;
        }

        .logo-text p {
            font-size: 12px;
            opacity: 0.9;
        }

        nav {
            display: flex;
            gap: 40px;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #ffeb3b;
        }

        /* HERO SECTION */
        .hero {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
                        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><rect fill="%238b0000" width="1200" height="600"/></svg>');
            background-size: cover;
            background-position: center;
            height: 600px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .hero h1 {
            font-size: 72px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .hero p {
            font-size: 32px;
            margin-bottom: 40px;
            opacity: 0.95;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 15px 40px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            font-weight: bold;
        }

        .btn-primary {
            background: #8b0000;
            color: white;
        }

        .btn-primary:hover {
            background: #ffeb3b;
            color: #000;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .btn-secondary {
            background: white;
            color: #8b0000;
            border: 2px solid white;
        }

        .btn-secondary:hover {
            background: #ffeb3b;
            border-color: #ffeb3b;
        }

        /* SERVICES SECTION */
        .services {
            padding: 80px 50px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            font-size: 42px;
            color: #8b0000;
            margin-bottom: 60px;
            position: relative;
            padding-bottom: 20px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            width: 100px;
            height: 4px;
            background: #8b0000;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }

        .service-card {
            background: white;
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .service-card i {
            font-size: 50px;
            color: #8b0000;
            margin-bottom: 20px;
        }

        .service-card h3 {
            color: #8b0000;
            margin-bottom: 15px;
            font-size: 24px;
        }

        .service-card p {
            color: #666;
            line-height: 1.8;
        }

        /* ABOUT SECTION */
        .about {
            background: white;
            padding: 80px 50px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .about-text h2 {
            color: #8b0000;
            font-size: 38px;
            margin-bottom: 20px;
        }

        .about-text p {
            color: #666;
            margin-bottom: 15px;
            line-height: 1.8;
            font-size: 16px;
        }

        .about-features {
            margin-top: 30px;
        }

        .feature-item {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .feature-item::before {
            content: '✓';
            color: #8b0000;
            font-size: 24px;
            font-weight: bold;
        }

        .about-image {
            background: linear-gradient(135deg, #8b0000 0%, #5c0000 100%);
            height: 400px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            text-align: center;
            padding: 20px;
        }

        /* COURSES SECTION */
        .courses {
            background: #f8f9fa;
            padding: 80px 50px;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .course-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .course-card:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .course-header {
            background: linear-gradient(135deg, #8b0000 0%, #5c0000 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .course-header h3 {
            font-size: 22px;
            margin-bottom: 10px;
        }

        .course-body {
            padding: 30px;
        }

        .course-body p {
            color: #666;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .course-duration {
            background: #f0f0f0;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-weight: bold;
            color: #8b0000;
        }

        /* STATS SECTION */
        .stats {
            background: linear-gradient(135deg, #8b0000 0%, #5c0000 100%);
            color: white;
            padding: 60px 50px;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            text-align: center;
        }

        .stat-item h3 {
            font-size: 48px;
            margin-bottom: 10px;
        }

        .stat-item p {
            font-size: 18px;
            opacity: 0.9;
        }

        /* TESTIMONIALS */
        .testimonials {
            padding: 80px 50px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .testimonial-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            border-left: 5px solid #8b0000;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .testimonial-card p {
            color: #666;
            margin-bottom: 20px;
            font-style: italic;
        }

        .testimonial-author {
            color: #8b0000;
            font-weight: bold;
        }

        /* FOOTER */
        footer {
            background: #1a1a1a;
            color: white;
            padding: 60px 50px 30px;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-section h4 {
            color: #ffeb3b;
            margin-bottom: 20px;
            font-size: 18px;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .footer-section a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: #ffeb3b;
        }

        .footer-bottom {
            border-top: 1px solid #333;
            padding-top: 20px;
            text-align: center;
            color: #999;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                padding: 15px 20px;
            }

            nav {
                flex-wrap: wrap;
                justify-content: center;
                gap: 20px;
            }

            .hero h1 {
                font-size: 42px;
            }

            .hero p {
                font-size: 20px;
            }

            .header-top-content {
                flex-direction: column;
                gap: 10px;
                padding: 10px 20px;
            }

            .contact-info {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }

            .about-content {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .services, .courses, .stats, .testimonials {
                padding: 50px 20px;
            }

            .section-title {
                font-size: 32px;
            }
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <header>
        <div class="header-top">
            <div class="header-top-content">
                <div class="contact-info">
                    <span>📞 <a href="tel:+919876543210">+91-9876543210</a></span>
                    <span>📧 <a href="mailto:info@nsvtc.org">info@nsvtc.org</a></span>
                </div>
                <div>
                    <span>🕒 सोम-शुक्र: 09:00 AM - 05:00 PM</span>
                </div>
            </div>
        </div>

        <div class="nav-container">
            <div class="logo-section">
                <img src="logo.jpeg" alt="NSVTC Logo">
                <div class="logo-text">
                    <h1>NSVTC</h1>
                    <p>राष्ट्रीय कौशल विकास केंद्र</p>
                </div>
            </div>

            <nav>
                <a href="#home">होम</a>
                <a href="#about">परिचय</a>
                <a href="#courses">कोर्स</a>
                <a href="#services">सेवाएं</a>
                <a href="#contact">संपर्क</a>
                <a href="result.php" class="btn btn-primary" style="padding: 8px 20px; font-size: 14px;">परिणाम</a>
            </nav>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="hero" id="home">
        <h1>NSVTC में स्वागत है</h1>
        <p>राष्ट्रीय कौशल और व्यावसायिक प्रशिक्षण</p>
        <div class="hero-buttons">
            <a href="#courses" class="btn btn-primary">कोर्स देखें</a>
            <a href="result.php" class="btn btn-secondary">परिणाम जांचें</a>
        </div>
    </section>

    <!-- SERVICES SECTION -->
    <section class="services" id="services">
        <h2 class="section-title">हमारी सेवाएं</h2>
        <div class="services-grid">
            <div class="service-card">
                <div style="font-size: 50px; color: #8b0000; margin-bottom: 20px;">📚</div>
                <h3>कौशल विकास</h3>
                <p>व्यावहारिक और व्यावसायिक प्रशिक्षण के माध्यम से कौशल विकास</p>
            </div>
            <div class="service-card">
                <div style="font-size: 50px; color: #8b0000; margin-bottom: 20px;">🎓</div>
                <h3>प्रमाणपत्र</h3>
                <p>राष्ट्रीय स्तर पर मान्यता प्राप्त प्रमाणपत्र प्राप्त करें</p>
            </div>
            <div class="service-card">
                <div style="font-size: 50px; color: #8b0000; margin-bottom: 20px;">💼</div>
                <h3>रोजगार सहायता</h3>
                <p>प्रशिक्षण के बाद रोजगार के अवसर</p>
            </div>
            <div class="service-card">
                <div style="font-size: 50px; color: #8b0000; margin-bottom: 20px;">👨‍���</div>
                <h3>अनुभवी प्रशिक्षक</h3>
                <p>उद्योग के अनुभवी और योग्य प्रशिक्षकों द्वारा प्रशिक्षण</p>
            </div>
            <div class="service-card">
                <div style="font-size: 50px; color: #8b0000; margin-bottom: 20px;">🏆</div>
                <h3>गुणवत्ता आश्वासन</h3>
                <p>अंतर्राष्ट्रीय मानकों के अनुसार प्रशिक्षण</p>
            </div>
            <div class="service-card">
                <div style="font-size: 50px; color: #8b0000; margin-bottom: 20px;">📱</div>
                <h3>ऑनलाइन समर्थन</h3>
                <p>24/7 ऑनलाइन सहायता और संसाधन</p>
            </div>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section class="about" id="about">
        <div class="about-content">
            <div class="about-text">
                <h2>हमारे बारे में</h2>
                <p>NSVTC (राष्ट्रीय कौशल और व्यावसायिक प्रशिक्षण केंद्र) युवाओं को व्यावहारिक कौशल और व्यावसायिक प्रशिक्षण प्रदान करता है।</p>
                <p>हमारा उद्देश्य भारत के युवाओं को रोजगार योग्य बनाना और उन्हें आत्मनिर्भर बनाना है।</p>
                <div class="about-features">
                    <div class="feature-item">व्यावहारिक और सैद्धांतिक प्रशिक्षण</div>
                    <div class="feature-item">अंतर्राष्ट्रीय मानकों के अनुसार पाठ्यक्रम</div>
                    <div class="feature-item">उद्योग विशेषज्ञों द्वारा निर्देशित</div>
                    <div class="feature-item">आधुनिक प्रयोगशाला और सुविधाएं</div>
                    <div class="feature-item">रोजगार सहायता कार्यक्रम</div>
                </div>
            </div>
            <div class="about-image">
                <div style="text-align: center;">
                    <div style="font-size: 80px;">🎯</div>
                    <p>कौशल विकास में हमारे साथ भविष्य बनाएं</p>
                </div>
            </div>
        </div>
    </section>

    <!-- COURSES SECTION -->
    <section class="courses" id="courses">
        <h2 class="section-title">हमारे पाठ्यक्रम</h2>
        <div class="courses-grid">
            <div class="course-card">
                <div class="course-header">
                    <h3>सौंदर्य संस्कृति</h3>
                </div>
                <div class="course-body">
                    <p>सौंदर्य और व्यक्तिगत देखभाल में व्यावहारिक प्रशिक्षण</p>
                    <div class="course-duration">अवधि: 6-12 महीने</div>
                    <p>सर्टिफाइड ब्यूटीशियन बनें और अच्छी कमाई करें</p>
                </div>
            </div>
            <div class="course-card">
                <div class="course-header">
                    <h3>वस्त्र प्रौद्योगिकी</h3>
                </div>
                <div class="course-body">
                    <p>कपड़ा उद्योग में कौशल विकास</p>
                    <div class="course-duration">अवधि: 6-12 महीने</div>
                    <p>फैशन इंडस्ट्री में करियर बनाएं</p>
                </div>
            </div>
            <div class="course-card">
                <div class="course-header">
                    <h3>आतिथ्य प्रबंधन</h3>
                </div>
                <div class="course-body">
                    <p>होटल और रेस्तरां प्रबंधन में प्रशिक्षण</p>
                    <div class="course-duration">अवधि: 6-9 महीने</div>
                    <p>आतिथ्य क्षेत्र में विशेषज्ञ बनें</p>
                </div>
            </div>
            <div class="course-card">
                <div class="course-header">
                    <h3>डिजिटल मार्केटिंग</h3>
                </div>
                <div class="course-body">
                    <p>ऑनलाइन मार्केटिंग और सोशल मीडिया प्रबंधन</p>
                    <div class="course-duration">अवधि: 3-6 महीने</div>
                    <p>डिजिटल युग में सफल हों</p>
                </div>
            </div>
            <div class="course-card">
                <div class="course-header">
                    <h3>कंप्यूटर प्रशिक्षण</h3>
                </div>
                <div class="course-body">
                    <p>बेसिक से एडवांस कंप्यूटर कौशल</p>
                    <div class="course-duration">अवधि: 3-6 महीने</div>
                    <p>आईटी क्षेत्र में अपना करियर शुरू करें</p>
                </div>
            </div>
            <div class="course-card">
                <div class="course-header">
                    <h3>कृषि व्यवसाय</h3>
                </div>
                <div class="course-body">
                    <p>आधुनिक कृषि तकनीकें और व्यवसाय प्रबंधन</p>
                    <div class="course-duration">अवधि: 6-12 महीने</div>
                    <p>कृषि क्षेत्र में उद्यमी बनें</p>
                </div>
            </div>
        </div>
    </section>

    <!-- STATS SECTION -->
    <section class="stats">
        <div class="stats-grid">
            <div class="stat-item">
                <h3>5000+</h3>
                <p>प्रशिक्षित छात्र</p>
            </div>
            <div class="stat-item">
                <h3>50+</h3>
                <p>पाठ्यक्रम</p>
            </div>
            <div class="stat-item">
                <h3>95%</h3>
                <p>रोजगार दर</p>
            </div>
            <div class="stat-item">
                <h3>15+</h3>
                <p>वर्ष अनुभव</p>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="testimonials">
        <h2 class="section-title">छात्र समीक्षाएं</h2>
        <div class="testimonial-grid">
            <div class="testimonial-card">
                <p>"NSVTC में मेरा प्रशिक्षण अद्भुत था। मुझे व्यावहारिक ज्ञान और कौशल मिला जो मुझे अपना व्यवसाय शुरू करने में मदद करेगा।"</p>
                <div class="testimonial-author">- राहुल कुमार</div>
            </div>
            <div class="testimonial-card">
                <p>"प्रशिक्षकों की गुणवत्ता बहुत अच्छी है। मुझे आधुनिक सुविधाएं और व्यक्तिगत मार्गदर्शन मिला।"</p>
                <div class="testimonial-author">- प्रिया शर्मा</div>
            </div>
            <div class="testimonial-card">
                <p>"प्रशिक्षण के बाद मुझे तुरंत नौकरी मिल गई। NSVTC ने मेरी सभी अपेक्षाओं को पूरा किया।"</p>
                <div class="testimonial-author">- अजय पटेल</div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer id="contact">
        <div class="footer-content">
            <div class="footer-section">
                <h4>NSVTC के बारे में</h4>
                <p>हम युवाओं को व्यावहारिक कौशल प्रशिक्षण प्रदान करते हैं जो उन्हें रोजगार योग्य बनाता है।</p>
            </div>
            <div class="footer-section">
                <h4>त्वरित लिंक</h4>
                <ul>
                    <li><a href="#home">होम</a></li>
                    <li><a href="#courses">कोर्स</a></li>
                    <li><a href="#about">परिचय</a></li>
                    <li><a href="result.php">परिणाम</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>संपर्क जानकारी</h4>
                <ul>
                    <li>📍 दिल्ली, भारत</li>
                    <li>📞 +91-9876543210</li>
                    <li>📧 info@nsvtc.org</li>
                    <li>🕒 सोम-शुक्र: 9 AM - 5 PM</li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>सोशल मीडिया</h4>
                <ul>
                    <li><a href="#">📘 Facebook</a></li>
                    <li><a href="#">📷 Instagram</a></li>
                    <li><a href="#">🐦 Twitter</a></li>
                    <li><a href="#">💼 LinkedIn</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 NSVTC - National Skill & Vocational Training Centre. सर्वाधिकार सुरक्षित।</p>
        </div>
    </footer>
</body>
</html>
