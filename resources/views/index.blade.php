<!DOCTYPE html>
<html>
<head>
  <title>Perbolaan duniawi</title>
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
    <h1>Welcome to My Page</h1>
  </header>
  
  <nav>
    <a href="{{url("/teams")}}">Team Input</a>
    <a href="{{url("/matches")}}">Score Input</a>
    <a href="#">Standings</a>
  </nav>
</body>
</html>
