<style>
.article_share {
	width: 90%;
	margin-top: 30px;
	font-weight: 700;
	text-align: center;
}
@media only screen and (min-width: 480px) {
  .article_share {
 	  text-align: left;
  }
}
@media only screen and (min-width: 720px) {
  .article_share {
 	  width: 70%;
  }
}
@media only screen and (min-width: 480px) {
  .article_share li {
 	  display: inline;
 	  margin-right: 10px;
  }
}
.social_icon {
  padding-right: 5px;
}
@media only screen and (min-width: 720px) {
  .social_border::after, .social_border::before {
    content: "|";
    color: #EDEDED;
    padding: 5px;
    margin: 0px;
  }
}
@media only screen and (min-width: 980px) {
  .social_border::after, .social_border::before {
    padding: 15px;
  }
}
</style>
<ul class="article_share">
  <li>
    <a href="#"><i class="fa fa-facebook social_icon" aria-hidden="true"></i> Facebook</a>
  </li>
  <li class="social_border">
    <a href="#"><i class="fa fa-twitter social_icon" aria-hidden="true"></i> Twitter</a>
  </li>
  <li>
    <a href="#"><i class="fa fa-flickr social_icon" aria-hidden="true"></i> Flickr</a>
  </li>
</ul>
