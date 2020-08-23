<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello, I'm Bariq</title>
    <link rel="shortcut icon" href="{{ asset('img/letterD.webp') }}">
    <link rel="icon" href="{{ asset('img/letterD.webp') }}" sizes="192x192">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/letterD.webp') }}">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>

<body>
<div id="app">
    <nav>
        <ul>
            <li><a href="#skills">My Passion</a></li>
            <li><a href="#creation">My Creation</a></li>
            <li id="brand">
                <a href="#">Bariq Dharmawan</a>
                <a href="javascript:void(0);"><box-icon name='menu-alt-right' color="white"></box-icon></a>
            </li>
            <li><a href="#about">About Me</a></li>
            <li><a href="#contact">Find Me</a></li>
        </ul>
    </nav>
    <header>
        <div class="text-header">
            <h1>Hello, <span> I am Bariq </span></h1>
            <h2>I am fall in love with Developing Web</h2>
            <a href="#skills">Look at down <box-icon name='chevrons-down' type='solid' color="white"></box-icon></a>
        </div>
    </header>
    <main>
        <section id="skills">
            <div class="container">
                <h2>Passionate</h2>
                <div class="row">
                    <div class="skills__item">
                        <figure>
                            <img src="{{ asset('img/html.webp') }}" height="80" alt="My Skills">
                            <figcaption>
                                <p>Html</p>
                                <p>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon name='star-half' type='solid' ></box-icon>
                                </p>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="{{ asset('img/css.webp') }}" height="80" alt="My Skills">
                            <figcaption>
                                <p>CSS</p>
                                <p>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon name='star-half' type='solid' ></box-icon>
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="skills__item">
                        <figure>
                            <img src="{{ asset('img/laravel.svg') }}" height="80" alt="My Skills">
                            <figcaption>
                                <p>Laravel</p>
                                <p>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon name='star'></box-icon>
                                </p>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="{{ asset('img/php.webp') }}" height="80" alt="My Skills">
                            <figcaption>
                                <p>PHP Native</p>
                                <p>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon name='star'></box-icon>
                                    <box-icon name='star'></box-icon>
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="skills__item">
                        <figure>
                            <img src="{{ asset('img/js.webp') }}" height="80" alt="My Skills">
                            <figcaption>
                                <p>JS Native</p>
                                <p>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon name='star' ></box-icon>
                                    <box-icon name='star' ></box-icon>
                                </p>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="{{ asset('img/jquery.webp') }}" height="80" alt="My Skills">
                            <figcaption>
                                <p>Jquery</p>
                                <p>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon name='star' ></box-icon>
                                </p>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="{{ asset('img/gsap.webp') }}" height="90" alt="My Skills">
                            <figcaption>
                                <p>Greenshock Animation</p>
                                <p>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon name='star' ></box-icon>
                                    <box-icon name='star' ></box-icon>
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="skills__item">
                        <figure>
                            <img src="{{ asset('img/git.webp') }}" height="80" alt="My Skills">
                            <figcaption>
                                <p>git</p>
                                <p>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon name='star-half' type='solid' ></box-icon>
                                    <box-icon name='star' ></box-icon>
                                </p>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="{{ asset('img/webpack.webp') }}" height="90" alt="My Skills">
                            <figcaption>
                                <p>Webpack</p>
                                <p>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon name='star' ></box-icon>
                                    <box-icon name='star' ></box-icon>
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="skills__item">
                        <figure>
                            <img src="{{ asset('img/bootstrap.webp') }}" height="80" alt="My Skills">
                            <figcaption>
                                <p>Bootstrap</p>
                                <p>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon name='star-half' type='solid' ></box-icon>
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="skills__item">
                        <figure>
                            <img src="{{ asset('img/sass.webp') }}" height="80" alt="My Skills">
                            <figcaption>
                                <p>Sass</p>
                                <p>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon name='star' ></box-icon>
                                </p>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="{{ asset('img/stylus.svg') }} " height="80" alt="My Skills">
                            <figcaption>
                                <p>Stylus</p>
                                <p>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon type='solid' name='star'></box-icon>
                                    <box-icon name='star' ></box-icon>
                                    <box-icon name='star' ></box-icon>
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="skills__item">
                        <figure>
                            <img src="{{ asset('img/xd.webp') }}" height="90" alt="My Skills">
                            <figcaption>
                                <p>Adobe XD</p>
                                <box-icon type='solid' name='star'></box-icon>
                                <box-icon type='solid' name='star'></box-icon>
                                <box-icon type='solid' name='star'></box-icon>
                                <box-icon name='star-half' type='solid' ></box-icon>
                                <box-icon name='star' ></box-icon>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="{{ asset('img/photoshop.webp') }}" height="90" alt="My Skills">
                            <figcaption>
                                <p>Photoshop</p>
                                <box-icon type='solid' name='star'></box-icon>
                                <box-icon type='solid' name='star'></box-icon>
                                <box-icon name='star' ></box-icon>
                                <box-icon name='star' ></box-icon>
                                <box-icon name='star' ></box-icon>
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="{{ asset('img/figma.webp') }}" height="90" alt="My Skills">
                            <figcaption>
                                <p>Figma</p>
                                <box-icon type='solid' name='star'></box-icon>
                                <box-icon type='solid' name='star'></box-icon>
                                <box-icon type='solid' name='star'></box-icon>
                                <box-icon name='star' ></box-icon>
                                <box-icon name='star' ></box-icon>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </section>
        <section id="creation">
            <div class="container">
                <h2>My Best Creation</h2>
                <div class="row">
                    <figure>
                        <img src="{{ asset('img/desainin.webp') }} " alt="My Creation">
                        <figcaption>
                            <h3><a href="https://desainin-development.online" target="_blank">Desainin</a></h3>
                            <p>Marketplace to order design</p>
                            <small style="margin-top: 10px">
                                (pengerjaan team, template tidak disediakan, desain landing-page disediakan)
                            </small>
                        </figcaption>
                    </figure>
                    <figure>
                        <img src="{{ asset('img/lesin.webp') }} " alt="My Creation">
                        <figcaption>
                            <h3>Lesin (hasil lomba)</h3>
                            <p>Ordering teacher you want</p>
                            <small style="margin-top: 10px">
                                (pengerjaan team, template tidak disediakan, seluruh desain disediakan)
                            </small>
                        </figcaption>
                    </figure>
                    <figure>
                        <img src="{{ asset('img/gkp.webp') }} " alt="My Creation">
                        <figcaption>
                            <h3><a href="http://gemakreasipratama.com" target="_blank">Gema Kreasi Pratama</a></h3>
                            <p>Company Profile For PT Gema Kreasi Pratama</p>
                            <small style="margin-top: 10px">
                                (pengerjaan team, template dan desain tidak disediakan)
                            </small>
                        </figcaption>
                    </figure>
                    <figure>
                        <img src="{{ asset('img/dicksonsynergy.webp') }} " alt="My Creation">
                        <figcaption>
                            <h3><a href="http://dicksonsynergy.co.id">Dickson Synergy</a></h3>
                            <p><i>Company profile</i> for PT Dickson Synergy</p>
                            <small style="margin-top: 10px">
                                (pengerjaan sendiri, template tidak disediakan, seluruh desain disediakan)
                            </small>
                        </figcaption>
                    </figure>
                    <figure>
                        <img src="{{ asset('img/ebina.webp') }} " alt="My Creation">
                        <figcaption>
                            <h3>Ebina</h3>
                            <p>Financial Management Consultant</p>
                            <small style="margin-top: 10px">
                                (pengerjaan team, template dan desain tidak disediakan)
                            </small>
                        </figcaption>
                    </figure>
                    <figure>
                        <img src="{{ asset('img/insive.webp') }} " alt="My Creation">
                        <figcaption>
                            <h3><a href="https://insive.id/" target="_blank">Insive</a></h3>
                            <p>Pemesanan Masker Kosmetik</p>
                            <small style="margin-top: 10px">
                                (pengerjaan team, template tidak disediakan, seluruh desain disediakan)
                            </small>
                        </figcaption>
                    </figure>
                    <small>and many more but I forgot . . .</small>
                </div>
            </div>
        </section>
        <section id="about">
            <div class="container">
                <h2>About Me</h2>
                <ul>
                    <li>
                        <img src="{{ asset('img/graduate.webp') }}" height="65" alt="My Career">
                        <h3>Vocational School <time>2016-2019</time></h3>
                        <p>From here I start my exploration about <b>coding</b>. Web programming, desktop programming,
                            android programming, and many more I've learned from this school.
                            And bcz of that I've found my passion is <strong>web programming</strong>
                        </p>
                        <i class='bx bx-caret-down'></i>
                    </li>
                    <li>
                        <img src="{{ asset('img/business.webp') }}" height="65" alt="My Career">
                        <h3>
                            Internship at
                            <address>
                                <a href="https://definite.co.id/about-us/" target="_blank">
                                    PT.Definite Maji Arsana
                                </a>
                            </address>
                            <time>February 2018 - April 2018</time>
                        </h3>
                        <p>
                            In February 2018, I'm trying to <q>work</q> on a real place.
                            <b>PT. Definite Maji Arsana</b> is the place I've pick to Internship for 3 months.
                            Bcz of this program Internship, I've learn so many thing that I didn't know before.
                            Working in a team, follow the instruction carefully,
                            working with fun, and many more. Yeaaah I love it!!
                        </p>
                        <i class='bx bx-caret-down'></i>
                    </li>
                    <li>
                        <img src="{{ asset('img/business.webp') }}" height="65" alt="My Career">
                        <h3>Win the <a href="https://www.arkademy.com/arkchallenge">#Arkchallenge</a> as third place</h3>
                        <p>I can't even say a word anymore about this honor. This is my first glory to win the charter
                            and make the school proud on the public and I've to say thank you to my team. Yappp!
                        </p>
                        <i class='bx bx-caret-down'></i>
                    </li>
                    <li>
                        <img src="{{ asset('img/graduate.webp') }}" height="65" alt="My Career">
                        <h3>
                            College at <address style="display: inline-block"><a href="https://upnvj.ac.id" target="_blank">UPN</a></address>
                            as S1 Informatics Engineering in <time>2019 - Now</time>
                        </h3>
                        <p>I'm trying to follow my school instruction to join SNMPTN and pick what campus I want.
                            In a few days finally I've found what campus I want. I picked <strong>UPN</strong> and follow
                            the further instruction to ensure whether I'm accepted or not.
                            And somehow <strong>(thanks to GOD)</strong> I'm eligible to become a student of UPN! Yeayyy!!
                        </p>
                    </li>
                </ul>
            </div>
        </section>
        <section id="contact">
            <div class="container">
                <h2>Find Me On</h2>
                <ul>
                    <li>
                        <a href="https://www.linkedin.com/in/dharmawan03/" target="_blank">
                            <box-icon type='logo' name='linkedin-square' color="#30a2c6" position="left"></box-icon>
                            <small>Bariq Dharmawan</small>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/bariqdharmawans/" target="_blank">
                            <box-icon name='instagram' type='logo' color="#80148a" position="left"></box-icon>
                            <small>bariqdharmawans</small>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:dharmawan.muhammad03@gmail.com" target="_blank">
                            <box-icon type='logo' name='google-plus-circle' color="#d52c2c" position="left"></box-icon>
                            <small>dharmawan.muhammad03@gmail.com</small>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/BariqDharmawan16" target="_blank">
                            <box-icon name='facebook-circle' type='logo' color="#19447c" position="left"></box-icon>
                            <small>Muhammad Bariq Dharmawan</small>
                        </a>
                    </li>
                    <li>
                        <a href="https://bitbucket.org/dharmawans/" target="_blank">
                            <box-icon name='git' type='logo' color="#e04b37" position="left"></box-icon>
                            <small>Dharmawans</small>
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/6287771406656" target="_blank">
                            <box-icon name='whatsapp' type='logo' color="#58c84a" position="left"></box-icon>
                            <small>087771406656</small>
                        </a>
                    </li>
                </ul>
                <address>
                    @include('partials.map')
                    <small>Swadaya Gudang Baru, Jagakarsa, South Jakarta</small>
                </address>
            </div>
        </section>
    </main>
</div>
<footer>
    &copy; Muhammad Bariq Dharmawan | <time>2019</time>
</footer>
<script src="{{ asset('js/landing.js') }}"></script>
</body>
</html>
