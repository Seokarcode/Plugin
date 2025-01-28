<?php
/*
Plugin Name: حاشیه نویس پیوند خارجی
Version: 2.0
Description: نشانگرهای شماره گذاری شده را برای پیوندهای خارجی اضافه می کند و بخش مراجع ایجاد می کند
Author: <a href="https://sajjadakbari.ir">Sajjad Akbari</a>
*/
function ela_enqueue_scripts() {
    ?>
    <style>
        /* استایل دایره‌های شماره */
        .ela-marker {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: #ff9999; /* تغییر رنگ به قرمز کمرنگ */
            color: #fff !important; /* تضمین سفید بودن متن */
            font-size: 12px;
            font-weight: bold;
            margin: 0 3px;
            cursor: pointer;
            transition: all 0.3s ease;
            vertical-align: super;
            text-decoration: none !important;
        }

        .ela-marker:hover {
            background: #ff6666; /* سایه تیره تر برای هاور */
            transform: translateY(-2px);
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }

        /* بهبود استایل بخش منابع */
        #ela-references {
            margin: 50px 0;
            padding: 30px;
            background: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            border-left: 4px solid #3498db;
            scroll-margin-top: 50px; /* ایجاد فضای اسکرول */
        }

        #ela-references h3 {
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 2px solid #eee;
        }

        #ela-references ol {
            list-style: none;
            counter-reset: ela-counter;
            padding: 0;
            margin: 0;
        }

        #ela-references li {
            counter-increment: ela-counter;
            margin-bottom: 15px;
            padding: 15px;
            background: #fff;
            border-radius: 4px;
            transition: all 0.3s ease;
            position: relative;
            border: 1px solid #eee;
        }

        #ela-references li:hover {
            transform: translateX(10px);
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        }

        #ela-references li::before {
            content: counter(ela-counter);
            position: absolute;
            left: -35px;
            top: 50%;
            transform: translateY(-50%);
            width: 28px;
            height: 28px;
            background: #3498db;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }

        #ela-references a {
            color: #2c3e50;
            text-decoration: none;
            font-weight: 500;
            display: block;
            padding: 10px;
            transition: all 0.3s ease;
            border-radius: 4px;
        }

        #ela-references a:hover {
            background: rgba(255,102,102,0.1); /* افکت هاور جدید */
            padding-left: 15px;
            color: #e74c3c;
        }
    </style>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // اسکرول نرم به بخش منابع
        document.querySelectorAll('.ela-marker').forEach(marker => {
            marker.addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('ela-references').scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // افزودن هاور برای لینک‌های مرجع
        document.querySelectorAll('#ela-references a').forEach(link => {
            link.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.02)';
            });
            link.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });
    });
    </script>
    <?php
}

// سایر توابع پلاگین بدون تغییر باقی می‌مانند
