<div id="slider" class="carousel slide" data-ride="carousel">
	{{-- <ol class="carousel-indicators">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	</ol> --}}
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img class="d-block w-100" src="{{ URL::asset("images/computers.jpg") }}" alt="First slide" style="">
			<div class="carousel-caption first d-md-block text-right ml-5 pb-0">
    			<h2 class="display-4 text-lowercase font-weight-normal mb-0 pr-5 mr-5">Изчисли успеха си</h2>
  			</div>
		</div>
		<div class="carousel-item">
			<img class="d-block w-100" src="{{ URL::asset("images/searching.jpg") }}" alt="Second slide">
			<div class="carousel-caption second d-md-block text-right ml-5 pb-0">
    			<h2 class="display-4 text-lowercase font-weight-normal mb-0 pr-5 mr-5">Избери университет</h2>
  			</div>
		</div>
		<div class="carousel-item">
			<img class="d-block w-100" src="{{ URL::asset("images/graduate1.jpg") }}" alt="Third slide">
			<div class="carousel-caption third d-md-block text-right ml-5 pb-0">
    			<h2 class="display-4 text-lowercase font-weight-normal mb-0 pr-5 mr-5">Сбъдни мечта</h2>
  			</div>
		</div>
	</div>
	<a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#slider" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>