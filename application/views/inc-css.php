<!-- favicon -->
<link rel="shortcut icon" type="image/png" href=<?= base_url("assets/img/favicon.png") ?>>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">

<link rel="stylesheet" href=<?= base_url("assets/css/all.min.css") ?>>
<link rel="stylesheet" href=<?= base_url("assets/bootstrap/css/bootstrap.min.css") ?>>
<link rel="stylesheet" href=<?= base_url("assets/css/owl.carousel.css") ?>>
<link rel="stylesheet" href=<?= base_url("assets/css/magnific-popup.css") ?>>
<link rel="stylesheet" href=<?= base_url("assets/css/animate.css") ?>>
<link rel="stylesheet" href=<?= base_url("assets/css/meanmenu.min.css") ?>>
<link rel="stylesheet" href=<?= base_url("assets/css/main.css") ?>>
<link rel="stylesheet" href=<?= base_url("assets/css/responsive.css") ?>>

<style>
  .container {
    padding: 2rem 0rem;
  }

  @media (min-width: 576px) {
    .modal-dialog {
      max-width: 400px;
    }

    .modal-dialog .modal-content {
      padding: 1rem;
    }
  }

  .modal-header .close {
    margin-top: -1.5rem;
  }

  .form-title {
    margin: -2rem 0rem 2rem;
  }

  .btn-round {
    border-radius: 3rem;
  }

  .delimiter {
    padding: 1rem;
  }

  .social-buttons .btn {
    margin: 0 0.5rem 1rem;
  }

  .signup-section {
    padding: 0.3rem 0rem;
  }

  /* login Model*/


  @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
  @import url('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

  * {
    margin: 0;
    padding: 0;
  }
/* 
  body {
    font-family: 'Roboto', sans-serif;
    font-style: normal;
    font-weight: 300;
    font-smoothing: antialiased;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font-size: 15px;
    background: #eee;
  } */

  .intro {
    background: #fff;
    padding: 60px 30px;
    color: #333;
    margin-bottom: 15px;
    line-height: 1.5;
    text-align: center;
  }

  .intro h1 {
    font-size: 18pt;
    padding-bottom: 15px;

  }

  .intro p {
    font-size: 14px;
  }

  .action {
    text-align: center;
    display: block;
    margin-top: 20px;
  }

  a.btn {
    text-decoration: none;
    color: #666;
    border: 2px solid #666;
    padding: 10px 15px;
    display: inline-block;
    margin-left: 5px;
  }

  a.btn:hover {
    background: #666;
    color: #fff;
    transition: .3s;
    -webkit-transition: .3s;
  }

  .btn:before {
    font-family: FontAwesome;
    font-weight: normal;
    margin-right: 10px;
  }

  .github:before {
    content: "\f09b"
  }

  .down:before {
    content: "\f019"
  }

  .back:before {
    content: "\f112"
  }

  .credit {
    background: #fff;
    padding: 12px;
    font-size: 9pt;
    text-align: center;
    color: #333;
    margin-top: 40px;

  }

  .credit span:before {
    font-family: FontAwesome;
    color: #e41b17;
    content: "\f004";


  }

  .credit a {
    color: #333;
    text-decoration: none;
  }

  .credit a:hover {
    color: #1DBF73;
  }

  .credit a:hover:after {
    font-family: FontAwesome;
    content: "\f08e";
    font-size: 9pt;
    position: absolute;
    margin: 3px;
  }

  main {
    background: #fff;
    padding: 20px;
  }

  article li {
    color: #444;
    font-size: 15px;
    margin-left: 33px;
    line-height: 1.5;
    padding: 5px;
  }

  article h1,
  article h2,
  article h3,
  article h4,
  article p {
    padding: 14px;
    color: #333;
  }

  article p {
    font-size: 15px;
    line-height: 1.5;
  }

  @media only screen and (min-width: 720px) {
    main {
      max-width: 720px;
      margin-left: auto;
      margin-right: auto;
      padding: 24px;
    }


  }

  .set-overlayer,
  .set-glass,
  .set-sticky {
    cursor: pointer;
    height: 45px;
    line-height: 45px;
    padding: 0 15px;
    color: #333;
    font-size: 16px;
  }

  .set-overlayer:after,
  .set-glass:after,
  .to-active:after,
  .set-sticky:after {
    font-family: FontAwesome;
    font-size: 18pt;
    position: relative;
    float: right;
  }

  .set-overlayer:after,
  .set-glass:after,
  .set-sticky:after {
    content: "\f204";
    transition: .6s;
  }

  .to-active:after {
    content: "\f205";
    color: #008080;
    transition: .6s;
  }

  .set-overlayer,
  .set-glass,
  .set-sticky,
  .source,
  .theme-tray {
    margin: 10px;
    background: #f2f2f2;
    border-radius: 5px;
    border: 2px solid #f1f1f1;
    box-sizing: border-box;
  }

  /* Syntax Highlighter*/

  pre.prettyprint {
    padding: 15px !important;
    margin: 10px;
    border: 0 !important;
    background: #f2f2f2;
    overflow: auto;
  }

  .source {
    white-space: pre;
    overflow: auto;
    max-height: 400px;
  }

  code {
    border: 1px solid #ddd;
    padding: 2px;
    border-radius: 2px;
  }
</style>