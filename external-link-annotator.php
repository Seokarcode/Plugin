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
            background: #2c3e50;
            color: #fff;
            font-size: 12px;
            font-weight: bold;
            margin: 0 3px;
            cursor: pointer;
            transition: all 0.3s ease;
            vertical-align: super;
        }

        .ela-marker:hover {
            background: #e74c3c;
            transform: translateY(-2px);
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }

        /* استایل بخش منابع */
        #ela-references {
            margin: 50px 0;
            padding: 30px;
            background: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            border-left: 4px solid #3498db;
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
            padding: 5px 0;
        }

        #ela-references a:hover {
            color: #e74c3c;
            text-decoration: underline;
        }
    </style>
    
    <script>
    // (کد جاوااسکریپت بدون تغییر می‌ماند)
    </script>
    <?php
}
