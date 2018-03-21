<?php

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title></title>
  </head>
  <body>
    <form method="post">
    <div class="col-sm-12">
        <div class="col-sm-5">
            <input type="file" name="file" id="file">
            <button id="preview">Preview</button>
        </div>
    </div>
    <div class="col-sm-12">
        <div id="search">
            <input type="text" name="name" id="name" placeholder="Name"><button id="search_name">Search by Name</button>
            <input type="text" name="address" id="address" placeholder="Address"><button id="search_address">Search by Address</button>
            <button id="reset">Reset</button>
        </div>
        <div id="sorted"></div>
    </div>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
$( document ).ready(function() {
    $('#search').hide();

    $('#preview').click(function() {
        event.preventDefault();

        var csv = $('#file');
        var csvFile = csv[0].files[0];
        var ext = csv.val().split(".").pop().toLowerCase();

        if($.inArray(ext, ["csv"]) === -1){
            alert('upload csv');
            return false;
        }

        if(csvFile != undefined){
            reader = new FileReader();
            reader.onload = function(e){
                csvResult = e.target.result.split(/\r|\n|\r\n/);
                arrangeData(csvResult);
            }
            reader.readAsText(csvFile);
        }
    });

    $('#search_name').click(function() {
        event.preventDefault();
        dataArr = JSON.parse(localStorage.getItem('raw'));
       
        var result = $.grep(dataArr, function(elem) {
            return elem.name.toLowerCase().indexOf($('#name').val()) > -1;
        });

        renderDataTable(result, summaryCount(result));
    });

    $('#search_address').click(function() {
        event.preventDefault();
        dataArr = JSON.parse(localStorage.getItem('raw'));
        
        var result = $.grep(dataArr, function(elem) {
            return elem.address.toLowerCase().indexOf($('#address').val()) > -1;
        });

        renderDataTable(result, summaryCount(result));
    });

    $('#reset').click(function() {
        event.preventDefault();
        dataArr = JSON.parse(localStorage.getItem('raw'));

        renderDataTable(dataArr, summaryCount(dataArr));
    });

    function arrangeData(data) {
        dataArr = [];
        dataSplit = [];

        for(var i=1; i<data.length; i++) {
            if (data[i]) {
                var key = i-1;
                dataSplit = data[i].split(",");
                row = {};
                row['id'] = dataSplit[0];
                row['name'] = dataSplit[1];
                row['url'] = dataSplit[2];
                row['logo'] = dataSplit[3];
                row['address'] = dataSplit[4];
                row['address'] += " " + dataSplit[5];
                row['address'] += " " + dataSplit[6];
                row['address'] += " " + dataSplit[7];

                dataArr.push(row);
            }
        }

        sort = [];
        sort = multiSort(dataArr, 'name');
        summary = summaryCount(sort);

        renderDataTable(sort, summary);
        $('#search').show();

        localStorage.setItem('raw', JSON.stringify(sort));
    }

    function renderDataTable(data, summary) {
        var string = "<p>Total results: "+data.length+"</p>";
        string += "<table><head><tr><th>id</th><th>name</th><th>url</th><th>logo</th><th>address</th></tr></thead><tbody>";
        for(var i=0; i<data.length; i++) {
            if (!data[i]) continue;
            string += "<tr>";
            string += "<td>"+data[i]['id']+"</td>";
            if (summary[data[i]['name']]) {
                string += "<td>"+data[i]['name']+"("+summary[data[i]['name']]+")</td>";
            } else {
                string += "<td>"+data[i]['name']+"</td>";
            }
            string += "<td><a href='"+data[i]['url']+"' target='_blank'>"+data[i]['url']+"</a></td>";
            string += "<td><img src='"+data[i]['logo']+"' alt='logo'></td>";
            string += "<td>"+data[i]['address']+"</td>";
            string += "</tr>";
        }
        string += "</tbody></table>";

        $('#sorted').html("");
        $('#sorted').append(string);
    }

    function multiSort(data, column) {
        return data.sort(function(a, b) {
             return a[column] > b[column] ? 1 : -1;
        });
    }

    function summaryCount(data) {
        var cnt = 0;
        var prv = "";
        summary = [];

        for (var i=0; i<data.length; i++) {
            if (!data[i]) continue;

            if (i == 0) {
                prv = data[i]['name'];
                continue;
            }

            cnt++;

            if (prv != data[i]['name']) {
                summary[prv] = cnt;
                cnt = 0;
            }

            prv = data[i]['name'];
        }

        summary[prv] = cnt++;

        return summary;
    }
});
    </script>
  </body>
</html>