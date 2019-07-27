
  <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
  
  
  <script src="https://kit.fontawesome.com/3eca27fb90.js"></script>
  <link rel="stylesheet" href="{{ asset('frontend/css/show-hide-text.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/prettyPhoto.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/price-range.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/category.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/rating.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/brand.css') }}">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/css/alertify.min.css"/>
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->  
 <style  media="screen">
   .no-spinners {
-moz-appearance:textfield;
background: transparent;border: none;outline: none; text-align: right
}
.no-spinners::-webkit-outer-spin-button,
.no-spinners::-webkit-inner-spin-button {
-webkit-appearance: none;
margin: 0;
background: transparent;border: none;outline: none; text-align: right
}

}
 </style>

 <style type="text/css">
  .indentity {
  margin: 0!important
}
figure.testimonial {
  position: relative;
  float: left;
  overflow: hidden;
  margin: 10px 1%;
  padding: 0 20px;
  text-align: left;
  box-shadow: none !important;
}
figure.testimonial * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.35s cubic-bezier(0.25, 0.5, 0.5, 0.9);
  transition: all 0.35s cubic-bezier(0.25, 0.5, 0.5, 0.9);
}
figure.testimonial img {
  max-width: 100%;
  vertical-align: middle;
  height: 90px;
  width: 90px;
  border-radius: 50%;
  margin: 40px 0 0 10px;
}
figure.testimonial blockquote {
  background-color: #fff;
  display: block;
  font-size: 16px;
  font-weight: 400;
  line-height: 1.5em;
  margin: 0;
  padding: 25px 50px 30px;
  position: relative;
}
figure.testimonial blockquote:before, figure.testimonial blockquote:after {
  content: "\201C";
  position: absolute;
  color: #ff5057;
  font-size: 50px;
  font-style: normal;
}
figure.testimonial blockquote:before {
  top: 25px;
  left: 20px;
}
figure.testimonial blockquote:after {
  content: "\201D";
  right: 20px;
  bottom: 0;
}
figure.testimonial .btn {
  top: 100%;
  left: 15%;
  width: 0;
  height: 0;
  /*border-left: 0 solid transparent;*/
  border-right: 25px solid transparent;
  border-top: 25px solid #fff;
  margin: 0;
  position: absolute;
  padding: 6px 2px
}
figure.testimonial .peopl {
  position: absolute;
  bottom: 45px;
  padding: 0 10px 0 120px;
  margin: 0;
  color: #ffffff;
  -webkit-transform: translateY(50%);
  transform: translateY(50%);
}
figure.testimonial .peopl h3 {
  opacity: 0.9;
  margin: 0;
}
</style>

 @section('headerSection')
    @show