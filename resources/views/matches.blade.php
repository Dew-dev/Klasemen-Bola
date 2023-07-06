<!DOCTYPE html>
<html>
<head>
  <title>Beautified Page with Links</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f2f2f2;
    }
    
    header {
      background-color: #333;
      padding: 20px;
      color: #fff;
    }
    
    h1 {
      margin: 0;
    }
    
    nav {
      background-color: #666;
      padding: 10px;
    }
    
    nav a {
      color: #fff;
      text-decoration: none;
      margin-right: 10px;
    }
    
    main {
      padding: 20px;
    }
    
    footer {
      background-color: #333;
      padding: 20px;
      color: #fff;
      text-align: center;
    }
  </style>
</head>
<body>
  <header>
    <a href="{{url('/')}}">
        <h1>Matches</h1>
        </a>
  </header>
  
  <main>
    <h2>About Me</h2>
    <a href="{{url('/matches/single')}}"> <p>single</p> </a>
    <a href="{{url('/matches/multiple')}}"> <p>multiple</p> </a>
  </main>
  
</body>
</html>
