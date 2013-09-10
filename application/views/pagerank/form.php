<h2>Google PageRank lookup tool</h2>


<?php if(time() < strtotime("October 25, 2011")) : ?>

<div class="hilight" style="font-size:12pt; margin-top:20px; padding:15px"> 
    Now updated to work with Google's new pagerank system!
</div>

<?php endif; ?>

<form action="" method="post">
<p>Enter up to 10 urls, one per line:
<p><textarea name="q" rows="10" cols="60" style="width:550px;">









</textarea></p>
<p style="margin-bottom:0;"><input type="submit" value="Lookup"></p>
</form>

<div class="right" style="width:200px; text-align:left; margin-left:25px;">
<h2>Bookmarklett</h2>
<p>Drag this link to your bookmarks toolbar to instantly look up the PageRank of any page: </p>
<p style="margin:26px 0"><a style="padding:10px 30px;" class="hilight" 
  onclick="alert('To use this bookmarklett:\n\n1) Drag the words \'Get Pagerank\' to your bookmarks toolbar\n2) Navigate to the page you would like to look up\n3) Click the \'Get Pagerank\'  bookmark you created in step 1'); return false;" 
  href="javascript:void(function(d,l,s){s=d.createElement('script');s.src='//nfriedly.com/pagerank.js/'+l.hostname+l.pathname;d.body.appendChild(s);}(document,window.location))" 
  title="PageRank lookup by nfriedly.com/pagerank">Get PageRank</a></p>
</div>