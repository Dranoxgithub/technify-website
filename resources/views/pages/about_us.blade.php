
@extends ('layouts.layout')

@section ('content')

<section class="container-fluid">
    <div id="banner" class="row p-4 justify-content-center">
        <div class="content d-flex flex-column justify-content-center text-center">
            <h1>Meet our team</h1>
            <h5>We are a group of students believing in tech for social good.</h5>
        </div>
    </div>
</section>



<div class="container bootdey">
        <!-- <div class="row">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Executive Board</h4>
                </div>
            </div>
        </div> -->

        <div class="row">
            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                <div class="team text-center rounded p-3 py-4">
                    <img src="images/Khoo.jpeg" class="img-fluid avatar avatar-medium shadow rounded-pill profile-pic" alt="">
                    <div class="content mt-3">
                        <h4 class="title mb-0"><a href="https://www.linkedin.com/in/qi-xuan-khoo-767239168/" target="blank" style="color: #26484A;">Qi Xuan Khoo</a></h4>
                        <small class="text-muted">Co-Founder, Executive Director</small>
                        <p>Karsh Scholar at Duke studying Economics and Computer Science. A part-time musician, full-time foodie, and a dreamer who aspires to inspire before he expires.</p>
                        <ul class="list-unstyled mt-3 social-icon social mb-0">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-facebook" title="Facebook"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-instagram" title="Instagram"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-twitter" title="Twitter"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-google-plus" title="Google +"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-linkedin" title="Linkedin"></i></a></li>
                        </ul><!--end icon-->
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                <div class="team text-center rounded p-3 py-4">
                    <img src={{ asset('images/Anni.jpeg') }} class="img-fluid avatar avatar-medium shadow rounded-pill profile-pic" alt="">
                    <div class="content mt-3">
                        <h4 class="title mb-0"><a href="https://www.linkedin.com/in/anni-chen-02/" target="blank" style="color:#26484A">Anni Chen</a></h4>
                        <small class="text-muted">Co-Founder, Executive Director</small>
                        <p>Sophomore at Duke University majoring in Mathematics and Computer Science. Passionate about women in tech and tech for social good.</p>
                        <ul class="list-unstyled mt-3 social-icon social mb-0">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-facebook" title="Facebook"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-instagram" title="Instagram"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-twitter" title="Twitter"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-google-plus" title="Google +"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-linkedin" title="Linkedin"></i></a></li>
                        </ul><!--end icon-->
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                <div class="team text-center rounded p-3 py-4">
                    <img src="images/Raj.jpeg" class="img-fluid avatar avatar-medium shadow rounded-pill profile-pic" alt="">
                    <div class="content mt-3">
                        <h4 class="title mb-0"><a href="https://www.linkedin.com/in/tharunraj7/" target="blank" style="color:#26484A">Tharun Raj</a></h4>
                        <small class="text-muted">Product Management Lead</small>
                        <p>Junior at Duke studying Computer Science and Statistics. A fan of all things tech, with a sprinkle of philosophy into the mix.</p>
                        <ul class="list-unstyled mt-3 social-icon social mb-0">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-facebook" title="Facebook"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-instagram" title="Instagram"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-twitter" title="Twitter"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-google-plus" title="Google +"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-linkedin" title="Linkedin"></i></a></li>
                        </ul><!--end icon-->
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                <div class="team text-center rounded p-3 py-4">
                    <img src="images/Andrea.jpeg" class="img-fluid avatar avatar-medium shadow rounded-pill profile-pic" alt="">
                    <div class="content mt-3">
                        <h4 class="title mb-0"><a href="https://www.linkedin.com/in/andreacenteno/" target="blank" style="color:#26484A">Andrea Centeno</a></h4>
                        <small class="text-muted">Treasurer</small>
                        <p>Sophomore at Duke University studying Economics and Political Science for a career using innovative solutions to tackle global issues. International development optimist and committed to measurably improve lives. </p>
                        <ul class="list-unstyled mt-3 social-icon social mb-0">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-facebook" title="Facebook"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-instagram" title="Instagram"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-twitter" title="Twitter"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-google-plus" title="Google +"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-linkedin" title="Linkedin"></i></a></li>
                        </ul><!--end icon-->
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                <div class="team text-center rounded p-3 py-4">
                    <img src="images/Kyra.jpeg" class="img-fluid avatar avatar-medium shadow rounded-pill profile-pic" alt="">
                    <div class="content mt-3">
                        <h4 class="title mb-0"><a href="https://www.linkedin.com/in/kyratichan/" target="blank" style="color:#26484A">Kyra Chan</a></h4>
                        <small class="text-muted">Design Lead</small>
                        <p>Junior at Duke double majoring in Electrical Computer Engineering and Computer Science, with a minor in Visual Media Studies. Things I love: my corgi, food, and everything design-related!</p>
                        <ul class="list-unstyled mt-3 social-icon social mb-0">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-facebook" title="Facebook"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-instagram" title="Instagram"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-twitter" title="Twitter"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-google-plus" title="Google +"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-linkedin" title="Linkedin"></i></a></li>
                        </ul><!--end icon-->
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                <div class="team text-center rounded p-3 py-4">
                    <img src="images/Thuan.jpeg" class="img-fluid avatar avatar-medium shadow rounded-pill profile-pic" alt="">
                    <div class="content mt-3">
                        <h4 class="title mb-0"><a href="https://www.linkedin.com/in/thuanmtran/" target="blank" style="color:#26484A">Thuan Tran</a></h4>
                        <small class="text-muted">Marketing Lead</small>
                        <p>Studying political science and energy at Duke University. Interested in finding the intersection between business and sustainability - social, economic, or environmental. Please feel free to reach out to me.</p>
                        <ul class="list-unstyled mt-3 social-icon social mb-0">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-facebook" title="Facebook"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-instagram" title="Instagram"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-twitter" title="Twitter"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-google-plus" title="Google +"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-linkedin" title="Linkedin"></i></a></li>
                        </ul><!--end icon-->
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                <div class="team text-center rounded p-3 py-4">
                    <img src="images/Shine.jpeg" class="img-fluid avatar avatar-medium shadow rounded-pill profile-pic" alt="">
                    <div class="content mt-3">
                        <h4 class="title mb-0"><a href="https://www.linkedin.com/in/shinezwu/" target="blank" style="color:#26484A">Shine Wu</a></h4>
                        <small class="text-muted">Project Director</small>
                        <p>Robertson Scholar at Duke studying Economics and Data Science. Lover of the outdoors, climate and frontier tech investor, and avid basketball fan.</p>
                        <ul class="list-unstyled mt-3 social-icon social mb-0">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-facebook" title="Facebook"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-instagram" title="Instagram"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-twitter" title="Twitter"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-google-plus" title="Google +"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-linkedin" title="Linkedin"></i></a></li>
                        </ul><!--end icon-->
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                <div class="team text-center rounded p-3 py-4">
                    <img src="images/Rui.jpeg" class="img-fluid avatar avatar-medium shadow rounded-pill profile-pic" alt="">
                    <div class="content mt-3">
                        <h4 class="title mb-0"><a href="https://www.linkedin.com/in/rui-xin-8070181b9/" target="blank" style="color:#26484A">Rui Xin</a></h4>
                        <small class="text-muted">Software Engineer</small>
                        <p>Sophomore at Duke majoring in Mathematics and Computer Science. Interested in how everything works. 
