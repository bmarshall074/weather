<div class="navbar">
<div class="navbar-inner">
<a class="brand" href="./">Weather</a>
<ul class="nav">
	<li><a href="./?p=weather_map">Map</a></li>
	<li><a href="./?p=add_location">Add</a></li>
	<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Search...</a>
		<ul class="dropdown-menu">
			<li>
				<form class="form-search" action="./?p=display_weather" method="get">
				<input type="hidden" name="p" value="display_weather" />
	 				<div class="input-append">
	    				<input type="text" class="span2 search-query" name="zip" placeholder="Search by Zipcode">
	    				<button type="submit" class="btn">Search</button>
	 				</div>
	  				<div class="input-append">
	  					<input type="text" class="span2 search-query" name="location" placeholder="Seach by Location">
	    				<button type="submit" class="btn">Search</button>
	  				</div>
				</form>
			</li>
		</ul>
	</li>	
</ul>
</div>
</div>
