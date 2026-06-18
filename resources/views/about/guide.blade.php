@extends('layouts.master')

@section('pagetitle', 'Guide - TasmimYar')
@section('header', 'Guide')


@section('content')


<div class="p-4  mb-4" dir="rtl" style="background-color: var(--glass-bg); border-right: 4px solid var(--metro-orange); text-align: justify;">
    <h4 class="mb-3 text-warning"><i class="bi bi-translate text-warning ms-2"></i> راهنمای فارسی :</h4>
    <hr class="border-light opacity-25">
    
    <div style="font-size: 15px; opacity: 0.85; line-height: 1.8;">
        
        <h5 class="fw-bold mb-3 mt-4">به «تصمیم‌یار» خوش آمدید! </h5>
        <p>گاهی اوقات تو زندگی سر دوراهی‌هایی قرار می‌گیریم که انتخاب کردن واقعاً سخت میشه. گزینه‌های مختلفی داریم و برای هر کدوم هم ده‌ها دلیل منطقی و احساسی تو ذهنمون می‌چرخه.</p>
        <p>یک راه حل جذاب و اثبات‌شده برای این مواقع، کمک گرفتن از <strong>ریاضیات و منطق</strong> است. تصمیم‌یار اینجاست تا به شما کمک کند دلایلتان را روی دایره بریزید تا ببینید طبق منطقِ خودتان، کدام انتخاب درست‌تر است.</p>
        <p>در این اپلیکیشن، ما دو مدل تصمیم‌گیری را برای شما در نظر گرفته‌ایم:</p>

        <h6 class="fw-bold mt-5 text-warning"><i class="bi bi-symmetry-vertical ms-2"></i>حالت اول: دوراهی‌ها (Binary)</h6>
        <p>برای زمان‌هایی که بین انجام دادن یا ندادن یک کار، یا بین دو انتخاب کاملاً متفاوت گیر کرده‌اید و هر کدام دلایل مستقل خودشان را دارند.</p>
        <p><strong>مثال:</strong> فرض کنید می‌خواهید تصمیم بگیرید که آیا مهاجرت کنید یا نه.<br>
        شما برای <strong>رفتن</strong> یک‌سری دلایل دارید (مثل: تجربه زندگی جدید، اقتصاد باثبات، آینده شغلی).<br>
        و برای <strong>ماندن</strong> هم دلایل دیگری دارید (مثل: بودن در کنار خانواده، شهروند درجه یک بودن، فرهنگ و زبان مادری).</p>
        
        <p><strong>چطور کار می‌کند؟</strong></p>
        <ol class="mb-4">
            <li>یک تصمیم باینری می‌سازید و این دو حالت (رفتن / ماندن) را تعریف می‌کنید.</li>
            <li>حالا شروع می‌کنید به اضافه کردن فاکتورها (دلایل).</li>
            <li>برای هر فاکتور باید دو چیز را مشخص کنید: <strong>ضریب</strong> و <strong>امتیاز</strong>.</li>
        </ol>

        <div class="p-3 mb-4 rounded" style="background-color: rgba(255,255,255,0.05); border-right: 3px solid var(--metro-orange);">
            <strong class="d-block mb-2"><i class="bi bi-lightbulb-fill text-warning ms-2"></i>تفاوت ضریب و امتیاز چیست؟</strong>
            <ul class="mb-0">
                <li class="mb-2"><strong>ضریب (وزن):</strong> یعنی این موضوع کلاً چقدر در زندگی شما اهمیت دارد؟ (از ۱ تا ۵). مثلاً «آینده شغلی» ممکن است برای شما اهمیت ۵ (خیلی مهم) داشته باشد.</li>
                <li><strong>امتیاز:</strong> یعنی این انتخابِ خاص، چقدر آن نیاز را برآورده می‌کند؟ (از ۱ تا ۱۰). مثلاً کشور مقصد، از نظر آینده شغلی نمره ۸ از ۱۰ را می‌گیرد.</li>
            </ul>
        </div>

        <h6 class="fw-bold mt-5 text-warning"><i class="bi bi-ui-radios-grid ms-2"></i>حالت دوم: چندگزینه‌ای (Multi)</h6>
        <p>برای زمان‌هایی که می‌خواهید از بین چند گزینه مختلف یکی را انتخاب کنید، در حالی که <strong>معیارها برای همه گزینه‌ها ثابت است.</strong></p>
        <p><strong>مثال:</strong> می‌خواهید برای مقطع ارشد بین ۳ دانشگاه (شریف، امیرکبیر و تهران) یکی را انتخاب کنید. معیارهای شما برای همه این دانشگاه‌ها یکسان است: مسافت، رتبه جهانی، وضعیت خوابگاه و سطح اساتید.</p>
        
        <p><strong>چطور کار می‌کند؟</strong></p>
        <ol class="mb-4">
            <li>یک تصمیم مولتی می‌سازید و گزینه‌ها (دانشگاه‌ها) را ثبت می‌کنید.</li>
            <li>فاکتورهایتان (معیارها) را تعریف می‌کنید و به هر فاکتور یک <strong>ضریب اهمیت</strong> (از ۱ تا ۵) می‌دهید.</li>
            <li>در نهایت، به هر دانشگاه در آن فاکتورِ خاص، <strong>امتیاز</strong> (از ۱ تا ۱۰) می‌دهید. مثلاً به مسافتِ دانشگاه تهران نمره ۷ و به مسافت شریف نمره ۵ می‌دهید.</li>
        </ol>
        <p>در آخر، سیستم با ضرب و جمع کردن این اعداد، برنده نهایی را به شما معرفی می‌کند!</p>

        <hr class="border-light opacity-25 my-4">

        <h6 class="fw-bold text-warning"><i class="bi bi-shield-lock-fill ms-2"></i>امنیت و حریم خصوصی</h6>
        <p>تمام اطلاعاتی که در این اپلیکیشن ثبت می‌کنید (مثل عنوان تصمیم‌ها، گزینه‌ها و دلایل)، به صورت <strong>رمزنگاری‌شده (Encrypted)</strong> در دیتابیس ما ذخیره می‌شوند. هیچ‌کس به جز خود شما نمی‌تواند آن‌ها را بخواند؛ حتی من به عنوان سازنده برنامه! پس با خیال راحت شخصی‌ترین تصمیم‌هایتان را ثبت کنید.</p>

        <h6 class="fw-bold mt-4 text-warning"><i class="bi bi-laptop ms-2"></i>درباره این نسخه (نسخه ۱.۰.۰)</h6>
        <p>این اپلیکیشن، اولین پروژه جدی وب من است که پس از حدود ۷ ماه یادگیری برنامه‌نویسی وب و مهندسی نرم‌افزار توسعه داده‌ام. از نظر ظاهر و رابط کاربری (UI/UX) شاید هنوز جای کار داشته باشد و ایده آل نباشه  چون خیلی سریع انجام شده و از کامپوننت های آماده استفاده شده، اما با اضافه شدن همکار طراح به تیم، قطعاً روز به روز بهتر خواهد شد.</p>
        <p class="mb-1 text-warning"><strong>تکنولوژی‌های استفاده شده:</strong></p>
        <ul class="mb-2">
            <li>بک‌اند: PHP و فریم‌ورک  Laravel 13</li>
            <li>فرانت‌اند: Laravel Blade و Bootstrap 5</li>
        </ul>
        <p class="text-info" style="font-size: 13px;"><em>(سورس کد این پروژه در گیت‌هاب من موجود است و می‌توانید از آن استفاده کنید).</em></p>

        <h6 class="fw-bold mt-4 text-warning"><i class="bi bi-chat-heart-fill ms-2"></i>و در نهایت...</h6>
        <p>اولین بار، ایده این سیستمِ تصمیم‌گیری را پدر دوست عزیزم امیر، جناب آقای <strong>داوود غضنفری</strong> مطرح کردند. تا پیش از این، ما این محاسبات را روی کاغذ یا نهایتاً در فایل اکسل انجام می‌دادیم. اما حالا بستری فراهم شده تا بتوانید تصمیمات خود را به سادگی در یک اپلیکیشن ثبت کنید، ویرایش کنید و همیشه در جیبتان همراه داشته باشید.</p>
        
        <p class="text-center mt-5 fs-5 text-warning">امیدوارم تصمیم‌یار، به شما در گرفتن بهترین تصمیم‌های زندگی‌تان کمک کند!</p>

    </div>
