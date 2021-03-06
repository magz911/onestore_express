<!-- LOADER -->
	<div id="preloader">
    <div class="bubbles">
      <div class="title">loading</div>
      <span></span>
      <span id="bubble2"></span>
      <span id="bubble3"></span>
    </div>
  </div>


<style>
/*loader*/
#preloader{position: fixed; width: 100%; height: 100%; background: #fff; z-index: 9999999;top:0px;left:0px;overflow:hidden;}
.bubbles{text-align: center; position: absolute; left: 0; width: 100%; top: 50%; margin-top: -30px;}
.bubbles .title{color: #a1a1a1; font-size: 25px; line-height: 25px; margin-bottom: 50px; font-weight: 500;}
.bubbles span {display: inline-block; vertical-align: middle; width: 15px; height: 15px; background: #11b091; border-radius: 50%; -moz-border-radius: 50%; -webkit-border-radius: 50%; animation: bubbly .9s infinite alternate;}
#bubble2 {animation-delay: .27s;}
#bubble3 {animation-delay: .54s;}
@-webkit-keyframes bubbly {
  0% {
    width: 15px;
    height: 15px;
    opacity: 1;
    -webkit-transform: translateY(0);
  }
  100% {
    width: 50px;
    height: 50px;
    opacity: 0.1;
    -webkit-transform: translateY(-32px);
  }
}
@keyframes bubbly {
  0% {
    width: 15px;
    height: 15px;
    opacity: 1;
    transform: translateY(0);
  }
  100% {
    width: 50px;
    height: 50px;
    opacity: 0.1;
    transform: translateY(-32px);
  }
}
</style>