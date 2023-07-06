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
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
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
        <a href="{{ url('/') }}">
            <h1>Teams</h1>
        </a>
    </header>

    <main>
        <form method="POST" action="{{ url('/matches/saveSingle') }}">
            @csrf
            <label for="name">Team Name:</label>
            <select class="team" id="firstTeam" name="teams[]">
            </select>

            <label for="email">Score:</label>
            <input type="text" name="score[]" placeholder="Enter score">

            <label for="name">Team Name:</label>
            <select class="team" id="secondTeam" name="teams[]" disabled>
            </select>

            <label for="email">Score:</label>
            <input type="text" name="score[]" placeholder="Enter score">

            <input type="submit" value="Submit">
        </form>
    </main>

</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var secondSelect = $("#secondTeam");

    // Store the initial options of the second select
    var initialOptions = secondSelect.html();
    $(document).ready(function() {
        $.get('{{ url('/getTeams') }}', function(data, success) {
            let p = JSON.parse(data)
            // console.log(p);
            for (i = 0; i < p.length; i++) {
                $('.team').append('<option value=' + p[i].id + ">" + p[i].name + "</option>");
            }
        })
    });

    $('#firstTeam').change(function() {
        var selectedValue = $(this).val();
        secondSelect.prop("disabled",false);
        // Clear the existing options of the second select
        // secondSelect.html(initialOptions);

        // Disable the selected value in the second select
        if (selectedValue) {
            secondSelect.find('option[value="' + selectedValue + '"]').prop('disabled', true);
        }
    })
</script>