</div>



<div class="p-4" dir="ltr" style="background-color: var(--glass-bg); border-left: 4px solid var(--metro-blue); text-align: left;">
    <h4 class="mb-3 text-warning"><i class="bi bi-globe text-info me-2"></i> English Guide :</h4>
    <hr class="border-light opacity-25">
    
    <div style="font-size: 15px; opacity: 0.85; line-height: 1.8;">
        
        <h5 class="fw-bold mb-3 mt-4">Welcome to TasmimYar! </h5>
        <p>Sometimes in life, we find ourselves at a crossroads where making a choice is truly difficult. We have various options, and for each, dozens of logical and emotional reasons spin in our heads.</p>
        <p>A fascinating and proven solution for these moments is to use <strong>math and logic</strong>. TasmimYar is here to help you lay out your reasons to see which choice makes the most sense according to your own logic.</p>
        <p>In this app, we have designed two decision-making models for you:</p>

        <h6 class="fw-bold mt-5 text-warning"><i class="bi bi-symmetry-vertical me-2"></i>Mode 1: Binary Choices</h6>
        <p>For times when you are stuck between doing or not doing something, or between two completely different choices, each with its own independent reasons.</p>
        <p><strong>Example:</strong> Suppose you want to decide whether to emigrate or not.<br>
        You have some reasons for <strong>leaving</strong> (e.g., experiencing a new life, a stable economy, better career prospects).<br>
        And you have other reasons for <strong>staying</strong> (e.g., being close to family, feeling like a first-class citizen, native culture and language).</p>
        
        <p><strong>How does it work?</strong></p>
        <ol class="mb-4">
            <li>You create a Binary decision and define these two states (Leave / Stay).</li>
            <li>Now, you start adding factors (your reasons).</li>
            <li>For each factor, you must specify two things: <strong>Weight</strong> and <strong>Score</strong>.</li>
        </ol>

        <div class="p-3 mb-4 rounded" style="background-color: rgba(255,255,255,0.05); border-left: 3px solid var(--metro-orange);">
            <strong class="d-block mb-2"><i class="bi bi-lightbulb-fill text-warning me-2"></i>What is the difference between Weight and Score?</strong>
            <ul class="mb-0">
                <li class="mb-2"><strong>Weight (Importance):</strong> How important is this topic in your life overall? (from 1 to 5). For example, "Career Prospects" might have a weight of 5 (very important) for you.</li>
                <li><strong>Score:</strong> How well does this <em>specific choice</em> satisfy that need? (from 1 to 10). For example, the destination country might score an 8 out of 10 for career prospects.</li>
            </ul>
        </div>

        <h6 class="fw-bold mt-5 text-warning"><i class="bi bi-ui-radios-grid me-2"></i>Mode 2: Multi-Case Choices</h6>
        <p>For times when you want to choose one out of several different options, while the <strong>criteria remain the same for all options.</strong></p>
        <p><strong>Example:</strong> You want to choose between 3 universities (Sharif, Amirkabir, and Tehran) for your master's degree. Your criteria for all these universities are the same: distance, global ranking, dorm conditions, and the academic level of professors.</p>
        
        <p><strong>How does it work?</strong></p>
        <ol class="mb-4">
            <li>You create a Multi decision and register your options (the universities).</li>
            <li>You define your factors (criteria) and assign an <strong>importance weight</strong> (from 1 to 5) to each factor.</li>
            <li>Finally, you give each university a <strong>score</strong> (from 1 to 10) for that specific factor. For example, you might give Tehran University's distance a score of 7, and Sharif a 5.</li>
        </ol>
        <p>In the end, the system calculates the math and introduces the ultimate winner!</p>

        <hr class="border-light opacity-25 my-4">

        <h6 class="fw-bold text-warning"><i class="bi bi-shield-lock-fill me-2"></i>Security and Privacy</h6>
        <p>All the data you register in this app (like decision titles, options, and your reasons) is stored <strong>encrypted</strong> in our database. No one except you can read them; not even me as the app developer! So, feel free to record your most personal decisions with complete peace of mind.</p>

        <h6 class="fw-bold mt-4 text-warning"><i class="bi bi-laptop me-2"></i>About This Release (Version 1.0.0)</h6>
        <p>This application is my first serious web project, developed after about 7 months of learning web programming and software engineering. The appearance and user interface (UI/UX) might still need some work, but it will definitely improve once design colleagues join the team.</p>
        <p class="mb-1 text-warning" ><strong>Technologies Used:</strong></p>
        <ul class="mb-2">
            <li>Backend: PHP and Laravel 13 framework</li>
            <li>Frontend: Laravel Blade and Bootstrap 5</li>
        </ul>
        <p class="text-info" style="font-size: 13px;"><em>(The source code for this project is available on my GitHub for anyone to use).</em></p>

        <h6 class="fw-bold mt-4 text-warning"><i class="bi bi-chat-heart-fill me-2"></i>And Finally...</h6>
        <p>The idea for this decision-making system was first proposed by the father of my dear friend Amir, Mr. <strong>Davood Ghazanfari</strong>. Previously, we did these calculations on paper or in Excel files. But now, a platform is available so you can easily register your decisions in an app, edit them, and always carry them in your pocket.</p>
        
        <p class="text-center mt-5 fs-5 text-warning">I hope TasmimYar helps you make the best decisions of your life!</p>

    </div>
</div>

<h1 class="page-title my-4">Social</h1>
<div class="row my-5">
    <div class="col-md-3 col-6 mb-3">
        <x-tile href="https://github.com/armannella/DecisionHelper" color="bgc-purple" icon="bi-github" title="GitHub" />
    </div>
    <div class="col-md-3 col-6 mb-3">
        <x-tile href="#" color="bgc-red" icon="bi-envelope" title="Email" />
    </div>
    <div class="col-md-3 col-6 mb-3">
        <x-tile href="https://www.linkedin.com/in/armannella/" color="bgc-green" icon="bi-linkedin" title="Linkedin" />
    </div>
    <div class="col-md-3 col-6 mb-3">
        <x-tile href="#" color="bgc-orange" icon="bi-telegram" title="Telegram" />
    </div>
</div>
@endsection