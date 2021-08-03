<!DOCTYPE html>
<html>
<head>
  <title>Firewall Remote</title>
</head>
<body>
 

  <center>
    <h2>Client List</h2> 
    <table border="1" width="70%">
      <thead>
        <tr>
          <th><center>No</th>
          <th><center>Server</th>
          <th><center>User</th>
          <th><center>Mac Address</th>
          <th><center>Ip Address</th>
          <th><center>Status Koneksi</th>
        </tr>
      </thead>
      <tbody class="tabel">
      </tbody>
      <tfoot>
        
      </tfoot>
    </table>
            
</body>
</html>

    <script type="text/javascript">
        $(document).ready(function(){
function PanggilData() {
            $.ajax({
                    url: '<?= site_url('Mikrotik_Dasboard/Monitoring/Readuseractive')  ?>',
                    type: "post",
                    cache: false,
                    success: function(response) {
                      var obj = JSON.parse(response);
                      let data=[];
                      let no=0;
                        obj.map((val,key)=>{
                        console.log(key,val);
                            let arrayOBJ=Object.values(val);
                            console.log(arrayOBJ);
                        no++;
                        data.push("<tr><td><center>"+no+"</td>\
                            <td><center>"+arrayOBJ[1]+"</td>\
                            <td><center><i class='fas fa-laptop'></i>"+val.user+"</td>\
                            <td><center>"+arrayOBJ[4]+"</td>\
                            <td><center>"+arrayOBJ[3]+"</td>\
                            <td><center><i class='fas fa-circle text-success'></i>"+" Connected"+"</td>\
                          </tr>");
                        }); 
                        $('.tabel').html(data);

                    }
                });
}
          

          setInterval(function() {
            PanggilData();
          }, 1000);


         });
</script>