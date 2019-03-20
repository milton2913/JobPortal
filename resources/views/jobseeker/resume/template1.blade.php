@extends('layouts.master')

@section('content')
    <div id="button" class="no-print">
        <button type="button" onclick="myFunction()"><span class="button-txt"><i class="fa fa-print" aria-hidden="true"></i>
&nbsp;Print</span></button>
        <script>
            function myFunction() {
                window.print();
            }
        </script>
    </div>
    <section class="heading">
        <h1>Curriculum Vitae</h1>
        <div class="profile"></div>
        <div class="name">
            <ul>
                <li>Candy (Chih-Ching) Tsai</li>
                <li>蔡智晴</li>
            </ul>
        </div>
        <h2 class="sm-name">Candy (Chih-Ching) Tsai<br>蔡智晴</h2>
        <div class="social">
            <ul>
                <li><a href="https://goo.gl/NqkodQ" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a></li>
                <li><a href="https://goo.gl/4P9h6M" target="_blank"><i class="fa fa-twitter-square fa-2x"></i></a></li>
                <li><a href="https://goo.gl/5cLXe7" target="_blank"><i class="fa fa-codepen fa-2x"></i></a></i>
                </li>
            </ul>
        </div>
    </section>
    <div class="wrapper">
        <section class="block info">
            <h2>Personal Information</h2>
            <ul>
                <li>E-mail: <span class="email"></span></li>
                <li>Location: New Taipei City, Taiwan</li>
            </ul>
            <h3>Languages</h3>
            <ul>
                <li class="pri-tag">Chinese (Native)</li>
                <li class="pri-tag">English (TOEIC 985)</li>
                <li class="pri-tag">German (B1)</li>
            </ul>
        </section>
        <section class="block edu">
            <h2>Education</h2>
            <div class="degree">
                <h3>M.S. Graduate Institute of Biomedical Electronics and Bioinformatics</h3>
                <p class="research">Research Topic: Computer Aided Diagnosis for Breast Ultrasound based on Deep Learning</p>
                <p>National Taiwan University<br> 2015-Present
                </p>
            </div>
            <div class="degree">
                <h3>B.S. Bachelor Program of Biotechnology, B.B.A. Dept. of Marketing</h3>
                <p>National Chung Hsing University<br> 2010-2015
                </p>
            </div>
        </section>
        <section class="block exp">
            <h2>Experience</h2>
            <div class="exp-item">
                <h3>Software Development Intern</h3>
                <p><a href="https://www.yoctol.com/" target="_blank" rel="noopener noreferrer">Yoctol Info</a>
                </p>
                <p>2016/06 - 2017/03</p>
                <ul>
                    <li><a href="https://ptter.yoctol.com" target="_blank" rel="noopener noreferrer">Ptter</a> (Website and LINE bot) - Visualization tool for PTT</li>
                    <li><a href="https://www.yoctol.com/" target="_blank" rel="noopener noreferrer">Company Website</a></li>
                </ul>
            </div>
            <div class="exp-item">
                <h3>Web Development Intern</h3>
                <p><a href="https://tw.voicetube.com" target="_blank" rel="noopener noreferrer">VoiceTube</a> (紅點子科技股份有限公司 REDIdea Co., Ltd)</p>
                <p>2016/02 - 2016/04</p>
                <ul>
                    <li>Chrome Extension - <a href="https://chrome.google.com/webstore/detail/voicetube-dictionary/jknhnffcaenjjlneglfcihapfklmefob" target="_blank" rel="noopender noreferrer">VoiceTube Dictionary</a> (10,000+ users)</li>
                </ul>
            </div>
            <div class="exp-item">
                <h3>Web Design Instructor</h3>
                <p><a href="https://www.csie.ntu.edu.tw/train/?page=index.html" target="_blank" rel="noopener noreferrer">National Taiwan University CSIE</a> (台灣大學資訊系統訓練班)</p>
                <p>2016/1, 2016/8-2016/9</p>
                <ul>
                    <li>HTML, CSS, jQuery, Bootstrap</li>
                    <li><a href="https://stringpiggy.hpd.io/frontend-teaching/" target="_blank">Teaching Review (Chinese)</a></li>
                </ul>
            </div>
        </section>
        <section class="block projects">
            <h2>Projects</h2>
            <div class="exp-item">
                <h3>Technical Blog</h3>
                <p><a href="https://stringpiggy.hpd.io" target="_blank">StringPiggy</a> (字串小豬)</p>
                <p>2015/08 - Present</p>
            </div>
            <div class="exp-item">
                <h3><a href="http://app.bebi.ntu.edu.tw/ntubebiten/splash/" target="_blank" ref="noopender noreferrer">10<sup>th</sup> Anniversary Website</a> for Graduate Institute of Biomedical Electronics and Bioinformatics</h3>
                <h3><a href="http://app.bebi.ntu.edu.tw/camp2016/" target="_blank" ref="noopender noreferrer">2016 Camp Website</a> for Graduate Institute of Biomedical Electronics and Bioinformatics</h3>
            </div>
        </section>
        <section class="block skills">
            <h2>Primary Skills - Web Development</h2>
            <h3>Frontend</h3>
            <ul>
                <li class="pri-tag">HTML</li>
                <li class="pri-tag">CSS (Sass)</li>
                <li class="sec-tag">Bootstrap</li>
                <li class="sec-tag">Foundation</li>
                <li class="pri-tag">JavaScript</li>
                <li class="sec-tag">ReactJS</li>
                <li class="sec-tag">jQuery</li>
            </ul>
            <h3>Backend</h3>
            <ul>
                <li class="pri-tag">Python</li>
                <li class="sec-tag">Flask</li>
                <li class="pri-tag">JavaScript</li>
                <li class="sec-tag">Node.js</li>
            </ul>
        </section>
        <section class="block skills">
            <h2>Other Skills</h2>
            <h3>Machine Learning Tools</h3>
            <ul>
                <li class="pri-tag">Python</li>
                <li class="sec-tag">Pandas</li>
                <li class="sec-tag">Keras</li>
                <li class="sec-tag">scikit-learn</li>
            </ul>
        </section>
        <section class="block about">
            <h2>About Me</h2>
            <p>Great passion towards frontend web development, embraces new technology and loves to share information with others.</p>
        </section>
        <footer>Last Updated: 2017-05-12. Designed by Candy Tsai.</footer>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="{{url('assets/resume-template/a/css/style.css')}}">
    @endpush

@push('script')

@endpush