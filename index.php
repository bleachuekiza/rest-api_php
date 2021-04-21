<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <table width="100%">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Age</td>
            </tr>
        </thead>

        <tbody id="info">
        </tbody>

    </table>

    <button type="botton" onclick="loadDoc()">Change Content</button>

    <script>
        function loadDoc() {
            let xhttp =  new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let data = JSON.parse(this.responseText);
                    console.log(data);

                    for (let i = 0; i < data.length; i++) {
                        document.getElementById('info').innerHTML += `
                            <tr>
                                <td>${data[i].id}</td>
                                <td>${data[i].name}</td>
                                <td>${data[i].age}</td>
                            </tr>
                        `;
                    }

                    //กำหนดค่าที่จะให้แสดงเช่น แสดงแต่คนที่มีอายุ 43, ==เท่ากับ,  <น้อยกว่า, >มากกว่า, >=มากกว่าหรือเท่ากับ, <=น้อยกว่าหรือเท่ากับ
                    // for (let i = 0; i < data.length; i++) {
                    //     if (data[i].age <= 40) {
                    //         document.getElementById('info').innerHTML += `
                    //             <tr>
                    //                 <td>${data[i].id}</td>
                    //                 <td>${data[i].name}</td>
                    //                 <td>${data[i].age}</td>
                    //             </tr>
                    //         `;
                    //     }
                    // }
                }
            }
            document.getElementById('info').innerHTML = '';
            xhttp.open("GET", 'request.php', true);
            xhttp.send();
        }
    </script>
    
</body>
</html>