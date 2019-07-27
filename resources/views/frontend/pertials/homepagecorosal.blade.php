<script >
	$('.carousel[data-type="multi1"] .item').each(function() 
	{
		var totalItems1 = $('.carousel[data-type="multi1"] .item').length;
		var itemsPerSlide1 = 4;
		var next = $(this).next();
		if (!next.length) {
			next = $(this).siblings(':first');
		}
		next.children(':first-child').clone().appendTo($(this));
		if(totalItems1>2){
			for (var i = 0; i <itemsPerSlide1- 2; i++) 
			{
				next = next.next();
				if (!next.length) 
				{
					next = $(this).siblings(':first');
				}
				next.children(':first-child').clone().appendTo($(this));
			}}
		});
	$('.carousel[data-type="multi2"] .item').each(function() 
	{
		var totalItems1 = $('.carousel[data-type="multi2"] .item').length;
		var itemsPerSlide1 = 3;
		var next = $(this).next();
		if (!next.length) {
			next = $(this).siblings(':first');
		}
		next.children(':first-child').clone().appendTo($(this));
		if(totalItems1>2){
			for (var i = 0; i <itemsPerSlide1- 2; i++) 
			{
				next = next.next();
				if (!next.length) 
				{
					next = $(this).siblings(':first');
				}
				next.children(':first-child').clone().appendTo($(this));
			}}
		});
	$('.carousel[data-type="multi3"] .item').each(function() 
	{
		var totalItems1 = $('.carousel[data-type="multi3"] .item').length;
		var itemsPerSlide1 = 4;
		var next = $(this).next();
		if (!next.length) {
			next = $(this).siblings(':first');
		}
		next.children(':first-child').clone().appendTo($(this));
		if(totalItems1>2){
			for (var i = 0; i <itemsPerSlide1- 2; i++) 
			{
				next = next.next();
				if (!next.length) 
				{
					next = $(this).siblings(':first');
				}
				next.children(':first-child').clone().appendTo($(this));
			}}
		});
	$('.carousel[data-type="multi4"] .item').each(function() 
	{
		var totalItems1 = $('.carousel[data-type="multi4"] .item').length;
		var itemsPerSlide1 = 3;
		var next = $(this).next();
		if (!next.length) {
			next = $(this).siblings(':first');
		}
		next.children(':first-child').clone().appendTo($(this));
		if(totalItems1>2){
			for (var i = 0; i <itemsPerSlide1- 2; i++) 
			{
				next = next.next();
				if (!next.length) 
				{
					next = $(this).siblings(':first');
				}
				next.children(':first-child').clone().appendTo($(this));
			}}
		});
	$('.carousel[data-type="multi5"] .item').each(function() 
	{
		var totalItems1 = $('.carousel[data-type="multi5"] .item').length;
		var itemsPerSlide1 = 3;
		var next = $(this).next();
		if (!next.length) {
			next = $(this).siblings(':first');
		}
		next.children(':first-child').clone().appendTo($(this));
		if(totalItems1>2){
			for (var i = 0; i <itemsPerSlide1- 2; i++) 
			{
				next = next.next();
				if (!next.length) 
				{
					next = $(this).siblings(':first');
				}
				next.children(':first-child').clone().appendTo($(this));
			}}
		});


	$('.carousel[data-type="brand"] .item').each(function() {
		var totalItems1 = $('.carousel[data-type="brand"] .item').length;
		var itemsPerSlide = 6;
		var next = $(this).next();
		if (!next.length) {
			next = $(this).siblings(':first');
		}
		next.children(':first-child').clone().appendTo($(this));
		if(totalItems1>2){
			for (var i = 0; i <itemsPerSlide- 2; i++) 
			{
				next = next.next();
				if (!next.length) {
					next = $(this).siblings(':first');
				}
				next.children(':first-child').clone().appendTo($(this));
			}
		}
	});

</script>