<!DOCTYPE html>
<html>
<head>
  <title>Teams</title>
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
    
    main {
      padding: 20px;
    }
    
    form {
      background-color: #fff;
      padding: 20px;
      margin-bottom: 20px;
    }
    
    label {
      display: block;
      margin-bottom: 10px;
    }
    
    input[type="text"],
    input[type="email"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    
    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ccc;
    }
    
    th {
      background-color: #333;
      color: #fff;
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
    <h1>Teams</h1>
    </a>
  </header>
  
  <main>
    <form method="POST" action="{{url('/teams/insert')}}">
        @csrf
      <label for="name">Team Name:</label>
      <input type="text" id="name" name="name" placeholder="Enter team name" required>
      
      <label for="email">City:</label>
      <input type="text" id="city" name="city" placeholder="Enter Cities Team" required>
      
      <input type="submit" value="Submit">
    </form>
    <h1>Team List</h1>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>City</th>
        </tr>
      </thead>
      <tbody >
        @foreach ($table as $t)
        <tr>
            <td>{{$t->name}}</td>
            <td>{{$t->city}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </main>
  
</body>
</html>
