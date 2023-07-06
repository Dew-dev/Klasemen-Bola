<!DOCTYPE html>
<html>

<head>
    <title>Add More Forms</title>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <h1>Add More Forms</h1>

    <div id="forms-container">
        <div class="form-container">
            <label for="name">Team Name:</label>
            <select class="team" name="teams[]" onchange="checkMatches(this.value)">
            </select>
            <br>
            <label for="email">Score:</label>
            <input type="text" name="score[]" placeholder="Enter score">
            <br>
            <label for="phone">Phone:</label>
            <label for="name">Team Name:</label>
            <select class="team" name="teams[]" disabled>
            </select>
            <br>
            <label for="email">Score:</label>
            <input type="text" name="score[]" placeholder="Enter score">
        </div>
    </div>

    <button id="add-form-btn">Add Another Form</button>


</body>
<script type="text/javascript">
    function checkMatches(id) {
        $.get('{{ url('/getMatches') }}', {
                id: id
            })
            .done(function(response) {
                // $('#result').text(response);
                console.log(response);
            })
            .fail(function(xhr, status, error) {
                console.log(error);
            });
    }
    $(document).ready(function() {
        $.get('{{ url('/getTeams') }}', function(data, success) {
            let p = JSON.parse(data)
            // console.log(p);
            for (i = 0; i < p.length; i++) {
                $('.team').append('<option value=' + p[i].id + ">" + p[i].name + "</option>");
            }
        })

        // $('#firstTeam').change(function() {

        var selectedValue = $(this).val();
        // secondSelect.prop("disabled", false);
        // Clear the existing options of the second select
        // secondSelect.html(initialOptions);

        // Disable the selected value in the second select
        // if (selectedValue) {
        //     secondSelect.find('option[value="' + selectedValue + '"]').prop('disabled', true);
        // }
        // })
          $('#add-form-btn').click(function() {
            var formContainer = $('<div>').addClass('form-container');
            var nameLabel = $('<label>').text('Name:');
            var nameSelect = $('<select>').attr('id', 'name').attr('name', 'name')
              .append($('<option>').attr('value', 'Mr.').text('Mr.'))
              .append($('<option>').attr('value', 'Ms.').text('Ms.'))
              .append($('<option>').attr('value', 'Dr.').text('Dr.'));
            var emailLabel = $('<label>').text('Email:');
            var emailInput = $('<input>').attr('type', 'email').attr('name', 'email');
            var phoneLabel = $('<label>').text('Phone:');
            var phoneSelect = $('<select>').attr('id', 'phone').attr('name', 'phone')
              .append($('<option>').attr('value', 'Mobile').text('Mobile'))
              .append($('<option>').attr('value', 'Home').text('Home'))
              .append($('<option>').attr('value', 'Work').text('Work'));
            var addressLabel = $('<label>').text('Address:');
            var addressInput = $('<input>').attr('type', 'text').attr('name', 'address');

            formContainer.append(nameLabel).append(nameSelect).append("<br>")
              .append(emailLabel).append(emailInput).append("<br>")
              .append(phoneLabel).append(phoneSelect).append("<br>")
              .append(addressLabel).append(addressInput);

            $('#forms-container').append(formContainer);
          });

    });
</script>

</html>