</p>
                        <ul class="list-unstyled mt-3 social-icon social mb-0">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-facebook" title="Facebook"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-instagram" title="Instagram"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-twitter" title="Twitter"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-google-plus" title="Google +"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-linkedin" title="Linkedin"></i></a></li>
                        </ul><!--end icon-->
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                <div class="team text-center rounded p-3 py-4">
                    <img src="images/Ignacio.jpeg" class="img-fluid avatar avatar-medium shadow rounded-pill profile-pic" alt="">
                    <div class="content mt-3">
                        <h4 class="title mb-0">Ignacio Heeren</h4>
                        <small class="text-muted">Student Outreach Lead</small>
                        <p>
                            Sophomore at Duke University majoring in Philosophy and Political Science. Passionate about the intersection between science and humanities.
                        </p>
                        <ul class="list-unstyled mt-3 social-icon social mb-0">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-facebook" title="Facebook"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-instagram" title="Instagram"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-twitter" title="Twitter"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-google-plus" title="Google +"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-linkedin" title="Linkedin"></i></a></li>
                        </ul><!--end icon-->
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                <div class="team text-center rounded p-3 py-4">
                    <img src="images/Jonathan.jpeg" class="img-fluid avatar avatar-medium shadow rounded-pill profile-pic" alt="">
                    <div class="content mt-3">
                        <h4 class="title mb-0"><a href="https://www.linkedin.com/in/jonathan-griffin-b112bb195" target="blank" style="color:#26484A">Jonathan Griffin</a></h4>
                        <small class="text-muted">Student / Partner Outreach</small>
                        <p>Jonathan Griffin is a sophomore from Alexandria, Virginia studying Economics, Political Science, and Chinese language. While not a CompSci student himself, Jonathan looks forward to contributing to Technify's 
                            mission by helping match capable students with partner organizations. 
</p>
                        <ul class="list-unstyled mt-3 social-icon social mb-0">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-facebook" title="Facebook"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-instagram" title="Instagram"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-twitter" title="Twitter"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-google-plus" title="Google +"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-linkedin" title="Linkedin"></i></a></li>
                        </ul><!--end icon-->
                    </div>
                </div>
            </div><!--end col-->

        </div><!--end row-->
    </div>




    
            

@endsection
