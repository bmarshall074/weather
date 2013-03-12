<div class="navbar">
<div class="navbar-inner">
<a class="brand" href="./">Weather</a>
<ul class="nav">
	<li><a href="./?p=list_locations">Saved Locations</a></li>
	<li><a href="./?p=form_add_location">Add</a></li>
	<li id="search">
		<form class="form-search" action="./?p=display_weather" method="get">
			<input type="hidden" name="p" value="display_weather" />
	  				<div class="input-append">
	  					<input type="text" class="span2 search-query" name="location" placeholder="Seach by city or zip">
	    				<button type="submit" class="btn">Search</button>
	  				</div>
		</form>
	</li>	
</ul>
</div>
</div>
