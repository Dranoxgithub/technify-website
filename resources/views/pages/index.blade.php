@extends ('layouts.index')

@section ('content')

<!-- Banner -->
<section id="banner">
				<div class="content d-flex flex-column justify-content-center">
					<h1>Use tech to transform & empower</h1>
					<div class="d-flex flex-row justify-content-center">
						<p class="col-md-6">
							Technify connects top tech talents at U.S colleges with social enterprises and NGOs in Southeast Asia
						</p>
					</div>
					<ul class="actions">
						<li><a href="#one" class="button scrolly">Get Started</a></li>
					</ul>
				</div>
			</section>

		<!-- One -->
			<section id="one" class="wrapper">
				<div class="inner flex flex-3">
					<div class="flex-item left">
						<div>
							<h1>Why</h1>
							<p class="text-right">
								We believe in tech, but we believe more in the humanity behind tech. 
								Join us now to find out how you can help bridge the digital gap in Southeast Asia and change tens of thousands of lives!
							</p>
						</div>
						
					</div>
					<div class="flex-item image fit round">
						<img src="images/heart.jpg" alt="" />
					</div>
					<div class="flex-item right">
						<div>
							<h1>How</h1>
							<p>We help Southeast Asian changemakers overcome obstacles to sustainable change through pro bono tech consulting and innovative digital solutions.</p>
						</div>
					</div>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper style1 special">
				<div class="inner">
					<h2>Feugiat lorem</h2>
					<figure>
					    <blockquote>
					        "Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra<br /> magna etiam lorem ultricies in diam. Sed arcu cras consequat."
					    </blockquote>
					    <footer>
					        <cite class="author">Jane Anderson</cite>
					        <cite class="company">CEO, Soup Kitchen</cite>
					    </footer>
					</figure>
				</div>
			</section>

        <!-- Three -->
        
			<section id="three" class="wrapper">
				<div class="container text-center my-3">
					<h2 class="font-weight-light">Featured Projects</h2>
					<div class="row mx-auto my-4">
						<div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
							<div class="carousel-inner w-100 mx-auto" role="listbox">
								<div class="row mx-auto">
									<div class="carousel-item active">
										<div class="col-md-8  mx-auto">
											<div class="card w-100" style="height:550px">
												<img class="card-img-top" src="images/lostfood.png" style="height:250px">
												<div class="card-body overflow-auto">
													<h4 class="card-title">The Lost Food Project</h4>
													<p class="card-text text-left">
														<span style="font-weight:bold; color:#f6755e">Problem</span><br>
														Confronted with a rising shortage of food donations since the pandemic, TLFP has been struggling to engage with more potential donors as the logistics of collecting food donations is a discouraging factor for neighborhood grocers. <br>
														<br><span style="font-weight:bold;  color:#f6755e">Technify's Solution</span><br>
														A team of students from Duke University was put together to help TLFP build a centralized donation application with the aims of reaching out to and onboarding more potential food donors.
													</p>
												</div>
											</div>
										</div>
									</div>
									<div class="carousel-item">
										<div class="col-md-8 mx-auto">
											<div class="card w-100" style="height:550px">
												<img class="featured-project-image" src="images/pertiwisoupkitchen.jpg" style="height:250px">
												<div class="card-body overflow-auto">
													<h4 class="card-title">Pertiwi Soup Kitchen</h4>
													<p class="card-text text-left">
														<span style="font-weight:bold;color:#f6755e">Problem</span><br>
														Established more than a decade ago, PSK is currently serving about 1,700 homeless Malaysians, and they have been struggling to build a stronger online presence with their obsolete, static website. They need a dynamic website with backend controls to share the locations of their operations and reach out to more communities and volunteers.<br>
														<br><span style="font-weight:bold; color:#f6755e">Technify's Solution</span><br>
														A team U.S. college students was put together to help PSK build a dynamic website to reach more beneficiaries and digitalize the onboarding of temporary / long-term volunteers.
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
								<span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
				</div>	
			</section>
			
@endsection



    