<!DOCTYPE html>
<html>
<head>
  <title>Firewall Remote</title>
</head>
<body>
 

  <center>
    <h2>Client List</h2> 
    <table border="1" width="100%">
      <thead>
        <tr>
          <th><center>No</th>
          <th><center>Server</th>
          <th><center>Ip Address</th>
          <th><center>Mac Address</th>
          <th><center>Nama Perangkat</th>
          <!-- <th><center>Waktu Koneksi</th> -->
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

function PanggilData(ip) {
  let userstate="Offline";
            $.ajax({
                    url: '<?= site_url('Mikrotik_Dasboard/Monitoring/Readuseractive')  ?>',
                    type: "post",
                    cache: false,
                    async:false,
                    success: function(response) {
                      var obj = JSON.parse(response);
                        obj.map((val,key)=>{
                          let arrayOBJ=Object.values(val);
                          console.log(val)
                          console.log(arrayOBJ)
                          let ipactive=arrayOBJ[3];
                          if (ip==ipactive) {
                            console.log(ipactive);

                            userstate="Online";
                          }else{
                            userstate="Offline";
                          }
                        }); 
                    }
                });
            return userstate;
}
function PanggilDataCookie(Mac) {
  let username=null;
            $.ajax({
                    url: '<?= site_url('Mikrotik_Dasboard/Monitoring/ReaduserCookie')  ?>',
                    type: "post",
                    cache: false,
                    async:false,
                    success: function(response) {
                      var obj = JSON.parse(response);
                        obj.map((val,key)=>{
                          let arrayOBJ=Object.values(val);
                          // console.log(arrayOBJ)
                          let macCookie=arrayOBJ[2];
                          if (Mac==macCookie) {
                            username=arrayOBJ[1];
                          }
                        }); 
                    }
                });
            return username;
}
function PanggilDatalOG() {
            $.ajax({
                    url: '<?= site_url('Mikrotik_Dasboard/Monitoring/ReaduserLog')  ?>',
                    type: "post",
                    cache: false,
                    success: function(response) {
                      var obj = JSON.parse(response);
                      let data=[];
                      let no=0;
                        obj.map((val,key)=>{
                            let arrayOBJ=Object.values(val);
  // console.log(arrayOBJ);
                            let ipaddress=arrayOBJ[2];
                            let MacAddress=arrayOBJ[1];
                            let Status=PanggilData(ipaddress);
                            let username=PanggilDataCookie(MacAddress);
                            console.log(MacAddress);
                            console.log(Status);
                            if (Status=="Online") {
                              iconState="text-success";
                            }else{
                              iconState="text-danger";
                            }
                        no++;
                        data.push("<tr><td><center>"+no+"</td>\
                            <td><center>"+arrayOBJ[4]+"</td>\
                            <td><center>"+arrayOBJ[2]+"</td>\
                            <td><center>"+arrayOBJ[1]+"</td>\
                            <td><center><i class='fas fa-laptop'></i> "+username+"</td>\
                            <td><center><i class='fas fa-circle "+iconState+"'></i>"+Status+" </td>\
                          </tr>");
                        }); 
                        $('.tabel').html(data);

                    }
                });
}      
      //  <td><center>"+arrayOBJ[5]+"</td>\

          PanggilDatalOG();
          // setInterval(function() {
          // PanggilDatalOG();
          // }, 1000);


         });
</script>