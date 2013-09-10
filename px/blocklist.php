<?php

function check_domain($domain, $url=false){

  $blocked = array(
  
  	// hack attempts
  	'unirgy.com'
  	,'hummingray.com'
  	,'ebay.com'
  
    // add servers 
    ,'adsbookie.com'
    ,'globaltakeoff.net'
    ,'media-servers.net'
    ,'trafficjunky.net'
    ,'yeildmanager.com'
    ,'juicyads.com'
    ,'doubleclick.net'
    ,'mediadakine.com'
    ,'premiumaccounts.com'
    ,'tracklead.net'
    ,'adperium.com'
    ,'kaskus.us'
    ,'getscorecash.com'
    ,'liberty-land.net' // check this one maybe
    ,'cltomedia.info'
    ,'adgoto.com'
    ,'linkbucks.com'
    ,'dexplatform.com'
    ,'convomedia.com'
    ,'blueadvertise.com'
    ,'adsheiker.com'
    ,'dvdbox.com'
    ,'clicksagent.com'
    ,'atdmt.com'
    ,'altitudedigitalpartners.com'
    ,'imagevenue.com'
    ,'etology.com'
    ,'comclick.com'
    ,'domdex.com'
    ,'adf.ly'
    
    // porn
    ,'kindgirls.com'
    ,'planetsuzy.org'
    ,'watchmyfg.net'
    ,'89.com'
    ,'aebn.net'
    ,'slutload.com'
    ,'brazzers.com'
    ,'pornbb.com'
    ,'kaktuz.net'
    ,'drowle.com'
    ,'bharatstudent.com'
    ,'redtube.com'
    ,'freetube.com'
    ,'freeiphonesex.info'
    ,'maturescam.com'
    ,'tube8.com'
    ,'xxx4ar.net'
    ,'fpfreegals.com'
    ,'loading321.com'
    ,'xvideos.com'
    ,'stolengfs.com'
    ,'stablesugar.com'
    ,'hornywhores.net'
    ,'nicevid.net'
    ,'publicsluts.com'
    ,'worldsex.com'
    ,'4greedy.com'
    ,'doctorslick.com'
    ,'imageporter.com'
    ,'xhamster.com'
    ,'blogbugs.org'
    ,'seekbang.com'
    ,'sexygames.com'
    ,'ufym.net'
    ,'girlsdoporn.net'
    ,'jeegar.com'
    ,'wap95.com'
    ,'amateurvideosclub.com'
    ,'allover30.net'
    ,'bangbusbang.com'
    ,'bigbreastarchive.com'
    ,'bigbreastgirlz.com'
    ,'bigcockcock.com'
    ,'bignaturals.com'
    ,'boobsview.com'
    ,'fling.com'
    ,'caught-on-webcams.info'
    ,'crazyxxx3dworld.com'
    ,'cuteselfpics.com'
    ,'ngebid.com'
    ,'free.fr'
    ,'delightlinks.com'
    ,'brandreachsys.com'
    ,'freeamaturelovers.com'
    ,'pichunter.com'
    ,'freevideosex.com'
    ,'fuckinginhell.com'
    ,'tease-pics.com'
    ,'realitykings.com'
    ,'rk.com'
    ,'thicknbusty.com'
    ,'transsexualgfs.com'
    ,'gfs4free.com'
    ,'gfsinporn.com'
    ,'twistys.com'
    ,'goldcum.com'
    ,'trikepatrol.com'
    ,'adult.com'
    ,'hotbigscreens.com'
    ,'hotpicsfalleries.com'
    ,'jam-hot.com'
    ,'jizz-whore-party.com'
    ,'large-labia-lips.com'
    ,'sendori.com'
    ,'lifejasmin.com'
    ,'lusciouschicks.com'
    ,'xnxx.com'
    ,'phree-porn.com'
    ,'pixhost.org'
    ,'prettybabes4u.com'
    ,'prettypussies.com'
    ,'porn.com'
    ,'qualitybigmovies.com'
    ,'rudeinternet.com'
    ,'sex-harem.org'
    ,'slutsvideos.com'
    ,'smothermenow.com'
    ,'solo-teenies.com'
    ,'spicypornstars.com'
    ,'tripplexgalleries.com'
    ,'unclewoodies.com'
    ,'wifecrazy.com'
    ,'wildchickmovies.com'
    ,'3at3ot.com'
    ,'bangedmamas.com'
    ,'freepornfreeporn.com'
    ,'holycumshot.com'
    ,'hqvirgins.com'
    ,'ladyboygoo.com'
    ,'tgsex.com'
    ,'xxxdessert.com'
    ,'lbgirlfriends.com'
    ,'beporn.com'
    ,'adultworld.com' 
    ,'shegods.com' // started keyword block list here
    ,'shemale-list.com'
    ,'looti.net'
    ,'allfreegay.com'
    ,'gaydar.co.uk'
    ,'perfectgirls.net'
    ,'hotgirlclub.com'
    ,'lulz.net'
    ,'18onlygirls.com'
    ,'lu.scio.us'
    ,'kenmovies.com'
    ,'youcuties.net'
    ,'ah-me.com'
    ,'britfa.gs'
    ,'kaskoos.com'
    // all the same damn site:
    ,'ps46.info'
    ,'ps29.info'
    ,'ts05.info'
    ,'freepicseries.com'
    ,'bigtattas.com'
    ,'nubiles.net'
    ,'o5wap.ru'
    ,'beeg.com'
    ,'kaskoos.com'
    ,'arabs3x.net'
    ,'keezmovies.com'
    ,'66nar.com'
    ,'nylos.com'
    ,'arabks.com'
    ,'siteslike.com'
    ,'filestube.com'
    ,'veronicasdiary.com'
    ,'pinoy3g.info'
    ,'asredas.com'
    ,'haifa6.com'
    ,'jartna.com'
    ,'shahvani.com'
    ,'boysfood.com'
    ,'kos5.com'
    ,'arab66.com'
    ,'thickbbwforum.com'
    ,'exgfpics.com'
    ,'sksawi.info'
    ,'za3ror.com'
    ,'6nar.com'
    ,'boyreview.com'
    ,'wen.ru'
    ,'debonairblog.com'
    ,'videosz.com'
    ,'moremoms.com'
    ,'shof6.com'
    ,'fantasti.cc'
    ,'xtgem.com'
    ,'deviantclip.com'
    ,'3mx.biz'
    ,'artemisweb.jp'
    ,'timpug.com'
    ,'easygals.com'
    ,'banoota.iwannaforum.com'
    ,'deffki.com'
    ,'plombir.ru'
    ,'thehun.org'
    ,'freeones.com'
    ,'ohlalaguys.com'
    ,'torsky.org'
    ,'egotastic.com'
    ,'crysty.com'
    ,'brazzersnetwork.com'
    ,'asktiava.com'
    ,'playboy.com'
    ,'kirtu.com'
    ,'extremetube.com'
    ,'centerfold.com'
    ,'erogamihonpo.com'
    ,'puramierda.net'
    ,'dlsite.com'
    ,'joymii.com'
    ,'myscandalcollection.net'
    ,'pofig.com'
    
    // free hosting sits (full of porn)
    ,'blogspot.com' // due to 'bodybohay.blogspot.net', but I'm sure there's more
    ,'blogspot.com' // http://eviltwincaps.blogspot.com/
    ,'livedoor.com'
    
    
    // illegal (in USA)
    ,'movizxpress.com'
    ,'softarchive.net'
    ,'asrejavaan.com'
    ,'metasploit.com'
    ,'hdreactor.org'
    
    // other junk
    ,'macromedia.com'
    ,'222.178.216.53'
    ,'bypass.garyshood.com' // another proxy. for real?
    ,'greatplay.net'
    ,'anonymous.zcat.us'
    ,'phpmyproxy.com'
    ,'overstij.com' // viruses
    //,'youtube.com' // doesn't work - might as well have my ads when they learn that ;)
    //,'tubzen.mobi' // converts youtube vids to downloadable files.. and so far the usage seems legit.
    ,'kuvia.eu'
    ,'punkysiteinsurance.co.za'
    ,'punkyhost.com'
    ,'botproxy.com'
    ,'zabanefarsi.com'
    ,'premzik.com'
    //,'youtube.com'
    
    // lottery sites
    //,'etip.sk'
    //,'tipos.sk'
    
    // hosting services
    ,'hotfile.com'
    ,'rapidshare.com'
    ,'rapidshare.de'
    ,'megaupload.com'
    ,'oron.com'
    ,'enterupload.com'
    ,'filetracker.org'
    ,'4shared.com'
    ,'filesonic.com'
    ,'easy-share.com'
    ,'letitbit.net'
    ,'shareflare.net'
    
    // bt sites
    //,'fennopy.com' 
  );
  
  $blocked_words = array(
  	// hack attempts
  	'config.php?open='
  	,'locks/info.php'
  	,'bare/fn.php'
  	,'/lib/info.php'
  
    // ad servers
    ,'ads.'
    ,'ad.'
    ,'openx.'
    ,'adserving.'
    ,'advertising.'
    ,'advertisement'
    //,'pagead2.' //ga
    ,'rotator.'
    ,'banners.'
    ,'banner.'
    
    // porn
    ,'porn'
    ,'adult'
    ,'sex'
    ,'xxx'
    ,'fuck'
    ,'panty'
    ,'pussy'
    ,'teen'
    ,'dick'
	,'penis'
    ,'shemale'
    ,'busty'
    ,'nude'
    ,'naked'
    ,'mature'
    ,'slut'
    ,'incest'
    ,'gallery'
    ,'galleries'
    ,'lust'
    ,'gay'
    ,'69'
    ,'orgasm'
    ,'rape'
    ,'hentai'
    ,'lesbian'
    ,'erotic'
    ,'girl'
    ,'babe'
    ,'anal'
    ,'innocent'
    ,'spank'
    ,'obscene' 
    ,'boob'
    ,'ass'
    ,'movie'
    ,'film'
    ,'amateur'
    ,'milf'
    ,'strip'
    ,'flix'
    ,'bondage'
    ,'butt'
    ,'wang'
    ,'jizz'
    ,'seduction'
    ,'diantar'
    ,'bohay'
    ,'perve'
    ,'minas'
    
    
    // other 
    ,'torrent'
    ,'proxy'
    ,'warez'
    
  );
  
  $domain = strtolower($domain);

  // check if the domain (including sub-domains) is blocked
  if(in_array($domain, $blocked)){
    blocked();
  }
  
  // check if the domain name (ignoring sub-domain) is blocked
  $bits = explode('.',$domain);
  $length = 2;
  $rev = array_reverse($bits);
  if(sizeof($rev) > 1 && $rev[1] == 'co'){
    $length = 3;
  }
  $top = join('.', array_slice($bits, sizeof($bits) - $length));
  if(in_array($top, $blocked)){
    blocked();
  }

  // check if there are any numbers in the domain name
  // domains with numbers tend to be junk, with the exception of subdomains.
  // also blocks ip addresses
  if(preg_match('/[0-9]/', $top)){
	blocked();
  }
  
  // check the domain name for any blocked words
  foreach($blocked_words as $word){
    if(strpos($domain, $word) !== false){
      blocked();
    }
	// check the full url for blocked keywords
	if($url && strpos($url, $word) !== false){
		blocked();
	}
  }
}


function blocked(){
  header('location: /px/no-proxy.php');
  exit();
}

?>