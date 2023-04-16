<html><head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	function tally (selector) {
		$(selector).each(function () {
			var total = 0,
				column = $(this).siblings(selector).andSelf().index(this);
			$(this).parents().prevUntil(':has(' + selector + ')').each(function () {
				total += parseFloat($('td.sum:eq(' + column + ')', this).html()) || 0;
			})
			$(this).html(total.toFixed(2));
		});
	}
	tally('td.subtotal');

});
 
</script>
</head>
<body>
<table id="data">
<thead>
<tr><th>Name</th><th>Age</th><th>Weight</th></tr>
</thead>
<tbody>
<tr><td>Joe</td><td>30</td><td class="sum">200.50</td></tr>
<tr><td>Jack</td><td>29</td><td class="sum">165</td></tr>
<tr><td>Jim</td><td>31</td><td class="sum">178</td></tr>
<tr><td>Jeff</td><td>28</td><td class="sum">173</td></tr>


<tr><th colspan="2" align="right">Sum</th><td class="subtotal"></td></tr>
</tbody>
</table>
</body>
</html>